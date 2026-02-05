<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Weight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebaRelacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('material_endurance')->insert(
            collect([
                //liga forrada
                ['product_id' => 3, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 165,'ancho' => 15,'alto' => 7 , 'largo' => 19, 'peso' => 0.14],
                ['product_id' => 3, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 226,'ancho' => 15,'alto' => 7 , 'largo' => 19, 'peso' => 0.14],
                //liga 1 1/2
                ['product_id' => 4, 'material_id' => 1, 'endurance_id' => 1, 'precio' => 136,'ancho' => 11,'alto' => 6, 'largo' => 16, 'peso' => 0.16],
                ['product_id' => 4, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 156,'ancho' => 11,'alto' => 6, 'largo' => 16, 'peso' => 0.16],
                ['product_id' => 4, 'material_id' => 1, 'endurance_id' => 3, 'precio' => 164,'ancho' => 11,'alto' => 6, 'largo' => 16, 'peso' => 0.16],
                //liga 1 metro
                ['product_id' => 5, 'material_id' => 1, 'endurance_id' => 1, 'precio' => 95,'ancho' => 11,'alto' => 7, 'largo' => 12, 'peso' => 0.123],
                ['product_id' => 5, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 109,'ancho' => 11,'alto' => 7, 'largo' => 12, 'peso' => 0.123],
                ['product_id' => 5, 'material_id' => 1, 'endurance_id' => 3, 'precio' => 136,'ancho' => 11,'alto' => 7, 'largo' => 12, 'peso' => 0.123],
                ['product_id' => 5, 'material_id' => 2, 'endurance_id' => 1, 'precio' => 108,'ancho' => 11,'alto' => 7, 'largo' => 12, 'peso' => 0.123],
                ['product_id' => 5, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 136,'ancho' => 11,'alto' => 7, 'largo' => 12, 'peso' => 0.123],
                ['product_id' => 5, 'material_id' => 2, 'endurance_id' => 3, 'precio' => 164,'ancho' => 11,'alto' => 7, 'largo' => 12, 'peso' => 0.123],
                //liga tipo 8
                ['product_id' => 6, 'material_id' => 1, 'endurance_id' => 1, 'precio' => 68 ,'ancho' => 9,'alto' => 6, 'largo' => 11, 'peso' => 0.1],
                ['product_id' => 6, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 85 ,'ancho' => 9,'alto' => 6, 'largo' => 11, 'peso' => 0.1],
                ['product_id' => 6, 'material_id' => 1, 'endurance_id' => 3, 'precio' => 96 ,'ancho' => 9,'alto' => 6, 'largo' => 11, 'peso' => 0.1],
                ['product_id' => 6, 'material_id' => 2, 'endurance_id' => 1, 'precio' => 92 ,'ancho' => 9,'alto' => 6, 'largo' => 11, 'peso' => 0.1],
                ['product_id' => 6, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 109,'ancho' => 9,'alto' => 6, 'largo' => 11, 'peso' => 0.1],
                ['product_id' => 6, 'material_id' => 2, 'endurance_id' => 3, 'precio' => 110,'ancho' => 9,'alto' => 6, 'largo' => 11, 'peso' => 0.1],
                //liga de tobillo
                ['product_id' => 14, 'material_id' => 2, 'endurance_id' => 1, 'precio' => 188,'ancho' => 8,'alto' => 5, 'largo' => 15, 'peso' => 0.11],
                ['product_id' => 14, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 224,'ancho' => 8,'alto' => 5, 'largo' => 15, 'peso' => 0.11],
            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()
        );



        DB::table('weight_product')->insert(
            collect([
                //mancuerna dumbell
                ['product_id' => 33, 'weight_id' => 19, 'precio' => 520 ,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>2.267], //5
                ['product_id' => 33, 'weight_id' => 20, 'precio' => 780 ,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>3.628], //8
                ['product_id' => 33, 'weight_id' => 21, 'precio' => 1040,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>4.535], //10
                ['product_id' => 33, 'weight_id' => 22, 'precio' => 1240,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>5.443], //12
                ['product_id' => 33, 'weight_id' => 23, 'precio' => 1560,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>6.803], //15
                ['product_id' => 33, 'weight_id' => 24, 'precio' => 2080,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>9.071], //20
                ['product_id' => 33, 'weight_id' => 25, 'precio' => 2600,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>11.339], //25
                ['product_id' => 33, 'weight_id' => 26, 'precio' => 3120,'ancho' => 16,'alto' => 16, 'largo' => 35, 'peso' =>13.607],  //30
                //mancuerna redonda
                ['product_id' => 40, 'weight_id' => 1, 'precio' => 194,'ancho' => 7,'alto' => 7, 'largo' => 16, 'peso' =>0.5],
                ['product_id' => 40, 'weight_id' => 2, 'precio' => 219,'ancho' => 7,'alto' => 7, 'largo' => 16, 'peso' =>1],
                ['product_id' => 40, 'weight_id' => 5, 'precio' => 386,'ancho' => 7,'alto' => 7, 'largo' => 16, 'peso' =>3],
                ['product_id' => 40, 'weight_id' => 7, 'precio' => 699,'ancho' => 7,'alto' => 7, 'largo' => 16, 'peso' =>5],
                //mancuerna estandar
                ['product_id' => 51, 'weight_id' => 4, 'precio' => 156     ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>2],
                ['product_id' => 51, 'weight_id' => 6, 'precio' => 312     ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>4],
                ['product_id' => 51, 'weight_id' => 8, 'precio' => 468     ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>6],
                ['product_id' => 51, 'weight_id' => 10, 'precio' => 624    ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>8],
                ['product_id' => 51, 'weight_id' => 12, 'precio' => 780    ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>10],
                ['product_id' => 51, 'weight_id' => 13, 'precio' => 936    ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>12],
                ['product_id' => 51, 'weight_id' => 14, 'precio' => 1092   ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>14],
                ['product_id' => 51, 'weight_id' => 15, 'precio' => 1248   ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>16],
                ['product_id' => 51, 'weight_id' => 16, 'precio' => 1404   ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>18],
                ['product_id' => 51, 'weight_id' => 17, 'precio' => 1560   ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>20],
                ['product_id' => 51, 'weight_id' => 18, 'precio' => 1716   ,'ancho' => 16,'alto' => 16, 'largo' => 25, 'peso' =>22],
                //sandbag
                ['product_id' => 53, 'weight_id' => 24, 'precio' => 1368,'ancho' => 24,'alto' => 24, 'largo' => 67, 'peso' =>9.071],
                ['product_id' => 53, 'weight_id' => 26, 'precio' => 1368,'ancho' => 24,'alto' => 24, 'largo' => 67, 'peso' =>13.607],
                ['product_id' => 53, 'weight_id' => 28, 'precio' => 1368,'ancho' => 24,'alto' => 24, 'largo' => 67, 'peso' =>18.143],
                //polainas mano
                ['product_id' => 54, 'weight_id' => 1, 'precio' => 203,'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],
                ['product_id' => 54, 'weight_id' => 2, 'precio' => 242,'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],
                ['product_id' => 54, 'weight_id' => 3, 'precio' => 273,'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],

                //polainas pierna
                ['product_id' => 55, 'weight_id' => 1, 'precio' => 202,'ancho' => 29,'alto' => 12, 'largo' => 40, 'peso' =>0.5],
                ['product_id' => 55, 'weight_id' => 2, 'precio' => 242,'ancho' => 29,'alto' => 12, 'largo' => 40, 'peso' =>1],
                ['product_id' => 55, 'weight_id' => 5, 'precio' => 329,'ancho' => 29,'alto' => 12, 'largo' => 40, 'peso' =>3],
                ['product_id' => 55, 'weight_id' => 6, 'precio' => 411,'ancho' => 29,'alto' => 12, 'largo' => 40, 'peso' =>4],
                ['product_id' => 55, 'weight_id' => 7, 'precio' => 544,'ancho' => 29,'alto' => 12, 'largo' => 40, 'peso' =>5],

                //polainas ajustables
                ['product_id' => 56, 'weight_id' => 7, 'precio' => 672,'ancho' => 29,'alto' => 12, 'largo' => 45, 'peso' => 5],
                ['product_id' => 56, 'weight_id' => 10, 'precio' => 985,'ancho' => 29,'alto' => 12, 'largo' => 45, 'peso' => 8],

                //pesa rusa
                ['product_id' => 66, 'weight_id' => 19, 'precio' => 185 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>2.267], //5
                ['product_id' => 66, 'weight_id' => 21, 'precio' => 370 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>4.535],//10,15,20,25,30,35,40,50 y 60 libras
                ['product_id' => 66, 'weight_id' => 23, 'precio' => 555 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>6.803],
                ['product_id' => 66, 'weight_id' => 24, 'precio' => 740 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>9.071],
                ['product_id' => 66, 'weight_id' => 25, 'precio' => 925 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>11.339],
                ['product_id' => 66, 'weight_id' => 26, 'precio' => 1110,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>13.607],
                ['product_id' => 66, 'weight_id' => 27, 'precio' => 1295,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>15.875],
                ['product_id' => 66, 'weight_id' => 28, 'precio' => 1480,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>18.143],
                ['product_id' => 66, 'weight_id' => 29, 'precio' => 1850,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>22.679],
                ['product_id' => 66, 'weight_id' => 30, 'precio' => 2220,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>27.215],

                //pesa rusa plastificada
                ['product_id' => 88, 'weight_id' => 19, 'precio' => 250 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>2.267], //5
                ['product_id' => 88, 'weight_id' => 21, 'precio' => 500 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>4.535],
                ['product_id' => 88, 'weight_id' => 23, 'precio' => 750 ,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>6.803],
                ['product_id' => 88, 'weight_id' => 24, 'precio' => 1000,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>9.071],
                ['product_id' => 88, 'weight_id' => 25, 'precio' => 1250,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>11.339],
                ['product_id' => 88, 'weight_id' => 26, 'precio' => 1500,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>13.607],
                ['product_id' => 88, 'weight_id' => 27, 'precio' => 1750,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>15.875],
                ['product_id' => 88, 'weight_id' => 28, 'precio' => 2000,'ancho' => 16,'alto' => 26, 'largo' => 19, 'peso' =>18.143],

                //balon medicinal
                ['product_id' => 68, 'weight_id' => 5, 'precio' => 544  ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>3],
                ['product_id' => 68, 'weight_id' => 6, 'precio' => 590  ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>4],
                ['product_id' => 68, 'weight_id' => 7, 'precio' => 614  ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>5],
                ['product_id' => 68, 'weight_id' => 8, 'precio' => 683  ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>6],
                ['product_id' => 68, 'weight_id' => 9, 'precio' => 776  ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>7],
                ['product_id' => 68, 'weight_id' => 10, 'precio' => 834 ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>8],
                ['product_id' => 68, 'weight_id' => 11, 'precio' => 903 ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>9],
                ['product_id' => 68, 'weight_id' => 12, 'precio' => 973 ,'ancho' => 30,'alto' => 30, 'largo' => 30,  'peso' =>10],

                //mancuerna plastificada
                ['product_id' => 73, 'weight_id' => 1, 'precio' => 196,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>0.5],
                ['product_id' => 73, 'weight_id' => 2, 'precio' => 242,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>1],
                ['product_id' => 73, 'weight_id' => 3, 'precio' => 300,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>1.5],
                ['product_id' => 73, 'weight_id' => 4, 'precio' => 347,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>2],
                ['product_id' => 73, 'weight_id' => 5, 'precio' => 539,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>3],
                ['product_id' => 73, 'weight_id' => 6, 'precio' => 706,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>4],
                ['product_id' => 73, 'weight_id' => 7, 'precio' => 915,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>5],
                ['product_id' => 73, 'weight_id' => 8, 'precio' => 1020,'ancho' => 11,'alto' => 11, 'largo' => 30, 'peso' =>6],

                //disco olimpico

                ['product_id' => 77, 'weight_id' => 2, 'precio' => 72   ,'ancho' => 25,'alto' => 3, 'largo' => 25, 'peso' =>1],
                ['product_id' => 77, 'weight_id' => 4, 'precio' => 144  ,'ancho' => 25,'alto' => 3, 'largo' => 25, 'peso' =>2],
                ['product_id' => 77, 'weight_id' => 31, 'precio' => 180 ,'ancho' => 25,'alto' => 3, 'largo' => 25, 'peso' =>2.5],
                ['product_id' => 77, 'weight_id' => 7, 'precio' => 360  ,'ancho' => 25,'alto' => 3, 'largo' => 25, 'peso' =>5],
                ['product_id' => 77, 'weight_id' => 12, 'precio' => 720 ,'ancho' => 25,'alto' => 3, 'largo' => 25, 'peso' =>10],
                ['product_id' => 77, 'weight_id' => 17, 'precio' => 1440,'ancho' => 25,'alto' => 3, 'largo' => 25, 'peso' =>20],

                //slam ball
                ['product_id' => 84, 'weight_id' => 20, 'precio' => 650,'ancho' => 28,'alto' => 28, 'largo' => 28, 'peso' =>3.628],
                ['product_id' => 84, 'weight_id' => 21, 'precio' => 680,'ancho' => 28,'alto' => 28, 'largo' => 28, 'peso' =>4.535],
                ['product_id' => 84, 'weight_id' => 22, 'precio' => 740,'ancho' => 28,'alto' => 28, 'largo' => 28, 'peso' =>5.443],
                ['product_id' => 84, 'weight_id' => 23, 'precio' => 835,'ancho' => 28,'alto' => 28, 'largo' => 28, 'peso' =>6.803],
                ['product_id' => 84, 'weight_id' => 24, 'precio' => 960,'ancho' => 28,'alto' => 28, 'largo' => 28, 'peso' =>9.071],
                

                //pelota de gel
                ['product_id' => 111, 'weight_id' => 1, 'precio' => 57  ,'ancho' => 13,'alto' => 13, 'largo' => 13, 'peso' =>0.5],
                ['product_id' => 111, 'weight_id' => 2, 'precio' => 68  ,'ancho' => 13,'alto' => 13, 'largo' => 13, 'peso' =>1],
                ['product_id' => 111, 'weight_id' => 3, 'precio' => 80  ,'ancho' => 13,'alto' => 13, 'largo' => 13, 'peso' =>1.5],
                ['product_id' => 111, 'weight_id' => 4, 'precio' => 92  ,'ancho' => 13,'alto' => 13, 'largo' => 13, 'peso' =>2],
                ['product_id' => 111, 'weight_id' => 5, 'precio' => 115 ,'ancho' => 13,'alto' => 13, 'largo' => 13, 'peso' =>3],
                ['product_id' => 111, 'weight_id' => 6, 'precio' => 157 ,'ancho' => 13,'alto' => 13, 'largo' => 13, 'peso' =>4],

                //mancuernas fitness
                ['product_id' => 114, 'weight_id' => 1, 'precio' => 196,'ancho' => 3,'alto' => 3, 'largo' => 20, 'peso' => 0.5],
                ['product_id' => 114, 'weight_id' => 2, 'precio' => 219,'ancho' => 3,'alto' => 3, 'largo' => 20, 'peso' => 1],

            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()
        );

        DB::table('wholesale_product')->insert(
            collect([
                //bungee
                ['product_id' => 17, 'wholesale_id' => 1, 'precio' => 3225, 'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],
                ['product_id' => 17, 'wholesale_id' => 2, 'precio' => 15196,'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],
                ['product_id' => 17, 'wholesale_id' => 3, 'precio' => 28652,'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],
                ['product_id' => 17, 'wholesale_id' => 4, 'precio' => 52432,'ancho' => null,'alto' => null, 'largo' => null, 'peso' => null],
            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()
        );

        DB::table('material_product')->insert(
            collect([
                //cuerda
                ['product_id' => 39, 'material_id' => 3, 'precio' => 31,    'ancho' => 9,'alto' => 7, 'largo' => 17, 'peso' => 0.25],
                ['product_id' => 39, 'material_id' => 4, 'precio' => 98,    'ancho' => 9,'alto' => 7, 'largo' => 17, 'peso' => 0.25],
                ['product_id' => 39, 'material_id' => 5, 'precio' => 152,   'ancho' => 9,'alto' => 7, 'largo' => 17, 'peso' => 0.25],
                ['product_id' => 39, 'material_id' => 6, 'precio' => 203,   'ancho' => 9,'alto' => 7, 'largo' => 17, 'peso' => 0.25],
                ['product_id' => 39, 'material_id' => 7, 'precio' => 315,   'ancho' => 9,'alto' => 7, 'largo' => 17, 'peso' => 0.25],
            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()
        );

        DB::table('length_product')->insert(
            collect([
                //cuerda
                ['product_id' => 42, 'length_id' => 33, 'precio' => 586,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 42, 'length_id' => 35, 'precio' => 915,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                //costal
                ['product_id' => 50, 'length_id' => 20, 'precio' => 788,'ancho' =>    null  ,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 50, 'length_id' => 25, 'precio' => 1078,'ancho' =>   null  ,'alto' => null, 'largo' => null, 'peso' =>null],
                //barra olimpica
                ['product_id' => 62, 'length_id' => 28, 'precio' => 2679,'ancho' => 8,'alto' => 8, 'largo' => 150, 'peso' => 20],
                ['product_id' => 62, 'length_id' => 29, 'precio' => 3045,'ancho' => 8,'alto' => 8, 'largo' => 180, 'peso' => 20],
                ['product_id' => 62, 'length_id' => 30, 'precio' => 3535,'ancho' => 8,'alto' => 8, 'largo' => 220, 'peso' => 20],

                //banco de salto
                ['product_id' => 70, 'length_id' => 15, 'precio' => 1008,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 70, 'length_id' => 16, 'precio' => 1194,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 70, 'length_id' => 17, 'precio' => 1321,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 70, 'length_id' => 18, 'precio' => 1426,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 70, 'length_id' => 21, 'precio' => 1623,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],


                //liga pull ups
                ['product_id' => 83, 'length_id' => 1, 'precio' => 350,'ancho' => 5,'alto' => 3, 'largo' => 27, 'peso' =>0.26],
                ['product_id' => 83, 'length_id' => 2, 'precio' => 580,'ancho' => 5,'alto' => 3, 'largo' => 27, 'peso' =>0.26],
                ['product_id' => 83, 'length_id' => 4, 'precio' => 780,'ancho' => 5,'alto' => 3, 'largo' => 27, 'peso' =>0.26],

                // balon suizo
                ['product_id' => 110, 'length_id' => 19, 'precio' => 278,'ancho' => 21,'alto' => 11, 'largo' => 24, 'peso' => 0.77],
                ['product_id' => 110, 'length_id' => 22, 'precio' => 349,'ancho' => 21,'alto' => 11, 'largo' => 24, 'peso' => 0.77],
                ['product_id' => 110, 'length_id' => 23, 'precio' => 397,'ancho' => 21,'alto' => 11, 'largo' => 24, 'peso' => 0.77],

                //rodillo de tapiceria

                ['product_id' => 168, 'length_id' => 15, 'precio' => 240,'ancho' =>12 ,'alto' => 12, 'largo' => 20, 'peso' => 0.59],
                ['product_id' => 168, 'length_id' => 18, 'precio' => 580,'ancho' =>12 ,'alto' => 12, 'largo' => 40, 'peso' => 0.95],
            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()

        );

        DB::table('weight_length')->insert(
            collect([
                //peso fijo
                ['product_id' => 78, 'length_id' => 21, 'weight_id' => 5, 'precio' => 367,'ancho' => 3,'alto' => 3, 'largo' => 60, 'peso' =>3],
                ['product_id' => 78, 'length_id' => 24, 'weight_id' => 6, 'precio' => 463,'ancho' => 3,'alto' => 3, 'largo' => 80, 'peso' =>4],
                ['product_id' => 78, 'length_id' => 25, 'weight_id' => 7, 'precio' => 544,'ancho' => 3,'alto' => 3, 'largo' => 100, 'peso' =>5],
                ['product_id' => 78, 'length_id' => 26, 'weight_id' => 8, 'precio' => 579,'ancho' => 3,'alto' => 3, 'largo' => 120, 'peso' =>6],
                ['product_id' => 78, 'length_id' => 27, 'weight_id' => 9, 'precio' => 649,'ancho' => 3,'alto' => 3, 'largo' => 140, 'peso' =>7],

            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()
        );


        DB::table('size_product')->insert(
            collect([
                //selector
                ['product_id' => 125, 'size_id' => 1, 'precio' => 87,'ancho' => 5 ,'alto' => 1, 'largo' => 15, 'peso' =>0.07],
                ['product_id' => 125, 'size_id' => 2, 'precio' => 105,'ancho' => 5 ,'alto' => 1, 'largo' => 15, 'peso' =>0.07],
                //bandola
                ['product_id' => 155, 'size_id' => 3, 'precio' => 36,'ancho' => 3.5,'alto' => 0.5, 'largo' => 7, 'peso' => 0.045],
                ['product_id' => 155, 'size_id' => 4, 'precio' => 43,'ancho' => 3.5,'alto' => 0.5, 'largo' => 7, 'peso' => 0.045],
                ['product_id' => 155, 'size_id' => 5, 'precio' => 50,'ancho' => 3.5,'alto' => 0.5, 'largo' => 7, 'peso' => 0.045],
                ['product_id' => 155, 'size_id' => 6, 'precio' => 65,'ancho' => 3.5,'alto' => 0.5, 'largo' => 7, 'peso' => 0.045],
                //puntas popping
                ['product_id' => 161, 'size_id' => 1, 'precio' => 47,'ancho' => 3.5,'alto' => 1.5, 'largo' => 5, 'peso' => 0.022],
                ['product_id' => 161, 'size_id' => 2, 'precio' => 47,'ancho' => 3.5,'alto' => 1.5, 'largo' => 5, 'peso' => 0.022],
                //guias
                ['product_id' => 167, 'size_id' => 10, 'precio' => 5500,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 167, 'size_id' => 11, 'precio' => 6150,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                //rodillo prop
                ['product_id' => 172, 'size_id' => 7, 'precio' => 348,'ancho' => 12,'alto' => 12, 'largo' => 16, 'peso' => 0.3],
                ['product_id' => 172, 'size_id' => 8, 'precio' => 290,'ancho' => 12,'alto' => 12, 'largo' => 20, 'peso' => 0.59],
                ['product_id' => 172, 'size_id' => 9, 'precio' => 870,'ancho' => 12,'alto' => 12, 'largo' => 50, 'peso' => 1.1],
                //tapa interna
                ['product_id' => 185, 'size_id' => 17, 'precio' => 20,'ancho' => 5,'alto' => 1.5, 'largo' => 5, 'peso' => 0.02],
                //tamaño o mayoreo],
                ['product_id' => 185, 'size_id' => 18, 'precio' => 26,'ancho' => 5,'alto' => 1.5, 'largo' => 7, 'peso' => 0.02],
                //tamaño o mayoreo],
                ['product_id' => 185, 'size_id' => 19, 'precio' => 29,'ancho' => 6,'alto' => 1.5, 'largo' => 6, 'peso' => 0.02],
                //tamaño o mayoreo],
                ['product_id' => 185, 'size_id' => 20, 'precio' => 29,'ancho' => 3.5,'alto' => 1.5, 'largo' => 7.5, 'peso' => 0.02],
                //tamaño o mayoreo],
                ['product_id' => 185, 'size_id' => 21, 'precio' => 31,'ancho' => 5,'alto' => 1.5, 'largo' => 10, 'peso' => 0.02],
                //tamaño o mayoreo],
                //reductores
                ['product_id' => 187, 'size_id' => 22, 'precio' => 29,'ancho' => 4.5,'alto' => 10, 'largo' => 4.5, 'peso' => 0.045],
                ['product_id' => 187, 'size_id' => 23, 'precio' => 32,'ancho' => 6,'alto' => 10, 'largo' => 6, 'peso' => 0.045],
                //balero lineal
                ['product_id' => 191, 'size_id' => 10, 'precio' => 410,'ancho' => 3.5,'alto' => 5.5, 'largo' => 3.5, 'peso' => 0.2],
                ['product_id' => 191, 'size_id' => 11, 'precio' => 520,'ancho' => 4.5,'alto' => 6.5, 'largo' => 4.5, 'peso' => 0.36],
                ['product_id' => 191, 'size_id' => 12, 'precio' => 640,'ancho' => 6,'alto' => 7.5, 'largo' => 6, 'peso' => 0.6],
                //poleas
                ['product_id' => 192, 'size_id' => 15, 'precio' => 100,'ancho' => null,'alto' =>null , 'largo' => null, 'peso' =>null],
                ['product_id' => 192, 'size_id' => 16, 'precio' => 110,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                //regatones
                ['product_id' => 193, 'size_id' => 17, 'precio' => 35,'ancho' => 7,'alto' => 5.5, 'largo' => 7, 'peso' => 0.12],
                ['product_id' => 193, 'size_id' => 18, 'precio' => 46,'ancho' => 7,'alto' => 5.5, 'largo' => 9.54, 'peso' => 0.12],
                //campana
                ['product_id' => 225, 'size_id' => 13, 'precio' => 41,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],
                ['product_id' => 225, 'size_id' => 14, 'precio' => 53,'ancho' => null,'alto' => null, 'largo' => null, 'peso' =>null],





            ])->map(function ($item) {
                $item['precio'] = round($item['precio'] * 1.16, 2); // Incrementa 16% y redondea a 2 decimales
                return $item;
            })->toArray()
        );


        DB::table('length_product')->insert(
            collect(range(31, 179))->map(function ($length_id) {
                $precioBase = 50 + ($length_id - 31) * 50; // Ajusta la lógica de precios si es necesario
                return [
                    'product_id' => 176,
                    'length_id' => $length_id,
                    'precio' => round($precioBase * 1.16, 2), // Aplica el 16% de incremento
                    'ancho' => 28,'alto' => 0.35, 'largo' => 28, 'peso' => 0.055,
                ];
            })->toArray()
        );

        DB::table('length_product')->insert(
            collect(range(31, 179))->map(function ($length_id) {
                $precioBase = 40 + ($length_id - 31) * 40; // Ajusta la lógica de precios si es necesario
                return [
                    'product_id' => 223,
                    'length_id' => $length_id,
                    'precio' => round($precioBase * 1.16, 2), // Aplica el 16% de incremento
                    'ancho' =>null,'alto' => null, 'largo' => null, 'peso' => null,
                ];
            })->toArray()
        );
    }
}
