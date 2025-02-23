<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogosProductos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('codes')->insert([
            ['code' => 'BEGV001','active' => 0],
            ['code' => 'BEGV002','active' => 0],
            ['code' => 'BEGV003','active' => 0],
            ['code' => 'BEGV004','active' => 0],
            ['code' => 'BEGV005','active' => 0],
            ['code' => 'BEGV006','active' => 0],
            ['code' => 'BEGV007','active' => 0],
            ['code' => 'BEGV008','active' => 0],
            ['code' => 'BEGV009','active' => 0],
            ['code' => 'BEGV010','active' => 0],
        ]);
        // Insertar datos en la tabla categories
        DB::table('categories')->insert([
            ['nombre' => 'Ligas', 'slug' => 'Ligas'],
            ['nombre' => 'Banquería y Máquinas', 'slug' => 'Banqueria-y-Maquinas'],
            ['nombre' => 'Funcional CrossFit', 'slug' => 'Funcional-CrossFit'],
            ['nombre' => 'Agarres y Cojines', 'slug' => 'Agarres-y-Cojines'],
            ['nombre' => 'Fitness', 'slug' => 'Fitness'],
            ['nombre' => 'Refacciones ', 'slug' => 'Refacciones'],
            ['nombre' => 'Yoga', 'slug' => 'Yoga'],
            ['nombre' => 'Straps', 'slug' => 'Straps'],
        ]);

        DB::table('materials')->insert([
            ['material' => 'hule'],
            ['material' => 'latex'],
            ['material' => 'piola'],
            ['material' => 'entrenamiento'],
            ['material' => 'acero'],
            ['material' => 'cuero'],
            ['material' => 'cuero con peso y balero'],
            ['material' => 'lona'],
            ['material' => 'nylon'],
        ]);

        DB::table('endurances')->insert([
            ['endurance' => 'media'],
            ['endurance' => 'alta'],
            ['endurance' => 'ultra'],
        ]);

        DB::table('sizes')->insert([
            ['size' => '5/16'], //1
            ['size' => '3/8'],  //2
            ['size' => '#7'],   //3
            ['size' => '#8'],   
            ['size' => '#9'],
            ['size' => '#10'],
            ['size' => '20x12 cm'], //7
            ['size' => '18x10 cm'], //8
            ['size' => '50x12 cm'], //9
            ['size' => '1 in'], //10
            ['size' => '1 1/4 in'],//11
            ['size' => '1 1/2 in'],//12
            ['size' => '2.5 in'],//13
            ['size' => '3 in'],//14
            ['size' => '3.5 in'],//15
            ['size' => '4.5 in'],//16
            ['size' => '2x2 in'],//17
            ['size' => '3x2 in'],//18
            ['size' => '2.5x2.5 in'],//19
            ['size' => '3x1.5 in'],//20
            ['size' => '4x2 in'],//21
            ['size' => '2-1.5 in'],//22
            ['size' => '2.5-2 in'],//23


 
        ]);

        DB::table('weights')->insert([
            ['weight' => '0.5', 'is_kg' => 1],      //1
            ['weight' => '1', 'is_kg' => 1],        //2     
            ['weight' => '1.5', 'is_kg' => 1],      //3
            ['weight' => '2', 'is_kg' => 1],        //4
            ['weight' => '3', 'is_kg' => 1],        //5
            ['weight' => '4', 'is_kg' => 1],        //6
            ['weight' => '5', 'is_kg' => 1],        //7
            ['weight' => '6', 'is_kg' => 1],        //8
            ['weight' => '7', 'is_kg' => 1],        //9
            ['weight' => '8', 'is_kg' => 1],        //10
            ['weight' => '9', 'is_kg' => 1],        //11
            ['weight' => '10', 'is_kg' => 1],       //12
            ['weight' => '12', 'is_kg' => 1],       //13
            ['weight' => '14', 'is_kg' => 1],       //14
            ['weight' => '16', 'is_kg' => 1],       //15
            ['weight' => '18', 'is_kg' => 1],       //16
            ['weight' => '20', 'is_kg' => 1],       //17
            ['weight' => '22', 'is_kg' => 1],       //18
            ['weight' => '5', 'is_kg' => 0],        //19
            ['weight' => '8', 'is_kg' => 0],        //20
            ['weight' => '10', 'is_kg' => 0],       //21
            ['weight' => '12', 'is_kg' => 0],       //22
            ['weight' => '15', 'is_kg' => 0],       //23
            ['weight' => '20', 'is_kg' => 0],       //24
            ['weight' => '25', 'is_kg' => 0],       //25
            ['weight' => '30', 'is_kg' => 0],       //26
            ['weight' => '35', 'is_kg' => 0],       //27
            ['weight' => '40', 'is_kg' => 0],       //28
            ['weight' => '50', 'is_kg' => 0],       //29
            ['weight' => '60', 'is_kg' => 0],       //30
            ['weight' => '2.5', 'is_kg' => 1],      //31
        ]);

        DB::table('lengths')->insert([
            ['length' => '21 mm'],      //1     
            ['length' => '32 mm'],      //2
            ['length' => '42 mm'],      //3
            ['length' => '46 mm'],      //4
            ['length' => '0.375 in'],   //5
            ['length' => '0.3125 in'],  //6
            ['length' => '1.25 in'],    //7
            ['length' => '1.5 in'],     //8
            ['length' => '3.5 in'],     //9
            ['length' => '4.5 in'],     //10
            ['length' => '7 cm'],       //11
            ['length' => '8 cm'],       //12
            ['length' => '9 cm'],       //13
            ['length' => '10 cm'],      //14
            ['length' => '20 cm'],      //15
            ['length' => '30 cm'],      //16
            ['length' => '40 cm'],      //17
            ['length' => '50 cm'],      //18
            ['length' => '55 cm'],      //19
            ['length' => '57 cm'],      //20
            ['length' => '60 cm'],      //21
            ['length' => '65 cm'],      //22
            ['length' => '75 cm'],      //23
            ['length' => '80 cm'],      //24
            ['length' => '100 cm'],     //25
            ['length' => '120 cm'],     //26
            ['length' => '140 cm'],     //27
            ['length' => '150 cm'],     //28
            ['length' => '180 cm'],     //29
            ['length' => '220 cm'],     //30
            ['length' => '1 m'],        //31
            ['length' => '2 m'],        //32
            ['length' => '3 m'],        //33
            ['length' => '4 m'],        //34
            ['length' => '5 m'],        //35
            ['length' => '6 m'],        //36
            ['length' => '7 m'],        //37
            ['length' => '8 m'],        //38
            ['length' => '9 m'],        //39
            ['length' => '10 m'],       //40
            ['length' => '11 m'],       //41
            ['length' => '12 m'],       //42
            ['length' => '13 m'],       //43
            ['length' => '14 m'],       //44
            ['length' => '15 m'],       //45
            ['length' => '16 m'],       //46
            ['length' => '17 m'],       //47
            ['length' => '18 m'],       //48
            ['length' => '19 m'],       //49
            ['length' => '20 m'],       //50
            ['length' => '21 m'],       //51
            ['length' => '22 m'],       //52
            ['length' => '23 m'],       //53
            ['length' => '24 m'],       //54
            ['length' => '25 m'],       //55
            ['length' => '26 m'],       //56
            ['length' => '27 m'],       //57
            ['length' => '28 m'],       //58
            ['length' => '29 m'],       //59
            ['length' => '30 m'],       //60
            ['length' => '31 m'],       //61
            ['length' => '32 m'],       //62
            ['length' => '33 m'],       //63
            ['length' => '34 m'],       //64
            ['length' => '35 m'],       //65
            ['length' => '36 m'],       //66
            ['length' => '37 m'],       //67
            ['length' => '38 m'],       //68
            ['length' => '39 m'],       //69
            ['length' => '40 m'],       //70
            ['length' => '41 m'],       //71
            ['length' => '42 m'],       //72
            ['length' => '43 m'],       //73
            ['length' => '44 m'],       //74
            ['length' => '45 m'],       //75
            ['length' => '46 m'],       //76
            ['length' => '47 m'],       //77
            ['length' => '48 m'],       //78
            ['length' => '49 m'],       //79
            ['length' => '50 m'],       //80
            ['length' => '51 m'],       //81
            ['length' => '52 m'],       //82
            ['length' => '53 m'],       //83
            ['length' => '54 m'],       //84
            ['length' => '55 m'],       //85
            ['length' => '56 m'],       //86
            ['length' => '57 m'],       //87
            ['length' => '58 m'],       //88
            ['length' => '59 m'],       //89
            ['length' => '60 m'],       //90
            ['length' => '61 m'],       //91
            ['length' => '62 m'],       //92
            ['length' => '63 m'],       //93
            ['length' => '64 m'],       //94
            ['length' => '65 m'],       //95
            ['length' => '66 m'],       //96
            ['length' => '67 m'],       //97
            ['length' => '68 m'],       //98
            ['length' => '69 m'],       //99
            ['length' => '70 m'],       //100
            ['length' => '71 m'],       //101
            ['length' => '72 m'],       //102
            ['length' => '73 m'],       //103
            ['length' => '74 m'],       //104
            ['length' => '75 m'],       //105
            ['length' => '76 m'],       //106
            ['length' => '77 m'],       //107
            ['length' => '78 m'],       //108
            ['length' => '79 m'],       //109
            ['length' => '80 m'],       //110
            ['length' => '81 m'],       //111
            ['length' => '82 m'],       //112
            ['length' => '83 m'],       //113
            ['length' => '84 m'],       //114
            ['length' => '85 m'],       //115
            ['length' => '86 m'],       //116
            ['length' => '87 m'],       //117
            ['length' => '88 m'],       //118
            ['length' => '89 m'],       //119
            ['length' => '90 m'],       //120
            ['length' => '91 m'],       //121
            ['length' => '92 m'],       //122
            ['length' => '93 m'],       //123
            ['length' => '94 m'],       //124
            ['length' => '95 m'],       //125
            ['length' => '96 m'],       //126
            ['length' => '97 m'],       //127
            ['length' => '98 m'],       //128
            ['length' => '99 m'],       //129
            ['length' => '100 m'],      //130
            ['length' => '101 m'],      //
            ['length' => '102 m'],      //
            ['length' => '103 m'],      //
            ['length' => '104 m'],      //
            ['length' => '105 m'],      //
            ['length' => '106 m'],      //
            ['length' => '107 m'],      //
            ['length' => '108 m'],      //
            ['length' => '109 m'],      //
            ['length' => '110 m'],      //
            ['length' => '111 m'],      //
            ['length' => '112 m'],      //
            ['length' => '113 m'],      //
            ['length' => '114 m'],      //
            ['length' => '115 m'],      //
            ['length' => '116 m'],      //
            ['length' => '117 m'],      //
            ['length' => '118 m'],      //
            ['length' => '119 m'],      //
            ['length' => '120 m'],      //
            ['length' => '121 m'],      //
            ['length' => '122 m'],      //
            ['length' => '123 m'],      //
            ['length' => '124 m'],      //
            ['length' => '125 m'],      //
            ['length' => '126 m'],      //
            ['length' => '127 m'],      //
            ['length' => '128 m'],      //
            ['length' => '129 m'],      //
            ['length' => '130 m'],      //
            ['length' => '131 m'],      //
            ['length' => '132 m'],      //
            ['length' => '133 m'],      //
            ['length' => '134 m'],      //
            ['length' => '135 m'],      //
            ['length' => '136 m'],      //
            ['length' => '137 m'],      //
            ['length' => '138 m'],      //
            ['length' => '139 m'],      //
            ['length' => '140 m'],      //
            ['length' => '141 m'],      //
            ['length' => '142 m'],      //
            ['length' => '143 m'],      //
            ['length' => '144 m'],      //
            ['length' => '145 m'],      //
            ['length' => '146 m'],      //
            ['length' => '147 m'],      //
            ['length' => '148 m'],      //
            ['length' => '149 m']       //
              
        ]);


        DB::table('wholesales')->insert([
            ['wholesale' => '1'],
            ['wholesale' => '5'],
            ['wholesale' => '10'],
            ['wholesale' => '20'],
        ]);
    }
}
