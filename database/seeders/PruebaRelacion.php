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


        DB::table('material_endurance')->insert([
            //liga forrada
            ['product_id' => 3, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 165],
            ['product_id' => 3, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 226],
            //liga 1 1/2
            ['product_id' => 4, 'material_id' => 1, 'endurance_id' => 1, 'precio' => 136],
            ['product_id' => 4, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 156],
            ['product_id' => 4, 'material_id' => 1, 'endurance_id' => 3, 'precio' => 164],
            //liga 1 metro
            ['product_id' => 5, 'material_id' => 1, 'endurance_id' => 1, 'precio' => 95],
            ['product_id' => 5, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 109],
            ['product_id' => 5, 'material_id' => 1, 'endurance_id' => 3, 'precio' => 136],
            ['product_id' => 5, 'material_id' => 2, 'endurance_id' => 1, 'precio' => 108],
            ['product_id' => 5, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 136],
            ['product_id' => 5, 'material_id' => 2, 'endurance_id' => 3, 'precio' => 164],
            //liga tipo 8
            ['product_id' => 6, 'material_id' => 1, 'endurance_id' => 1, 'precio' => 68],
            ['product_id' => 6, 'material_id' => 1, 'endurance_id' => 2, 'precio' => 85],
            ['product_id' => 6, 'material_id' => 1, 'endurance_id' => 3, 'precio' => 96],
            ['product_id' => 6, 'material_id' => 2, 'endurance_id' => 1, 'precio' => 92],
            ['product_id' => 6, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 109],
            ['product_id' => 6, 'material_id' => 2, 'endurance_id' => 3, 'precio' => 110],

            //liga de tobillo
            ['product_id' => 14, 'material_id' => 2, 'endurance_id' => 1, 'precio' => 188],
            ['product_id' => 14, 'material_id' => 2, 'endurance_id' => 2, 'precio' => 224],


            /*
            ['nombre' => 'Liga forrada hule',               'slug' => 'Liga-forrada-hule',                  'mayoreo' => 0, 'precio' => 165.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga forrada latex',              'slug' => 'Liga-forrada-latex',                 'mayoreo' => 0, 'precio' => 226.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 1/2m hule media',          'slug' => 'Liga-1-1-2m-hule-md',                'mayoreo' => 0, 'precio' => 136.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 1/2m hule alta',           'slug' => 'Liga-1-1-2m-hule-al',                'mayoreo' => 0, 'precio' => 156.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 1/2m hule ultra',          'slug' => 'Liga-1-1-2m-hule-ul',                'mayoreo' => 0, 'precio' => 164.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 metro hule media',         'slug' => 'Liga-1-metro-hule-md',               'mayoreo' => 0, 'precio' => 95.00,      'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 metro hule alta',          'slug' => 'Liga-1-metro-hule-al',               'mayoreo' => 0, 'precio' => 109.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 metro hule ultra',         'slug' => 'Liga-1-metro-hule-ul',               'mayoreo' => 0, 'precio' => 136.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 metro latex media',        'slug' => 'Liga-1-metro-latex-md',              'mayoreo' => 0, 'precio' => 108.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 metro latex alta',         'slug' => 'Liga-1-metro-latex-al',              'mayoreo' => 0, 'precio' => 136.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga 1 metro latex ultra',        'slug' => 'Liga-1-metro-latex-ul',              'mayoreo' => 0, 'precio' => 164.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga tipo 8 cerrada hule media',  'slug' => 'Liga-tipo-8-cerrada-hule-md',        'mayoreo' => 0, 'precio' => 68.00,      'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga tipo 8 cerrada hule alta',   'slug' => 'Liga-tipo-8-cerrada-hule-al',        'mayoreo' => 0, 'precio' => 85.00,      'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga tipo 8 cerrada hule ultra',  'slug' => 'Liga-tipo-8-cerrada-hule-ul',        'mayoreo' => 0, 'precio' => 96.00,      'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga tipo 8 cerrada latex media', 'slug' => 'Liga-tipo-8-cerrada-latex-md',       'mayoreo' => 0, 'precio' => 92.00,      'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga tipo 8 cerrada latex alta',  'slug' => 'Liga-tipo-8-cerrada-latex-al',       'mayoreo' => 0, 'precio' => 109.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga tipo 8 cerrada latex ultra', 'slug' => 'Liga-tipo-8-cerrada-latex-ul',       'mayoreo' => 0, 'precio' => 110.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga de tobillo media latex',           'slug' => 'Liga-de-tobillo-media',              'mayoreo' => 0, 'precio' => 188.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            ['nombre' => 'Liga de tobillo alta latex',            'slug' => 'Liga-de-tobillo-alta',               'mayoreo' => 0, 'precio' => 224.00,     'precio_mayoreo' => null,   'variante' => 0,    'category_id' => 1],
            */
        ]);

        
        DB::table('weight_product')->insert([
            //mancuerna dumbell
            ['product_id' => 33, 'weight_id' => 19, 'precio' => 520],
            ['product_id' => 33, 'weight_id' => 20, 'precio' => 780],
            ['product_id' => 33, 'weight_id' => 21, 'precio' => 1040],
            ['product_id' => 33, 'weight_id' => 22, 'precio' => 1240],
            ['product_id' => 33, 'weight_id' => 23, 'precio' => 1560],
            ['product_id' => 33, 'weight_id' => 24, 'precio' => 2080],
            ['product_id' => 33, 'weight_id' => 25, 'precio' => 2600],
            ['product_id' => 33, 'weight_id' => 26, 'precio' => 3120],
            //mancuerna redonda
            ['product_id' => 40, 'weight_id' => 1, 'precio' => 194],
            ['product_id' => 40, 'weight_id' => 2, 'precio' => 219],
            ['product_id' => 40, 'weight_id' => 5, 'precio' => 386],
            ['product_id' => 40, 'weight_id' => 7, 'precio' => 699],
            //mancuerna estandar
            ['product_id' => 51, 'weight_id' => 4, 'precio' => 156],
            ['product_id' => 51, 'weight_id' => 6, 'precio' => 312],
            ['product_id' => 51, 'weight_id' => 8, 'precio' => 468],
            ['product_id' => 51, 'weight_id' => 10, 'precio' => 624],
            ['product_id' => 51, 'weight_id' => 12, 'precio' => 780],
            ['product_id' => 51, 'weight_id' => 13, 'precio' => 936],
            ['product_id' => 51, 'weight_id' => 14, 'precio' => 1092],
            ['product_id' => 51, 'weight_id' => 15, 'precio' => 1248],
            ['product_id' => 51, 'weight_id' => 16, 'precio' => 1404],
            ['product_id' => 51, 'weight_id' => 17, 'precio' => 1560],
            ['product_id' => 51, 'weight_id' => 18, 'precio' => 1716],
            //sandbag
            ['product_id' => 53, 'weight_id' => 24, 'precio' => 1368],
            ['product_id' => 53, 'weight_id' => 26, 'precio' => 1368],
            ['product_id' => 53, 'weight_id' => 28, 'precio' => 1368],
            //polainas mano
            ['product_id' => 54, 'weight_id' => 1, 'precio' => 203],
            ['product_id' => 54, 'weight_id' => 2, 'precio' => 242],
            ['product_id' => 54, 'weight_id' => 3, 'precio' => 273],

            //polainas pierna
            ['product_id' => 55, 'weight_id' => 1, 'precio' => 202],
            ['product_id' => 55, 'weight_id' => 2, 'precio' => 242],
            ['product_id' => 55, 'weight_id' => 5, 'precio' => 329],
            ['product_id' => 55, 'weight_id' => 6, 'precio' => 411],
            ['product_id' => 55, 'weight_id' => 7, 'precio' => 544],

            //polainas ajustables
            ['product_id' => 56, 'weight_id' => 7, 'precio' => 672],
            ['product_id' => 56, 'weight_id' => 10, 'precio' => 985],

            //pesa rusa
            ['product_id' => 66, 'weight_id' => 19, 'precio' => 185],
            ['product_id' => 66, 'weight_id' => 21, 'precio' => 370],
            ['product_id' => 66, 'weight_id' => 23, 'precio' => 555],
            ['product_id' => 66, 'weight_id' => 24, 'precio' => 740],
            ['product_id' => 66, 'weight_id' => 25, 'precio' => 925],
            ['product_id' => 66, 'weight_id' => 26, 'precio' => 1110],
            ['product_id' => 66, 'weight_id' => 27, 'precio' => 1295],
            ['product_id' => 66, 'weight_id' => 28, 'precio' => 1480],
            ['product_id' => 66, 'weight_id' => 29, 'precio' => 1850],
            ['product_id' => 66, 'weight_id' => 30, 'precio' => 2220],

            //balon medicinal
            ['product_id' => 68, 'weight_id' => 5, 'precio' => 544],
            ['product_id' => 68, 'weight_id' => 6, 'precio' => 590],
            ['product_id' => 68, 'weight_id' => 7, 'precio' => 614],
            ['product_id' => 68, 'weight_id' => 8, 'precio' => 683],
            ['product_id' => 68, 'weight_id' => 9, 'precio' => 776],
            ['product_id' => 68, 'weight_id' => 10, 'precio' => 834],
            ['product_id' => 68, 'weight_id' => 11, 'precio' => 903],
            ['product_id' => 68, 'weight_id' => 12, 'precio' => 973],

            //mancuerna plastificada
            ['product_id' => 73, 'weight_id' => 1, 'precio' => 196],
            ['product_id' => 73, 'weight_id' => 2, 'precio' => 242],
            ['product_id' => 73, 'weight_id' => 3, 'precio' => 300],
            ['product_id' => 73, 'weight_id' => 4, 'precio' => 347],
            ['product_id' => 73, 'weight_id' => 5, 'precio' => 539],
            ['product_id' => 73, 'weight_id' => 6, 'precio' => 706],
            ['product_id' => 73, 'weight_id' => 7, 'precio' => 915],
            ['product_id' => 73, 'weight_id' => 8, 'precio' => 1020],

            //disco olimpico

            ['product_id' => 77, 'weight_id' => 2, 'precio' => 72],
            ['product_id' => 77, 'weight_id' => 4, 'precio' => 144],
            ['product_id' => 77, 'weight_id' => 31, 'precio' => 180],
            ['product_id' => 77, 'weight_id' => 7, 'precio' => 360],
            ['product_id' => 77, 'weight_id' => 12, 'precio' => 720],
            ['product_id' => 77, 'weight_id' => 17, 'precio' => 1440],

            //slam ball
            ['product_id' => 84, 'weight_id' => 20, 'precio' => 650],
            ['product_id' => 84, 'weight_id' => 21, 'precio' => 680],
            ['product_id' => 84, 'weight_id' => 22, 'precio' => 740],
            ['product_id' => 84, 'weight_id' => 23, 'precio' => 835],
            ['product_id' => 84, 'weight_id' => 24, 'precio' => 960],
            //pesa rusa plastificada
            ['product_id' => 88, 'weight_id' => 19, 'precio' => 250],
            ['product_id' => 88, 'weight_id' => 21, 'precio' => 500],
            ['product_id' => 88, 'weight_id' => 23, 'precio' => 750],
            ['product_id' => 88, 'weight_id' => 24, 'precio' => 1000],
            ['product_id' => 88, 'weight_id' => 25, 'precio' => 1250],
            ['product_id' => 88, 'weight_id' => 26, 'precio' => 1500],
            ['product_id' => 88, 'weight_id' => 27, 'precio' => 1750],
            ['product_id' => 88, 'weight_id' => 28, 'precio' => 2000],

            //pelota de gel
            ['product_id' => 111, 'weight_id' => 1, 'precio' => 57],
            ['product_id' => 111, 'weight_id' => 2, 'precio' => 68],
            ['product_id' => 111, 'weight_id' => 3, 'precio' => 80],
            ['product_id' => 111, 'weight_id' => 4, 'precio' => 92],
            ['product_id' => 111, 'weight_id' => 5, 'precio' => 115],
            ['product_id' => 111, 'weight_id' => 6, 'precio' => 157],
            
            //mancuernas fitness
            ['product_id' => 114, 'weight_id' => 1, 'precio' => 196],
            ['product_id' => 114, 'weight_id' => 2, 'precio' => 219],

        ]);

        DB::table('wholesale_product')->insert([
            //bungee
            ['product_id' => 17, 'wholesale_id' => 1, 'precio' => 3225],
            ['product_id' => 17, 'wholesale_id' => 2, 'precio' => 15196],
            ['product_id' => 17, 'wholesale_id' => 3, 'precio' => 28652],
            ['product_id' => 17, 'wholesale_id' => 4, 'precio' => 52432],
        ]);

        DB::table('material_product')->insert([
            //cuerda
            ['product_id' => 39, 'material_id' => 3, 'precio' => 31],
            ['product_id' => 39, 'material_id' => 4, 'precio' => 98],
            ['product_id' => 39, 'material_id' => 5, 'precio' => 152],
            ['product_id' => 39, 'material_id' => 6, 'precio' => 203],
            ['product_id' => 39, 'material_id' => 7, 'precio' => 315],
        ]);

        DB::table('length_product')->insert([
            //cuerda
            ['product_id' => 42, 'length_id' => 33, 'precio' => 586],
            ['product_id' => 42, 'length_id' => 35, 'precio' => 915],
            //costal
            ['product_id' => 50, 'length_id' => 20, 'precio' => 788],
            ['product_id' => 50, 'length_id' => 25, 'precio' => 1078],
            //barra olimpica
            ['product_id' => 62, 'length_id' => 28, 'precio' => 2679],
            ['product_id' => 62, 'length_id' => 29, 'precio' => 3045],
            ['product_id' => 62, 'length_id' => 30, 'precio' => 3535],

            //banco de salto
            ['product_id' => 70, 'length_id' => 15, 'precio' => 1008],
            ['product_id' => 70, 'length_id' => 16, 'precio' => 1194],
            ['product_id' => 70, 'length_id' => 17, 'precio' => 1321],
            ['product_id' => 70, 'length_id' => 18, 'precio' => 1426],
            ['product_id' => 70, 'length_id' => 21, 'precio' => 1623],


            //liga pull ups
            ['product_id' => 83, 'length_id' => 1, 'precio' => 350],
            ['product_id' => 83, 'length_id' => 2, 'precio' => 580],
            ['product_id' => 83, 'length_id' => 4, 'precio' => 780],

            // balon suizo
            ['product_id' => 110, 'length_id' => 19, 'precio' => 278],
            ['product_id' => 110, 'length_id' => 22, 'precio' => 349],
            ['product_id' => 110, 'length_id' => 23, 'precio' => 397],

            //

        ]);
        
        DB::table('weight_length')->insert([
            //cuerda
            ['product_id' => 78, 'length_id' => 21,'weight_id' => 5, 'precio' => 367],
            ['product_id' => 78, 'length_id' => 24,'weight_id' => 6, 'precio' => 463],
            ['product_id' => 78, 'length_id' => 25,'weight_id' => 7, 'precio' => 544],
            ['product_id' => 78, 'length_id' => 26,'weight_id' => 8, 'precio' => 579],
            ['product_id' => 78, 'length_id' => 27,'weight_id' => 9, 'precio' => 649],

        ]);
    }
}
