<?php

function cabeDentro($caja, $objeto) {
    sort($objeto);
    list($caja_ancho, $caja_alto, $caja_profundo) = $caja;
    list($ancho, $alto, $profundo) = $objeto;
    
    return ($ancho <= $caja_ancho && $alto <= $caja_alto && $profundo <= $caja_profundo);
}

function empaquetarObjetos($tamanio_caja, $objetos) {
    $volumen_total_caja = pow($tamanio_caja, 3);
    $volumen_total_objetos = 0;
    $objetos_empaquetados = [];
    $puntos_ocupados = [];
    
    usort($objetos, function($a, $b) {
        return array_product($b) - array_product($a);
    });

    function espacioLibre($x, $y, $z, $ancho, $alto, $profundo, $puntos_ocupados) {
        foreach ($puntos_ocupados as $punto) {
            list($ox, $oy, $oz, $oancho, $oalto, $oprofundo) = $punto;
            if (!($x + $ancho <= $ox || $x >= $ox + $oancho || $y + $alto <= $oy || $y >= $oy + $oalto || $z + $profundo <= $oz || $z >= $oz + $oprofundo)) {
                return false;
            }
        }
        return true;
    }

    foreach ($objetos as $objeto) {
        $colocado = false;
        sort($objeto);
        list($ancho, $alto, $profundo) = $objeto;

        for ($x = 0; $x <= $tamanio_caja - $ancho; $x++) {
            for ($y = 0; $y <= $tamanio_caja - $alto; $y++) {
                for ($z = 0; $z <= $tamanio_caja - $profundo; $z++) {
                    if (espacioLibre($x, $y, $z, $ancho, $alto, $profundo, $puntos_ocupados)) {
                        $objetos_empaquetados[] = [$x, $y, $z, $ancho, $alto, $profundo];
                        $puntos_ocupados[] = [$x, $y, $z, $ancho, $alto, $profundo];
                        $volumen_total_objetos += $ancho * $alto * $profundo;
                        $colocado = true;
                        break 3;
                    }
                }
            }
        }
    }

    return [
        'objetos_empaquetados' => $objetos_empaquetados,
        'volumen_total_objetos' => $volumen_total_objetos,
        'volumen_total_caja' => $volumen_total_caja
    ];
}

$tamanio_caja = 10; 
$objetos = [[3, 3, 3], [5, 5, 5], [2, 2, 2], [4, 4, 4], [6, 2, 2]];

$resultado = empaquetarObjetos($tamanio_caja, $objetos);

echo "Objetos que caben en la caja: ".json_encode($resultado['objetos_empaquetados'])."\n";
echo "Volumen total de la caja: {$resultado['volumen_total_caja']} cm³\n";
echo "Volumen ocupado por objetos: {$resultado['volumen_total_objetos']} cm³\n";
echo "Porcentaje de espacio utilizado: ".round(($resultado['volumen_total_objetos'] / $resultado['volumen_total_caja']) * 100, 2)."%\n";
