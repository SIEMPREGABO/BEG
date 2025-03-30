<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\PaqueteItem;
use App\Models\Paquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpaquetadoController extends Controller
{
    public function calcularEmpaquetadoOptimo(array $carrito): int
    {

        $cajas = Caja::orderBy('precio')->get()->toArray();
        //dd($cajas);

        $objetosPorEmpacar = $this->convertirCarritoAObjetos($carrito);
        //dd($objetosPorEmpacar);
        $precioTotal = 0;

        $maxiteraciones = 100;
        $i = 0;

        while (!empty($objetosPorEmpacar) && $i++ < $maxiteraciones) {
            $mejorCaja = null;
            $mejorResultado = null;
            $maxPorcentaje = 0;

            foreach ($cajas as $caja) {
                //dd($caja);
                $resultado = $this->empacarObjetos($objetosPorEmpacar, $caja);

                if ($resultado['porcentaje_usado'] > $maxPorcentaje) {
                    $maxPorcentaje = $resultado['porcentaje_usado'];
                    $mejorCaja = $caja;
                    $mejorResultado = $resultado;
                }
            }

            if ($mejorCaja) {
                $precioTotal += $mejorCaja['precio'];
                $objetosPorEmpacar = $mejorResultado['objetos_no_empacados'];
            } else {
                break; // No hay cajas que puedan contener los objetos restantes
            }
        }
        dd($precioTotal, $mejorCaja);
        return $precioTotal;
        /*$cajasDisponibles = Caja::orderBy('precio')->get()->toArray();
        $objetosPorEmpacar = $this->convertirCarritoAObjetos($carrito);
        $resultado = [
            'precio_total_envio' => 0,
            'cajas_utilizadas' => [],
            'productos_sin_empaquetar' => []
        ];

        while (!empty($objetosPorEmpacar)) {
            $mejorCaja = $this->encontrarMejorCaja($cajasDisponibles, $objetosPorEmpacar);

            if (!$mejorCaja) {
                $resultado['productos_sin_empaquetar'] = $objetosPorEmpacar;
                break;
            }

            $resultado['precio_total_envio'] += $mejorCaja['caja']['precio'];
            $resultado['cajas_utilizadas'][] = $mejorCaja;
            $objetosPorEmpacar = $mejorCaja['objetos_no_empacados'];
        }

        return $resultado['precio_total_envio'];*/
    }

    private function convertirCarritoAObjetos(array $carrito): array
    {
        $objetos = [];
        foreach ($carrito as $producto) {
            if ($producto['ancho'] !== null && $producto['alto'] !== null && $producto['largo'] !== null && $producto['peso'] !== null) {
                for ($i = 0; $i < $producto['cantidad']; $i++) {
                    $objetos[] = [
                        'producto_id' => $producto['id'],
                        'unidad_numero' => $i + 1,
                        'ancho' => $producto['ancho'],
                        'alto' => $producto['alto'],
                        'largo' => $producto['largo'],
                        'peso' => $producto['peso'],
                        'datos_originales' => $producto
                    ];
                }
            }
        }
        return $objetos;
    }

    /*private function encontrarMejorCaja(array $cajasDisponibles, array $objetos): ?array
    {
        $mejorCaja = null;
        $maxPorcentaje = 0;

        foreach ($cajasDisponibles as $caja) {
            $resultado = $this->empacarObjetos($caja, $objetos);

            if ($resultado['porcentaje_usado'] > $maxPorcentaje) {
                $maxPorcentaje = $resultado['porcentaje_usado'];
                $mejorCaja = [
                    'caja' => $caja,
                    'objetos_empacados' => $resultado['objetos_empacados'],
                    'objetos_no_empacados' => $resultado['objetos_no_empacados'],
                    'porcentaje_usado' => $resultado['porcentaje_usado']
                ];
            }
        }

        return $mejorCaja;
    }*/


    private function generarRotaciones(array $objeto): array
    {
        $dimensionesOriginales = [
            'ancho' => $objeto['ancho'],
            'alto' => $objeto['alto'],
            'largo' => $objeto['largo']
        ];

        // Todas las posibles permutaciones de las dimensiones (6 rotaciones posibles en 3D)
        $rotaciones = [
            // Rotación 0: original (ancho, alto, largo)
            [
                'ancho' => $dimensionesOriginales['ancho'],
                'alto' => $dimensionesOriginales['alto'],
                'largo' => $dimensionesOriginales['largo'],
                'rotacion' => 'original'
            ],
            // Rotación 1: intercambiar ancho y alto
            [
                'ancho' => $dimensionesOriginales['alto'],
                'alto' => $dimensionesOriginales['ancho'],
                'largo' => $dimensionesOriginales['largo'],
                'rotacion' => 'intercambio_ancho_alto'
            ],
            // Rotación 2: intercambiar ancho y largo
            [
                'ancho' => $dimensionesOriginales['largo'],
                'alto' => $dimensionesOriginales['alto'],
                'largo' => $dimensionesOriginales['ancho'],
                'rotacion' => 'intercambio_ancho_largo'
            ],
            // Rotación 3: intercambiar alto y largo
            [
                'ancho' => $dimensionesOriginales['ancho'],
                'alto' => $dimensionesOriginales['largo'],
                'largo' => $dimensionesOriginales['alto'],
                'rotacion' => 'intercambio_alto_largo'
            ],
            // Rotación 4: rotación triple 1
            [
                'ancho' => $dimensionesOriginales['alto'],
                'alto' => $dimensionesOriginales['largo'],
                'largo' => $dimensionesOriginales['ancho'],
                'rotacion' => 'rotacion_triple_1'
            ],
            // Rotación 5: rotación triple 2
            [
                'ancho' => $dimensionesOriginales['largo'],
                'alto' => $dimensionesOriginales['ancho'],
                'largo' => $dimensionesOriginales['alto'],
                'rotacion' => 'rotacion_triple_2'
            ]
        ];

        // Eliminar rotaciones duplicadas (cuando el objeto tiene dimensiones iguales)
        $rotacionesUnicas = [];
        $vistas = [];

        foreach ($rotaciones as $rotacion) {
            $clave = $rotacion['ancho'] . '-' . $rotacion['alto'] . '-' . $rotacion['largo'];
            if (!in_array($clave, $vistas)) {
                $vistas[] = $clave;
                $rotacionesUnicas[] = $rotacion;
            }
        }

        return $rotacionesUnicas;
    }

    private function empacarObjetos(array $objetos, array $caja): array
    {
        // 1. Inicialización de variables
        //dd('pase');
        $volumenCaja = $this->calcularVolumen($caja);
        //dd('pase el volumen');
        $volumenOcupado = 0;
        $pesoTotal = 0;
        $objetosEmpacados = [];
        $objetosNoEmpacados = [];
        $puntosOcupados = []; // Para tracking 3D de espacios usados

        // 2. Ordenar objetos por volumen (mayor a menor)
        usort($objetos, function ($a, $b) {
            $volumenA = $a['ancho'] * $a['alto'] * $a['largo'];
            $volumenB = $b['ancho'] * $b['alto'] * $b['largo'];
            return $volumenB <=> $volumenA;
        });

        //dd($objetos);

        // 3. Algoritmo de empaquetado 3D
        foreach ($objetos as $objeto) {
            // Verificación de peso máximo primero
            if (($pesoTotal + $objeto['peso']) > $caja['peso_maximo']) {
                $objetosNoEmpacados[] = $objeto;
                continue;
            }

            $empacado = false;

            $rotaciones = $this->generarRotaciones($objeto);

            // Probar cada rotación posible
            foreach ($rotaciones as $rotacion) {
                // Solo considerar rotaciones que caben en la caja
                if (
                    $rotacion['ancho'] > $caja['ancho'] ||
                    $rotacion['alto'] > $caja['alto'] ||
                    $rotacion['largo'] > $caja['largo']
                ) {
                    continue;
                }

                // Buscar posición en 3D (x, y, z) para esta rotación
                for ($x = 0; $x <= $caja['ancho'] - $rotacion['ancho']; $x++) {
                    for ($y = 0; $y <= $caja['alto'] - $rotacion['alto']; $y++) {
                        for ($z = 0; $z <= $caja['largo'] - $rotacion['largo']; $z++) {

                            // Verificar colisión con objetos ya empacados
                            if ($this->espacioDisponible($x, $y, $z, $rotacion['ancho'], $rotacion['alto'], $rotacion['largo'], $puntosOcupados)) {

                                // Registrar el espacio ocupado
                                $puntosOcupados[] = [
                                    'x' => $x,
                                    'y' => $y,
                                    'z' => $z,
                                    'ancho' => $rotacion['ancho'],
                                    'alto' => $rotacion['alto'],
                                    'largo' => $rotacion['largo']
                                ];

                                // Registrar objeto empacado
                                $objetosEmpacados[] = [
                                    'posicion' => ['x' => $x, 'y' => $y, 'z' => $z],
                                    'dimensiones' => [
                                        'ancho' => $rotacion['ancho'],
                                        'alto' => $rotacion['alto'],
                                        'largo' => $rotacion['largo']
                                    ],
                                    'rotacion' => $rotacion['rotacion'], // Tipo de rotación aplicada
                                    'peso' => $objeto['peso'],
                                    'producto_id' => $objeto['producto_id'],
                                    'caja_id' => $caja['id']
                                ];

                                $volumenOcupado += $rotacion['ancho'] * $rotacion['alto'] * $rotacion['largo'];
                                $pesoTotal += $objeto['peso'];
                                $empacado = true;
                                break 4; // Salir de los 4 bucles anidados (incluyendo el de rotaciones)
                            }
                        }
                    }
                }
            }

            if (!$empacado) {
                $objetosNoEmpacados[] = $objeto;
            }
        }

        // 4. Calcular métricas finales
        $porcentajeUsado = $volumenCaja > 0 ? ($volumenOcupado / $volumenCaja) * 100 : 0;

        return [
            'caja_id' => $caja['id'],
            'objetos_empacados' => $objetosEmpacados,
            'objetos_no_empacados' => $objetosNoEmpacados,
            'volumen_ocupado' => $volumenOcupado,
            'volumen_caja' => $volumenCaja,
            'porcentaje_usado' => $porcentajeUsado,
            'peso_total' => $pesoTotal,
            'precio_caja' => $caja['precio']
        ];
    }

    /**
     * Calcula el volumen de una caja
     */
    private function calcularVolumen($caja): float
    {
        return $caja['ancho'] * $caja['alto'] * $caja['largo'];
    }

    /**
     * Verifica si un espacio está disponible en la caja
     */
    private function espacioDisponible($x, $y, $z, $ancho, $alto, $largo, $puntosOcupados): bool
    {
        foreach ($puntosOcupados as $punto) {
            if (!($x + $ancho <= $punto['x'] ||
                $x >= $punto['x'] + $punto['ancho'] ||
                $y + $alto <= $punto['y'] ||
                $y >= $punto['y'] + $punto['alto'] ||
                $z + $largo <= $punto['z'] ||
                $z >= $punto['z'] + $punto['largo'])) {
                return false;
            }
        }
        return true;
    }

    public function guardarResultado(Request $request)
    {
        $resultadoEmpaquetado = $this->calcularEmpaquetadoOptimo($request->carrito);

        DB::transaction(function () use ($resultadoEmpaquetado) {
            foreach ($resultadoEmpaquetado['cajas_utilizadas'] as $index => $cajaUtilizada) {
                $paquete = Paquetes::create([
                    'caja_id' => $cajaUtilizada['caja']['id'],
                    'numero_paquete' => $index + 1,
                    'peso_actual' => array_sum(array_column($cajaUtilizada['objetos_empacados'], 'peso'))
                ]);

                foreach ($cajaUtilizada['objetos_empacados'] as $item) {
                    PaqueteItem::create([
                        'paquete_id' => $paquete->id,
                        'producto_id' => $item['producto_id'],
                        'unidad_numero' => $item['unidad_numero'],
                        'posicion_x' => 0, // Valores de ejemplo
                        'posicion_y' => 0,
                        'posicion_z' => 0
                    ]);
                }
            }
        });

        return response()->json([
            'success' => true,
            'precio_total' => $resultadoEmpaquetado['precio_total_envio'],
            'total_paquetes' => count($resultadoEmpaquetado['cajas_utilizadas'])
        ]);
    }
}
