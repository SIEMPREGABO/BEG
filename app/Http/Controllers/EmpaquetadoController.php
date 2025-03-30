<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\PaqueteItem;
use App\Models\Paquetes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpaquetadoController extends Controller
{
    public function calcularEmpaquetadoOptimo(array $carrito): array
    {
        $cajasDisponibles = Caja::orderBy('precio')->get()->toArray();
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

        return $resultado;
    }

    private function convertirCarritoAObjetos(array $carrito): array
    {
        $objetos = [];
        foreach ($carrito as $producto) {
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
        return $objetos;
    }

    private function encontrarMejorCaja(array $cajasDisponibles, array $objetos): ?array
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
    }

    private function empacarObjetos(array $caja, array $objetos): array
    {
        // Implementa aquí tu algoritmo de empaquetado físico
        // Ejemplo simplificado:
        $volumenCaja = $caja['dimensiones'][0] * $caja['dimensiones'][1] * $caja['dimensiones'][2];
        $objetosEmpacados = [];
        $objetosNoEmpacados = [];
        $volumenOcupado = 0;
        $pesoTotal = 0;

        foreach ($objetos as $objeto) {
            // Lógica para determinar si el objeto cabe en la caja
            $volumenObjeto = $objeto['ancho'] * $objeto['alto'] * $objeto['largo'];
            
            if (($volumenOcupado + $volumenObjeto) <= $volumenCaja && 
                ($pesoTotal + $objeto['peso']) <= $caja['peso_maximo']) {
                $objetosEmpacados[] = $objeto;
                $volumenOcupado += $volumenObjeto;
                $pesoTotal += $objeto['peso'];
            } else {
                $objetosNoEmpacados[] = $objeto;
            }
        }

        $porcentajeUsado = ($volumenOcupado / $volumenCaja) * 100;

        return [
            'objetos_empacados' => $objetosEmpacados,
            'objetos_no_empacados' => $objetosNoEmpacados,
            'porcentaje_usado' => $porcentajeUsado
        ];
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