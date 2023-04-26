<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GeolocalizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('geolocalizacion')->delete();

        \DB::table('geolocalizacion')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'nombre' => 'Argentina',
                    'parent_id' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'nombre' => 'Ciudad Autonoma',
                    'parent_id' => 1,
                ),
            2 =>
                array (
                    'id' => 3,
                    'nombre' => 'Buenos Aires',
                    'parent_id' => 1,
                ),
            3 =>
                array (
                    'id' => 4,
                    'nombre' => 'Catamarca',
                    'parent_id' => 1,
                ),
            4 =>
                array (
                    'id' => 5,
                    'nombre' => 'Chaco',
                    'parent_id' => 1,
                ),
            5 =>
                array (
                    'id' => 6,
                    'nombre' => 'Chubut',
                    'parent_id' => 1,
                ),
            6 =>
                array (
                    'id' => 7,
                    'nombre' => 'Cordoba',
                    'parent_id' => 1,
                ),
            7 =>
                array (
                    'id' => 8,
                    'nombre' => 'Corrientes',
                    'parent_id' => 1,
                ),
            8 =>
                array (
                    'id' => 9,
                    'nombre' => 'Entre Rios',
                    'parent_id' => 1,
                ),
            9 =>
                array (
                    'id' => 10,
                    'nombre' => 'Formosa',
                    'parent_id' => 1,
                ),
            10 =>
                array (
                    'id' => 11,
                    'nombre' => 'Jujuy',
                    'parent_id' => 1,
                ),
            11 =>
                array (
                    'id' => 12,
                    'nombre' => 'La Pampa',
                    'parent_id' => 1,
                ),
            12 =>
                array (
                    'id' => 13,
                    'nombre' => 'La Rioja',
                    'parent_id' => 1,
                ),
            13 =>
                array (
                    'id' => 14,
                    'nombre' => 'Mendoza',
                    'parent_id' => 1,
                ),
            14 =>
                array (
                    'id' => 15,
                    'nombre' => 'Misiones',
                    'parent_id' => 1,
                ),
            15 =>
                array (
                    'id' => 16,
                    'nombre' => 'Neuquen',
                    'parent_id' => 1,
                ),
            16 =>
                array (
                    'id' => 17,
                    'nombre' => 'Rio Negro',
                    'parent_id' => 1,
                ),
            17 =>
                array (
                    'id' => 18,
                    'nombre' => 'Salta',
                    'parent_id' => 1,
                ),
            18 =>
                array (
                    'id' => 19,
                    'nombre' => 'San Juan',
                    'parent_id' => 1,
                ),
            19 =>
                array (
                    'id' => 20,
                    'nombre' => 'San Luis',
                    'parent_id' => 1,
                ),
            20 =>
                array (
                    'id' => 21,
                    'nombre' => 'Santa Cruz',
                    'parent_id' => 1,
                ),
            21 =>
                array (
                    'id' => 22,
                    'nombre' => 'Santa Fe',
                    'parent_id' => 1,
                ),
            22 =>
                array (
                    'id' => 23,
                    'nombre' => 'Santiago del Estero',
                    'parent_id' => 1,
                ),
            23 =>
                array (
                    'id' => 24,
                    'nombre' => 'Tierra del Fuego',
                    'parent_id' => 1,
                ),
            24 =>
                array (
                    'id' => 25,
                    'nombre' => 'Tucuman',
                    'parent_id' => 1,
                ),
            25 =>
                array (
                    'id' => 27,
                    'nombre' => 'Adolfo Alsina',
                    'parent_id' => 3,
                ),
            26 =>
                array (
                    'id' => 28,
                    'nombre' => 'Alberti',
                    'parent_id' => 3,
                ),
            27 =>
                array (
                    'id' => 29,
                    'nombre' => 'Almirante Brown',
                    'parent_id' => 3,
                ),
            28 =>
                array (
                    'id' => 30,
                    'nombre' => 'Arrecifes',
                    'parent_id' => 3,
                ),
            29 =>
                array (
                    'id' => 31,
                    'nombre' => 'Avellaneda',
                    'parent_id' => 3,
                ),
            30 =>
                array (
                    'id' => 32,
                    'nombre' => 'Ayacucho',
                    'parent_id' => 3,
                ),
            31 =>
                array (
                    'id' => 33,
                    'nombre' => 'Azul',
                    'parent_id' => 3,
                ),
            32 =>
                array (
                    'id' => 34,
                    'nombre' => 'Bahia Blanca',
                    'parent_id' => 3,
                ),
            33 =>
                array (
                    'id' => 35,
                    'nombre' => 'Balcarce',
                    'parent_id' => 3,
                ),
            34 =>
                array (
                    'id' => 36,
                    'nombre' => 'Baradero',
                    'parent_id' => 3,
                ),
            35 =>
                array (
                    'id' => 37,
                    'nombre' => 'Benito Juarez',
                    'parent_id' => 3,
                ),
            36 =>
                array (
                    'id' => 38,
                    'nombre' => 'Berazategui',
                    'parent_id' => 3,
                ),
            37 =>
                array (
                    'id' => 39,
                    'nombre' => 'Berisso',
                    'parent_id' => 3,
                ),
            38 =>
                array (
                    'id' => 40,
                    'nombre' => 'Bolivar',
                    'parent_id' => 3,
                ),
            39 =>
                array (
                    'id' => 41,
                    'nombre' => 'Bragado',
                    'parent_id' => 3,
                ),
            40 =>
                array (
                    'id' => 42,
                    'nombre' => 'Campana',
                    'parent_id' => 3,
                ),
            41 =>
                array (
                    'id' => 43,
                    'nombre' => 'Cañuelas',
                    'parent_id' => 3,
                ),
            42 =>
                array (
                    'id' => 44,
                    'nombre' => 'Capitan Sarmiento',
                    'parent_id' => 3,
                ),
            43 =>
                array (
                    'id' => 45,
                    'nombre' => 'Carlos Casares',
                    'parent_id' => 3,
                ),
            44 =>
                array (
                    'id' => 46,
                    'nombre' => 'Carlos Tejedor',
                    'parent_id' => 3,
                ),
            45 =>
                array (
                    'id' => 47,
                    'nombre' => 'Carmen De Areco',
                    'parent_id' => 3,
                ),
            46 =>
                array (
                    'id' => 48,
                    'nombre' => 'Castelli',
                    'parent_id' => 3,
                ),
            47 =>
                array (
                    'id' => 49,
                    'nombre' => 'Chacabuco',
                    'parent_id' => 3,
                ),
            48 =>
                array (
                    'id' => 50,
                    'nombre' => 'Chascomus',
                    'parent_id' => 3,
                ),
            49 =>
                array (
                    'id' => 51,
                    'nombre' => 'Chivilcoy',
                    'parent_id' => 3,
                ),
            50 =>
                array (
                    'id' => 52,
                    'nombre' => 'Colon',
                    'parent_id' => 3,
                ),
            51 =>
                array (
                    'id' => 53,
                    'nombre' => 'Coronel Brandsen',
                    'parent_id' => 3,
                ),
            52 =>
                array (
                    'id' => 54,
                    'nombre' => 'Coronel Dorrego',
                    'parent_id' => 3,
                ),
            53 =>
                array (
                    'id' => 55,
                    'nombre' => 'Coronel Pringles',
                    'parent_id' => 3,
                ),
            54 =>
                array (
                    'id' => 56,
                    'nombre' => 'Coronel Rosales',
                    'parent_id' => 3,
                ),
            55 =>
                array (
                    'id' => 57,
                    'nombre' => 'Coronel Suarez',
                    'parent_id' => 3,
                ),
            56 =>
                array (
                    'id' => 58,
                    'nombre' => 'Daireaux',
                    'parent_id' => 3,
                ),
            57 =>
                array (
                    'id' => 59,
                    'nombre' => 'Dolores',
                    'parent_id' => 3,
                ),
            58 =>
                array (
                    'id' => 60,
                    'nombre' => 'Ensenada',
                    'parent_id' => 3,
                ),
            59 =>
                array (
                    'id' => 61,
                    'nombre' => 'Escobar',
                    'parent_id' => 3,
                ),
            60 =>
                array (
                    'id' => 62,
                    'nombre' => 'Esteban Echeverria',
                    'parent_id' => 3,
                ),
            61 =>
                array (
                    'id' => 63,
                    'nombre' => 'Exaltacion De La Cruz',
                    'parent_id' => 3,
                ),
            62 =>
                array (
                    'id' => 64,
                    'nombre' => 'Ezeiza',
                    'parent_id' => 3,
                ),
            63 =>
                array (
                    'id' => 65,
                    'nombre' => 'Florencio Varela',
                    'parent_id' => 3,
                ),
            64 =>
                array (
                    'id' => 66,
                    'nombre' => 'Florentino Ameghino',
                    'parent_id' => 3,
                ),
            65 =>
                array (
                    'id' => 67,
                    'nombre' => 'General Alvarado',
                    'parent_id' => 3,
                ),
            66 =>
                array (
                    'id' => 68,
                    'nombre' => 'General Alvear',
                    'parent_id' => 3,
                ),
            67 =>
                array (
                    'id' => 69,
                    'nombre' => 'General Arenales',
                    'parent_id' => 3,
                ),
            68 =>
                array (
                    'id' => 70,
                    'nombre' => 'General Belgrano',
                    'parent_id' => 3,
                ),
            69 =>
                array (
                    'id' => 71,
                    'nombre' => 'General Guido',
                    'parent_id' => 3,
                ),
            70 =>
                array (
                    'id' => 72,
                    'nombre' => 'General Lamadrid',
                    'parent_id' => 3,
                ),
            71 =>
                array (
                    'id' => 73,
                    'nombre' => 'General Las Heras',
                    'parent_id' => 3,
                ),
            72 =>
                array (
                    'id' => 74,
                    'nombre' => 'General Lavalle',
                    'parent_id' => 3,
                ),
            73 =>
                array (
                    'id' => 75,
                    'nombre' => 'General Madariaga',
                    'parent_id' => 3,
                ),
            74 =>
                array (
                    'id' => 76,
                    'nombre' => 'General Paz',
                    'parent_id' => 3,
                ),
            75 =>
                array (
                    'id' => 77,
                    'nombre' => 'General Pinto',
                    'parent_id' => 3,
                ),
            76 =>
                array (
                    'id' => 78,
                    'nombre' => 'General Pueyrredon',
                    'parent_id' => 3,
                ),
            77 =>
                array (
                    'id' => 79,
                    'nombre' => 'General Rodriguez',
                    'parent_id' => 3,
                ),
            78 =>
                array (
                    'id' => 80,
                    'nombre' => 'General San Martin',
                    'parent_id' => 3,
                ),
            79 =>
                array (
                    'id' => 81,
                    'nombre' => 'General Viamonte',
                    'parent_id' => 3,
                ),
            80 =>
                array (
                    'id' => 82,
                    'nombre' => 'General Villegas',
                    'parent_id' => 3,
                ),
            81 =>
                array (
                    'id' => 83,
                    'nombre' => 'Gonzalez Chaves',
                    'parent_id' => 3,
                ),
            82 =>
                array (
                    'id' => 84,
                    'nombre' => 'Guamini',
                    'parent_id' => 3,
                ),
            83 =>
                array (
                    'id' => 85,
                    'nombre' => 'Hipolito Yrigoyen',
                    'parent_id' => 3,
                ),
            84 =>
                array (
                    'id' => 86,
                    'nombre' => 'Hurlingham',
                    'parent_id' => 3,
                ),
            85 =>
                array (
                    'id' => 87,
                    'nombre' => 'Ituzaingo',
                    'parent_id' => 3,
                ),
            86 =>
                array (
                    'id' => 88,
                    'nombre' => 'Jose Clemente Paz',
                    'parent_id' => 3,
                ),
            87 =>
                array (
                    'id' => 89,
                    'nombre' => 'Junin',
                    'parent_id' => 3,
                ),
            88 =>
                array (
                    'id' => 90,
                    'nombre' => 'La Matanza',
                    'parent_id' => 3,
                ),
            89 =>
                array (
                    'id' => 91,
                    'nombre' => 'La Plata',
                    'parent_id' => 3,
                ),
            90 =>
                array (
                    'id' => 92,
                    'nombre' => 'Lanus',
                    'parent_id' => 3,
                ),
            91 =>
                array (
                    'id' => 93,
                    'nombre' => 'Laprida',
                    'parent_id' => 3,
                ),
            92 =>
                array (
                    'id' => 94,
                    'nombre' => 'Las Flores',
                    'parent_id' => 3,
                ),
            93 =>
                array (
                    'id' => 95,
                    'nombre' => 'Leandro Nicéforo Alem',
                    'parent_id' => 3,
                ),
            94 =>
                array (
                    'id' => 96,
                    'nombre' => 'Lincoln',
                    'parent_id' => 3,
                ),
            95 =>
                array (
                    'id' => 97,
                    'nombre' => 'Loberia',
                    'parent_id' => 3,
                ),
            96 =>
                array (
                    'id' => 98,
                    'nombre' => 'Lobos',
                    'parent_id' => 3,
                ),
            97 =>
                array (
                    'id' => 99,
                    'nombre' => 'Lomas De Zamora',
                    'parent_id' => 3,
                ),
            98 =>
                array (
                    'id' => 100,
                    'nombre' => 'Lujan',
                    'parent_id' => 3,
                ),
            99 =>
                array (
                    'id' => 101,
                    'nombre' => 'Magdalena',
                    'parent_id' => 3,
                ),
            100 =>
                array (
                    'id' => 102,
                    'nombre' => 'Maipu',
                    'parent_id' => 3,
                ),
            101 =>
                array (
                    'id' => 103,
                    'nombre' => 'Malvinas Argentinas',
                    'parent_id' => 3,
                ),
            102 =>
                array (
                    'id' => 104,
                    'nombre' => 'Mar Chiquita',
                    'parent_id' => 3,
                ),
            103 =>
                array (
                    'id' => 105,
                    'nombre' => 'Marcos Paz',
                    'parent_id' => 3,
                ),
            104 =>
                array (
                    'id' => 106,
                    'nombre' => 'Mercedes',
                    'parent_id' => 3,
                ),
            105 =>
                array (
                    'id' => 107,
                    'nombre' => 'Merlo',
                    'parent_id' => 3,
                ),
            106 =>
                array (
                    'id' => 108,
                    'nombre' => 'Monte',
                    'parent_id' => 3,
                ),
            107 =>
                array (
                    'id' => 109,
                    'nombre' => 'Moreno',
                    'parent_id' => 3,
                ),
            108 =>
                array (
                    'id' => 110,
                    'nombre' => 'Moron',
                    'parent_id' => 3,
                ),
            109 =>
                array (
                    'id' => 111,
                    'nombre' => 'Municipio De La Costa',
                    'parent_id' => 3,
                ),
            110 =>
                array (
                    'id' => 112,
                    'nombre' => 'Municipio De Monte Hermoso',
                    'parent_id' => 3,
                ),
            111 =>
                array (
                    'id' => 113,
                    'nombre' => 'Municipio De Pinamar',
                    'parent_id' => 3,
                ),
            112 =>
                array (
                    'id' => 114,
                    'nombre' => 'Municipio De Villa Gesell',
                    'parent_id' => 3,
                ),
            113 =>
                array (
                    'id' => 115,
                    'nombre' => 'Navarro',
                    'parent_id' => 3,
                ),
            114 =>
                array (
                    'id' => 116,
                    'nombre' => 'Necochea',
                    'parent_id' => 3,
                ),
            115 =>
                array (
                    'id' => 117,
                    'nombre' => 'Nueve De Julio',
                    'parent_id' => 3,
                ),
            116 =>
                array (
                    'id' => 118,
                    'nombre' => 'Olavarria',
                    'parent_id' => 3,
                ),
            117 =>
                array (
                    'id' => 119,
                    'nombre' => 'Patagones',
                    'parent_id' => 3,
                ),
            118 =>
                array (
                    'id' => 120,
                    'nombre' => 'Pehuajo',
                    'parent_id' => 3,
                ),
            119 =>
                array (
                    'id' => 121,
                    'nombre' => 'Pellegrini',
                    'parent_id' => 3,
                ),
            120 =>
                array (
                    'id' => 122,
                    'nombre' => 'Pergamino',
                    'parent_id' => 3,
                ),
            121 =>
                array (
                    'id' => 123,
                    'nombre' => 'Pila',
                    'parent_id' => 3,
                ),
            122 =>
                array (
                    'id' => 124,
                    'nombre' => 'Pilar',
                    'parent_id' => 3,
                ),
            123 =>
                array (
                    'id' => 125,
                    'nombre' => 'Presidente Peron',
                    'parent_id' => 3,
                ),
            124 =>
                array (
                    'id' => 126,
                    'nombre' => 'Puan',
                    'parent_id' => 3,
                ),
            125 =>
                array (
                    'id' => 127,
                    'nombre' => 'Punta Indio',
                    'parent_id' => 3,
                ),
            126 =>
                array (
                    'id' => 128,
                    'nombre' => 'Quilmes',
                    'parent_id' => 3,
                ),
            127 =>
                array (
                    'id' => 129,
                    'nombre' => 'Ramallo',
                    'parent_id' => 3,
                ),
            128 =>
                array (
                    'id' => 130,
                    'nombre' => 'Rauch',
                    'parent_id' => 3,
                ),
            129 =>
                array (
                    'id' => 131,
                    'nombre' => 'Rivadavia',
                    'parent_id' => 3,
                ),
            130 =>
                array (
                    'id' => 132,
                    'nombre' => 'Rojas',
                    'parent_id' => 3,
                ),
            131 =>
                array (
                    'id' => 133,
                    'nombre' => 'Roque Perez',
                    'parent_id' => 3,
                ),
            132 =>
                array (
                    'id' => 134,
                    'nombre' => 'Saavedra',
                    'parent_id' => 3,
                ),
            133 =>
                array (
                    'id' => 135,
                    'nombre' => 'Saladillo',
                    'parent_id' => 3,
                ),
            134 =>
                array (
                    'id' => 136,
                    'nombre' => 'Salliquelo',
                    'parent_id' => 3,
                ),
            135 =>
                array (
                    'id' => 137,
                    'nombre' => 'Salto',
                    'parent_id' => 3,
                ),
            136 =>
                array (
                    'id' => 138,
                    'nombre' => 'San Andres De Giles',
                    'parent_id' => 3,
                ),
            137 =>
                array (
                    'id' => 139,
                    'nombre' => 'San Antonio De Areco',
                    'parent_id' => 3,
                ),
            138 =>
                array (
                    'id' => 140,
                    'nombre' => 'San Cayetano',
                    'parent_id' => 3,
                ),
            139 =>
                array (
                    'id' => 141,
                    'nombre' => 'San Fernando',
                    'parent_id' => 3,
                ),
            140 =>
                array (
                    'id' => 142,
                    'nombre' => 'San Isidro',
                    'parent_id' => 3,
                ),
            141 =>
                array (
                    'id' => 143,
                    'nombre' => 'San Miguel',
                    'parent_id' => 3,
                ),
            142 =>
                array (
                    'id' => 144,
                    'nombre' => 'San Nicolas',
                    'parent_id' => 3,
                ),
            143 =>
                array (
                    'id' => 145,
                    'nombre' => 'San Pedro',
                    'parent_id' => 3,
                ),
            144 =>
                array (
                    'id' => 146,
                    'nombre' => 'San Vicente',
                    'parent_id' => 3,
                ),
            145 =>
                array (
                    'id' => 147,
                    'nombre' => 'Suipacha',
                    'parent_id' => 3,
                ),
            146 =>
                array (
                    'id' => 148,
                    'nombre' => 'Tandil',
                    'parent_id' => 3,
                ),
            147 =>
                array (
                    'id' => 149,
                    'nombre' => 'Tapalque',
                    'parent_id' => 3,
                ),
            148 =>
                array (
                    'id' => 150,
                    'nombre' => 'Tigre',
                    'parent_id' => 3,
                ),
            149 =>
                array (
                    'id' => 151,
                    'nombre' => 'Tordillo',
                    'parent_id' => 3,
                ),
            150 =>
                array (
                    'id' => 152,
                    'nombre' => 'Tornquist',
                    'parent_id' => 3,
                ),
            151 =>
                array (
                    'id' => 153,
                    'nombre' => 'Trenque Lauquen',
                    'parent_id' => 3,
                ),
            152 =>
                array (
                    'id' => 154,
                    'nombre' => 'Tres Arroyos',
                    'parent_id' => 3,
                ),
            153 =>
                array (
                    'id' => 155,
                    'nombre' => 'Tres De Febrero',
                    'parent_id' => 3,
                ),
            154 =>
                array (
                    'id' => 156,
                    'nombre' => 'Tres Lomas',
                    'parent_id' => 3,
                ),
            155 =>
                array (
                    'id' => 157,
                    'nombre' => 'Veinticinco De Mayo',
                    'parent_id' => 3,
                ),
            156 =>
                array (
                    'id' => 158,
                    'nombre' => 'Vicente Lopez',
                    'parent_id' => 3,
                ),
            157 =>
                array (
                    'id' => 159,
                    'nombre' => 'Villarino',
                    'parent_id' => 3,
                ),
            158 =>
                array (
                    'id' => 160,
                    'nombre' => 'Zarate',
                    'parent_id' => 3,
                ),
            159 =>
                array (
                    'id' => 161,
                    'nombre' => 'Aconquija',
                    'parent_id' => 4,
                ),
            160 =>
                array (
                    'id' => 162,
                    'nombre' => 'Ancasti',
                    'parent_id' => 4,
                ),
            161 =>
                array (
                    'id' => 163,
                    'nombre' => 'Andalgalá',
                    'parent_id' => 4,
                ),
            162 =>
                array (
                    'id' => 164,
                    'nombre' => 'Antofagasta',
                    'parent_id' => 4,
                ),
            163 =>
                array (
                    'id' => 165,
                    'nombre' => 'Belén',
                    'parent_id' => 4,
                ),
            164 =>
                array (
                    'id' => 166,
                    'nombre' => 'Capayan',
                    'parent_id' => 4,
                ),
            165 =>
                array (
                    'id' => 167,
                    'nombre' => 'Corral Quemado',
                    'parent_id' => 4,
                ),
            166 =>
                array (
                    'id' => 168,
                    'nombre' => 'El Alto',
                    'parent_id' => 4,
                ),
            167 =>
                array (
                    'id' => 169,
                    'nombre' => 'El Rodeo',
                    'parent_id' => 4,
                ),
            168 =>
                array (
                    'id' => 170,
                    'nombre' => 'Fiambalá',
                    'parent_id' => 4,
                ),
            169 =>
                array (
                    'id' => 171,
                    'nombre' => 'Fray Mamerto Esquiu',
                    'parent_id' => 4,
                ),
            170 =>
                array (
                    'id' => 172,
                    'nombre' => 'Hualfin',
                    'parent_id' => 4,
                ),
            171 =>
                array (
                    'id' => 173,
                    'nombre' => 'Huillapima (Capayan)',
                    'parent_id' => 4,
                ),
            172 =>
                array (
                    'id' => 174,
                    'nombre' => 'Icaño (La Paz)',
                    'parent_id' => 4,
                ),
            173 =>
                array (
                    'id' => 175,
                    'nombre' => 'La Puerta',
                    'parent_id' => 4,
                ),
            174 =>
                array (
                    'id' => 176,
                    'nombre' => 'Las Juntas',
                    'parent_id' => 4,
                ),
            175 =>
                array (
                    'id' => 177,
                    'nombre' => 'Londres',
                    'parent_id' => 4,
                ),
            176 =>
                array (
                    'id' => 178,
                    'nombre' => 'Los Altos',
                    'parent_id' => 4,
                ),
            177 =>
                array (
                    'id' => 179,
                    'nombre' => 'Los Varela',
                    'parent_id' => 4,
                ),
            178 =>
                array (
                    'id' => 180,
                    'nombre' => 'Mutquín',
                    'parent_id' => 4,
                ),
            179 =>
                array (
                    'id' => 181,
                    'nombre' => 'Paclin',
                    'parent_id' => 4,
                ),
            180 =>
                array (
                    'id' => 182,
                    'nombre' => 'Pomán',
                    'parent_id' => 4,
                ),
            181 =>
                array (
                    'id' => 183,
                    'nombre' => 'Pozo De La Piedra',
                    'parent_id' => 4,
                ),
            182 =>
                array (
                    'id' => 184,
                    'nombre' => 'Puerta De Corral Quemado',
                    'parent_id' => 4,
                ),
            183 =>
                array (
                    'id' => 185,
                    'nombre' => 'Puerta De San José',
                    'parent_id' => 4,
                ),
            184 =>
                array (
                    'id' => 186,
                    'nombre' => 'Recreo',
                    'parent_id' => 4,
                ),
            185 =>
                array (
                    'id' => 187,
                    'nombre' => 'San Fernando',
                    'parent_id' => 4,
                ),
            186 =>
                array (
                    'id' => 188,
                    'nombre' => 'San Fernando Del Valle De Catamarca',
                    'parent_id' => 4,
                ),
            187 =>
                array (
                    'id' => 189,
                    'nombre' => 'San José',
                    'parent_id' => 4,
                ),
            188 =>
                array (
                    'id' => 190,
                    'nombre' => 'Santa María',
                    'parent_id' => 4,
                ),
            189 =>
                array (
                    'id' => 191,
                    'nombre' => 'Santa Rosa',
                    'parent_id' => 4,
                ),
            190 =>
                array (
                    'id' => 192,
                    'nombre' => 'Saujil',
                    'parent_id' => 4,
                ),
            191 =>
                array (
                    'id' => 193,
                    'nombre' => 'Tapso',
                    'parent_id' => 4,
                ),
            192 =>
                array (
                    'id' => 194,
                    'nombre' => 'Tinogasta',
                    'parent_id' => 4,
                ),
            193 =>
                array (
                    'id' => 195,
                    'nombre' => 'Valle Viejo',
                    'parent_id' => 4,
                ),
            194 =>
                array (
                    'id' => 196,
                    'nombre' => 'Villa Vil',
                    'parent_id' => 4,
                ),
            195 =>
                array (
                    'id' => 197,
                    'nombre' => 'Avia Terai',
                    'parent_id' => 5,
                ),
            196 =>
                array (
                    'id' => 198,
                    'nombre' => 'Barranqueras',
                    'parent_id' => 5,
                ),
            197 =>
                array (
                    'id' => 199,
                    'nombre' => 'Basail',
                    'parent_id' => 5,
                ),
            198 =>
                array (
                    'id' => 200,
                    'nombre' => 'Campo Largo',
                    'parent_id' => 5,
                ),
            199 =>
                array (
                    'id' => 201,
                    'nombre' => 'Capitan Solari',
                    'parent_id' => 5,
                ),
            200 =>
                array (
                    'id' => 202,
                    'nombre' => 'Charadai',
                    'parent_id' => 5,
                ),
            201 =>
                array (
                    'id' => 203,
                    'nombre' => 'Charata',
                    'parent_id' => 5,
                ),
            202 =>
                array (
                    'id' => 204,
                    'nombre' => 'Chorotis',
                    'parent_id' => 5,
                ),
            203 =>
                array (
                    'id' => 205,
                    'nombre' => 'Ciervo Petiso',
                    'parent_id' => 5,
                ),
            204 =>
                array (
                    'id' => 206,
                    'nombre' => 'Colonia Benitez',
                    'parent_id' => 5,
                ),
            205 =>
                array (
                    'id' => 207,
                    'nombre' => 'Colonia Elisa',
                    'parent_id' => 5,
                ),
            206 =>
                array (
                    'id' => 208,
                    'nombre' => 'Colonia Popular',
                    'parent_id' => 5,
                ),
            207 =>
                array (
                    'id' => 209,
                    'nombre' => 'Colonias Unidas',
                    'parent_id' => 5,
                ),
            208 =>
                array (
                    'id' => 210,
                    'nombre' => 'Concepción Del Bermejo',
                    'parent_id' => 5,
                ),
            209 =>
                array (
                    'id' => 211,
                    'nombre' => 'Coronel Du Graty',
                    'parent_id' => 5,
                ),
            210 =>
                array (
                    'id' => 212,
                    'nombre' => 'Corzuela',
                    'parent_id' => 5,
                ),
            211 =>
                array (
                    'id' => 213,
                    'nombre' => 'Cote Lai',
                    'parent_id' => 5,
                ),
            212 =>
                array (
                    'id' => 214,
                    'nombre' => 'El Sauzalito',
                    'parent_id' => 5,
                ),
            213 =>
                array (
                    'id' => 215,
                    'nombre' => 'Enrique Urien',
                    'parent_id' => 5,
                ),
            214 =>
                array (
                    'id' => 216,
                    'nombre' => 'Fontana',
                    'parent_id' => 5,
                ),
            215 =>
                array (
                    'id' => 217,
                    'nombre' => 'Fuerte Esperanza',
                    'parent_id' => 5,
                ),
            216 =>
                array (
                    'id' => 218,
                    'nombre' => 'Gancedo',
                    'parent_id' => 5,
                ),
            217 =>
                array (
                    'id' => 219,
                    'nombre' => 'General Capdevila',
                    'parent_id' => 5,
                ),
            218 =>
                array (
                    'id' => 220,
                    'nombre' => 'General Pinedo',
                    'parent_id' => 5,
                ),
            219 =>
                array (
                    'id' => 221,
                    'nombre' => 'General San Martin',
                    'parent_id' => 5,
                ),
            220 =>
                array (
                    'id' => 222,
                    'nombre' => 'General Vedia',
                    'parent_id' => 5,
                ),
            221 =>
                array (
                    'id' => 223,
                    'nombre' => 'Hermoso Campo',
                    'parent_id' => 5,
                ),
            222 =>
                array (
                    'id' => 224,
                    'nombre' => 'Isla Del Cerrito',
                    'parent_id' => 5,
                ),
            223 =>
                array (
                    'id' => 225,
                    'nombre' => 'Juan Jose Castelli',
                    'parent_id' => 5,
                ),
            224 =>
                array (
                    'id' => 226,
                    'nombre' => 'La Clotilde',
                    'parent_id' => 5,
                ),
            225 =>
                array (
                    'id' => 227,
                    'nombre' => 'La Eduviges',
                    'parent_id' => 5,
                ),
            226 =>
                array (
                    'id' => 228,
                    'nombre' => 'La Escondida',
                    'parent_id' => 5,
                ),
            227 =>
                array (
                    'id' => 229,
                    'nombre' => 'La Leonesa',
                    'parent_id' => 5,
                ),
            228 =>
                array (
                    'id' => 230,
                    'nombre' => 'La Tigra',
                    'parent_id' => 5,
                ),
            229 =>
                array (
                    'id' => 231,
                    'nombre' => 'La Verde',
                    'parent_id' => 5,
                ),
            230 =>
                array (
                    'id' => 232,
                    'nombre' => 'Laguna Blanca',
                    'parent_id' => 5,
                ),
            231 =>
                array (
                    'id' => 233,
                    'nombre' => 'Laguna Limpia',
                    'parent_id' => 5,
                ),
            232 =>
                array (
                    'id' => 234,
                    'nombre' => 'Lapachito',
                    'parent_id' => 5,
                ),
            233 =>
                array (
                    'id' => 235,
                    'nombre' => 'Las Breñas',
                    'parent_id' => 5,
                ),
            234 =>
                array (
                    'id' => 236,
                    'nombre' => 'Las Garcitas',
                    'parent_id' => 5,
                ),
            235 =>
                array (
                    'id' => 237,
                    'nombre' => 'Las Palmas',
                    'parent_id' => 5,
                ),
            236 =>
                array (
                    'id' => 238,
                    'nombre' => 'Los Frentones',
                    'parent_id' => 5,
                ),
            237 =>
                array (
                    'id' => 239,
                    'nombre' => 'Machagai',
                    'parent_id' => 5,
                ),
            238 =>
                array (
                    'id' => 240,
                    'nombre' => 'Makalle',
                    'parent_id' => 5,
                ),
            239 =>
                array (
                    'id' => 241,
                    'nombre' => 'Margarita Belen',
                    'parent_id' => 5,
                ),
            240 =>
                array (
                    'id' => 242,
                    'nombre' => 'Miraflores',
                    'parent_id' => 5,
                ),
            241 =>
                array (
                    'id' => 243,
                    'nombre' => 'Mision Nueva Pompeya',
                    'parent_id' => 5,
                ),
            242 =>
                array (
                    'id' => 244,
                    'nombre' => 'Napenay',
                    'parent_id' => 5,
                ),
            243 =>
                array (
                    'id' => 245,
                    'nombre' => 'Pampa Almiron',
                    'parent_id' => 5,
                ),
            244 =>
                array (
                    'id' => 246,
                    'nombre' => 'Pampa Del Indio',
                    'parent_id' => 5,
                ),
            245 =>
                array (
                    'id' => 247,
                    'nombre' => 'Pampa Del Infierno',
                    'parent_id' => 5,
                ),
            246 =>
                array (
                    'id' => 248,
                    'nombre' => 'Presidencia Roca',
                    'parent_id' => 5,
                ),
            247 =>
                array (
                    'id' => 249,
                    'nombre' => 'Presidente De La Plaza',
                    'parent_id' => 5,
                ),
            248 =>
                array (
                    'id' => 250,
                    'nombre' => 'Puerto Bermejo',
                    'parent_id' => 5,
                ),
            249 =>
                array (
                    'id' => 251,
                    'nombre' => 'Puerto Eva Peron',
                    'parent_id' => 5,
                ),
            250 =>
                array (
                    'id' => 252,
                    'nombre' => 'Puerto Tirol',
                    'parent_id' => 5,
                ),
            251 =>
                array (
                    'id' => 253,
                    'nombre' => 'Puerto Vilelas',
                    'parent_id' => 5,
                ),
            252 =>
                array (
                    'id' => 254,
                    'nombre' => 'Quitilipi',
                    'parent_id' => 5,
                ),
            253 =>
                array (
                    'id' => 255,
                    'nombre' => 'Resistencia',
                    'parent_id' => 5,
                ),
            254 =>
                array (
                    'id' => 256,
                    'nombre' => 'Roque Saenz Peña',
                    'parent_id' => 5,
                ),
            255 =>
                array (
                    'id' => 257,
                    'nombre' => 'Samuhu',
                    'parent_id' => 5,
                ),
            256 =>
                array (
                    'id' => 258,
                    'nombre' => 'San Bernardo',
                    'parent_id' => 5,
                ),
            257 =>
                array (
                    'id' => 259,
                    'nombre' => 'Santa Sylvina',
                    'parent_id' => 5,
                ),
            258 =>
                array (
                    'id' => 260,
                    'nombre' => 'Taco Pozo',
                    'parent_id' => 5,
                ),
            259 =>
                array (
                    'id' => 261,
                    'nombre' => 'Tres Isletas',
                    'parent_id' => 5,
                ),
            260 =>
                array (
                    'id' => 262,
                    'nombre' => 'Villa Angela',
                    'parent_id' => 5,
                ),
            261 =>
                array (
                    'id' => 263,
                    'nombre' => 'Villa Berthet',
                    'parent_id' => 5,
                ),
            262 =>
                array (
                    'id' => 264,
                    'nombre' => 'Villa Rio Bermejito',
                    'parent_id' => 5,
                ),
            263 =>
                array (
                    'id' => 265,
                    'nombre' => '28 De Julio',
                    'parent_id' => 6,
                ),
            264 =>
                array (
                    'id' => 266,
                    'nombre' => 'Aldea Apeleg',
                    'parent_id' => 6,
                ),
            265 =>
                array (
                    'id' => 267,
                    'nombre' => 'Aldea Beleiro',
                    'parent_id' => 6,
                ),
            266 =>
                array (
                    'id' => 268,
                    'nombre' => 'Aldea Epulef',
                    'parent_id' => 6,
                ),
            267 =>
                array (
                    'id' => 269,
                    'nombre' => 'Alto Rio Senguer',
                    'parent_id' => 6,
                ),
            268 =>
                array (
                    'id' => 270,
                    'nombre' => 'Buen Pasto',
                    'parent_id' => 6,
                ),
            269 =>
                array (
                    'id' => 271,
                    'nombre' => 'Camarones',
                    'parent_id' => 6,
                ),
            270 =>
                array (
                    'id' => 272,
                    'nombre' => 'Carrenleufú',
                    'parent_id' => 6,
                ),
            271 =>
                array (
                    'id' => 273,
                    'nombre' => 'Cerro Centinela',
                    'parent_id' => 6,
                ),
            272 =>
                array (
                    'id' => 274,
                    'nombre' => 'Cholila',
                    'parent_id' => 6,
                ),
            273 =>
                array (
                    'id' => 275,
                    'nombre' => 'Colán Conhué',
                    'parent_id' => 6,
                ),
            274 =>
                array (
                    'id' => 276,
                    'nombre' => 'Comodoro Rivadavia',
                    'parent_id' => 6,
                ),
            275 =>
                array (
                    'id' => 277,
                    'nombre' => 'Corcovado',
                    'parent_id' => 6,
                ),
            276 =>
                array (
                    'id' => 278,
                    'nombre' => 'Cushamen Centro',
                    'parent_id' => 6,
                ),
            277 =>
                array (
                    'id' => 279,
                    'nombre' => 'Dique Florentino Ameghino',
                    'parent_id' => 6,
                ),
            278 =>
                array (
                    'id' => 280,
                    'nombre' => 'Doctor Ricardo Rojas',
                    'parent_id' => 6,
                ),
            279 =>
                array (
                    'id' => 281,
                    'nombre' => 'Dolavon',
                    'parent_id' => 6,
                ),
            280 =>
                array (
                    'id' => 282,
                    'nombre' => 'El Hoyo',
                    'parent_id' => 6,
                ),
            281 =>
                array (
                    'id' => 283,
                    'nombre' => 'El Maiten',
                    'parent_id' => 6,
                ),
            282 =>
                array (
                    'id' => 284,
                    'nombre' => 'Epuyen',
                    'parent_id' => 6,
                ),
            283 =>
                array (
                    'id' => 285,
                    'nombre' => 'Esquel',
                    'parent_id' => 6,
                ),
            284 =>
                array (
                    'id' => 286,
                    'nombre' => 'Facundo',
                    'parent_id' => 6,
                ),
            285 =>
                array (
                    'id' => 287,
                    'nombre' => 'Gaiman',
                    'parent_id' => 6,
                ),
            286 =>
                array (
                    'id' => 288,
                    'nombre' => 'Gan Gan',
                    'parent_id' => 6,
                ),
            287 =>
                array (
                    'id' => 289,
                    'nombre' => 'Gastre',
                    'parent_id' => 6,
                ),
            288 =>
                array (
                    'id' => 290,
                    'nombre' => 'Gobernador Costa',
                    'parent_id' => 6,
                ),
            289 =>
                array (
                    'id' => 291,
                    'nombre' => 'Gualjaina',
                    'parent_id' => 6,
                ),
            290 =>
                array (
                    'id' => 292,
                    'nombre' => 'Jose De San Martin',
                    'parent_id' => 6,
                ),
            291 =>
                array (
                    'id' => 293,
                    'nombre' => 'Lago Blanco',
                    'parent_id' => 6,
                ),
            292 =>
                array (
                    'id' => 294,
                    'nombre' => 'Lago Puelo',
                    'parent_id' => 6,
                ),
            293 =>
                array (
                    'id' => 295,
                    'nombre' => 'Lagunita Salada',
                    'parent_id' => 6,
                ),
            294 =>
                array (
                    'id' => 296,
                    'nombre' => 'Las Plumas',
                    'parent_id' => 6,
                ),
            295 =>
                array (
                    'id' => 297,
                    'nombre' => 'Los Altares',
                    'parent_id' => 6,
                ),
            296 =>
                array (
                    'id' => 298,
                    'nombre' => 'Paso De Indios',
                    'parent_id' => 6,
                ),
            297 =>
                array (
                    'id' => 299,
                    'nombre' => 'Paso Del Sapo',
                    'parent_id' => 6,
                ),
            298 =>
                array (
                    'id' => 300,
                    'nombre' => 'Puerto Madryn',
                    'parent_id' => 6,
                ),
            299 =>
                array (
                    'id' => 301,
                    'nombre' => 'Puerto Pirámide',
                    'parent_id' => 6,
                ),
            300 =>
                array (
                    'id' => 302,
                    'nombre' => 'Rada Tilly',
                    'parent_id' => 6,
                ),
            301 =>
                array (
                    'id' => 303,
                    'nombre' => 'Rawson',
                    'parent_id' => 6,
                ),
            302 =>
                array (
                    'id' => 304,
                    'nombre' => 'Rio Mayo',
                    'parent_id' => 6,
                ),
            303 =>
                array (
                    'id' => 305,
                    'nombre' => 'Rio Pico',
                    'parent_id' => 6,
                ),
            304 =>
                array (
                    'id' => 306,
                    'nombre' => 'Sarmiento',
                    'parent_id' => 6,
                ),
            305 =>
                array (
                    'id' => 307,
                    'nombre' => 'Tecka',
                    'parent_id' => 6,
                ),
            306 =>
                array (
                    'id' => 308,
                    'nombre' => 'Telsen',
                    'parent_id' => 6,
                ),
            307 =>
                array (
                    'id' => 309,
                    'nombre' => 'Trelew',
                    'parent_id' => 6,
                ),
            308 =>
                array (
                    'id' => 310,
                    'nombre' => 'Trevelin',
                    'parent_id' => 6,
                ),
            309 =>
                array (
                    'id' => 311,
                    'nombre' => 'Achiras',
                    'parent_id' => 7,
                ),
            310 =>
                array (
                    'id' => 312,
                    'nombre' => 'Adelia Maria',
                    'parent_id' => 7,
                ),
            311 =>
                array (
                    'id' => 313,
                    'nombre' => 'Agua De Oro',
                    'parent_id' => 7,
                ),
            312 =>
                array (
                    'id' => 314,
                    'nombre' => 'Alcira Gigena',
                    'parent_id' => 7,
                ),
            313 =>
                array (
                    'id' => 315,
                    'nombre' => 'Aldea Santa María',
                    'parent_id' => 7,
                ),
            314 =>
                array (
                    'id' => 316,
                    'nombre' => 'Alejandro Roca',
                    'parent_id' => 7,
                ),
            315 =>
                array (
                    'id' => 317,
                    'nombre' => 'Alejo Ledesma',
                    'parent_id' => 7,
                ),
            316 =>
                array (
                    'id' => 318,
                    'nombre' => 'Alicia',
                    'parent_id' => 7,
                ),
            317 =>
                array (
                    'id' => 319,
                    'nombre' => 'Almafuerte',
                    'parent_id' => 7,
                ),
            318 =>
                array (
                    'id' => 320,
                    'nombre' => 'Alpa Corral',
                    'parent_id' => 7,
                ),
            319 =>
                array (
                    'id' => 321,
                    'nombre' => 'Alta Gracia',
                    'parent_id' => 7,
                ),
            320 =>
                array (
                    'id' => 322,
                    'nombre' => 'Alto Alegre',
                    'parent_id' => 7,
                ),
            321 =>
                array (
                    'id' => 323,
                    'nombre' => 'Alto De Los Quebrachos',
                    'parent_id' => 7,
                ),
            322 =>
                array (
                    'id' => 324,
                    'nombre' => 'Altos De Chipion',
                    'parent_id' => 7,
                ),
            323 =>
                array (
                    'id' => 325,
                    'nombre' => 'Amboy',
                    'parent_id' => 7,
                ),
            324 =>
                array (
                    'id' => 326,
                    'nombre' => 'Ambul',
                    'parent_id' => 7,
                ),
            325 =>
                array (
                    'id' => 327,
                    'nombre' => 'Ana Zumarán',
                    'parent_id' => 7,
                ),
            326 =>
                array (
                    'id' => 328,
                    'nombre' => 'Anisacate',
                    'parent_id' => 7,
                ),
            327 =>
                array (
                    'id' => 329,
                    'nombre' => 'Arias',
                    'parent_id' => 7,
                ),
            328 =>
                array (
                    'id' => 330,
                    'nombre' => 'Arroyito',
                    'parent_id' => 7,
                ),
            329 =>
                array (
                    'id' => 331,
                    'nombre' => 'Arroyo Algodon',
                    'parent_id' => 7,
                ),
            330 =>
                array (
                    'id' => 332,
                    'nombre' => 'Arroyo Cabral',
                    'parent_id' => 7,
                ),
            331 =>
                array (
                    'id' => 333,
                    'nombre' => 'Arroyo De Los Patos',
                    'parent_id' => 7,
                ),
            332 =>
                array (
                    'id' => 334,
                    'nombre' => 'Assunta',
                    'parent_id' => 7,
                ),
            333 =>
                array (
                    'id' => 335,
                    'nombre' => 'Atahona',
                    'parent_id' => 7,
                ),
            334 =>
                array (
                    'id' => 336,
                    'nombre' => 'Ausonia',
                    'parent_id' => 7,
                ),
            335 =>
                array (
                    'id' => 337,
                    'nombre' => 'Avellaneda',
                    'parent_id' => 7,
                ),
            336 =>
                array (
                    'id' => 338,
                    'nombre' => 'Ballesteros',
                    'parent_id' => 7,
                ),
            337 =>
                array (
                    'id' => 339,
                    'nombre' => 'Ballesteros Sud',
                    'parent_id' => 7,
                ),
            338 =>
                array (
                    'id' => 340,
                    'nombre' => 'Balnearia',
                    'parent_id' => 7,
                ),
            339 =>
                array (
                    'id' => 341,
                    'nombre' => 'Bañado De Soto',
                    'parent_id' => 7,
                ),
            340 =>
                array (
                    'id' => 342,
                    'nombre' => 'Bell Ville',
                    'parent_id' => 7,
                ),
            341 =>
                array (
                    'id' => 343,
                    'nombre' => 'Bengolea',
                    'parent_id' => 7,
                ),
            342 =>
                array (
                    'id' => 344,
                    'nombre' => 'Benjamin Gould',
                    'parent_id' => 7,
                ),
            343 =>
                array (
                    'id' => 345,
                    'nombre' => 'Berrotaran',
                    'parent_id' => 7,
                ),
            344 =>
                array (
                    'id' => 346,
                    'nombre' => 'Bialet Masse',
                    'parent_id' => 7,
                ),
            345 =>
                array (
                    'id' => 347,
                    'nombre' => 'Bouwer',
                    'parent_id' => 7,
                ),
            346 =>
                array (
                    'id' => 348,
                    'nombre' => 'Brinkmann',
                    'parent_id' => 7,
                ),
            347 =>
                array (
                    'id' => 349,
                    'nombre' => 'Buchardo',
                    'parent_id' => 7,
                ),
            348 =>
                array (
                    'id' => 350,
                    'nombre' => 'Bulnes',
                    'parent_id' => 7,
                ),
            349 =>
                array (
                    'id' => 351,
                    'nombre' => 'Cabalango',
                    'parent_id' => 7,
                ),
            350 =>
                array (
                    'id' => 352,
                    'nombre' => 'Calchin',
                    'parent_id' => 7,
                ),
            351 =>
                array (
                    'id' => 353,
                    'nombre' => 'Calchin Oeste',
                    'parent_id' => 7,
                ),
            352 =>
                array (
                    'id' => 354,
                    'nombre' => 'Calmayo',
                    'parent_id' => 7,
                ),
            353 =>
                array (
                    'id' => 355,
                    'nombre' => 'Camilo Aldao',
                    'parent_id' => 7,
                ),
            354 =>
                array (
                    'id' => 356,
                    'nombre' => 'Caminiaga',
                    'parent_id' => 7,
                ),
            355 =>
                array (
                    'id' => 357,
                    'nombre' => 'Cañada De Luque',
                    'parent_id' => 7,
                ),
            356 =>
                array (
                    'id' => 358,
                    'nombre' => 'Cañada De Machado',
                    'parent_id' => 7,
                ),
            357 =>
                array (
                    'id' => 359,
                    'nombre' => 'Cañada De Rio Pinto',
                    'parent_id' => 7,
                ),
            358 =>
                array (
                    'id' => 360,
                    'nombre' => 'Canals',
                    'parent_id' => 7,
                ),
            359 =>
                array (
                    'id' => 361,
                    'nombre' => 'Candelaria Sud',
                    'parent_id' => 7,
                ),
            360 =>
                array (
                    'id' => 362,
                    'nombre' => 'Capilla De Los Remedios',
                    'parent_id' => 7,
                ),
            361 =>
                array (
                    'id' => 363,
                    'nombre' => 'Capilla De Siton',
                    'parent_id' => 7,
                ),
            362 =>
                array (
                    'id' => 364,
                    'nombre' => 'Capilla Del Carmen',
                    'parent_id' => 7,
                ),
            363 =>
                array (
                    'id' => 365,
                    'nombre' => 'Capilla Del Monte',
                    'parent_id' => 7,
                ),
            364 =>
                array (
                    'id' => 366,
                    'nombre' => 'Capitán General Bernardo O’higgins',
                    'parent_id' => 7,
                ),
            365 =>
                array (
                    'id' => 367,
                    'nombre' => 'Carnerillo',
                    'parent_id' => 7,
                ),
            366 =>
                array (
                    'id' => 368,
                    'nombre' => 'Carrilobo',
                    'parent_id' => 7,
                ),
            367 =>
                array (
                    'id' => 369,
                    'nombre' => 'Casa Grande',
                    'parent_id' => 7,
                ),
            368 =>
                array (
                    'id' => 370,
                    'nombre' => 'Cavanagh',
                    'parent_id' => 7,
                ),
            369 =>
                array (
                    'id' => 371,
                    'nombre' => 'Cerro Colorado',
                    'parent_id' => 7,
                ),
            370 =>
                array (
                    'id' => 372,
                    'nombre' => 'Chajan',
                    'parent_id' => 7,
                ),
            371 =>
                array (
                    'id' => 373,
                    'nombre' => 'Chalacea',
                    'parent_id' => 7,
                ),
            372 =>
                array (
                    'id' => 374,
                    'nombre' => 'Chañar Viejo',
                    'parent_id' => 7,
                ),
            373 =>
                array (
                    'id' => 375,
                    'nombre' => 'Chancani',
                    'parent_id' => 7,
                ),
            374 =>
                array (
                    'id' => 376,
                    'nombre' => 'Charbonier',
                    'parent_id' => 7,
                ),
            375 =>
                array (
                    'id' => 377,
                    'nombre' => 'Charras',
                    'parent_id' => 7,
                ),
            376 =>
                array (
                    'id' => 378,
                    'nombre' => 'Chazon',
                    'parent_id' => 7,
                ),
            377 =>
                array (
                    'id' => 379,
                    'nombre' => 'Chilibroste',
                    'parent_id' => 7,
                ),
            378 =>
                array (
                    'id' => 380,
                    'nombre' => 'Chucul',
                    'parent_id' => 7,
                ),
            379 =>
                array (
                    'id' => 381,
                    'nombre' => 'Chuña',
                    'parent_id' => 7,
                ),
            380 =>
                array (
                    'id' => 382,
                    'nombre' => 'Chuña Huasi',
                    'parent_id' => 7,
                ),
            381 =>
                array (
                    'id' => 383,
                    'nombre' => 'Churqui Cañada',
                    'parent_id' => 7,
                ),
            382 =>
                array (
                    'id' => 384,
                    'nombre' => 'Ciénaga Del Coro',
                    'parent_id' => 7,
                ),
            383 =>
                array (
                    'id' => 385,
                    'nombre' => 'Cintra',
                    'parent_id' => 7,
                ),
            384 =>
                array (
                    'id' => 386,
                    'nombre' => 'Colazo',
                    'parent_id' => 7,
                ),
            385 =>
                array (
                    'id' => 387,
                    'nombre' => 'Colonia Almada',
                    'parent_id' => 7,
                ),
            386 =>
                array (
                    'id' => 388,
                    'nombre' => 'Colonia Anita',
                    'parent_id' => 7,
                ),
            387 =>
                array (
                    'id' => 389,
                    'nombre' => 'Colonia Barge',
                    'parent_id' => 7,
                ),
            388 =>
                array (
                    'id' => 390,
                    'nombre' => 'Colonia Bismark',
                    'parent_id' => 7,
                ),
            389 =>
                array (
                    'id' => 391,
                    'nombre' => 'Colonia Bremen',
                    'parent_id' => 7,
                ),
            390 =>
                array (
                    'id' => 392,
                    'nombre' => 'Colonia Caroya',
                    'parent_id' => 7,
                ),
            391 =>
                array (
                    'id' => 393,
                    'nombre' => 'Colonia Italiana',
                    'parent_id' => 7,
                ),
            392 =>
                array (
                    'id' => 394,
                    'nombre' => 'Colonia Iturraspe',
                    'parent_id' => 7,
                ),
            393 =>
                array (
                    'id' => 395,
                    'nombre' => 'Colonia Las Cuatro Esquinas',
                    'parent_id' => 7,
                ),
            394 =>
                array (
                    'id' => 396,
                    'nombre' => 'Colonia Las Pichanas',
                    'parent_id' => 7,
                ),
            395 =>
                array (
                    'id' => 397,
                    'nombre' => 'Colonia Marina',
                    'parent_id' => 7,
                ),
            396 =>
                array (
                    'id' => 398,
                    'nombre' => 'Colonia Prosperidad',
                    'parent_id' => 7,
                ),
            397 =>
                array (
                    'id' => 399,
                    'nombre' => 'Colonia San Bartolomé',
                    'parent_id' => 7,
                ),
            398 =>
                array (
                    'id' => 400,
                    'nombre' => 'Colonia San Pedro',
                    'parent_id' => 7,
                ),
            399 =>
                array (
                    'id' => 401,
                    'nombre' => 'Colonia Tirolesa',
                    'parent_id' => 7,
                ),
            400 =>
                array (
                    'id' => 402,
                    'nombre' => 'Colonia Vicente Agüero',
                    'parent_id' => 7,
                ),
            401 =>
                array (
                    'id' => 403,
                    'nombre' => 'Colonia Videla',
                    'parent_id' => 7,
                ),
            402 =>
                array (
                    'id' => 404,
                    'nombre' => 'Colonia Vignaud',
                    'parent_id' => 7,
                ),
            403 =>
                array (
                    'id' => 405,
                    'nombre' => 'Colonia Waltelina',
                    'parent_id' => 7,
                ),
            404 =>
                array (
                    'id' => 406,
                    'nombre' => 'Comechingones',
                    'parent_id' => 7,
                ),
            405 =>
                array (
                    'id' => 407,
                    'nombre' => 'Conlara',
                    'parent_id' => 7,
                ),
            406 =>
                array (
                    'id' => 408,
                    'nombre' => 'Copacabana',
                    'parent_id' => 7,
                ),
            407 =>
                array (
                    'id' => 409,
                    'nombre' => 'Cordoba',
                    'parent_id' => 7,
                ),
            408 =>
                array (
                    'id' => 410,
                    'nombre' => 'Coronel Baigorria',
                    'parent_id' => 7,
                ),
            409 =>
                array (
                    'id' => 411,
                    'nombre' => 'Coronel Moldes',
                    'parent_id' => 7,
                ),
            410 =>
                array (
                    'id' => 412,
                    'nombre' => 'Corral De Bustos - Ifflinger',
                    'parent_id' => 7,
                ),
            411 =>
                array (
                    'id' => 413,
                    'nombre' => 'Corralito',
                    'parent_id' => 7,
                ),
            412 =>
                array (
                    'id' => 414,
                    'nombre' => 'Cosquin',
                    'parent_id' => 7,
                ),
            413 =>
                array (
                    'id' => 415,
                    'nombre' => 'Costasacate',
                    'parent_id' => 7,
                ),
            414 =>
                array (
                    'id' => 416,
                    'nombre' => 'Cruz Alta',
                    'parent_id' => 7,
                ),
            415 =>
                array (
                    'id' => 417,
                    'nombre' => 'Cruz De Caña',
                    'parent_id' => 7,
                ),
            416 =>
                array (
                    'id' => 418,
                    'nombre' => 'Cruz Del Eje',
                    'parent_id' => 7,
                ),
            417 =>
                array (
                    'id' => 419,
                    'nombre' => 'Cuesta Blanca',
                    'parent_id' => 7,
                ),
            418 =>
                array (
                    'id' => 420,
                    'nombre' => 'Dalmacio Velez Sarsfield',
                    'parent_id' => 7,
                ),
            419 =>
                array (
                    'id' => 421,
                    'nombre' => 'Dean Funes',
                    'parent_id' => 7,
                ),
            420 =>
                array (
                    'id' => 422,
                    'nombre' => 'Del Campillo',
                    'parent_id' => 7,
                ),
            421 =>
                array (
                    'id' => 423,
                    'nombre' => 'Despeñaderos',
                    'parent_id' => 7,
                ),
            422 =>
                array (
                    'id' => 424,
                    'nombre' => 'Devoto',
                    'parent_id' => 7,
                ),
            423 =>
                array (
                    'id' => 425,
                    'nombre' => 'Diego De Rojas',
                    'parent_id' => 7,
                ),
            424 =>
                array (
                    'id' => 426,
                    'nombre' => 'Dique Chico',
                    'parent_id' => 7,
                ),
            425 =>
                array (
                    'id' => 427,
                    'nombre' => 'El Arañado',
                    'parent_id' => 7,
                ),
            426 =>
                array (
                    'id' => 428,
                    'nombre' => 'El Brete',
                    'parent_id' => 7,
                ),
            427 =>
                array (
                    'id' => 429,
                    'nombre' => 'El Chacho',
                    'parent_id' => 7,
                ),
            428 =>
                array (
                    'id' => 430,
                    'nombre' => 'El Crispín',
                    'parent_id' => 7,
                ),
            429 =>
                array (
                    'id' => 431,
                    'nombre' => 'El Fortin',
                    'parent_id' => 7,
                ),
            430 =>
                array (
                    'id' => 432,
                    'nombre' => 'El Manzano',
                    'parent_id' => 7,
                ),
            431 =>
                array (
                    'id' => 433,
                    'nombre' => 'El Rastreador',
                    'parent_id' => 7,
                ),
            432 =>
                array (
                    'id' => 434,
                    'nombre' => 'El Rodeo',
                    'parent_id' => 7,
                ),
            433 =>
                array (
                    'id' => 435,
                    'nombre' => 'El Tio',
                    'parent_id' => 7,
                ),
            434 =>
                array (
                    'id' => 436,
                    'nombre' => 'Elena',
                    'parent_id' => 7,
                ),
            435 =>
                array (
                    'id' => 437,
                    'nombre' => 'Embalse',
                    'parent_id' => 7,
                ),
            436 =>
                array (
                    'id' => 438,
                    'nombre' => 'Esquina',
                    'parent_id' => 7,
                ),
            437 =>
                array (
                    'id' => 439,
                    'nombre' => 'Estación General Paz',
                    'parent_id' => 7,
                ),
            438 =>
                array (
                    'id' => 440,
                    'nombre' => 'Estacion Juarez Celman',
                    'parent_id' => 7,
                ),
            439 =>
                array (
                    'id' => 441,
                    'nombre' => 'Estancia Guadalupe',
                    'parent_id' => 7,
                ),
            440 =>
                array (
                    'id' => 442,
                    'nombre' => 'Estancia Vieja',
                    'parent_id' => 7,
                ),
            441 =>
                array (
                    'id' => 443,
                    'nombre' => 'Etruria',
                    'parent_id' => 7,
                ),
            442 =>
                array (
                    'id' => 444,
                    'nombre' => 'Eufrasio Loza',
                    'parent_id' => 7,
                ),
            443 =>
                array (
                    'id' => 445,
                    'nombre' => 'Falda Del Carmen',
                    'parent_id' => 7,
                ),
            444 =>
                array (
                    'id' => 446,
                    'nombre' => 'Freyre',
                    'parent_id' => 7,
                ),
            445 =>
                array (
                    'id' => 447,
                    'nombre' => 'General Baldissera',
                    'parent_id' => 7,
                ),
            446 =>
                array (
                    'id' => 448,
                    'nombre' => 'General Cabrera',
                    'parent_id' => 7,
                ),
            447 =>
                array (
                    'id' => 449,
                    'nombre' => 'General Deheza',
                    'parent_id' => 7,
                ),
            448 =>
                array (
                    'id' => 450,
                    'nombre' => 'General Fotheringham',
                    'parent_id' => 7,
                ),
            449 =>
                array (
                    'id' => 451,
                    'nombre' => 'General Levalle',
                    'parent_id' => 7,
                ),
            450 =>
                array (
                    'id' => 452,
                    'nombre' => 'General Roca',
                    'parent_id' => 7,
                ),
            451 =>
                array (
                    'id' => 453,
                    'nombre' => 'Guanaco Muerto',
                    'parent_id' => 7,
                ),
            452 =>
                array (
                    'id' => 454,
                    'nombre' => 'Guasapampa',
                    'parent_id' => 7,
                ),
            453 =>
                array (
                    'id' => 455,
                    'nombre' => 'Guatimozin',
                    'parent_id' => 7,
                ),
            454 =>
                array (
                    'id' => 456,
                    'nombre' => 'Gutemberg',
                    'parent_id' => 7,
                ),
            455 =>
                array (
                    'id' => 457,
                    'nombre' => 'Hernando',
                    'parent_id' => 7,
                ),
            456 =>
                array (
                    'id' => 458,
                    'nombre' => 'Huanchilla',
                    'parent_id' => 7,
                ),
            457 =>
                array (
                    'id' => 459,
                    'nombre' => 'Huerta Grande',
                    'parent_id' => 7,
                ),
            458 =>
                array (
                    'id' => 460,
                    'nombre' => 'Huinca Renanco',
                    'parent_id' => 7,
                ),
            459 =>
                array (
                    'id' => 461,
                    'nombre' => 'Idiazabal',
                    'parent_id' => 7,
                ),
            460 =>
                array (
                    'id' => 462,
                    'nombre' => 'Impira',
                    'parent_id' => 7,
                ),
            461 =>
                array (
                    'id' => 463,
                    'nombre' => 'Inriville',
                    'parent_id' => 7,
                ),
            462 =>
                array (
                    'id' => 464,
                    'nombre' => 'Isla Verde',
                    'parent_id' => 7,
                ),
            463 =>
                array (
                    'id' => 465,
                    'nombre' => 'Italo',
                    'parent_id' => 7,
                ),
            464 =>
                array (
                    'id' => 466,
                    'nombre' => 'James Craik',
                    'parent_id' => 7,
                ),
            465 =>
                array (
                    'id' => 467,
                    'nombre' => 'Jesus Maria',
                    'parent_id' => 7,
                ),
            466 =>
                array (
                    'id' => 468,
                    'nombre' => 'Jovita',
                    'parent_id' => 7,
                ),
            467 =>
                array (
                    'id' => 469,
                    'nombre' => 'Justiniano Posse',
                    'parent_id' => 7,
                ),
            468 =>
                array (
                    'id' => 470,
                    'nombre' => 'Kilometro 658',
                    'parent_id' => 7,
                ),
            469 =>
                array (
                    'id' => 471,
                    'nombre' => 'La Batea',
                    'parent_id' => 7,
                ),
            470 =>
                array (
                    'id' => 472,
                    'nombre' => 'La Calera',
                    'parent_id' => 7,
                ),
            471 =>
                array (
                    'id' => 473,
                    'nombre' => 'La Carlota',
                    'parent_id' => 7,
                ),
            472 =>
                array (
                    'id' => 474,
                    'nombre' => 'La Carolina (El Potosí)',
                    'parent_id' => 7,
                ),
            473 =>
                array (
                    'id' => 475,
                    'nombre' => 'La Cautiva',
                    'parent_id' => 7,
                ),
            474 =>
                array (
                    'id' => 476,
                    'nombre' => 'La Cesira',
                    'parent_id' => 7,
                ),
            475 =>
                array (
                    'id' => 477,
                    'nombre' => 'La Cruz',
                    'parent_id' => 7,
                ),
            476 =>
                array (
                    'id' => 478,
                    'nombre' => 'La Cumbre',
                    'parent_id' => 7,
                ),
            477 =>
                array (
                    'id' => 479,
                    'nombre' => 'La Cumbrecita',
                    'parent_id' => 7,
                ),
            478 =>
                array (
                    'id' => 480,
                    'nombre' => 'La Falda',
                    'parent_id' => 7,
                ),
            479 =>
                array (
                    'id' => 481,
                    'nombre' => 'La Francia',
                    'parent_id' => 7,
                ),
            480 =>
                array (
                    'id' => 482,
                    'nombre' => 'La Granja',
                    'parent_id' => 7,
                ),
            481 =>
                array (
                    'id' => 483,
                    'nombre' => 'La Higuera',
                    'parent_id' => 7,
                ),
            482 =>
                array (
                    'id' => 484,
                    'nombre' => 'La Laguna',
                    'parent_id' => 7,
                ),
            483 =>
                array (
                    'id' => 485,
                    'nombre' => 'La Paisanita',
                    'parent_id' => 7,
                ),
            484 =>
                array (
                    'id' => 486,
                    'nombre' => 'La Palestina',
                    'parent_id' => 7,
                ),
            485 =>
                array (
                    'id' => 487,
                    'nombre' => 'La Pampa',
                    'parent_id' => 7,
                ),
            486 =>
                array (
                    'id' => 488,
                    'nombre' => 'La Paquita',
                    'parent_id' => 7,
                ),
            487 =>
                array (
                    'id' => 489,
                    'nombre' => 'La Para',
                    'parent_id' => 7,
                ),
            488 =>
                array (
                    'id' => 490,
                    'nombre' => 'La Paz',
                    'parent_id' => 7,
                ),
            489 =>
                array (
                    'id' => 491,
                    'nombre' => 'La Playa',
                    'parent_id' => 7,
                ),
            490 =>
                array (
                    'id' => 492,
                    'nombre' => 'La Playosa',
                    'parent_id' => 7,
                ),
            491 =>
                array (
                    'id' => 493,
                    'nombre' => 'La Población',
                    'parent_id' => 7,
                ),
            492 =>
                array (
                    'id' => 494,
                    'nombre' => 'La Posta',
                    'parent_id' => 7,
                ),
            493 =>
                array (
                    'id' => 495,
                    'nombre' => 'La Puerta',
                    'parent_id' => 7,
                ),
            494 =>
                array (
                    'id' => 496,
                    'nombre' => 'La Quinta',
                    'parent_id' => 7,
                ),
            495 =>
                array (
                    'id' => 497,
                    'nombre' => 'La Rancherita',
                    'parent_id' => 7,
                ),
            496 =>
                array (
                    'id' => 498,
                    'nombre' => 'La Rinconada',
                    'parent_id' => 7,
                ),
            497 =>
                array (
                    'id' => 499,
                    'nombre' => 'La Serranita',
                    'parent_id' => 7,
                ),
            498 =>
                array (
                    'id' => 500,
                    'nombre' => 'La Tordilla',
                    'parent_id' => 7,
                ),
            499 =>
                array (
                    'id' => 501,
                    'nombre' => 'Laborde',
                    'parent_id' => 7,
                ),
        ));
        \DB::table('geolocalizacion')->insert(array (
            0 =>
                array (
                    'id' => 502,
                    'nombre' => 'Laboulaye',
                    'parent_id' => 7,
                ),
            1 =>
                array (
                    'id' => 503,
                    'nombre' => 'Laguna Larga',
                    'parent_id' => 7,
                ),
            2 =>
                array (
                    'id' => 504,
                    'nombre' => 'Las Acequias',
                    'parent_id' => 7,
                ),
            3 =>
                array (
                    'id' => 505,
                    'nombre' => 'Las Albahacas',
                    'parent_id' => 7,
                ),
            4 =>
                array (
                    'id' => 506,
                    'nombre' => 'Las Arrias',
                    'parent_id' => 7,
                ),
            5 =>
                array (
                    'id' => 507,
                    'nombre' => 'Las Bajadas',
                    'parent_id' => 7,
                ),
            6 =>
                array (
                    'id' => 508,
                    'nombre' => 'Las Caleras',
                    'parent_id' => 7,
                ),
            7 =>
                array (
                    'id' => 509,
                    'nombre' => 'Las Calles',
                    'parent_id' => 7,
                ),
            8 =>
                array (
                    'id' => 510,
                    'nombre' => 'Las Cañadas',
                    'parent_id' => 7,
                ),
            9 =>
                array (
                    'id' => 511,
                    'nombre' => 'Las Gramillas',
                    'parent_id' => 7,
                ),
            10 =>
                array (
                    'id' => 512,
                    'nombre' => 'Las Higueras',
                    'parent_id' => 7,
                ),
            11 =>
                array (
                    'id' => 513,
                    'nombre' => 'Las Isletillas',
                    'parent_id' => 7,
                ),
            12 =>
                array (
                    'id' => 514,
                    'nombre' => 'Las Junturas',
                    'parent_id' => 7,
                ),
            13 =>
                array (
                    'id' => 515,
                    'nombre' => 'Las Palmas',
                    'parent_id' => 7,
                ),
            14 =>
                array (
                    'id' => 516,
                    'nombre' => 'Las Peñas',
                    'parent_id' => 7,
                ),
            15 =>
                array (
                    'id' => 517,
                    'nombre' => 'Las Peñas Sud',
                    'parent_id' => 7,
                ),
            16 =>
                array (
                    'id' => 518,
                    'nombre' => 'Las Perdices',
                    'parent_id' => 7,
                ),
            17 =>
                array (
                    'id' => 519,
                    'nombre' => 'Las Playas',
                    'parent_id' => 7,
                ),
            18 =>
                array (
                    'id' => 520,
                    'nombre' => 'Las Rabonas',
                    'parent_id' => 7,
                ),
            19 =>
                array (
                    'id' => 521,
                    'nombre' => 'Las Saladas',
                    'parent_id' => 7,
                ),
            20 =>
                array (
                    'id' => 522,
                    'nombre' => 'Las Tapias',
                    'parent_id' => 7,
                ),
            21 =>
                array (
                    'id' => 523,
                    'nombre' => 'Las Varas',
                    'parent_id' => 7,
                ),
            22 =>
                array (
                    'id' => 524,
                    'nombre' => 'Las Varillas',
                    'parent_id' => 7,
                ),
            23 =>
                array (
                    'id' => 525,
                    'nombre' => 'Las Vertientes',
                    'parent_id' => 7,
                ),
            24 =>
                array (
                    'id' => 526,
                    'nombre' => 'Leguizamón',
                    'parent_id' => 7,
                ),
            25 =>
                array (
                    'id' => 527,
                    'nombre' => 'Leones',
                    'parent_id' => 7,
                ),
            26 =>
                array (
                    'id' => 528,
                    'nombre' => 'Los Cedros',
                    'parent_id' => 7,
                ),
            27 =>
                array (
                    'id' => 529,
                    'nombre' => 'Los Cerrillos',
                    'parent_id' => 7,
                ),
            28 =>
                array (
                    'id' => 530,
                    'nombre' => 'Los Chañaritos (Cruz Del Eje)',
                    'parent_id' => 7,
                ),
            29 =>
                array (
                    'id' => 531,
                    'nombre' => 'Los Chañaritos (Rio Segundo)',
                    'parent_id' => 7,
                ),
            30 =>
                array (
                    'id' => 532,
                    'nombre' => 'Los Cisnes',
                    'parent_id' => 7,
                ),
            31 =>
                array (
                    'id' => 533,
                    'nombre' => 'Los Cocos',
                    'parent_id' => 7,
                ),
            32 =>
                array (
                    'id' => 534,
                    'nombre' => 'Los Condores',
                    'parent_id' => 7,
                ),
            33 =>
                array (
                    'id' => 535,
                    'nombre' => 'Los Hornillos',
                    'parent_id' => 7,
                ),
            34 =>
                array (
                    'id' => 536,
                    'nombre' => 'Los Hoyos',
                    'parent_id' => 7,
                ),
            35 =>
                array (
                    'id' => 537,
                    'nombre' => 'Los Mistoles',
                    'parent_id' => 7,
                ),
            36 =>
                array (
                    'id' => 538,
                    'nombre' => 'Los Molinos',
                    'parent_id' => 7,
                ),
            37 =>
                array (
                    'id' => 539,
                    'nombre' => 'Los Pozos',
                    'parent_id' => 7,
                ),
            38 =>
                array (
                    'id' => 540,
                    'nombre' => 'Los Reartes',
                    'parent_id' => 7,
                ),
            39 =>
                array (
                    'id' => 541,
                    'nombre' => 'Los Surgentes',
                    'parent_id' => 7,
                ),
            40 =>
                array (
                    'id' => 542,
                    'nombre' => 'Los Talares',
                    'parent_id' => 7,
                ),
            41 =>
                array (
                    'id' => 543,
                    'nombre' => 'Los Zorros',
                    'parent_id' => 7,
                ),
            42 =>
                array (
                    'id' => 544,
                    'nombre' => 'Lozada',
                    'parent_id' => 7,
                ),
            43 =>
                array (
                    'id' => 545,
                    'nombre' => 'Luca',
                    'parent_id' => 7,
                ),
            44 =>
                array (
                    'id' => 546,
                    'nombre' => 'Lucio Victorio Mansilla',
                    'parent_id' => 7,
                ),
            45 =>
                array (
                    'id' => 547,
                    'nombre' => 'Luque',
                    'parent_id' => 7,
                ),
            46 =>
                array (
                    'id' => 548,
                    'nombre' => 'Lutti',
                    'parent_id' => 7,
                ),
            47 =>
                array (
                    'id' => 549,
                    'nombre' => 'Luyaba',
                    'parent_id' => 7,
                ),
            48 =>
                array (
                    'id' => 550,
                    'nombre' => 'Malagueño',
                    'parent_id' => 7,
                ),
            49 =>
                array (
                    'id' => 551,
                    'nombre' => 'Malena',
                    'parent_id' => 7,
                ),
            50 =>
                array (
                    'id' => 552,
                    'nombre' => 'Malvinas Argentinas',
                    'parent_id' => 7,
                ),
            51 =>
                array (
                    'id' => 553,
                    'nombre' => 'Manfredi',
                    'parent_id' => 7,
                ),
            52 =>
                array (
                    'id' => 554,
                    'nombre' => 'Maquinista Gallini',
                    'parent_id' => 7,
                ),
            53 =>
                array (
                    'id' => 555,
                    'nombre' => 'Marcos Juarez',
                    'parent_id' => 7,
                ),
            54 =>
                array (
                    'id' => 556,
                    'nombre' => 'Marull',
                    'parent_id' => 7,
                ),
            55 =>
                array (
                    'id' => 557,
                    'nombre' => 'Matorrales',
                    'parent_id' => 7,
                ),
            56 =>
                array (
                    'id' => 558,
                    'nombre' => 'Mattaldi',
                    'parent_id' => 7,
                ),
            57 =>
                array (
                    'id' => 559,
                    'nombre' => 'Mayu Sumaj',
                    'parent_id' => 7,
                ),
            58 =>
                array (
                    'id' => 560,
                    'nombre' => 'Media Naranja',
                    'parent_id' => 7,
                ),
            59 =>
                array (
                    'id' => 561,
                    'nombre' => 'Melo',
                    'parent_id' => 7,
                ),
            60 =>
                array (
                    'id' => 562,
                    'nombre' => 'Mendiolaza',
                    'parent_id' => 7,
                ),
            61 =>
                array (
                    'id' => 563,
                    'nombre' => 'Mi Granja',
                    'parent_id' => 7,
                ),
            62 =>
                array (
                    'id' => 564,
                    'nombre' => 'Mina Clavero',
                    'parent_id' => 7,
                ),
            63 =>
                array (
                    'id' => 565,
                    'nombre' => 'Miramar',
                    'parent_id' => 7,
                ),
            64 =>
                array (
                    'id' => 566,
                    'nombre' => 'Monte Buey',
                    'parent_id' => 7,
                ),
            65 =>
                array (
                    'id' => 567,
                    'nombre' => 'Monte Cristo',
                    'parent_id' => 7,
                ),
            66 =>
                array (
                    'id' => 568,
                    'nombre' => 'Monte De Los Gauchos',
                    'parent_id' => 7,
                ),
            67 =>
                array (
                    'id' => 569,
                    'nombre' => 'Monte Leña',
                    'parent_id' => 7,
                ),
            68 =>
                array (
                    'id' => 570,
                    'nombre' => 'Monte Maiz',
                    'parent_id' => 7,
                ),
            69 =>
                array (
                    'id' => 571,
                    'nombre' => 'Monte Ralo',
                    'parent_id' => 7,
                ),
            70 =>
                array (
                    'id' => 572,
                    'nombre' => 'Morrison',
                    'parent_id' => 7,
                ),
            71 =>
                array (
                    'id' => 573,
                    'nombre' => 'Morteros',
                    'parent_id' => 7,
                ),
            72 =>
                array (
                    'id' => 574,
                    'nombre' => 'Nicolás Bruzzone',
                    'parent_id' => 7,
                ),
            73 =>
                array (
                    'id' => 575,
                    'nombre' => 'Noetinger',
                    'parent_id' => 7,
                ),
            74 =>
                array (
                    'id' => 576,
                    'nombre' => 'Nono',
                    'parent_id' => 7,
                ),
            75 =>
                array (
                    'id' => 577,
                    'nombre' => 'Obispo Trejo',
                    'parent_id' => 7,
                ),
            76 =>
                array (
                    'id' => 578,
                    'nombre' => 'Olaeta',
                    'parent_id' => 7,
                ),
            77 =>
                array (
                    'id' => 579,
                    'nombre' => 'Oliva',
                    'parent_id' => 7,
                ),
            78 =>
                array (
                    'id' => 580,
                    'nombre' => 'Olivares De San Nicolás',
                    'parent_id' => 7,
                ),
            79 =>
                array (
                    'id' => 581,
                    'nombre' => 'Onagoyti',
                    'parent_id' => 7,
                ),
            80 =>
                array (
                    'id' => 582,
                    'nombre' => 'Oncativo',
                    'parent_id' => 7,
                ),
            81 =>
                array (
                    'id' => 583,
                    'nombre' => 'Ordoñez',
                    'parent_id' => 7,
                ),
            82 =>
                array (
                    'id' => 584,
                    'nombre' => 'Pacheco De Melo',
                    'parent_id' => 7,
                ),
            83 =>
                array (
                    'id' => 585,
                    'nombre' => 'Pampayasta Norte',
                    'parent_id' => 7,
                ),
            84 =>
                array (
                    'id' => 586,
                    'nombre' => 'Pampayasta Sud',
                    'parent_id' => 7,
                ),
            85 =>
                array (
                    'id' => 587,
                    'nombre' => 'Panaholma',
                    'parent_id' => 7,
                ),
            86 =>
                array (
                    'id' => 588,
                    'nombre' => 'Pascanas',
                    'parent_id' => 7,
                ),
            87 =>
                array (
                    'id' => 589,
                    'nombre' => 'Pasco',
                    'parent_id' => 7,
                ),
            88 =>
                array (
                    'id' => 590,
                    'nombre' => 'Paso Del Durazno',
                    'parent_id' => 7,
                ),
            89 =>
                array (
                    'id' => 591,
                    'nombre' => 'Paso Viejo',
                    'parent_id' => 7,
                ),
            90 =>
                array (
                    'id' => 592,
                    'nombre' => 'Pilar',
                    'parent_id' => 7,
                ),
            91 =>
                array (
                    'id' => 593,
                    'nombre' => 'Pincén',
                    'parent_id' => 7,
                ),
            92 =>
                array (
                    'id' => 594,
                    'nombre' => 'Piquillin',
                    'parent_id' => 7,
                ),
            93 =>
                array (
                    'id' => 595,
                    'nombre' => 'Plaza De Mercedes',
                    'parent_id' => 7,
                ),
            94 =>
                array (
                    'id' => 596,
                    'nombre' => 'Plaza Luxardo',
                    'parent_id' => 7,
                ),
            95 =>
                array (
                    'id' => 597,
                    'nombre' => 'Porteña',
                    'parent_id' => 7,
                ),
            96 =>
                array (
                    'id' => 598,
                    'nombre' => 'Potrero De Garay',
                    'parent_id' => 7,
                ),
            97 =>
                array (
                    'id' => 599,
                    'nombre' => 'Pozo Del Molle',
                    'parent_id' => 7,
                ),
            98 =>
                array (
                    'id' => 600,
                    'nombre' => 'Pozo Nuevo',
                    'parent_id' => 7,
                ),
            99 =>
                array (
                    'id' => 601,
                    'nombre' => 'Pueblo Italiano',
                    'parent_id' => 7,
                ),
            100 =>
                array (
                    'id' => 602,
                    'nombre' => 'Puesto De Castro',
                    'parent_id' => 7,
                ),
            101 =>
                array (
                    'id' => 603,
                    'nombre' => 'Punta Del Agua',
                    'parent_id' => 7,
                ),
            102 =>
                array (
                    'id' => 604,
                    'nombre' => 'Quebracho Herrado',
                    'parent_id' => 7,
                ),
            103 =>
                array (
                    'id' => 605,
                    'nombre' => 'Quilino',
                    'parent_id' => 7,
                ),
            104 =>
                array (
                    'id' => 606,
                    'nombre' => 'Rafael García',
                    'parent_id' => 7,
                ),
            105 =>
                array (
                    'id' => 607,
                    'nombre' => 'Ranqueles',
                    'parent_id' => 7,
                ),
            106 =>
                array (
                    'id' => 608,
                    'nombre' => 'Rayo Cortado',
                    'parent_id' => 7,
                ),
            107 =>
                array (
                    'id' => 609,
                    'nombre' => 'Reduccion',
                    'parent_id' => 7,
                ),
            108 =>
                array (
                    'id' => 610,
                    'nombre' => 'Rincón',
                    'parent_id' => 7,
                ),
            109 =>
                array (
                    'id' => 611,
                    'nombre' => 'Río Bamba',
                    'parent_id' => 7,
                ),
            110 =>
                array (
                    'id' => 612,
                    'nombre' => 'Rio Ceballos',
                    'parent_id' => 7,
                ),
            111 =>
                array (
                    'id' => 613,
                    'nombre' => 'Rio Cuarto',
                    'parent_id' => 7,
                ),
            112 =>
                array (
                    'id' => 614,
                    'nombre' => 'Rio De Los Sauces',
                    'parent_id' => 7,
                ),
            113 =>
                array (
                    'id' => 615,
                    'nombre' => 'Rio Primero',
                    'parent_id' => 7,
                ),
            114 =>
                array (
                    'id' => 616,
                    'nombre' => 'Rio Segundo',
                    'parent_id' => 7,
                ),
            115 =>
                array (
                    'id' => 617,
                    'nombre' => 'Rio Tercero',
                    'parent_id' => 7,
                ),
            116 =>
                array (
                    'id' => 618,
                    'nombre' => 'Rosales',
                    'parent_id' => 7,
                ),
            117 =>
                array (
                    'id' => 619,
                    'nombre' => 'Rosario Del Saladillo',
                    'parent_id' => 7,
                ),
            118 =>
                array (
                    'id' => 620,
                    'nombre' => 'Sacanta',
                    'parent_id' => 7,
                ),
            119 =>
                array (
                    'id' => 621,
                    'nombre' => 'Sagrada Familia',
                    'parent_id' => 7,
                ),
            120 =>
                array (
                    'id' => 622,
                    'nombre' => 'Saira',
                    'parent_id' => 7,
                ),
            121 =>
                array (
                    'id' => 623,
                    'nombre' => 'Saladillo',
                    'parent_id' => 7,
                ),
            122 =>
                array (
                    'id' => 624,
                    'nombre' => 'Saldan',
                    'parent_id' => 7,
                ),
            123 =>
                array (
                    'id' => 625,
                    'nombre' => 'Salsacate',
                    'parent_id' => 7,
                ),
            124 =>
                array (
                    'id' => 626,
                    'nombre' => 'Salsipuedes',
                    'parent_id' => 7,
                ),
            125 =>
                array (
                    'id' => 627,
                    'nombre' => 'Sampacho',
                    'parent_id' => 7,
                ),
            126 =>
                array (
                    'id' => 628,
                    'nombre' => 'San Agustin',
                    'parent_id' => 7,
                ),
            127 =>
                array (
                    'id' => 629,
                    'nombre' => 'San Antonio De Arredondo',
                    'parent_id' => 7,
                ),
            128 =>
                array (
                    'id' => 630,
                    'nombre' => 'San Antonio De Litin',
                    'parent_id' => 7,
                ),
            129 =>
                array (
                    'id' => 631,
                    'nombre' => 'San Basilio',
                    'parent_id' => 7,
                ),
            130 =>
                array (
                    'id' => 632,
                    'nombre' => 'San Carlos Minas',
                    'parent_id' => 7,
                ),
            131 =>
                array (
                    'id' => 633,
                    'nombre' => 'San Clemente',
                    'parent_id' => 7,
                ),
            132 =>
                array (
                    'id' => 634,
                    'nombre' => 'San Esteban',
                    'parent_id' => 7,
                ),
            133 =>
                array (
                    'id' => 635,
                    'nombre' => 'San Francisco',
                    'parent_id' => 7,
                ),
            134 =>
                array (
                    'id' => 636,
                    'nombre' => 'San Francisco Del Chañar',
                    'parent_id' => 7,
                ),
            135 =>
                array (
                    'id' => 637,
                    'nombre' => 'San Gerónimo',
                    'parent_id' => 7,
                ),
            136 =>
                array (
                    'id' => 638,
                    'nombre' => 'San Ignacio',
                    'parent_id' => 7,
                ),
            137 =>
                array (
                    'id' => 639,
                    'nombre' => 'San Javier Y Yacanto',
                    'parent_id' => 7,
                ),
            138 =>
                array (
                    'id' => 640,
                    'nombre' => 'San Joaquín',
                    'parent_id' => 7,
                ),
            139 =>
                array (
                    'id' => 641,
                    'nombre' => 'San Jose',
                    'parent_id' => 7,
                ),
            140 =>
                array (
                    'id' => 642,
                    'nombre' => 'San Jose De La Dormida',
                    'parent_id' => 7,
                ),
            141 =>
                array (
                    'id' => 643,
                    'nombre' => 'San Jose De Las Salinas',
                    'parent_id' => 7,
                ),
            142 =>
                array (
                    'id' => 644,
                    'nombre' => 'San Lorenzo',
                    'parent_id' => 7,
                ),
            143 =>
                array (
                    'id' => 645,
                    'nombre' => 'San Marcos Sierras',
                    'parent_id' => 7,
                ),
            144 =>
                array (
                    'id' => 646,
                    'nombre' => 'San Marcos Sud',
                    'parent_id' => 7,
                ),
            145 =>
                array (
                    'id' => 647,
                    'nombre' => 'San Pedro',
                    'parent_id' => 7,
                ),
            146 =>
                array (
                    'id' => 648,
                    'nombre' => 'San Pedro Norte',
                    'parent_id' => 7,
                ),
            147 =>
                array (
                    'id' => 649,
                    'nombre' => 'San Roque',
                    'parent_id' => 7,
                ),
            148 =>
                array (
                    'id' => 650,
                    'nombre' => 'San Vicente',
                    'parent_id' => 7,
                ),
            149 =>
                array (
                    'id' => 651,
                    'nombre' => 'Santa Catalina',
                    'parent_id' => 7,
                ),
            150 =>
                array (
                    'id' => 652,
                    'nombre' => 'Santa Elena',
                    'parent_id' => 7,
                ),
            151 =>
                array (
                    'id' => 653,
                    'nombre' => 'Santa Eufemia',
                    'parent_id' => 7,
                ),
            152 =>
                array (
                    'id' => 654,
                    'nombre' => 'Santa Maria',
                    'parent_id' => 7,
                ),
            153 =>
                array (
                    'id' => 655,
                    'nombre' => 'Santa Rosa De Calamuchita',
                    'parent_id' => 7,
                ),
            154 =>
                array (
                    'id' => 656,
                    'nombre' => 'Santa Rosa De Rio Primero',
                    'parent_id' => 7,
                ),
            155 =>
                array (
                    'id' => 657,
                    'nombre' => 'Santiago Temple',
                    'parent_id' => 7,
                ),
            156 =>
                array (
                    'id' => 658,
                    'nombre' => 'Sarmiento',
                    'parent_id' => 7,
                ),
            157 =>
                array (
                    'id' => 659,
                    'nombre' => 'Saturnino María Laspiur',
                    'parent_id' => 7,
                ),
            158 =>
                array (
                    'id' => 660,
                    'nombre' => 'Sauce Arriba',
                    'parent_id' => 7,
                ),
            159 =>
                array (
                    'id' => 661,
                    'nombre' => 'Sebastian Elcano',
                    'parent_id' => 7,
                ),
            160 =>
                array (
                    'id' => 662,
                    'nombre' => 'Seeber',
                    'parent_id' => 7,
                ),
            161 =>
                array (
                    'id' => 663,
                    'nombre' => 'Segunda Usina',
                    'parent_id' => 7,
                ),
            162 =>
                array (
                    'id' => 664,
                    'nombre' => 'Serrano',
                    'parent_id' => 7,
                ),
            163 =>
                array (
                    'id' => 665,
                    'nombre' => 'Serrezuela',
                    'parent_id' => 7,
                ),
            164 =>
                array (
                    'id' => 666,
                    'nombre' => 'Silvio Pellico',
                    'parent_id' => 7,
                ),
            165 =>
                array (
                    'id' => 667,
                    'nombre' => 'Simbolar',
                    'parent_id' => 7,
                ),
            166 =>
                array (
                    'id' => 668,
                    'nombre' => 'Sinsacate',
                    'parent_id' => 7,
                ),
            167 =>
                array (
                    'id' => 669,
                    'nombre' => 'Suco',
                    'parent_id' => 7,
                ),
            168 =>
                array (
                    'id' => 670,
                    'nombre' => 'Tala Cañada',
                    'parent_id' => 7,
                ),
            169 =>
                array (
                    'id' => 671,
                    'nombre' => 'Tala Huasi',
                    'parent_id' => 7,
                ),
            170 =>
                array (
                    'id' => 672,
                    'nombre' => 'Talaini',
                    'parent_id' => 7,
                ),
            171 =>
                array (
                    'id' => 673,
                    'nombre' => 'Tancacha',
                    'parent_id' => 7,
                ),
            172 =>
                array (
                    'id' => 674,
                    'nombre' => 'Tanti',
                    'parent_id' => 7,
                ),
            173 =>
                array (
                    'id' => 675,
                    'nombre' => 'Ticino',
                    'parent_id' => 7,
                ),
            174 =>
                array (
                    'id' => 676,
                    'nombre' => 'Tinoco',
                    'parent_id' => 7,
                ),
            175 =>
                array (
                    'id' => 677,
                    'nombre' => 'Tio Pujio',
                    'parent_id' => 7,
                ),
            176 =>
                array (
                    'id' => 678,
                    'nombre' => 'Toledo',
                    'parent_id' => 7,
                ),
            177 =>
                array (
                    'id' => 679,
                    'nombre' => 'Toro Pujío',
                    'parent_id' => 7,
                ),
            178 =>
                array (
                    'id' => 680,
                    'nombre' => 'Tosno',
                    'parent_id' => 7,
                ),
            179 =>
                array (
                    'id' => 681,
                    'nombre' => 'Tosquita',
                    'parent_id' => 7,
                ),
            180 =>
                array (
                    'id' => 682,
                    'nombre' => 'Transito',
                    'parent_id' => 7,
                ),
            181 =>
                array (
                    'id' => 683,
                    'nombre' => 'Tuclame',
                    'parent_id' => 7,
                ),
            182 =>
                array (
                    'id' => 684,
                    'nombre' => 'Ucacha',
                    'parent_id' => 7,
                ),
            183 =>
                array (
                    'id' => 685,
                    'nombre' => 'Unquillo',
                    'parent_id' => 7,
                ),
            184 =>
                array (
                    'id' => 686,
                    'nombre' => 'Valle De Anisacate',
                    'parent_id' => 7,
                ),
            185 =>
                array (
                    'id' => 687,
                    'nombre' => 'Valle Hermoso',
                    'parent_id' => 7,
                ),
            186 =>
                array (
                    'id' => 688,
                    'nombre' => 'Viamonte',
                    'parent_id' => 7,
                ),
            187 =>
                array (
                    'id' => 689,
                    'nombre' => 'Vicuña Mackenna',
                    'parent_id' => 7,
                ),
            188 =>
                array (
                    'id' => 690,
                    'nombre' => 'Villa Allende',
                    'parent_id' => 7,
                ),
            189 =>
                array (
                    'id' => 691,
                    'nombre' => 'Villa Amancay',
                    'parent_id' => 7,
                ),
            190 =>
                array (
                    'id' => 692,
                    'nombre' => 'Villa Ascasubi',
                    'parent_id' => 7,
                ),
            191 =>
                array (
                    'id' => 693,
                    'nombre' => 'Villa Cañada Del Sauce',
                    'parent_id' => 7,
                ),
            192 =>
                array (
                    'id' => 694,
                    'nombre' => 'Villa Candelaria Norte',
                    'parent_id' => 7,
                ),
            193 =>
                array (
                    'id' => 695,
                    'nombre' => 'Villa Carlos Paz',
                    'parent_id' => 7,
                ),
            194 =>
                array (
                    'id' => 696,
                    'nombre' => 'Villa Cerro Azul',
                    'parent_id' => 7,
                ),
            195 =>
                array (
                    'id' => 697,
                    'nombre' => 'Villa Ciudad De America',
                    'parent_id' => 7,
                ),
            196 =>
                array (
                    'id' => 698,
                    'nombre' => 'Villa Ciudad Parque Los Reartes',
                    'parent_id' => 7,
                ),
            197 =>
                array (
                    'id' => 699,
                    'nombre' => 'Villa Concepcion Del Tio',
                    'parent_id' => 7,
                ),
            198 =>
                array (
                    'id' => 700,
                    'nombre' => 'Villa Cura Brochero',
                    'parent_id' => 7,
                ),
            199 =>
                array (
                    'id' => 701,
                    'nombre' => 'Villa De Las Rosas',
                    'parent_id' => 7,
                ),
            200 =>
                array (
                    'id' => 702,
                    'nombre' => 'Villa De María',
                    'parent_id' => 7,
                ),
            201 =>
                array (
                    'id' => 703,
                    'nombre' => 'Villa De Pocho',
                    'parent_id' => 7,
                ),
            202 =>
                array (
                    'id' => 704,
                    'nombre' => 'Villa De Soto',
                    'parent_id' => 7,
                ),
            203 =>
                array (
                    'id' => 705,
                    'nombre' => 'Villa Del Dique',
                    'parent_id' => 7,
                ),
            204 =>
                array (
                    'id' => 706,
                    'nombre' => 'Villa Del Prado',
                    'parent_id' => 7,
                ),
            205 =>
                array (
                    'id' => 707,
                    'nombre' => 'Villa Del Rosario',
                    'parent_id' => 7,
                ),
            206 =>
                array (
                    'id' => 708,
                    'nombre' => 'Villa Del Totoral',
                    'parent_id' => 7,
                ),
            207 =>
                array (
                    'id' => 709,
                    'nombre' => 'Villa Dolores',
                    'parent_id' => 7,
                ),
            208 =>
                array (
                    'id' => 710,
                    'nombre' => 'Villa El Chacay',
                    'parent_id' => 7,
                ),
            209 =>
                array (
                    'id' => 711,
                    'nombre' => 'Villa Elisa',
                    'parent_id' => 7,
                ),
            210 =>
                array (
                    'id' => 712,
                    'nombre' => 'Villa Flor Serrana',
                    'parent_id' => 7,
                ),
            211 =>
                array (
                    'id' => 713,
                    'nombre' => 'Villa Fontana',
                    'parent_id' => 7,
                ),
            212 =>
                array (
                    'id' => 714,
                    'nombre' => 'Villa General Belgrano',
                    'parent_id' => 7,
                ),
            213 =>
                array (
                    'id' => 715,
                    'nombre' => 'Villa Giardino',
                    'parent_id' => 7,
                ),
            214 =>
                array (
                    'id' => 716,
                    'nombre' => 'Villa Gutiérrez',
                    'parent_id' => 7,
                ),
            215 =>
                array (
                    'id' => 717,
                    'nombre' => 'Villa Huidobro',
                    'parent_id' => 7,
                ),
            216 =>
                array (
                    'id' => 718,
                    'nombre' => 'Villa Icho Cruz',
                    'parent_id' => 7,
                ),
            217 =>
                array (
                    'id' => 719,
                    'nombre' => 'Villa La Bolsa',
                    'parent_id' => 7,
                ),
            218 =>
                array (
                    'id' => 720,
                    'nombre' => 'Villa Los Aromos',
                    'parent_id' => 7,
                ),
            219 =>
                array (
                    'id' => 721,
                    'nombre' => 'Villa Los Patos',
                    'parent_id' => 7,
                ),
            220 =>
                array (
                    'id' => 722,
                    'nombre' => 'Villa Maria',
                    'parent_id' => 7,
                ),
            221 =>
                array (
                    'id' => 723,
                    'nombre' => 'Villa Nueva',
                    'parent_id' => 7,
                ),
            222 =>
                array (
                    'id' => 724,
                    'nombre' => 'Villa Parque Santa Ana',
                    'parent_id' => 7,
                ),
            223 =>
                array (
                    'id' => 725,
                    'nombre' => 'Villa Parque Siquiman',
                    'parent_id' => 7,
                ),
            224 =>
                array (
                    'id' => 726,
                    'nombre' => 'Villa Quillinzo',
                    'parent_id' => 7,
                ),
            225 =>
                array (
                    'id' => 727,
                    'nombre' => 'Villa Rossi',
                    'parent_id' => 7,
                ),
            226 =>
                array (
                    'id' => 728,
                    'nombre' => 'Villa Rumipal',
                    'parent_id' => 7,
                ),
            227 =>
                array (
                    'id' => 729,
                    'nombre' => 'Villa San Esteban',
                    'parent_id' => 7,
                ),
            228 =>
                array (
                    'id' => 730,
                    'nombre' => 'Villa San Isidro',
                    'parent_id' => 7,
                ),
            229 =>
                array (
                    'id' => 731,
                    'nombre' => 'Villa Santa Cruz Del Lago',
                    'parent_id' => 7,
                ),
            230 =>
                array (
                    'id' => 732,
                    'nombre' => 'Villa Sarmiento (General Roca)',
                    'parent_id' => 7,
                ),
            231 =>
                array (
                    'id' => 733,
                    'nombre' => 'Villa Sarmiento (San Alberto)',
                    'parent_id' => 7,
                ),
            232 =>
                array (
                    'id' => 734,
                    'nombre' => 'Villa Tulumba',
                    'parent_id' => 7,
                ),
            233 =>
                array (
                    'id' => 735,
                    'nombre' => 'Villa Valeria',
                    'parent_id' => 7,
                ),
            234 =>
                array (
                    'id' => 736,
                    'nombre' => 'Villa Yacanto',
                    'parent_id' => 7,
                ),
            235 =>
                array (
                    'id' => 737,
                    'nombre' => 'Washington',
                    'parent_id' => 7,
                ),
            236 =>
                array (
                    'id' => 738,
                    'nombre' => 'Wenceslao Escalante',
                    'parent_id' => 7,
                ),
            237 =>
                array (
                    'id' => 739,
                    'nombre' => 'Alvear',
                    'parent_id' => 8,
                ),
            238 =>
                array (
                    'id' => 740,
                    'nombre' => 'Bella Vista',
                    'parent_id' => 8,
                ),
            239 =>
                array (
                    'id' => 741,
                    'nombre' => 'Beron De Astrada',
                    'parent_id' => 8,
                ),
            240 =>
                array (
                    'id' => 742,
                    'nombre' => 'Bonpland',
                    'parent_id' => 8,
                ),
            241 =>
                array (
                    'id' => 743,
                    'nombre' => 'Caa Cati',
                    'parent_id' => 8,
                ),
            242 =>
                array (
                    'id' => 744,
                    'nombre' => 'Chavarria',
                    'parent_id' => 8,
                ),
            243 =>
                array (
                    'id' => 745,
                    'nombre' => 'Colonia Carlos Pellegrini',
                    'parent_id' => 8,
                ),
            244 =>
                array (
                    'id' => 746,
                    'nombre' => 'Colonia Libertad',
                    'parent_id' => 8,
                ),
            245 =>
                array (
                    'id' => 747,
                    'nombre' => 'Colonia Liebig',
                    'parent_id' => 8,
                ),
            246 =>
                array (
                    'id' => 748,
                    'nombre' => 'Colonia Santa Rosa',
                    'parent_id' => 8,
                ),
            247 =>
                array (
                    'id' => 749,
                    'nombre' => 'Concepcion',
                    'parent_id' => 8,
                ),
            248 =>
                array (
                    'id' => 750,
                    'nombre' => 'Corrientes',
                    'parent_id' => 8,
                ),
            249 =>
                array (
                    'id' => 751,
                    'nombre' => 'Cruz De Los Milagros',
                    'parent_id' => 8,
                ),
            250 =>
                array (
                    'id' => 752,
                    'nombre' => 'Curuzu Cuatia',
                    'parent_id' => 8,
                ),
            251 =>
                array (
                    'id' => 753,
                    'nombre' => 'Empedrado',
                    'parent_id' => 8,
                ),
            252 =>
                array (
                    'id' => 754,
                    'nombre' => 'Esquina',
                    'parent_id' => 8,
                ),
            253 =>
                array (
                    'id' => 755,
                    'nombre' => 'Estacion Torrent',
                    'parent_id' => 8,
                ),
            254 =>
                array (
                    'id' => 756,
                    'nombre' => 'Felipe Yofre',
                    'parent_id' => 8,
                ),
            255 =>
                array (
                    'id' => 757,
                    'nombre' => 'Garruchos',
                    'parent_id' => 8,
                ),
            256 =>
                array (
                    'id' => 758,
                    'nombre' => 'Gobernador Martinez',
                    'parent_id' => 8,
                ),
            257 =>
                array (
                    'id' => 759,
                    'nombre' => 'Gobernador Virasoro',
                    'parent_id' => 8,
                ),
            258 =>
                array (
                    'id' => 760,
                    'nombre' => 'Goya',
                    'parent_id' => 8,
                ),
            259 =>
                array (
                    'id' => 761,
                    'nombre' => 'Guaviravi',
                    'parent_id' => 8,
                ),
            260 =>
                array (
                    'id' => 762,
                    'nombre' => 'Herlitzka',
                    'parent_id' => 8,
                ),
            261 =>
                array (
                    'id' => 763,
                    'nombre' => 'Ita Ibate',
                    'parent_id' => 8,
                ),
            262 =>
                array (
                    'id' => 764,
                    'nombre' => 'Itati',
                    'parent_id' => 8,
                ),
            263 =>
                array (
                    'id' => 765,
                    'nombre' => 'Ituzaingo',
                    'parent_id' => 8,
                ),
            264 =>
                array (
                    'id' => 766,
                    'nombre' => 'Jose Rafael Gomez',
                    'parent_id' => 8,
                ),
            265 =>
                array (
                    'id' => 767,
                    'nombre' => 'Juan Pujol',
                    'parent_id' => 8,
                ),
            266 =>
                array (
                    'id' => 768,
                    'nombre' => 'La Cruz',
                    'parent_id' => 8,
                ),
            267 =>
                array (
                    'id' => 769,
                    'nombre' => 'Lavalle',
                    'parent_id' => 8,
                ),
            268 =>
                array (
                    'id' => 770,
                    'nombre' => 'Lomas De Vallejos',
                    'parent_id' => 8,
                ),
            269 =>
                array (
                    'id' => 771,
                    'nombre' => 'Loreto',
                    'parent_id' => 8,
                ),
            270 =>
                array (
                    'id' => 772,
                    'nombre' => 'Mariano I. Loza',
                    'parent_id' => 8,
                ),
            271 =>
                array (
                    'id' => 773,
                    'nombre' => 'Mburucuya',
                    'parent_id' => 8,
                ),
            272 =>
                array (
                    'id' => 774,
                    'nombre' => 'Mercedes',
                    'parent_id' => 8,
                ),
            273 =>
                array (
                    'id' => 775,
                    'nombre' => 'Mocoreta',
                    'parent_id' => 8,
                ),
            274 =>
                array (
                    'id' => 776,
                    'nombre' => 'Monte Caseros',
                    'parent_id' => 8,
                ),
            275 =>
                array (
                    'id' => 777,
                    'nombre' => 'Nueve De Julio',
                    'parent_id' => 8,
                ),
            276 =>
                array (
                    'id' => 778,
                    'nombre' => 'Palmar Grande',
                    'parent_id' => 8,
                ),
            277 =>
                array (
                    'id' => 779,
                    'nombre' => 'Parada Pucheta',
                    'parent_id' => 8,
                ),
            278 =>
                array (
                    'id' => 780,
                    'nombre' => 'Paso De La Patria',
                    'parent_id' => 8,
                ),
            279 =>
                array (
                    'id' => 781,
                    'nombre' => 'Paso De Los Libres',
                    'parent_id' => 8,
                ),
            280 =>
                array (
                    'id' => 782,
                    'nombre' => 'Pedro Fernandez',
                    'parent_id' => 8,
                ),
            281 =>
                array (
                    'id' => 783,
                    'nombre' => 'Perugorria',
                    'parent_id' => 8,
                ),
            282 =>
                array (
                    'id' => 784,
                    'nombre' => 'Pueblo Libertador',
                    'parent_id' => 8,
                ),
            283 =>
                array (
                    'id' => 785,
                    'nombre' => 'Ramada Paso',
                    'parent_id' => 8,
                ),
            284 =>
                array (
                    'id' => 786,
                    'nombre' => 'Riachuelo',
                    'parent_id' => 8,
                ),
            285 =>
                array (
                    'id' => 787,
                    'nombre' => 'Saladas',
                    'parent_id' => 8,
                ),
            286 =>
                array (
                    'id' => 788,
                    'nombre' => 'San Antonio',
                    'parent_id' => 8,
                ),
            287 =>
                array (
                    'id' => 789,
                    'nombre' => 'San Carlos',
                    'parent_id' => 8,
                ),
            288 =>
                array (
                    'id' => 790,
                    'nombre' => 'San Cosme',
                    'parent_id' => 8,
                ),
            289 =>
                array (
                    'id' => 791,
                    'nombre' => 'San Lorenzo',
                    'parent_id' => 8,
                ),
            290 =>
                array (
                    'id' => 792,
                    'nombre' => 'San Luis Del Palmar',
                    'parent_id' => 8,
                ),
            291 =>
                array (
                    'id' => 793,
                    'nombre' => 'San Miguel',
                    'parent_id' => 8,
                ),
            292 =>
                array (
                    'id' => 794,
                    'nombre' => 'San Roque',
                    'parent_id' => 8,
                ),
            293 =>
                array (
                    'id' => 795,
                    'nombre' => 'Santa Ana',
                    'parent_id' => 8,
                ),
            294 =>
                array (
                    'id' => 796,
                    'nombre' => 'Santa Lucia',
                    'parent_id' => 8,
                ),
            295 =>
                array (
                    'id' => 797,
                    'nombre' => 'Santo Tome',
                    'parent_id' => 8,
                ),
            296 =>
                array (
                    'id' => 798,
                    'nombre' => 'Sauce',
                    'parent_id' => 8,
                ),
            297 =>
                array (
                    'id' => 799,
                    'nombre' => 'Tabay',
                    'parent_id' => 8,
                ),
            298 =>
                array (
                    'id' => 800,
                    'nombre' => 'Tapebicua',
                    'parent_id' => 8,
                ),
            299 =>
                array (
                    'id' => 801,
                    'nombre' => 'Tatacua',
                    'parent_id' => 8,
                ),
            300 =>
                array (
                    'id' => 802,
                    'nombre' => 'Villa Olivari',
                    'parent_id' => 8,
                ),
            301 =>
                array (
                    'id' => 803,
                    'nombre' => 'Yapeyu',
                    'parent_id' => 8,
                ),
            302 =>
                array (
                    'id' => 804,
                    'nombre' => 'Yatayti Calle',
                    'parent_id' => 8,
                ),
            303 =>
                array (
                    'id' => 805,
                    'nombre' => 'Alarcón',
                    'parent_id' => 9,
                ),
            304 =>
                array (
                    'id' => 806,
                    'nombre' => 'Alcaraz Norte',
                    'parent_id' => 9,
                ),
            305 =>
                array (
                    'id' => 807,
                    'nombre' => 'Alcaraz Sur',
                    'parent_id' => 9,
                ),
            306 =>
                array (
                    'id' => 808,
                    'nombre' => 'Aldea Asunción',
                    'parent_id' => 9,
                ),
            307 =>
                array (
                    'id' => 809,
                    'nombre' => 'Aldea Brasilera',
                    'parent_id' => 9,
                ),
            308 =>
                array (
                    'id' => 810,
                    'nombre' => 'Aldea Eigenfeld',
                    'parent_id' => 9,
                ),
            309 =>
                array (
                    'id' => 811,
                    'nombre' => 'Aldea Grapschental',
                    'parent_id' => 9,
                ),
            310 =>
                array (
                    'id' => 812,
                    'nombre' => 'Aldea María Luisa',
                    'parent_id' => 9,
                ),
            311 =>
                array (
                    'id' => 813,
                    'nombre' => 'Aldea Protestante',
                    'parent_id' => 9,
                ),
            312 =>
                array (
                    'id' => 814,
                    'nombre' => 'Aldea Salto',
                    'parent_id' => 9,
                ),
            313 =>
                array (
                    'id' => 815,
                    'nombre' => 'Aldea San Antonio (Gualeguaychú)',
                    'parent_id' => 9,
                ),
            314 =>
                array (
                    'id' => 816,
                    'nombre' => 'Aldea San Antonio (Paraná)',
                    'parent_id' => 9,
                ),
            315 =>
                array (
                    'id' => 817,
                    'nombre' => 'Aldea San Juan',
                    'parent_id' => 9,
                ),
            316 =>
                array (
                    'id' => 818,
                    'nombre' => 'Aldea San Miguel',
                    'parent_id' => 9,
                ),
            317 =>
                array (
                    'id' => 819,
                    'nombre' => 'Aldea San Rafael',
                    'parent_id' => 9,
                ),
            318 =>
                array (
                    'id' => 820,
                    'nombre' => 'Aldea Santa María',
                    'parent_id' => 9,
                ),
            319 =>
                array (
                    'id' => 821,
                    'nombre' => 'Aldea Santa Rosa',
                    'parent_id' => 9,
                ),
            320 =>
                array (
                    'id' => 822,
                    'nombre' => 'Aldea Spatzenkutter',
                    'parent_id' => 9,
                ),
            321 =>
                array (
                    'id' => 823,
                    'nombre' => 'Aldea Valle Maria',
                    'parent_id' => 9,
                ),
            322 =>
                array (
                    'id' => 824,
                    'nombre' => 'Alejandro Roca',
                    'parent_id' => 9,
                ),
            323 =>
                array (
                    'id' => 825,
                    'nombre' => 'Altamirano Sur',
                    'parent_id' => 9,
                ),
            324 =>
                array (
                    'id' => 826,
                    'nombre' => 'Antelo',
                    'parent_id' => 9,
                ),
            325 =>
                array (
                    'id' => 827,
                    'nombre' => 'Antonio Tomás',
                    'parent_id' => 9,
                ),
            326 =>
                array (
                    'id' => 828,
                    'nombre' => 'Aranguren',
                    'parent_id' => 9,
                ),
            327 =>
                array (
                    'id' => 829,
                    'nombre' => 'Arroyo Barú',
                    'parent_id' => 9,
                ),
            328 =>
                array (
                    'id' => 830,
                    'nombre' => 'Arroyo Burgos',
                    'parent_id' => 9,
                ),
            329 =>
                array (
                    'id' => 831,
                    'nombre' => 'Arroyo Clé',
                    'parent_id' => 9,
                ),
            330 =>
                array (
                    'id' => 832,
                    'nombre' => 'Arroyo Corralito',
                    'parent_id' => 9,
                ),
            331 =>
                array (
                    'id' => 833,
                    'nombre' => 'Arroyo Del Medio',
                    'parent_id' => 9,
                ),
            332 =>
                array (
                    'id' => 834,
                    'nombre' => 'Arroyo Maturrango',
                    'parent_id' => 9,
                ),
            333 =>
                array (
                    'id' => 835,
                    'nombre' => 'Arroyo Palo Seco',
                    'parent_id' => 9,
                ),
            334 =>
                array (
                    'id' => 836,
                    'nombre' => 'Banderas',
                    'parent_id' => 9,
                ),
            335 =>
                array (
                    'id' => 837,
                    'nombre' => 'Basavilbaso',
                    'parent_id' => 9,
                ),
            336 =>
                array (
                    'id' => 838,
                    'nombre' => 'Berrera',
                    'parent_id' => 9,
                ),
            337 =>
                array (
                    'id' => 839,
                    'nombre' => 'Betbeder',
                    'parent_id' => 9,
                ),
            338 =>
                array (
                    'id' => 840,
                    'nombre' => 'Bovril',
                    'parent_id' => 9,
                ),
            339 =>
                array (
                    'id' => 841,
                    'nombre' => 'Caseros',
                    'parent_id' => 9,
                ),
            340 =>
                array (
                    'id' => 842,
                    'nombre' => 'Ceibas',
                    'parent_id' => 9,
                ),
            341 =>
                array (
                    'id' => 843,
                    'nombre' => 'Cerrito',
                    'parent_id' => 9,
                ),
            342 =>
                array (
                    'id' => 844,
                    'nombre' => 'Chajari',
                    'parent_id' => 9,
                ),
            343 =>
                array (
                    'id' => 845,
                    'nombre' => 'Chilcas',
                    'parent_id' => 9,
                ),
            344 =>
                array (
                    'id' => 846,
                    'nombre' => 'Clodomiro Ledesma',
                    'parent_id' => 9,
                ),
            345 =>
                array (
                    'id' => 847,
                    'nombre' => 'Colon',
                    'parent_id' => 9,
                ),
            346 =>
                array (
                    'id' => 848,
                    'nombre' => 'Colonia Alemana',
                    'parent_id' => 9,
                ),
            347 =>
                array (
                    'id' => 849,
                    'nombre' => 'Colonia Avellaneda',
                    'parent_id' => 9,
                ),
            348 =>
                array (
                    'id' => 850,
                    'nombre' => 'Colonia Avigdor',
                    'parent_id' => 9,
                ),
            349 =>
                array (
                    'id' => 851,
                    'nombre' => 'Colonia Ayui',
                    'parent_id' => 9,
                ),
            350 =>
                array (
                    'id' => 852,
                    'nombre' => 'Colonia Baylina',
                    'parent_id' => 9,
                ),
            351 =>
                array (
                    'id' => 853,
                    'nombre' => 'Colonia Carrasco',
                    'parent_id' => 9,
                ),
            352 =>
                array (
                    'id' => 854,
                    'nombre' => 'Colonia Celina',
                    'parent_id' => 9,
                ),
            353 =>
                array (
                    'id' => 855,
                    'nombre' => 'Colonia Cerrito',
                    'parent_id' => 9,
                ),
            354 =>
                array (
                    'id' => 856,
                    'nombre' => 'Colonia Crespo',
                    'parent_id' => 9,
                ),
            355 =>
                array (
                    'id' => 857,
                    'nombre' => 'Colonia Elía',
                    'parent_id' => 9,
                ),
            356 =>
                array (
                    'id' => 858,
                    'nombre' => 'Colonia Ensayo',
                    'parent_id' => 9,
                ),
            357 =>
                array (
                    'id' => 859,
                    'nombre' => 'Colonia General Roca',
                    'parent_id' => 9,
                ),
            358 =>
                array (
                    'id' => 860,
                    'nombre' => 'Colonia La Argentina',
                    'parent_id' => 9,
                ),
            359 =>
                array (
                    'id' => 861,
                    'nombre' => 'Colonia Merou',
                    'parent_id' => 9,
                ),
            360 =>
                array (
                    'id' => 862,
                    'nombre' => 'Colonia Oficial N° 13',
                    'parent_id' => 9,
                ),
            361 =>
                array (
                    'id' => 863,
                    'nombre' => 'Colonia Oficial N° 3 Y 14',
                    'parent_id' => 9,
                ),
            362 =>
                array (
                    'id' => 864,
                    'nombre' => 'Colonia Oficial N°5',
                    'parent_id' => 9,
                ),
            363 =>
                array (
                    'id' => 865,
                    'nombre' => 'Colonia Reffino',
                    'parent_id' => 9,
                ),
            364 =>
                array (
                    'id' => 866,
                    'nombre' => 'Colonia Tunas',
                    'parent_id' => 9,
                ),
            365 =>
                array (
                    'id' => 867,
                    'nombre' => 'Colonia Viraró',
                    'parent_id' => 9,
                ),
            366 =>
                array (
                    'id' => 868,
                    'nombre' => 'Concepcion Del Uruguay',
                    'parent_id' => 9,
                ),
            367 =>
                array (
                    'id' => 869,
                    'nombre' => 'Concordia',
                    'parent_id' => 9,
                ),
            368 =>
                array (
                    'id' => 870,
                    'nombre' => 'Conscripto Bernardi',
                    'parent_id' => 9,
                ),
            369 =>
                array (
                    'id' => 871,
                    'nombre' => 'Costa Grande',
                    'parent_id' => 9,
                ),
            370 =>
                array (
                    'id' => 872,
                    'nombre' => 'Costa San Antonio',
                    'parent_id' => 9,
                ),
            371 =>
                array (
                    'id' => 873,
                    'nombre' => 'Costa Uruguay Norte',
                    'parent_id' => 9,
                ),
            372 =>
                array (
                    'id' => 874,
                    'nombre' => 'Costa Uruguay Sur',
                    'parent_id' => 9,
                ),
            373 =>
                array (
                    'id' => 875,
                    'nombre' => 'Crespo',
                    'parent_id' => 9,
                ),
            374 =>
                array (
                    'id' => 876,
                    'nombre' => 'Crucesitas Octava',
                    'parent_id' => 9,
                ),
            375 =>
                array (
                    'id' => 877,
                    'nombre' => 'Crucesitas Séptima',
                    'parent_id' => 9,
                ),
            376 =>
                array (
                    'id' => 878,
                    'nombre' => 'Crucesitas Tercera',
                    'parent_id' => 9,
                ),
            377 =>
                array (
                    'id' => 879,
                    'nombre' => 'Cuchilla Redonda',
                    'parent_id' => 9,
                ),
            378 =>
                array (
                    'id' => 880,
                    'nombre' => 'Curtiembre',
                    'parent_id' => 9,
                ),
            379 =>
                array (
                    'id' => 881,
                    'nombre' => 'Diamante',
                    'parent_id' => 9,
                ),
            380 =>
                array (
                    'id' => 882,
                    'nombre' => 'Distrito Chañar',
                    'parent_id' => 9,
                ),
            381 =>
                array (
                    'id' => 883,
                    'nombre' => 'Distrito Chiqueros',
                    'parent_id' => 9,
                ),
            382 =>
                array (
                    'id' => 884,
                    'nombre' => 'Distrito Cuarto',
                    'parent_id' => 9,
                ),
            383 =>
                array (
                    'id' => 885,
                    'nombre' => 'Distrito Diego López',
                    'parent_id' => 9,
                ),
            384 =>
                array (
                    'id' => 886,
                    'nombre' => 'Distrito Pajonal',
                    'parent_id' => 9,
                ),
            385 =>
                array (
                    'id' => 887,
                    'nombre' => 'Distrito Sauce',
                    'parent_id' => 9,
                ),
            386 =>
                array (
                    'id' => 888,
                    'nombre' => 'Distrito Sexto Costa De Nogoyá',
                    'parent_id' => 9,
                ),
            387 =>
                array (
                    'id' => 889,
                    'nombre' => 'Distrito Tala',
                    'parent_id' => 9,
                ),
            388 =>
                array (
                    'id' => 890,
                    'nombre' => 'Distrito Talitas',
                    'parent_id' => 9,
                ),
            389 =>
                array (
                    'id' => 891,
                    'nombre' => 'Don Cristóbal Primero',
                    'parent_id' => 9,
                ),
            390 =>
                array (
                    'id' => 892,
                    'nombre' => 'Don Cristóbal Segundo',
                    'parent_id' => 9,
                ),
            391 =>
                array (
                    'id' => 893,
                    'nombre' => 'Durazno',
                    'parent_id' => 9,
                ),
            392 =>
                array (
                    'id' => 894,
                    'nombre' => 'El Cimarrón',
                    'parent_id' => 9,
                ),
            393 =>
                array (
                    'id' => 895,
                    'nombre' => 'El Gramiyal',
                    'parent_id' => 9,
                ),
            394 =>
                array (
                    'id' => 896,
                    'nombre' => 'El Palenque',
                    'parent_id' => 9,
                ),
            395 =>
                array (
                    'id' => 897,
                    'nombre' => 'El Pingo',
                    'parent_id' => 9,
                ),
            396 =>
                array (
                    'id' => 898,
                    'nombre' => 'El Quebracho',
                    'parent_id' => 9,
                ),
            397 =>
                array (
                    'id' => 899,
                    'nombre' => 'El Redomón',
                    'parent_id' => 9,
                ),
            398 =>
                array (
                    'id' => 900,
                    'nombre' => 'El Solar',
                    'parent_id' => 9,
                ),
            399 =>
                array (
                    'id' => 901,
                    'nombre' => 'Enrique Carbo',
                    'parent_id' => 9,
                ),
            400 =>
                array (
                    'id' => 902,
                    'nombre' => 'Espinillo Norte',
                    'parent_id' => 9,
                ),
            401 =>
                array (
                    'id' => 903,
                    'nombre' => 'Estación Camps',
                    'parent_id' => 9,
                ),
            402 =>
                array (
                    'id' => 904,
                    'nombre' => 'Estación Escriña',
                    'parent_id' => 9,
                ),
            403 =>
                array (
                    'id' => 905,
                    'nombre' => 'Estación Lazo',
                    'parent_id' => 9,
                ),
            404 =>
                array (
                    'id' => 906,
                    'nombre' => 'Estación Raíces',
                    'parent_id' => 9,
                ),
            405 =>
                array (
                    'id' => 907,
                    'nombre' => 'Estación Yerúa',
                    'parent_id' => 9,
                ),
            406 =>
                array (
                    'id' => 908,
                    'nombre' => 'Estancia Grande',
                    'parent_id' => 9,
                ),
            407 =>
                array (
                    'id' => 909,
                    'nombre' => 'Estancia Líbaros',
                    'parent_id' => 9,
                ),
            408 =>
                array (
                    'id' => 910,
                    'nombre' => 'Estancia Racedo (El Carmen)',
                    'parent_id' => 9,
                ),
            409 =>
                array (
                    'id' => 911,
                    'nombre' => 'Estancia Sola',
                    'parent_id' => 9,
                ),
            410 =>
                array (
                    'id' => 912,
                    'nombre' => 'Estancia Yuquerí',
                    'parent_id' => 9,
                ),
            411 =>
                array (
                    'id' => 913,
                    'nombre' => 'Estaquitas',
                    'parent_id' => 9,
                ),
            412 =>
                array (
                    'id' => 914,
                    'nombre' => 'Faustino María Parera',
                    'parent_id' => 9,
                ),
            413 =>
                array (
                    'id' => 915,
                    'nombre' => 'Febre',
                    'parent_id' => 9,
                ),
            414 =>
                array (
                    'id' => 916,
                    'nombre' => 'Federacion',
                    'parent_id' => 9,
                ),
            415 =>
                array (
                    'id' => 917,
                    'nombre' => 'Federal',
                    'parent_id' => 9,
                ),
            416 =>
                array (
                    'id' => 918,
                    'nombre' => 'General Almada',
                    'parent_id' => 9,
                ),
            417 =>
                array (
                    'id' => 919,
                    'nombre' => 'General Alvear',
                    'parent_id' => 9,
                ),
            418 =>
                array (
                    'id' => 920,
                    'nombre' => 'General Campos',
                    'parent_id' => 9,
                ),
            419 =>
                array (
                    'id' => 921,
                    'nombre' => 'General Galarza',
                    'parent_id' => 9,
                ),
            420 =>
                array (
                    'id' => 922,
                    'nombre' => 'General Ramirez',
                    'parent_id' => 9,
                ),
            421 =>
                array (
                    'id' => 923,
                    'nombre' => 'Gilbert',
                    'parent_id' => 9,
                ),
            422 =>
                array (
                    'id' => 924,
                    'nombre' => 'Gobernador Echagüe',
                    'parent_id' => 9,
                ),
            423 =>
                array (
                    'id' => 925,
                    'nombre' => 'Gobernador Mansilla',
                    'parent_id' => 9,
                ),
            424 =>
                array (
                    'id' => 926,
                    'nombre' => 'González Calderón',
                    'parent_id' => 9,
                ),
            425 =>
                array (
                    'id' => 927,
                    'nombre' => 'Gualeguay',
                    'parent_id' => 9,
                ),
            426 =>
                array (
                    'id' => 928,
                    'nombre' => 'Gualeguaychu',
                    'parent_id' => 9,
                ),
            427 =>
                array (
                    'id' => 929,
                    'nombre' => 'Gualeguaycito',
                    'parent_id' => 9,
                ),
            428 =>
                array (
                    'id' => 930,
                    'nombre' => 'Guardamonte',
                    'parent_id' => 9,
                ),
            429 =>
                array (
                    'id' => 931,
                    'nombre' => 'Hambis',
                    'parent_id' => 9,
                ),
            430 =>
                array (
                    'id' => 932,
                    'nombre' => 'Hasenkamp',
                    'parent_id' => 9,
                ),
            431 =>
                array (
                    'id' => 933,
                    'nombre' => 'Hernandarias',
                    'parent_id' => 9,
                ),
            432 =>
                array (
                    'id' => 934,
                    'nombre' => 'Hernandez',
                    'parent_id' => 9,
                ),
            433 =>
                array (
                    'id' => 935,
                    'nombre' => 'Herrera',
                    'parent_id' => 9,
                ),
            434 =>
                array (
                    'id' => 936,
                    'nombre' => 'Hinojal',
                    'parent_id' => 9,
                ),
            435 =>
                array (
                    'id' => 937,
                    'nombre' => 'Hocker',
                    'parent_id' => 9,
                ),
            436 =>
                array (
                    'id' => 938,
                    'nombre' => 'Ingeniero Sajaroff',
                    'parent_id' => 9,
                ),
            437 =>
                array (
                    'id' => 939,
                    'nombre' => 'Irazusta',
                    'parent_id' => 9,
                ),
            438 =>
                array (
                    'id' => 940,
                    'nombre' => 'Islas Del Ibicuy',
                    'parent_id' => 9,
                ),
            439 =>
                array (
                    'id' => 941,
                    'nombre' => 'Isletas',
                    'parent_id' => 9,
                ),
            440 =>
                array (
                    'id' => 942,
                    'nombre' => 'Jubileo',
                    'parent_id' => 9,
                ),
            441 =>
                array (
                    'id' => 943,
                    'nombre' => 'Justo José De Urquiza',
                    'parent_id' => 9,
                ),
            442 =>
                array (
                    'id' => 944,
                    'nombre' => 'La Clarita',
                    'parent_id' => 9,
                ),
            443 =>
                array (
                    'id' => 945,
                    'nombre' => 'La Criolla',
                    'parent_id' => 9,
                ),
            444 =>
                array (
                    'id' => 946,
                    'nombre' => 'La Esmeralda',
                    'parent_id' => 9,
                ),
            445 =>
                array (
                    'id' => 947,
                    'nombre' => 'La Florida',
                    'parent_id' => 9,
                ),
            446 =>
                array (
                    'id' => 948,
                    'nombre' => 'La Fraternidad Y Santa Juana',
                    'parent_id' => 9,
                ),
            447 =>
                array (
                    'id' => 949,
                    'nombre' => 'La Hierra',
                    'parent_id' => 9,
                ),
            448 =>
                array (
                    'id' => 950,
                    'nombre' => 'La Ollita',
                    'parent_id' => 9,
                ),
            449 =>
                array (
                    'id' => 951,
                    'nombre' => 'La Paz',
                    'parent_id' => 9,
                ),
            450 =>
                array (
                    'id' => 952,
                    'nombre' => 'La Picada',
                    'parent_id' => 9,
                ),
            451 =>
                array (
                    'id' => 953,
                    'nombre' => 'La Providencia',
                    'parent_id' => 9,
                ),
            452 =>
                array (
                    'id' => 954,
                    'nombre' => 'La Verbena',
                    'parent_id' => 9,
                ),
            453 =>
                array (
                    'id' => 955,
                    'nombre' => 'Laguna Benítez',
                    'parent_id' => 9,
                ),
            454 =>
                array (
                    'id' => 956,
                    'nombre' => 'Larroque',
                    'parent_id' => 9,
                ),
            455 =>
                array (
                    'id' => 957,
                    'nombre' => 'Las Cuevas',
                    'parent_id' => 9,
                ),
            456 =>
                array (
                    'id' => 958,
                    'nombre' => 'Las Garzas (Pueblo Bellocq)',
                    'parent_id' => 9,
                ),
            457 =>
                array (
                    'id' => 959,
                    'nombre' => 'Las Guachas',
                    'parent_id' => 9,
                ),
            458 =>
                array (
                    'id' => 960,
                    'nombre' => 'Las Mercedes',
                    'parent_id' => 9,
                ),
            459 =>
                array (
                    'id' => 961,
                    'nombre' => 'Las Moscas',
                    'parent_id' => 9,
                ),
            460 =>
                array (
                    'id' => 962,
                    'nombre' => 'Las Mulitas',
                    'parent_id' => 9,
                ),
            461 =>
                array (
                    'id' => 963,
                    'nombre' => 'Las Toscas',
                    'parent_id' => 9,
                ),
            462 =>
                array (
                    'id' => 964,
                    'nombre' => 'Laurencena',
                    'parent_id' => 9,
                ),
            463 =>
                array (
                    'id' => 965,
                    'nombre' => 'Libertador San Martin',
                    'parent_id' => 9,
                ),
            464 =>
                array (
                    'id' => 966,
                    'nombre' => 'Loma Limpia',
                    'parent_id' => 9,
                ),
            465 =>
                array (
                    'id' => 967,
                    'nombre' => 'Los Ceibos',
                    'parent_id' => 9,
                ),
            466 =>
                array (
                    'id' => 968,
                    'nombre' => 'Los Charruas',
                    'parent_id' => 9,
                ),
            467 =>
                array (
                    'id' => 969,
                    'nombre' => 'Los Conquistadores',
                    'parent_id' => 9,
                ),
            468 =>
                array (
                    'id' => 970,
                    'nombre' => 'Lucas Gonzalez',
                    'parent_id' => 9,
                ),
            469 =>
                array (
                    'id' => 971,
                    'nombre' => 'Lucas Norte',
                    'parent_id' => 9,
                ),
            470 =>
                array (
                    'id' => 972,
                    'nombre' => 'Lucas Sur Primera',
                    'parent_id' => 9,
                ),
            471 =>
                array (
                    'id' => 973,
                    'nombre' => 'Lucas Sur Segundo',
                    'parent_id' => 9,
                ),
            472 =>
                array (
                    'id' => 974,
                    'nombre' => 'Macia',
                    'parent_id' => 9,
                ),
            473 =>
                array (
                    'id' => 975,
                    'nombre' => 'Maria Grande',
                    'parent_id' => 9,
                ),
            474 =>
                array (
                    'id' => 976,
                    'nombre' => 'María Grande Segunda',
                    'parent_id' => 9,
                ),
            475 =>
                array (
                    'id' => 977,
                    'nombre' => 'Médanos',
                    'parent_id' => 9,
                ),
            476 =>
                array (
                    'id' => 978,
                    'nombre' => 'Mojones Norte',
                    'parent_id' => 9,
                ),
            477 =>
                array (
                    'id' => 979,
                    'nombre' => 'Mojones Sur',
                    'parent_id' => 9,
                ),
            478 =>
                array (
                    'id' => 980,
                    'nombre' => 'Molino Doll',
                    'parent_id' => 9,
                ),
            479 =>
                array (
                    'id' => 981,
                    'nombre' => 'Monte Redondo',
                    'parent_id' => 9,
                ),
            480 =>
                array (
                    'id' => 982,
                    'nombre' => 'Montoya',
                    'parent_id' => 9,
                ),
            481 =>
                array (
                    'id' => 983,
                    'nombre' => 'Mulas Grandes',
                    'parent_id' => 9,
                ),
            482 =>
                array (
                    'id' => 984,
                    'nombre' => 'Ñancay',
                    'parent_id' => 9,
                ),
            483 =>
                array (
                    'id' => 985,
                    'nombre' => 'Nogoya',
                    'parent_id' => 9,
                ),
            484 =>
                array (
                    'id' => 986,
                    'nombre' => 'Nueva Escocia',
                    'parent_id' => 9,
                ),
            485 =>
                array (
                    'id' => 987,
                    'nombre' => 'Nueva Vizcaya',
                    'parent_id' => 9,
                ),
            486 =>
                array (
                    'id' => 988,
                    'nombre' => 'Ombú',
                    'parent_id' => 9,
                ),
            487 =>
                array (
                    'id' => 989,
                    'nombre' => 'Oro Verde',
                    'parent_id' => 9,
                ),
            488 =>
                array (
                    'id' => 990,
                    'nombre' => 'Paraje Las Tunas',
                    'parent_id' => 9,
                ),
            489 =>
                array (
                    'id' => 991,
                    'nombre' => 'Parana',
                    'parent_id' => 9,
                ),
            490 =>
                array (
                    'id' => 992,
                    'nombre' => 'Pasaje Guayaquil',
                    'parent_id' => 9,
                ),
            491 =>
                array (
                    'id' => 993,
                    'nombre' => 'Paso De La Arena',
                    'parent_id' => 9,
                ),
            492 =>
                array (
                    'id' => 994,
                    'nombre' => 'Paso De La Laguna',
                    'parent_id' => 9,
                ),
            493 =>
                array (
                    'id' => 995,
                    'nombre' => 'Paso De Las Piedras',
                    'parent_id' => 9,
                ),
            494 =>
                array (
                    'id' => 996,
                    'nombre' => 'Paso Duarte',
                    'parent_id' => 9,
                ),
            495 =>
                array (
                    'id' => 997,
                    'nombre' => 'Pastor Britos',
                    'parent_id' => 9,
                ),
            496 =>
                array (
                    'id' => 998,
                    'nombre' => 'Pedernal',
                    'parent_id' => 9,
                ),
            497 =>
                array (
                    'id' => 999,
                    'nombre' => 'Perdices',
                    'parent_id' => 9,
                ),
            498 =>
                array (
                    'id' => 1000,
                    'nombre' => 'Picada Berón',
                    'parent_id' => 9,
                ),
            499 =>
                array (
                    'id' => 1001,
                    'nombre' => 'Piedras Blancas',
                    'parent_id' => 9,
                ),
        ));
        \DB::table('geolocalizacion')->insert(array (
            0 =>
                array (
                    'id' => 1002,
                    'nombre' => 'Primer Distrito Cuchilla',
                    'parent_id' => 9,
                ),
            1 =>
                array (
                    'id' => 1003,
                    'nombre' => 'Primero De Mayo',
                    'parent_id' => 9,
                ),
            2 =>
                array (
                    'id' => 1004,
                    'nombre' => 'Pronunciamiento',
                    'parent_id' => 9,
                ),
            3 =>
                array (
                    'id' => 1005,
                    'nombre' => 'Pueblo Brugo',
                    'parent_id' => 9,
                ),
            4 =>
                array (
                    'id' => 1006,
                    'nombre' => 'Pueblo Cazes',
                    'parent_id' => 9,
                ),
            5 =>
                array (
                    'id' => 1007,
                    'nombre' => 'Pueblo General Belgrano',
                    'parent_id' => 9,
                ),
            6 =>
                array (
                    'id' => 1008,
                    'nombre' => 'Pueblo Liebig',
                    'parent_id' => 9,
                ),
            7 =>
                array (
                    'id' => 1009,
                    'nombre' => 'Puerto Algarrobo',
                    'parent_id' => 9,
                ),
            8 =>
                array (
                    'id' => 1010,
                    'nombre' => 'Puerto Ibicuy',
                    'parent_id' => 9,
                ),
            9 =>
                array (
                    'id' => 1011,
                    'nombre' => 'Puerto Yerua',
                    'parent_id' => 9,
                ),
            10 =>
                array (
                    'id' => 1012,
                    'nombre' => 'Punta Del Monte',
                    'parent_id' => 9,
                ),
            11 =>
                array (
                    'id' => 1013,
                    'nombre' => 'Quebracho',
                    'parent_id' => 9,
                ),
            12 =>
                array (
                    'id' => 1014,
                    'nombre' => 'Quinto Distrito',
                    'parent_id' => 9,
                ),
            13 =>
                array (
                    'id' => 1015,
                    'nombre' => 'Raíces Oeste',
                    'parent_id' => 9,
                ),
            14 =>
                array (
                    'id' => 1016,
                    'nombre' => 'Rincón De Nogoyá',
                    'parent_id' => 9,
                ),
            15 =>
                array (
                    'id' => 1017,
                    'nombre' => 'Rincón Del Cinto',
                    'parent_id' => 9,
                ),
            16 =>
                array (
                    'id' => 1018,
                    'nombre' => 'Rincón Del Doll',
                    'parent_id' => 9,
                ),
            17 =>
                array (
                    'id' => 1019,
                    'nombre' => 'Rincón Del Gato',
                    'parent_id' => 9,
                ),
            18 =>
                array (
                    'id' => 1020,
                    'nombre' => 'Rocamora',
                    'parent_id' => 9,
                ),
            19 =>
                array (
                    'id' => 1021,
                    'nombre' => 'Rosario Del Tala',
                    'parent_id' => 9,
                ),
            20 =>
                array (
                    'id' => 1022,
                    'nombre' => 'S.J. De La Frontera',
                    'parent_id' => 9,
                ),
            21 =>
                array (
                    'id' => 1023,
                    'nombre' => 'San Benito',
                    'parent_id' => 9,
                ),
            22 =>
                array (
                    'id' => 1024,
                    'nombre' => 'San Cipriano',
                    'parent_id' => 9,
                ),
            23 =>
                array (
                    'id' => 1025,
                    'nombre' => 'San Ernesto',
                    'parent_id' => 9,
                ),
            24 =>
                array (
                    'id' => 1026,
                    'nombre' => 'San Gustavo',
                    'parent_id' => 9,
                ),
            25 =>
                array (
                    'id' => 1027,
                    'nombre' => 'San Jaime',
                    'parent_id' => 9,
                ),
            26 =>
                array (
                    'id' => 1028,
                    'nombre' => 'San Jose',
                    'parent_id' => 9,
                ),
            27 =>
                array (
                    'id' => 1029,
                    'nombre' => 'San José De Feliciano',
                    'parent_id' => 9,
                ),
            28 =>
                array (
                    'id' => 1030,
                    'nombre' => 'San Justo (Concordia)',
                    'parent_id' => 9,
                ),
            29 =>
                array (
                    'id' => 1031,
                    'nombre' => 'San Justo (Uruguay)',
                    'parent_id' => 9,
                ),
            30 =>
                array (
                    'id' => 1032,
                    'nombre' => 'San Marcial',
                    'parent_id' => 9,
                ),
            31 =>
                array (
                    'id' => 1033,
                    'nombre' => 'San Pedro',
                    'parent_id' => 9,
                ),
            32 =>
                array (
                    'id' => 1034,
                    'nombre' => 'San Ramírez',
                    'parent_id' => 9,
                ),
            33 =>
                array (
                    'id' => 1035,
                    'nombre' => 'San Ramón',
                    'parent_id' => 9,
                ),
            34 =>
                array (
                    'id' => 1036,
                    'nombre' => 'San Roque',
                    'parent_id' => 9,
                ),
            35 =>
                array (
                    'id' => 1037,
                    'nombre' => 'San Salvador',
                    'parent_id' => 9,
                ),
            36 =>
                array (
                    'id' => 1038,
                    'nombre' => 'San Víctor',
                    'parent_id' => 9,
                ),
            37 =>
                array (
                    'id' => 1039,
                    'nombre' => 'Santa Ana (Federación)',
                    'parent_id' => 9,
                ),
            38 =>
                array (
                    'id' => 1040,
                    'nombre' => 'Santa Ana (Uruguay)',
                    'parent_id' => 9,
                ),
            39 =>
                array (
                    'id' => 1041,
                    'nombre' => 'Santa Anita',
                    'parent_id' => 9,
                ),
            40 =>
                array (
                    'id' => 1042,
                    'nombre' => 'Santa Elena',
                    'parent_id' => 9,
                ),
            41 =>
                array (
                    'id' => 1043,
                    'nombre' => 'Santa Lucía',
                    'parent_id' => 9,
                ),
            42 =>
                array (
                    'id' => 1044,
                    'nombre' => 'Santa Luisa',
                    'parent_id' => 9,
                ),
            43 =>
                array (
                    'id' => 1045,
                    'nombre' => 'Sauce De Luna',
                    'parent_id' => 9,
                ),
            44 =>
                array (
                    'id' => 1046,
                    'nombre' => 'Sauce Montrull',
                    'parent_id' => 9,
                ),
            45 =>
                array (
                    'id' => 1047,
                    'nombre' => 'Sauce Pintos',
                    'parent_id' => 9,
                ),
            46 =>
                array (
                    'id' => 1048,
                    'nombre' => 'Sauce Sur',
                    'parent_id' => 9,
                ),
            47 =>
                array (
                    'id' => 1049,
                    'nombre' => 'Segui',
                    'parent_id' => 9,
                ),
            48 =>
                array (
                    'id' => 1050,
                    'nombre' => 'Sir Leonard',
                    'parent_id' => 9,
                ),
            49 =>
                array (
                    'id' => 1051,
                    'nombre' => 'Sosa',
                    'parent_id' => 9,
                ),
            50 =>
                array (
                    'id' => 1052,
                    'nombre' => 'Tabossi',
                    'parent_id' => 9,
                ),
            51 =>
                array (
                    'id' => 1053,
                    'nombre' => 'Tezanos Pintos',
                    'parent_id' => 9,
                ),
            52 =>
                array (
                    'id' => 1054,
                    'nombre' => 'Ubajay',
                    'parent_id' => 9,
                ),
            53 =>
                array (
                    'id' => 1055,
                    'nombre' => 'Urdinarrain',
                    'parent_id' => 9,
                ),
            54 =>
                array (
                    'id' => 1056,
                    'nombre' => 'Veinte De Setiembre',
                    'parent_id' => 9,
                ),
            55 =>
                array (
                    'id' => 1057,
                    'nombre' => 'Viale',
                    'parent_id' => 9,
                ),
            56 =>
                array (
                    'id' => 1058,
                    'nombre' => 'Victoria',
                    'parent_id' => 9,
                ),
            57 =>
                array (
                    'id' => 1059,
                    'nombre' => 'Villa Clara',
                    'parent_id' => 9,
                ),
            58 =>
                array (
                    'id' => 1060,
                    'nombre' => 'Villa Del Rosario',
                    'parent_id' => 9,
                ),
            59 =>
                array (
                    'id' => 1061,
                    'nombre' => 'Villa Dominguez',
                    'parent_id' => 9,
                ),
            60 =>
                array (
                    'id' => 1062,
                    'nombre' => 'Villa Elisa',
                    'parent_id' => 9,
                ),
            61 =>
                array (
                    'id' => 1063,
                    'nombre' => 'Villa Fontana',
                    'parent_id' => 9,
                ),
            62 =>
                array (
                    'id' => 1064,
                    'nombre' => 'Villa Gobernador Etchevehere',
                    'parent_id' => 9,
                ),
            63 =>
                array (
                    'id' => 1065,
                    'nombre' => 'Villa Mantero',
                    'parent_id' => 9,
                ),
            64 =>
                array (
                    'id' => 1066,
                    'nombre' => 'Villa Paranacito',
                    'parent_id' => 9,
                ),
            65 =>
                array (
                    'id' => 1067,
                    'nombre' => 'Villa Urquiza',
                    'parent_id' => 9,
                ),
            66 =>
                array (
                    'id' => 1068,
                    'nombre' => 'Villaguay',
                    'parent_id' => 9,
                ),
            67 =>
                array (
                    'id' => 1069,
                    'nombre' => 'Walter Moss',
                    'parent_id' => 9,
                ),
            68 =>
                array (
                    'id' => 1070,
                    'nombre' => 'Yacaré',
                    'parent_id' => 9,
                ),
            69 =>
                array (
                    'id' => 1071,
                    'nombre' => 'Yeso Oeste',
                    'parent_id' => 9,
                ),
            70 =>
                array (
                    'id' => 1072,
                    'nombre' => 'Buena Vista',
                    'parent_id' => 10,
                ),
            71 =>
                array (
                    'id' => 1073,
                    'nombre' => 'Clorinda',
                    'parent_id' => 10,
                ),
            72 =>
                array (
                    'id' => 1074,
                    'nombre' => 'Colonia Pastoril',
                    'parent_id' => 10,
                ),
            73 =>
                array (
                    'id' => 1075,
                    'nombre' => 'Comandante Fontana',
                    'parent_id' => 10,
                ),
            74 =>
                array (
                    'id' => 1076,
                    'nombre' => 'El Colorado',
                    'parent_id' => 10,
                ),
            75 =>
                array (
                    'id' => 1077,
                    'nombre' => 'El Espinillo',
                    'parent_id' => 10,
                ),
            76 =>
                array (
                    'id' => 1078,
                    'nombre' => 'Estanislao Del Campo',
                    'parent_id' => 10,
                ),
            77 =>
                array (
                    'id' => 1079,
                    'nombre' => 'Formosa',
                    'parent_id' => 10,
                ),
            78 =>
                array (
                    'id' => 1080,
                    'nombre' => 'Fortín Cabo 1º Lugones',
                    'parent_id' => 10,
                ),
            79 =>
                array (
                    'id' => 1081,
                    'nombre' => 'General Enrique Mosconi',
                    'parent_id' => 10,
                ),
            80 =>
                array (
                    'id' => 1082,
                    'nombre' => 'General Güemes',
                    'parent_id' => 10,
                ),
            81 =>
                array (
                    'id' => 1083,
                    'nombre' => 'General Lucio Victorio Mansilla',
                    'parent_id' => 10,
                ),
            82 =>
                array (
                    'id' => 1084,
                    'nombre' => 'General Manuel Belgrano',
                    'parent_id' => 10,
                ),
            83 =>
                array (
                    'id' => 1085,
                    'nombre' => 'Gran Guardia',
                    'parent_id' => 10,
                ),
            84 =>
                array (
                    'id' => 1086,
                    'nombre' => 'Herradura',
                    'parent_id' => 10,
                ),
            85 =>
                array (
                    'id' => 1087,
                    'nombre' => 'Ibarreta',
                    'parent_id' => 10,
                ),
            86 =>
                array (
                    'id' => 1088,
                    'nombre' => 'Ingeniero Juarez',
                    'parent_id' => 10,
                ),
            87 =>
                array (
                    'id' => 1089,
                    'nombre' => 'Laguna Blanca',
                    'parent_id' => 10,
                ),
            88 =>
                array (
                    'id' => 1090,
                    'nombre' => 'Laguna Naick Neck',
                    'parent_id' => 10,
                ),
            89 =>
                array (
                    'id' => 1091,
                    'nombre' => 'Laguna Yema',
                    'parent_id' => 10,
                ),
            90 =>
                array (
                    'id' => 1092,
                    'nombre' => 'Las Lomitas',
                    'parent_id' => 10,
                ),
            91 =>
                array (
                    'id' => 1093,
                    'nombre' => 'Los Chiriguanos',
                    'parent_id' => 10,
                ),
            92 =>
                array (
                    'id' => 1094,
                    'nombre' => 'Mayor Vicente Villafañe',
                    'parent_id' => 10,
                ),
            93 =>
                array (
                    'id' => 1095,
                    'nombre' => 'Mision San Francisco De Laishi',
                    'parent_id' => 10,
                ),
            94 =>
                array (
                    'id' => 1096,
                    'nombre' => 'Mision Tacaagle',
                    'parent_id' => 10,
                ),
            95 =>
                array (
                    'id' => 1097,
                    'nombre' => 'Mojon De Fierro',
                    'parent_id' => 10,
                ),
            96 =>
                array (
                    'id' => 1098,
                    'nombre' => 'Palo Santo',
                    'parent_id' => 10,
                ),
            97 =>
                array (
                    'id' => 1099,
                    'nombre' => 'Pirane',
                    'parent_id' => 10,
                ),
            98 =>
                array (
                    'id' => 1100,
                    'nombre' => 'Posta San Martin',
                    'parent_id' => 10,
                ),
            99 =>
                array (
                    'id' => 1101,
                    'nombre' => 'Pozo De Maza',
                    'parent_id' => 10,
                ),
            100 =>
                array (
                    'id' => 1102,
                    'nombre' => 'Pozo Del Tigre',
                    'parent_id' => 10,
                ),
            101 =>
                array (
                    'id' => 1103,
                    'nombre' => 'Riacho He He',
                    'parent_id' => 10,
                ),
            102 =>
                array (
                    'id' => 1104,
                    'nombre' => 'San Hilario',
                    'parent_id' => 10,
                ),
            103 =>
                array (
                    'id' => 1105,
                    'nombre' => 'Siete Palmas',
                    'parent_id' => 10,
                ),
            104 =>
                array (
                    'id' => 1106,
                    'nombre' => 'Subteniente Perin',
                    'parent_id' => 10,
                ),
            105 =>
                array (
                    'id' => 1107,
                    'nombre' => 'Tres Lagunas',
                    'parent_id' => 10,
                ),
            106 =>
                array (
                    'id' => 1108,
                    'nombre' => 'Villa Dos Trece',
                    'parent_id' => 10,
                ),
            107 =>
                array (
                    'id' => 1109,
                    'nombre' => 'Villa Escolar',
                    'parent_id' => 10,
                ),
            108 =>
                array (
                    'id' => 1110,
                    'nombre' => 'Villa General Guemes',
                    'parent_id' => 10,
                ),
            109 =>
                array (
                    'id' => 1111,
                    'nombre' => 'Abdon Castro Tolay (Barrancas)',
                    'parent_id' => 11,
                ),
            110 =>
                array (
                    'id' => 1112,
                    'nombre' => 'Abra Pampa',
                    'parent_id' => 11,
                ),
            111 =>
                array (
                    'id' => 1113,
                    'nombre' => 'Abralaite',
                    'parent_id' => 11,
                ),
            112 =>
                array (
                    'id' => 1114,
                    'nombre' => 'Aguas Calientes',
                    'parent_id' => 11,
                ),
            113 =>
                array (
                    'id' => 1115,
                    'nombre' => 'Arrayanal',
                    'parent_id' => 11,
                ),
            114 =>
                array (
                    'id' => 1116,
                    'nombre' => 'Barrios',
                    'parent_id' => 11,
                ),
            115 =>
                array (
                    'id' => 1117,
                    'nombre' => 'Barro Negro',
                    'parent_id' => 11,
                ),
            116 =>
                array (
                    'id' => 1118,
                    'nombre' => 'Caimancito',
                    'parent_id' => 11,
                ),
            117 =>
                array (
                    'id' => 1119,
                    'nombre' => 'Calilegua',
                    'parent_id' => 11,
                ),
            118 =>
                array (
                    'id' => 1120,
                    'nombre' => 'Cangrejillos',
                    'parent_id' => 11,
                ),
            119 =>
                array (
                    'id' => 1121,
                    'nombre' => 'Caspalá',
                    'parent_id' => 11,
                ),
            120 =>
                array (
                    'id' => 1122,
                    'nombre' => 'Catua',
                    'parent_id' => 11,
                ),
            121 =>
                array (
                    'id' => 1123,
                    'nombre' => 'Cieneguillas',
                    'parent_id' => 11,
                ),
            122 =>
                array (
                    'id' => 1124,
                    'nombre' => 'Coranzuli',
                    'parent_id' => 11,
                ),
            123 =>
                array (
                    'id' => 1125,
                    'nombre' => 'Cusi Cusi',
                    'parent_id' => 11,
                ),
            124 =>
                array (
                    'id' => 1126,
                    'nombre' => 'El Aguilar',
                    'parent_id' => 11,
                ),
            125 =>
                array (
                    'id' => 1127,
                    'nombre' => 'El Carmen',
                    'parent_id' => 11,
                ),
            126 =>
                array (
                    'id' => 1128,
                    'nombre' => 'El Condor',
                    'parent_id' => 11,
                ),
            127 =>
                array (
                    'id' => 1129,
                    'nombre' => 'El Fuerte',
                    'parent_id' => 11,
                ),
            128 =>
                array (
                    'id' => 1130,
                    'nombre' => 'El Piquete',
                    'parent_id' => 11,
                ),
            129 =>
                array (
                    'id' => 1131,
                    'nombre' => 'El Talar',
                    'parent_id' => 11,
                ),
            130 =>
                array (
                    'id' => 1132,
                    'nombre' => 'Fraile Pintado',
                    'parent_id' => 11,
                ),
            131 =>
                array (
                    'id' => 1133,
                    'nombre' => 'Hipolito Yrigoyen',
                    'parent_id' => 11,
                ),
            132 =>
                array (
                    'id' => 1134,
                    'nombre' => 'Huacalera',
                    'parent_id' => 11,
                ),
            133 =>
                array (
                    'id' => 1135,
                    'nombre' => 'Humahuaca',
                    'parent_id' => 11,
                ),
            134 =>
                array (
                    'id' => 1136,
                    'nombre' => 'La Esperanza',
                    'parent_id' => 11,
                ),
            135 =>
                array (
                    'id' => 1137,
                    'nombre' => 'La Mendieta',
                    'parent_id' => 11,
                ),
            136 =>
                array (
                    'id' => 1138,
                    'nombre' => 'La Quiaca',
                    'parent_id' => 11,
                ),
            137 =>
                array (
                    'id' => 1139,
                    'nombre' => 'Libertador General San Martin',
                    'parent_id' => 11,
                ),
            138 =>
                array (
                    'id' => 1140,
                    'nombre' => 'Maimará',
                    'parent_id' => 11,
                ),
            139 =>
                array (
                    'id' => 1141,
                    'nombre' => 'Mina Pirquitas',
                    'parent_id' => 11,
                ),
            140 =>
                array (
                    'id' => 1142,
                    'nombre' => 'Monterrico',
                    'parent_id' => 11,
                ),
            141 =>
                array (
                    'id' => 1143,
                    'nombre' => 'Palma Sola',
                    'parent_id' => 11,
                ),
            142 =>
                array (
                    'id' => 1144,
                    'nombre' => 'Palpalá',
                    'parent_id' => 11,
                ),
            143 =>
                array (
                    'id' => 1145,
                    'nombre' => 'Pampa Blanca',
                    'parent_id' => 11,
                ),
            144 =>
                array (
                    'id' => 1146,
                    'nombre' => 'Pampichuela',
                    'parent_id' => 11,
                ),
            145 =>
                array (
                    'id' => 1147,
                    'nombre' => 'Perico',
                    'parent_id' => 11,
                ),
            146 =>
                array (
                    'id' => 1148,
                    'nombre' => 'Puesto Del Marquéz',
                    'parent_id' => 11,
                ),
            147 =>
                array (
                    'id' => 1149,
                    'nombre' => 'Puesto Viejo',
                    'parent_id' => 11,
                ),
            148 =>
                array (
                    'id' => 1150,
                    'nombre' => 'Pumahuasi',
                    'parent_id' => 11,
                ),
            149 =>
                array (
                    'id' => 1151,
                    'nombre' => 'Purmamarca',
                    'parent_id' => 11,
                ),
            150 =>
                array (
                    'id' => 1152,
                    'nombre' => 'Rinconada',
                    'parent_id' => 11,
                ),
            151 =>
                array (
                    'id' => 1153,
                    'nombre' => 'Rodeíto',
                    'parent_id' => 11,
                ),
            152 =>
                array (
                    'id' => 1154,
                    'nombre' => 'Rosario De Río Grande',
                    'parent_id' => 11,
                ),
            153 =>
                array (
                    'id' => 1155,
                    'nombre' => 'San Antonio',
                    'parent_id' => 11,
                ),
            154 =>
                array (
                    'id' => 1156,
                    'nombre' => 'San Francisco',
                    'parent_id' => 11,
                ),
            155 =>
                array (
                    'id' => 1157,
                    'nombre' => 'San Pedro De Jujuy',
                    'parent_id' => 11,
                ),
            156 =>
                array (
                    'id' => 1158,
                    'nombre' => 'San Salvador De Jujuy',
                    'parent_id' => 11,
                ),
            157 =>
                array (
                    'id' => 1159,
                    'nombre' => 'Santa Ana',
                    'parent_id' => 11,
                ),
            158 =>
                array (
                    'id' => 1160,
                    'nombre' => 'Santa Catalina',
                    'parent_id' => 11,
                ),
            159 =>
                array (
                    'id' => 1161,
                    'nombre' => 'Santa Clara',
                    'parent_id' => 11,
                ),
            160 =>
                array (
                    'id' => 1162,
                    'nombre' => 'Susques',
                    'parent_id' => 11,
                ),
            161 =>
                array (
                    'id' => 1163,
                    'nombre' => 'Tilcara',
                    'parent_id' => 11,
                ),
            162 =>
                array (
                    'id' => 1164,
                    'nombre' => 'Tres Cruces',
                    'parent_id' => 11,
                ),
            163 =>
                array (
                    'id' => 1165,
                    'nombre' => 'Tumbaya',
                    'parent_id' => 11,
                ),
            164 =>
                array (
                    'id' => 1166,
                    'nombre' => 'Valle Grande',
                    'parent_id' => 11,
                ),
            165 =>
                array (
                    'id' => 1167,
                    'nombre' => 'Vinalito',
                    'parent_id' => 11,
                ),
            166 =>
                array (
                    'id' => 1168,
                    'nombre' => 'Volcan',
                    'parent_id' => 11,
                ),
            167 =>
                array (
                    'id' => 1169,
                    'nombre' => 'Yala',
                    'parent_id' => 11,
                ),
            168 =>
                array (
                    'id' => 1170,
                    'nombre' => 'Yaví',
                    'parent_id' => 11,
                ),
            169 =>
                array (
                    'id' => 1171,
                    'nombre' => 'Yuto',
                    'parent_id' => 11,
                ),
            170 =>
                array (
                    'id' => 1172,
                    'nombre' => '25 De Mayo',
                    'parent_id' => 12,
                ),
            171 =>
                array (
                    'id' => 1173,
                    'nombre' => 'Abramo',
                    'parent_id' => 12,
                ),
            172 =>
                array (
                    'id' => 1174,
                    'nombre' => 'Adolfo Van Praet',
                    'parent_id' => 12,
                ),
            173 =>
                array (
                    'id' => 1175,
                    'nombre' => 'Agustoni',
                    'parent_id' => 12,
                ),
            174 =>
                array (
                    'id' => 1176,
                    'nombre' => 'Algarrobo Del Aguila',
                    'parent_id' => 12,
                ),
            175 =>
                array (
                    'id' => 1177,
                    'nombre' => 'Alpachiri',
                    'parent_id' => 12,
                ),
            176 =>
                array (
                    'id' => 1178,
                    'nombre' => 'Alta Italia',
                    'parent_id' => 12,
                ),
            177 =>
                array (
                    'id' => 1179,
                    'nombre' => 'Anguil',
                    'parent_id' => 12,
                ),
            178 =>
                array (
                    'id' => 1180,
                    'nombre' => 'Arata',
                    'parent_id' => 12,
                ),
            179 =>
                array (
                    'id' => 1181,
                    'nombre' => 'Ataliva Roca',
                    'parent_id' => 12,
                ),
            180 =>
                array (
                    'id' => 1182,
                    'nombre' => 'Bernardo Larroude',
                    'parent_id' => 12,
                ),
            181 =>
                array (
                    'id' => 1183,
                    'nombre' => 'Bernasconi',
                    'parent_id' => 12,
                ),
            182 =>
                array (
                    'id' => 1184,
                    'nombre' => 'Caleufu',
                    'parent_id' => 12,
                ),
            183 =>
                array (
                    'id' => 1185,
                    'nombre' => 'Carro Quemado',
                    'parent_id' => 12,
                ),
            184 =>
                array (
                    'id' => 1186,
                    'nombre' => 'Catrilo',
                    'parent_id' => 12,
                ),
            185 =>
                array (
                    'id' => 1187,
                    'nombre' => 'Ceballos',
                    'parent_id' => 12,
                ),
            186 =>
                array (
                    'id' => 1188,
                    'nombre' => 'Chacharramendi',
                    'parent_id' => 12,
                ),
            187 =>
                array (
                    'id' => 1189,
                    'nombre' => 'Colonia Baron',
                    'parent_id' => 12,
                ),
            188 =>
                array (
                    'id' => 1190,
                    'nombre' => 'Colonia Santa Maria',
                    'parent_id' => 12,
                ),
            189 =>
                array (
                    'id' => 1191,
                    'nombre' => 'Colonia Santa Teresa',
                    'parent_id' => 12,
                ),
            190 =>
                array (
                    'id' => 1192,
                    'nombre' => 'Conhelo',
                    'parent_id' => 12,
                ),
            191 =>
                array (
                    'id' => 1193,
                    'nombre' => 'Coronel Hilario Lagos',
                    'parent_id' => 12,
                ),
            192 =>
                array (
                    'id' => 1194,
                    'nombre' => 'Cuchillo Co',
                    'parent_id' => 12,
                ),
            193 =>
                array (
                    'id' => 1195,
                    'nombre' => 'Doblas',
                    'parent_id' => 12,
                ),
            194 =>
                array (
                    'id' => 1196,
                    'nombre' => 'Dorila',
                    'parent_id' => 12,
                ),
            195 =>
                array (
                    'id' => 1197,
                    'nombre' => 'Eduardo Castex',
                    'parent_id' => 12,
                ),
            196 =>
                array (
                    'id' => 1198,
                    'nombre' => 'Embajador Martini',
                    'parent_id' => 12,
                ),
            197 =>
                array (
                    'id' => 1199,
                    'nombre' => 'Falucho',
                    'parent_id' => 12,
                ),
            198 =>
                array (
                    'id' => 1200,
                    'nombre' => 'General Acha',
                    'parent_id' => 12,
                ),
            199 =>
                array (
                    'id' => 1201,
                    'nombre' => 'General Manuel Campos',
                    'parent_id' => 12,
                ),
            200 =>
                array (
                    'id' => 1202,
                    'nombre' => 'General Pico',
                    'parent_id' => 12,
                ),
            201 =>
                array (
                    'id' => 1203,
                    'nombre' => 'General San Martin',
                    'parent_id' => 12,
                ),
            202 =>
                array (
                    'id' => 1204,
                    'nombre' => 'Gobernador Duval',
                    'parent_id' => 12,
                ),
            203 =>
                array (
                    'id' => 1205,
                    'nombre' => 'Guatrache',
                    'parent_id' => 12,
                ),
            204 =>
                array (
                    'id' => 1206,
                    'nombre' => 'Ingeniero Luiggi',
                    'parent_id' => 12,
                ),
            205 =>
                array (
                    'id' => 1207,
                    'nombre' => 'Intendente Alvear',
                    'parent_id' => 12,
                ),
            206 =>
                array (
                    'id' => 1208,
                    'nombre' => 'Jacinto Arauz',
                    'parent_id' => 12,
                ),
            207 =>
                array (
                    'id' => 1209,
                    'nombre' => 'La Adela',
                    'parent_id' => 12,
                ),
            208 =>
                array (
                    'id' => 1210,
                    'nombre' => 'La Humada',
                    'parent_id' => 12,
                ),
            209 =>
                array (
                    'id' => 1211,
                    'nombre' => 'La Maruja',
                    'parent_id' => 12,
                ),
            210 =>
                array (
                    'id' => 1212,
                    'nombre' => 'La Reforma',
                    'parent_id' => 12,
                ),
            211 =>
                array (
                    'id' => 1213,
                    'nombre' => 'Limay Mahuida',
                    'parent_id' => 12,
                ),
            212 =>
                array (
                    'id' => 1214,
                    'nombre' => 'Lonquimay',
                    'parent_id' => 12,
                ),
            213 =>
                array (
                    'id' => 1215,
                    'nombre' => 'Loventue',
                    'parent_id' => 12,
                ),
            214 =>
                array (
                    'id' => 1216,
                    'nombre' => 'Luan Toro',
                    'parent_id' => 12,
                ),
            215 =>
                array (
                    'id' => 1217,
                    'nombre' => 'Macachin',
                    'parent_id' => 12,
                ),
            216 =>
                array (
                    'id' => 1218,
                    'nombre' => 'Maisonnave',
                    'parent_id' => 12,
                ),
            217 =>
                array (
                    'id' => 1219,
                    'nombre' => 'Mauricio Mayer',
                    'parent_id' => 12,
                ),
            218 =>
                array (
                    'id' => 1220,
                    'nombre' => 'Metileo',
                    'parent_id' => 12,
                ),
            219 =>
                array (
                    'id' => 1221,
                    'nombre' => 'Miguel Cane',
                    'parent_id' => 12,
                ),
            220 =>
                array (
                    'id' => 1222,
                    'nombre' => 'Miguel Riglos',
                    'parent_id' => 12,
                ),
            221 =>
                array (
                    'id' => 1223,
                    'nombre' => 'Monte Nievas',
                    'parent_id' => 12,
                ),
            222 =>
                array (
                    'id' => 1224,
                    'nombre' => 'Parera',
                    'parent_id' => 12,
                ),
            223 =>
                array (
                    'id' => 1225,
                    'nombre' => 'Peru',
                    'parent_id' => 12,
                ),
            224 =>
                array (
                    'id' => 1226,
                    'nombre' => 'Pichi Huinca',
                    'parent_id' => 12,
                ),
            225 =>
                array (
                    'id' => 1227,
                    'nombre' => 'Puelches',
                    'parent_id' => 12,
                ),
            226 =>
                array (
                    'id' => 1228,
                    'nombre' => 'Puelen',
                    'parent_id' => 12,
                ),
            227 =>
                array (
                    'id' => 1229,
                    'nombre' => 'Quehue',
                    'parent_id' => 12,
                ),
            228 =>
                array (
                    'id' => 1230,
                    'nombre' => 'Quemu Quemu',
                    'parent_id' => 12,
                ),
            229 =>
                array (
                    'id' => 1231,
                    'nombre' => 'Quetrequen',
                    'parent_id' => 12,
                ),
            230 =>
                array (
                    'id' => 1232,
                    'nombre' => 'Rancul',
                    'parent_id' => 12,
                ),
            231 =>
                array (
                    'id' => 1233,
                    'nombre' => 'Realico',
                    'parent_id' => 12,
                ),
            232 =>
                array (
                    'id' => 1234,
                    'nombre' => 'Relmo',
                    'parent_id' => 12,
                ),
            233 =>
                array (
                    'id' => 1235,
                    'nombre' => 'Rolon',
                    'parent_id' => 12,
                ),
            234 =>
                array (
                    'id' => 1236,
                    'nombre' => 'Rucanelo',
                    'parent_id' => 12,
                ),
            235 =>
                array (
                    'id' => 1237,
                    'nombre' => 'Santa Isabel',
                    'parent_id' => 12,
                ),
            236 =>
                array (
                    'id' => 1238,
                    'nombre' => 'Santa Rosa',
                    'parent_id' => 12,
                ),
            237 =>
                array (
                    'id' => 1239,
                    'nombre' => 'Sarah',
                    'parent_id' => 12,
                ),
            238 =>
                array (
                    'id' => 1240,
                    'nombre' => 'Speluzzi',
                    'parent_id' => 12,
                ),
            239 =>
                array (
                    'id' => 1241,
                    'nombre' => 'Telen',
                    'parent_id' => 12,
                ),
            240 =>
                array (
                    'id' => 1242,
                    'nombre' => 'Toay',
                    'parent_id' => 12,
                ),
            241 =>
                array (
                    'id' => 1243,
                    'nombre' => 'Tomas Manuel Anchorena',
                    'parent_id' => 12,
                ),
            242 =>
                array (
                    'id' => 1244,
                    'nombre' => 'Trenel',
                    'parent_id' => 12,
                ),
            243 =>
                array (
                    'id' => 1245,
                    'nombre' => 'Unanue',
                    'parent_id' => 12,
                ),
            244 =>
                array (
                    'id' => 1246,
                    'nombre' => 'Uriburu',
                    'parent_id' => 12,
                ),
            245 =>
                array (
                    'id' => 1247,
                    'nombre' => 'Vertiz',
                    'parent_id' => 12,
                ),
            246 =>
                array (
                    'id' => 1248,
                    'nombre' => 'Victorica',
                    'parent_id' => 12,
                ),
            247 =>
                array (
                    'id' => 1249,
                    'nombre' => 'Villa Mirasol',
                    'parent_id' => 12,
                ),
            248 =>
                array (
                    'id' => 1250,
                    'nombre' => 'Winifreda',
                    'parent_id' => 12,
                ),
            249 =>
                array (
                    'id' => 1251,
                    'nombre' => 'Arauco',
                    'parent_id' => 13,
                ),
            250 =>
                array (
                    'id' => 1252,
                    'nombre' => 'Castro Barros',
                    'parent_id' => 13,
                ),
            251 =>
                array (
                    'id' => 1253,
                    'nombre' => 'Chamical',
                    'parent_id' => 13,
                ),
            252 =>
                array (
                    'id' => 1254,
                    'nombre' => 'Chilecito',
                    'parent_id' => 13,
                ),
            253 =>
                array (
                    'id' => 1255,
                    'nombre' => 'Coronel Felipe Varela',
                    'parent_id' => 13,
                ),
            254 =>
                array (
                    'id' => 1256,
                    'nombre' => 'Famatina',
                    'parent_id' => 13,
                ),
            255 =>
                array (
                    'id' => 1257,
                    'nombre' => 'General Angel Vicente Peñaloza',
                    'parent_id' => 13,
                ),
            256 =>
                array (
                    'id' => 1258,
                    'nombre' => 'General Belgrano',
                    'parent_id' => 13,
                ),
            257 =>
                array (
                    'id' => 1259,
                    'nombre' => 'General Juan Facundo Quiroga',
                    'parent_id' => 13,
                ),
            258 =>
                array (
                    'id' => 1260,
                    'nombre' => 'General Lamadrid',
                    'parent_id' => 13,
                ),
            259 =>
                array (
                    'id' => 1261,
                    'nombre' => 'General Ocampo',
                    'parent_id' => 13,
                ),
            260 =>
                array (
                    'id' => 1262,
                    'nombre' => 'General San Martín',
                    'parent_id' => 13,
                ),
            261 =>
                array (
                    'id' => 1263,
                    'nombre' => 'Independencia',
                    'parent_id' => 13,
                ),
            262 =>
                array (
                    'id' => 1264,
                    'nombre' => 'La Rioja',
                    'parent_id' => 13,
                ),
            263 =>
                array (
                    'id' => 1265,
                    'nombre' => 'Rosario Vera Peñaloza',
                    'parent_id' => 13,
                ),
            264 =>
                array (
                    'id' => 1266,
                    'nombre' => 'San Blas De Los Sauces',
                    'parent_id' => 13,
                ),
            265 =>
                array (
                    'id' => 1267,
                    'nombre' => 'Sanagasta',
                    'parent_id' => 13,
                ),
            266 =>
                array (
                    'id' => 1268,
                    'nombre' => 'Vinchina',
                    'parent_id' => 13,
                ),
            267 =>
                array (
                    'id' => 1269,
                    'nombre' => 'General Alvear',
                    'parent_id' => 14,
                ),
            268 =>
                array (
                    'id' => 1270,
                    'nombre' => 'Godoy Cruz',
                    'parent_id' => 14,
                ),
            269 =>
                array (
                    'id' => 1271,
                    'nombre' => 'Guaymallen',
                    'parent_id' => 14,
                ),
            270 =>
                array (
                    'id' => 1272,
                    'nombre' => 'Junin',
                    'parent_id' => 14,
                ),
            271 =>
                array (
                    'id' => 1273,
                    'nombre' => 'La Paz',
                    'parent_id' => 14,
                ),
            272 =>
                array (
                    'id' => 1274,
                    'nombre' => 'Las Heras',
                    'parent_id' => 14,
                ),
            273 =>
                array (
                    'id' => 1275,
                    'nombre' => 'Lavalle',
                    'parent_id' => 14,
                ),
            274 =>
                array (
                    'id' => 1276,
                    'nombre' => 'Lujan De Cuyo',
                    'parent_id' => 14,
                ),
            275 =>
                array (
                    'id' => 1277,
                    'nombre' => 'Maipu',
                    'parent_id' => 14,
                ),
            276 =>
                array (
                    'id' => 1278,
                    'nombre' => 'Malargue',
                    'parent_id' => 14,
                ),
            277 =>
                array (
                    'id' => 1279,
                    'nombre' => 'Mendoza',
                    'parent_id' => 14,
                ),
            278 =>
                array (
                    'id' => 1280,
                    'nombre' => 'Rivadavia',
                    'parent_id' => 14,
                ),
            279 =>
                array (
                    'id' => 1281,
                    'nombre' => 'San Carlos',
                    'parent_id' => 14,
                ),
            280 =>
                array (
                    'id' => 1282,
                    'nombre' => 'San Martin',
                    'parent_id' => 14,
                ),
            281 =>
                array (
                    'id' => 1283,
                    'nombre' => 'San Rafael',
                    'parent_id' => 14,
                ),
            282 =>
                array (
                    'id' => 1284,
                    'nombre' => 'Santa Rosa',
                    'parent_id' => 14,
                ),
            283 =>
                array (
                    'id' => 1285,
                    'nombre' => 'Tunuyan',
                    'parent_id' => 14,
                ),
            284 =>
                array (
                    'id' => 1286,
                    'nombre' => 'Tupungato',
                    'parent_id' => 14,
                ),
            285 =>
                array (
                    'id' => 1287,
                    'nombre' => '25 De Mayo',
                    'parent_id' => 15,
                ),
            286 =>
                array (
                    'id' => 1288,
                    'nombre' => 'Alba Posse',
                    'parent_id' => 15,
                ),
            287 =>
                array (
                    'id' => 1289,
                    'nombre' => 'Almafuerte',
                    'parent_id' => 15,
                ),
            288 =>
                array (
                    'id' => 1290,
                    'nombre' => 'Apostoles',
                    'parent_id' => 15,
                ),
            289 =>
                array (
                    'id' => 1291,
                    'nombre' => 'Aristobulo Del Valle',
                    'parent_id' => 15,
                ),
            290 =>
                array (
                    'id' => 1292,
                    'nombre' => 'Arroyo Del Medio',
                    'parent_id' => 15,
                ),
            291 =>
                array (
                    'id' => 1293,
                    'nombre' => 'Azara',
                    'parent_id' => 15,
                ),
            292 =>
                array (
                    'id' => 1294,
                    'nombre' => 'Bernardo De Irigoyen',
                    'parent_id' => 15,
                ),
            293 =>
                array (
                    'id' => 1295,
                    'nombre' => 'Bompland',
                    'parent_id' => 15,
                ),
            294 =>
                array (
                    'id' => 1296,
                    'nombre' => 'Caa Yari',
                    'parent_id' => 15,
                ),
            295 =>
                array (
                    'id' => 1297,
                    'nombre' => 'Campo Grande',
                    'parent_id' => 15,
                ),
            296 =>
                array (
                    'id' => 1298,
                    'nombre' => 'Campo Ramon',
                    'parent_id' => 15,
                ),
            297 =>
                array (
                    'id' => 1299,
                    'nombre' => 'Campo Viera',
                    'parent_id' => 15,
                ),
            298 =>
                array (
                    'id' => 1300,
                    'nombre' => 'Candelaria',
                    'parent_id' => 15,
                ),
            299 =>
                array (
                    'id' => 1301,
                    'nombre' => 'Capiovi',
                    'parent_id' => 15,
                ),
            300 =>
                array (
                    'id' => 1302,
                    'nombre' => 'Caraguatay',
                    'parent_id' => 15,
                ),
            301 =>
                array (
                    'id' => 1303,
                    'nombre' => 'Cerro Azul',
                    'parent_id' => 15,
                ),
            302 =>
                array (
                    'id' => 1304,
                    'nombre' => 'Cerro Cora',
                    'parent_id' => 15,
                ),
            303 =>
                array (
                    'id' => 1305,
                    'nombre' => 'Colonia Alberdi',
                    'parent_id' => 15,
                ),
            304 =>
                array (
                    'id' => 1306,
                    'nombre' => 'Colonia Aurora',
                    'parent_id' => 15,
                ),
            305 =>
                array (
                    'id' => 1307,
                    'nombre' => 'Colonia Delicia',
                    'parent_id' => 15,
                ),
            306 =>
                array (
                    'id' => 1308,
                    'nombre' => 'Colonia Polana',
                    'parent_id' => 15,
                ),
            307 =>
                array (
                    'id' => 1309,
                    'nombre' => 'Colonia Victoria',
                    'parent_id' => 15,
                ),
            308 =>
                array (
                    'id' => 1310,
                    'nombre' => 'Colonia Wanda',
                    'parent_id' => 15,
                ),
            309 =>
                array (
                    'id' => 1311,
                    'nombre' => 'Comandante Andrés Guacurari',
                    'parent_id' => 15,
                ),
            310 =>
                array (
                    'id' => 1312,
                    'nombre' => 'Concepción De La Sierra',
                    'parent_id' => 15,
                ),
            311 =>
                array (
                    'id' => 1313,
                    'nombre' => 'Corpus',
                    'parent_id' => 15,
                ),
            312 =>
                array (
                    'id' => 1314,
                    'nombre' => 'Dos Arroyos',
                    'parent_id' => 15,
                ),
            313 =>
                array (
                    'id' => 1315,
                    'nombre' => 'Dos De Mayo',
                    'parent_id' => 15,
                ),
            314 =>
                array (
                    'id' => 1316,
                    'nombre' => 'El Alcazar',
                    'parent_id' => 15,
                ),
            315 =>
                array (
                    'id' => 1317,
                    'nombre' => 'El Soberbio',
                    'parent_id' => 15,
                ),
            316 =>
                array (
                    'id' => 1318,
                    'nombre' => 'Eldorado',
                    'parent_id' => 15,
                ),
            317 =>
                array (
                    'id' => 1319,
                    'nombre' => 'Fachinal',
                    'parent_id' => 15,
                ),
            318 =>
                array (
                    'id' => 1320,
                    'nombre' => 'Florentino Ameghino',
                    'parent_id' => 15,
                ),
            319 =>
                array (
                    'id' => 1321,
                    'nombre' => 'Garuhape',
                    'parent_id' => 15,
                ),
            320 =>
                array (
                    'id' => 1322,
                    'nombre' => 'Garupa',
                    'parent_id' => 15,
                ),
            321 =>
                array (
                    'id' => 1323,
                    'nombre' => 'General Alvear',
                    'parent_id' => 15,
                ),
            322 =>
                array (
                    'id' => 1324,
                    'nombre' => 'General Manuel Belgrano',
                    'parent_id' => 15,
                ),
            323 =>
                array (
                    'id' => 1325,
                    'nombre' => 'General Urquiza',
                    'parent_id' => 15,
                ),
            324 =>
                array (
                    'id' => 1326,
                    'nombre' => 'Gobernador Lopez',
                    'parent_id' => 15,
                ),
            325 =>
                array (
                    'id' => 1327,
                    'nombre' => 'Gobernador Roca',
                    'parent_id' => 15,
                ),
            326 =>
                array (
                    'id' => 1328,
                    'nombre' => 'Guarani',
                    'parent_id' => 15,
                ),
            327 =>
                array (
                    'id' => 1329,
                    'nombre' => 'Hipolito Irigoyen',
                    'parent_id' => 15,
                ),
            328 =>
                array (
                    'id' => 1330,
                    'nombre' => 'Itacaruare',
                    'parent_id' => 15,
                ),
            329 =>
                array (
                    'id' => 1331,
                    'nombre' => 'Jardin America',
                    'parent_id' => 15,
                ),
            330 =>
                array (
                    'id' => 1332,
                    'nombre' => 'Leandro Nicéforo Alem',
                    'parent_id' => 15,
                ),
            331 =>
                array (
                    'id' => 1333,
                    'nombre' => 'Loreto',
                    'parent_id' => 15,
                ),
            332 =>
                array (
                    'id' => 1334,
                    'nombre' => 'Los Helechos',
                    'parent_id' => 15,
                ),
            333 =>
                array (
                    'id' => 1335,
                    'nombre' => 'Martires',
                    'parent_id' => 15,
                ),
            334 =>
                array (
                    'id' => 1336,
                    'nombre' => 'Mojon Grande',
                    'parent_id' => 15,
                ),
            335 =>
                array (
                    'id' => 1337,
                    'nombre' => 'Montecarlo',
                    'parent_id' => 15,
                ),
            336 =>
                array (
                    'id' => 1338,
                    'nombre' => 'Nueve De Julio',
                    'parent_id' => 15,
                ),
            337 =>
                array (
                    'id' => 1339,
                    'nombre' => 'Obera',
                    'parent_id' => 15,
                ),
            338 =>
                array (
                    'id' => 1340,
                    'nombre' => 'Olegario Víctor Andrade',
                    'parent_id' => 15,
                ),
            339 =>
                array (
                    'id' => 1341,
                    'nombre' => 'Panambi',
                    'parent_id' => 15,
                ),
            340 =>
                array (
                    'id' => 1342,
                    'nombre' => 'Posadas',
                    'parent_id' => 15,
                ),
            341 =>
                array (
                    'id' => 1343,
                    'nombre' => 'Profundidad',
                    'parent_id' => 15,
                ),
            342 =>
                array (
                    'id' => 1344,
                    'nombre' => 'Puerto Esperanza',
                    'parent_id' => 15,
                ),
            343 =>
                array (
                    'id' => 1345,
                    'nombre' => 'Puerto Iguazu',
                    'parent_id' => 15,
                ),
            344 =>
                array (
                    'id' => 1346,
                    'nombre' => 'Puerto Leoni',
                    'parent_id' => 15,
                ),
            345 =>
                array (
                    'id' => 1347,
                    'nombre' => 'Puerto Libertad',
                    'parent_id' => 15,
                ),
            346 =>
                array (
                    'id' => 1348,
                    'nombre' => 'Puerto Piray',
                    'parent_id' => 15,
                ),
            347 =>
                array (
                    'id' => 1349,
                    'nombre' => 'Puerto Rico',
                    'parent_id' => 15,
                ),
            348 =>
                array (
                    'id' => 1350,
                    'nombre' => 'Ruiz De Montoya',
                    'parent_id' => 15,
                ),
            349 =>
                array (
                    'id' => 1351,
                    'nombre' => 'San Antonio',
                    'parent_id' => 15,
                ),
            350 =>
                array (
                    'id' => 1352,
                    'nombre' => 'San Ignacio',
                    'parent_id' => 15,
                ),
            351 =>
                array (
                    'id' => 1353,
                    'nombre' => 'San Javier',
                    'parent_id' => 15,
                ),
            352 =>
                array (
                    'id' => 1354,
                    'nombre' => 'San Jose',
                    'parent_id' => 15,
                ),
            353 =>
                array (
                    'id' => 1355,
                    'nombre' => 'San Martin',
                    'parent_id' => 15,
                ),
            354 =>
                array (
                    'id' => 1356,
                    'nombre' => 'San Pedro',
                    'parent_id' => 15,
                ),
            355 =>
                array (
                    'id' => 1357,
                    'nombre' => 'San Vicente',
                    'parent_id' => 15,
                ),
            356 =>
                array (
                    'id' => 1358,
                    'nombre' => 'Santa Ana',
                    'parent_id' => 15,
                ),
            357 =>
                array (
                    'id' => 1359,
                    'nombre' => 'Santa Maria',
                    'parent_id' => 15,
                ),
            358 =>
                array (
                    'id' => 1360,
                    'nombre' => 'Santiago De Liniers',
                    'parent_id' => 15,
                ),
            359 =>
                array (
                    'id' => 1361,
                    'nombre' => 'Santo Pipo',
                    'parent_id' => 15,
                ),
            360 =>
                array (
                    'id' => 1362,
                    'nombre' => 'Tres Capones',
                    'parent_id' => 15,
                ),
            361 =>
                array (
                    'id' => 1363,
                    'nombre' => 'Aguada San Roque',
                    'parent_id' => 16,
                ),
            362 =>
                array (
                    'id' => 1364,
                    'nombre' => 'Alumine',
                    'parent_id' => 16,
                ),
            363 =>
                array (
                    'id' => 1365,
                    'nombre' => 'Andacollo',
                    'parent_id' => 16,
                ),
            364 =>
                array (
                    'id' => 1366,
                    'nombre' => 'Añelo',
                    'parent_id' => 16,
                ),
            365 =>
                array (
                    'id' => 1367,
                    'nombre' => 'Bajada Del Agrio',
                    'parent_id' => 16,
                ),
            366 =>
                array (
                    'id' => 1368,
                    'nombre' => 'Barrancas',
                    'parent_id' => 16,
                ),
            367 =>
                array (
                    'id' => 1369,
                    'nombre' => 'Buta Ranquil',
                    'parent_id' => 16,
                ),
            368 =>
                array (
                    'id' => 1370,
                    'nombre' => 'Caviahue',
                    'parent_id' => 16,
                ),
            369 =>
                array (
                    'id' => 1371,
                    'nombre' => 'Centenario',
                    'parent_id' => 16,
                ),
            370 =>
                array (
                    'id' => 1372,
                    'nombre' => 'Chorriaca',
                    'parent_id' => 16,
                ),
            371 =>
                array (
                    'id' => 1373,
                    'nombre' => 'Chos Malal',
                    'parent_id' => 16,
                ),
            372 =>
                array (
                    'id' => 1374,
                    'nombre' => 'Covunco Abajo',
                    'parent_id' => 16,
                ),
            373 =>
                array (
                    'id' => 1375,
                    'nombre' => 'Coyuco - Cochico',
                    'parent_id' => 16,
                ),
            374 =>
                array (
                    'id' => 1376,
                    'nombre' => 'Cutral Co',
                    'parent_id' => 16,
                ),
            375 =>
                array (
                    'id' => 1377,
                    'nombre' => 'El Cholar',
                    'parent_id' => 16,
                ),
            376 =>
                array (
                    'id' => 1378,
                    'nombre' => 'El Huecu',
                    'parent_id' => 16,
                ),
            377 =>
                array (
                    'id' => 1379,
                    'nombre' => 'El Sauce',
                    'parent_id' => 16,
                ),
            378 =>
                array (
                    'id' => 1380,
                    'nombre' => 'Guañacos',
                    'parent_id' => 16,
                ),
            379 =>
                array (
                    'id' => 1381,
                    'nombre' => 'Huinganco',
                    'parent_id' => 16,
                ),
            380 =>
                array (
                    'id' => 1382,
                    'nombre' => 'Junin De Los Andes',
                    'parent_id' => 16,
                ),
            381 =>
                array (
                    'id' => 1383,
                    'nombre' => 'Las Coloradas',
                    'parent_id' => 16,
                ),
            382 =>
                array (
                    'id' => 1384,
                    'nombre' => 'Las Lajas',
                    'parent_id' => 16,
                ),
            383 =>
                array (
                    'id' => 1385,
                    'nombre' => 'Las Ovejas',
                    'parent_id' => 16,
                ),
            384 =>
                array (
                    'id' => 1386,
                    'nombre' => 'Loncopue',
                    'parent_id' => 16,
                ),
            385 =>
                array (
                    'id' => 1387,
                    'nombre' => 'Los Catutos',
                    'parent_id' => 16,
                ),
            386 =>
                array (
                    'id' => 1388,
                    'nombre' => 'Los Chihuidos',
                    'parent_id' => 16,
                ),
            387 =>
                array (
                    'id' => 1389,
                    'nombre' => 'Los Miches',
                    'parent_id' => 16,
                ),
            388 =>
                array (
                    'id' => 1390,
                    'nombre' => 'Mariano Moreno',
                    'parent_id' => 16,
                ),
            389 =>
                array (
                    'id' => 1391,
                    'nombre' => 'Neuquen',
                    'parent_id' => 16,
                ),
            390 =>
                array (
                    'id' => 1392,
                    'nombre' => 'Octavio Pico',
                    'parent_id' => 16,
                ),
            391 =>
                array (
                    'id' => 1393,
                    'nombre' => 'Paso Aguerre',
                    'parent_id' => 16,
                ),
            392 =>
                array (
                    'id' => 1394,
                    'nombre' => 'Picun Leufu',
                    'parent_id' => 16,
                ),
            393 =>
                array (
                    'id' => 1395,
                    'nombre' => 'Piedra Del Aguila',
                    'parent_id' => 16,
                ),
            394 =>
                array (
                    'id' => 1396,
                    'nombre' => 'Pilo Lil',
                    'parent_id' => 16,
                ),
            395 =>
                array (
                    'id' => 1397,
                    'nombre' => 'Plaza Huincul',
                    'parent_id' => 16,
                ),
            396 =>
                array (
                    'id' => 1398,
                    'nombre' => 'Plotier',
                    'parent_id' => 16,
                ),
            397 =>
                array (
                    'id' => 1399,
                    'nombre' => 'Puente Picun Leufu',
                    'parent_id' => 16,
                ),
            398 =>
                array (
                    'id' => 1400,
                    'nombre' => 'Quili Malal',
                    'parent_id' => 16,
                ),
            399 =>
                array (
                    'id' => 1401,
                    'nombre' => 'Ramón M. Castro',
                    'parent_id' => 16,
                ),
            400 =>
                array (
                    'id' => 1402,
                    'nombre' => 'Rincon De Los Sauces',
                    'parent_id' => 16,
                ),
            401 =>
                array (
                    'id' => 1403,
                    'nombre' => 'San Martin De Los Andes',
                    'parent_id' => 16,
                ),
            402 =>
                array (
                    'id' => 1404,
                    'nombre' => 'San Patricio Del Chañar',
                    'parent_id' => 16,
                ),
            403 =>
                array (
                    'id' => 1405,
                    'nombre' => 'Santo Tomas',
                    'parent_id' => 16,
                ),
            404 =>
                array (
                    'id' => 1406,
                    'nombre' => 'Sauzal Bonito (Cutralco)',
                    'parent_id' => 16,
                ),
            405 =>
                array (
                    'id' => 1407,
                    'nombre' => 'Senillosa',
                    'parent_id' => 16,
                ),
            406 =>
                array (
                    'id' => 1408,
                    'nombre' => 'Taquimilan',
                    'parent_id' => 16,
                ),
            407 =>
                array (
                    'id' => 1409,
                    'nombre' => 'Tricao Malal',
                    'parent_id' => 16,
                ),
            408 =>
                array (
                    'id' => 1410,
                    'nombre' => 'Varvarco',
                    'parent_id' => 16,
                ),
            409 =>
                array (
                    'id' => 1411,
                    'nombre' => 'Villa Curi Leuvu',
                    'parent_id' => 16,
                ),
            410 =>
                array (
                    'id' => 1412,
                    'nombre' => 'Villa Del Nahueve',
                    'parent_id' => 16,
                ),
            411 =>
                array (
                    'id' => 1413,
                    'nombre' => 'Villa El Chocon',
                    'parent_id' => 16,
                ),
            412 =>
                array (
                    'id' => 1414,
                    'nombre' => 'Villa La Angostura',
                    'parent_id' => 16,
                ),
            413 =>
                array (
                    'id' => 1415,
                    'nombre' => 'Villa Manzano Amargo',
                    'parent_id' => 16,
                ),
            414 =>
                array (
                    'id' => 1416,
                    'nombre' => 'Villa Pehuenia',
                    'parent_id' => 16,
                ),
            415 =>
                array (
                    'id' => 1417,
                    'nombre' => 'Villa Traful',
                    'parent_id' => 16,
                ),
            416 =>
                array (
                    'id' => 1418,
                    'nombre' => 'Vista Alegre',
                    'parent_id' => 16,
                ),
            417 =>
                array (
                    'id' => 1419,
                    'nombre' => 'Zapala',
                    'parent_id' => 16,
                ),
            418 =>
                array (
                    'id' => 1420,
                    'nombre' => 'Aguada Cecilio',
                    'parent_id' => 17,
                ),
            419 =>
                array (
                    'id' => 1421,
                    'nombre' => 'Aguada De Guerra',
                    'parent_id' => 17,
                ),
            420 =>
                array (
                    'id' => 1422,
                    'nombre' => 'Aguada Guzmán',
                    'parent_id' => 17,
                ),
            421 =>
                array (
                    'id' => 1423,
                    'nombre' => 'Allen',
                    'parent_id' => 17,
                ),
            422 =>
                array (
                    'id' => 1424,
                    'nombre' => 'Arroyo De La Ventana',
                    'parent_id' => 17,
                ),
            423 =>
                array (
                    'id' => 1425,
                    'nombre' => 'Arroyo Los Berros',
                    'parent_id' => 17,
                ),
            424 =>
                array (
                    'id' => 1426,
                    'nombre' => 'Campo Grande',
                    'parent_id' => 17,
                ),
            425 =>
                array (
                    'id' => 1427,
                    'nombre' => 'Catriel',
                    'parent_id' => 17,
                ),
            426 =>
                array (
                    'id' => 1428,
                    'nombre' => 'Cerro Policia',
                    'parent_id' => 17,
                ),
            427 =>
                array (
                    'id' => 1429,
                    'nombre' => 'Cervantes',
                    'parent_id' => 17,
                ),
            428 =>
                array (
                    'id' => 1430,
                    'nombre' => 'Chelforo',
                    'parent_id' => 17,
                ),
            429 =>
                array (
                    'id' => 1431,
                    'nombre' => 'Chichinales',
                    'parent_id' => 17,
                ),
            430 =>
                array (
                    'id' => 1432,
                    'nombre' => 'Chimpay',
                    'parent_id' => 17,
                ),
            431 =>
                array (
                    'id' => 1433,
                    'nombre' => 'Chipauquil',
                    'parent_id' => 17,
                ),
            432 =>
                array (
                    'id' => 1434,
                    'nombre' => 'Choele Choel',
                    'parent_id' => 17,
                ),
            433 =>
                array (
                    'id' => 1435,
                    'nombre' => 'Cinco Saltos',
                    'parent_id' => 17,
                ),
            434 =>
                array (
                    'id' => 1436,
                    'nombre' => 'Cipolletti',
                    'parent_id' => 17,
                ),
            435 =>
                array (
                    'id' => 1437,
                    'nombre' => 'Clemente Onelli',
                    'parent_id' => 17,
                ),
            436 =>
                array (
                    'id' => 1438,
                    'nombre' => 'Colán Conhue',
                    'parent_id' => 17,
                ),
            437 =>
                array (
                    'id' => 1439,
                    'nombre' => 'Comallo',
                    'parent_id' => 17,
                ),
            438 =>
                array (
                    'id' => 1440,
                    'nombre' => 'Comicó',
                    'parent_id' => 17,
                ),
            439 =>
                array (
                    'id' => 1441,
                    'nombre' => 'Cona Niyeu',
                    'parent_id' => 17,
                ),
            440 =>
                array (
                    'id' => 1442,
                    'nombre' => 'Contralmirante Cordero',
                    'parent_id' => 17,
                ),
            441 =>
                array (
                    'id' => 1443,
                    'nombre' => 'Coronel Belisle',
                    'parent_id' => 17,
                ),
            442 =>
                array (
                    'id' => 1444,
                    'nombre' => 'Cubanea',
                    'parent_id' => 17,
                ),
            443 =>
                array (
                    'id' => 1445,
                    'nombre' => 'Darwin',
                    'parent_id' => 17,
                ),
            444 =>
                array (
                    'id' => 1446,
                    'nombre' => 'Dina Huapi',
                    'parent_id' => 17,
                ),
            445 =>
                array (
                    'id' => 1447,
                    'nombre' => 'El Bolson',
                    'parent_id' => 17,
                ),
            446 =>
                array (
                    'id' => 1448,
                    'nombre' => 'El Caín',
                    'parent_id' => 17,
                ),
            447 =>
                array (
                    'id' => 1449,
                    'nombre' => 'El Cuy',
                    'parent_id' => 17,
                ),
            448 =>
                array (
                    'id' => 1450,
                    'nombre' => 'El Manso',
                    'parent_id' => 17,
                ),
            449 =>
                array (
                    'id' => 1451,
                    'nombre' => 'General Conesa',
                    'parent_id' => 17,
                ),
            450 =>
                array (
                    'id' => 1452,
                    'nombre' => 'General Enrique Godoy',
                    'parent_id' => 17,
                ),
            451 =>
                array (
                    'id' => 1453,
                    'nombre' => 'General Fernandez Oro',
                    'parent_id' => 17,
                ),
            452 =>
                array (
                    'id' => 1454,
                    'nombre' => 'General Roca',
                    'parent_id' => 17,
                ),
            453 =>
                array (
                    'id' => 1455,
                    'nombre' => 'Guardia Mitre',
                    'parent_id' => 17,
                ),
            454 =>
                array (
                    'id' => 1456,
                    'nombre' => 'Ingeniero Huergo',
                    'parent_id' => 17,
                ),
            455 =>
                array (
                    'id' => 1457,
                    'nombre' => 'Ingeniero Jacobacci',
                    'parent_id' => 17,
                ),
            456 =>
                array (
                    'id' => 1458,
                    'nombre' => 'Laguna Blanca',
                    'parent_id' => 17,
                ),
            457 =>
                array (
                    'id' => 1459,
                    'nombre' => 'Lamarque',
                    'parent_id' => 17,
                ),
            458 =>
                array (
                    'id' => 1460,
                    'nombre' => 'Los Menucos',
                    'parent_id' => 17,
                ),
            459 =>
                array (
                    'id' => 1461,
                    'nombre' => 'Luis Beltran',
                    'parent_id' => 17,
                ),
            460 =>
                array (
                    'id' => 1462,
                    'nombre' => 'Mainque',
                    'parent_id' => 17,
                ),
            461 =>
                array (
                    'id' => 1463,
                    'nombre' => 'Mamuel Choique',
                    'parent_id' => 17,
                ),
            462 =>
                array (
                    'id' => 1464,
                    'nombre' => 'Maquinchao',
                    'parent_id' => 17,
                ),
            463 =>
                array (
                    'id' => 1465,
                    'nombre' => 'Mencué',
                    'parent_id' => 17,
                ),
            464 =>
                array (
                    'id' => 1466,
                    'nombre' => 'Ministro Ramos Mexia',
                    'parent_id' => 17,
                ),
            465 =>
                array (
                    'id' => 1467,
                    'nombre' => 'Nahuel Niyeu',
                    'parent_id' => 17,
                ),
            466 =>
                array (
                    'id' => 1468,
                    'nombre' => 'Naupa Huen',
                    'parent_id' => 17,
                ),
            467 =>
                array (
                    'id' => 1469,
                    'nombre' => 'Ñorquinco',
                    'parent_id' => 17,
                ),
            468 =>
                array (
                    'id' => 1470,
                    'nombre' => 'Ojos De Agua',
                    'parent_id' => 17,
                ),
            469 =>
                array (
                    'id' => 1471,
                    'nombre' => 'Paso Flores',
                    'parent_id' => 17,
                ),
            470 =>
                array (
                    'id' => 1472,
                    'nombre' => 'Peñas Blancas',
                    'parent_id' => 17,
                ),
            471 =>
                array (
                    'id' => 1473,
                    'nombre' => 'Pichi Mahuida',
                    'parent_id' => 17,
                ),
            472 =>
                array (
                    'id' => 1474,
                    'nombre' => 'Pilcaniyeu',
                    'parent_id' => 17,
                ),
            473 =>
                array (
                    'id' => 1475,
                    'nombre' => 'Pilquiniyeu',
                    'parent_id' => 17,
                ),
            474 =>
                array (
                    'id' => 1476,
                    'nombre' => 'Pilquiniyeu Del Limay',
                    'parent_id' => 17,
                ),
            475 =>
                array (
                    'id' => 1477,
                    'nombre' => 'Pomona',
                    'parent_id' => 17,
                ),
            476 =>
                array (
                    'id' => 1478,
                    'nombre' => 'Prahuaniyeu',
                    'parent_id' => 17,
                ),
            477 =>
                array (
                    'id' => 1479,
                    'nombre' => 'Rincón Treneta',
                    'parent_id' => 17,
                ),
            478 =>
                array (
                    'id' => 1480,
                    'nombre' => 'Río Chico',
                    'parent_id' => 17,
                ),
            479 =>
                array (
                    'id' => 1481,
                    'nombre' => 'Rio Colorado',
                    'parent_id' => 17,
                ),
            480 =>
                array (
                    'id' => 1482,
                    'nombre' => 'San Antonio Oeste',
                    'parent_id' => 17,
                ),
            481 =>
                array (
                    'id' => 1483,
                    'nombre' => 'San Carlos De Bariloche',
                    'parent_id' => 17,
                ),
            482 =>
                array (
                    'id' => 1484,
                    'nombre' => 'San Javier',
                    'parent_id' => 17,
                ),
            483 =>
                array (
                    'id' => 1485,
                    'nombre' => 'Sierra Colorada',
                    'parent_id' => 17,
                ),
            484 =>
                array (
                    'id' => 1486,
                    'nombre' => 'Sierra Grande',
                    'parent_id' => 17,
                ),
            485 =>
                array (
                    'id' => 1487,
                    'nombre' => 'Sierra Pailemán',
                    'parent_id' => 17,
                ),
            486 =>
                array (
                    'id' => 1488,
                    'nombre' => 'Valcheta',
                    'parent_id' => 17,
                ),
            487 =>
                array (
                    'id' => 1489,
                    'nombre' => 'Valle Azul',
                    'parent_id' => 17,
                ),
            488 =>
                array (
                    'id' => 1490,
                    'nombre' => 'Viedma',
                    'parent_id' => 17,
                ),
            489 =>
                array (
                    'id' => 1491,
                    'nombre' => 'Villa Llanquín',
                    'parent_id' => 17,
                ),
            490 =>
                array (
                    'id' => 1492,
                    'nombre' => 'Villa Mascardi',
                    'parent_id' => 17,
                ),
            491 =>
                array (
                    'id' => 1493,
                    'nombre' => 'Villa Regina',
                    'parent_id' => 17,
                ),
            492 =>
                array (
                    'id' => 1494,
                    'nombre' => 'Yaminué',
                    'parent_id' => 17,
                ),
            493 =>
                array (
                    'id' => 1495,
                    'nombre' => 'Aguaray',
                    'parent_id' => 18,
                ),
            494 =>
                array (
                    'id' => 1496,
                    'nombre' => 'Angastaco',
                    'parent_id' => 18,
                ),
            495 =>
                array (
                    'id' => 1497,
                    'nombre' => 'Animana',
                    'parent_id' => 18,
                ),
            496 =>
                array (
                    'id' => 1498,
                    'nombre' => 'Apolinario Saravia',
                    'parent_id' => 18,
                ),
            497 =>
                array (
                    'id' => 1499,
                    'nombre' => 'Cachi',
                    'parent_id' => 18,
                ),
            498 =>
                array (
                    'id' => 1500,
                    'nombre' => 'Cafayate',
                    'parent_id' => 18,
                ),
            499 =>
                array (
                    'id' => 1501,
                    'nombre' => 'Campo Quijano',
                    'parent_id' => 18,
                ),
        ));
        \DB::table('geolocalizacion')->insert(array (
            0 =>
                array (
                    'id' => 1502,
                    'nombre' => 'Campo Santo',
                    'parent_id' => 18,
                ),
            1 =>
                array (
                    'id' => 1503,
                    'nombre' => 'Cerrillos',
                    'parent_id' => 18,
                ),
            2 =>
                array (
                    'id' => 1504,
                    'nombre' => 'Chicoana',
                    'parent_id' => 18,
                ),
            3 =>
                array (
                    'id' => 1505,
                    'nombre' => 'Colonia Santa Rosa',
                    'parent_id' => 18,
                ),
            4 =>
                array (
                    'id' => 1506,
                    'nombre' => 'Coronel Moldes',
                    'parent_id' => 18,
                ),
            5 =>
                array (
                    'id' => 1507,
                    'nombre' => 'Delegacion Dragones',
                    'parent_id' => 18,
                ),
            6 =>
                array (
                    'id' => 1508,
                    'nombre' => 'El Bordo',
                    'parent_id' => 18,
                ),
            7 =>
                array (
                    'id' => 1509,
                    'nombre' => 'El Carril',
                    'parent_id' => 18,
                ),
            8 =>
                array (
                    'id' => 1510,
                    'nombre' => 'El Galpon',
                    'parent_id' => 18,
                ),
            9 =>
                array (
                    'id' => 1511,
                    'nombre' => 'El Jardin',
                    'parent_id' => 18,
                ),
            10 =>
                array (
                    'id' => 1512,
                    'nombre' => 'El Potrero',
                    'parent_id' => 18,
                ),
            11 =>
                array (
                    'id' => 1513,
                    'nombre' => 'El Quebrachal',
                    'parent_id' => 18,
                ),
            12 =>
                array (
                    'id' => 1514,
                    'nombre' => 'El Tala',
                    'parent_id' => 18,
                ),
            13 =>
                array (
                    'id' => 1515,
                    'nombre' => 'Embarcacion',
                    'parent_id' => 18,
                ),
            14 =>
                array (
                    'id' => 1516,
                    'nombre' => 'General Ballivian',
                    'parent_id' => 18,
                ),
            15 =>
                array (
                    'id' => 1517,
                    'nombre' => 'General Guemes',
                    'parent_id' => 18,
                ),
            16 =>
                array (
                    'id' => 1518,
                    'nombre' => 'General Mosconi',
                    'parent_id' => 18,
                ),
            17 =>
                array (
                    'id' => 1519,
                    'nombre' => 'General Pizarro',
                    'parent_id' => 18,
                ),
            18 =>
                array (
                    'id' => 1520,
                    'nombre' => 'Guachipas',
                    'parent_id' => 18,
                ),
            19 =>
                array (
                    'id' => 1521,
                    'nombre' => 'Hipolito Yrigoyen',
                    'parent_id' => 18,
                ),
            20 =>
                array (
                    'id' => 1522,
                    'nombre' => 'Iruya',
                    'parent_id' => 18,
                ),
            21 =>
                array (
                    'id' => 1523,
                    'nombre' => 'Isla De Cañas',
                    'parent_id' => 18,
                ),
            22 =>
                array (
                    'id' => 1524,
                    'nombre' => 'Joaquin Víctor Gonzalez',
                    'parent_id' => 18,
                ),
            23 =>
                array (
                    'id' => 1525,
                    'nombre' => 'La Caldera',
                    'parent_id' => 18,
                ),
            24 =>
                array (
                    'id' => 1526,
                    'nombre' => 'La Candelaria',
                    'parent_id' => 18,
                ),
            25 =>
                array (
                    'id' => 1527,
                    'nombre' => 'La Merced',
                    'parent_id' => 18,
                ),
            26 =>
                array (
                    'id' => 1528,
                    'nombre' => 'La Poma',
                    'parent_id' => 18,
                ),
            27 =>
                array (
                    'id' => 1529,
                    'nombre' => 'La Viña',
                    'parent_id' => 18,
                ),
            28 =>
                array (
                    'id' => 1530,
                    'nombre' => 'Las Lajitas',
                    'parent_id' => 18,
                ),
            29 =>
                array (
                    'id' => 1531,
                    'nombre' => 'Los Toldos',
                    'parent_id' => 18,
                ),
            30 =>
                array (
                    'id' => 1532,
                    'nombre' => 'Molinos',
                    'parent_id' => 18,
                ),
            31 =>
                array (
                    'id' => 1533,
                    'nombre' => 'Nazareno',
                    'parent_id' => 18,
                ),
            32 =>
                array (
                    'id' => 1534,
                    'nombre' => 'Payogasta',
                    'parent_id' => 18,
                ),
            33 =>
                array (
                    'id' => 1535,
                    'nombre' => 'Pichanal',
                    'parent_id' => 18,
                ),
            34 =>
                array (
                    'id' => 1536,
                    'nombre' => 'Profesor Salvador Mazza',
                    'parent_id' => 18,
                ),
            35 =>
                array (
                    'id' => 1537,
                    'nombre' => 'Rio De Las Piedras',
                    'parent_id' => 18,
                ),
            36 =>
                array (
                    'id' => 1538,
                    'nombre' => 'Rivadavia Banda Norte',
                    'parent_id' => 18,
                ),
            37 =>
                array (
                    'id' => 1539,
                    'nombre' => 'Rivadavia Banda Sur',
                    'parent_id' => 18,
                ),
            38 =>
                array (
                    'id' => 1540,
                    'nombre' => 'Rosario De La Frontera',
                    'parent_id' => 18,
                ),
            39 =>
                array (
                    'id' => 1541,
                    'nombre' => 'Rosario De Lerma',
                    'parent_id' => 18,
                ),
            40 =>
                array (
                    'id' => 1542,
                    'nombre' => 'Salta',
                    'parent_id' => 18,
                ),
            41 =>
                array (
                    'id' => 1543,
                    'nombre' => 'San Antonio De Los Cobres',
                    'parent_id' => 18,
                ),
            42 =>
                array (
                    'id' => 1544,
                    'nombre' => 'San Carlos',
                    'parent_id' => 18,
                ),
            43 =>
                array (
                    'id' => 1545,
                    'nombre' => 'San José De Metán',
                    'parent_id' => 18,
                ),
            44 =>
                array (
                    'id' => 1546,
                    'nombre' => 'San Ramón De La Nueva Orán',
                    'parent_id' => 18,
                ),
            45 =>
                array (
                    'id' => 1547,
                    'nombre' => 'Santa Victoria Este',
                    'parent_id' => 18,
                ),
            46 =>
                array (
                    'id' => 1548,
                    'nombre' => 'Santa Victoria Oeste',
                    'parent_id' => 18,
                ),
            47 =>
                array (
                    'id' => 1549,
                    'nombre' => 'Seclantas',
                    'parent_id' => 18,
                ),
            48 =>
                array (
                    'id' => 1550,
                    'nombre' => 'Tartagal',
                    'parent_id' => 18,
                ),
            49 =>
                array (
                    'id' => 1551,
                    'nombre' => 'Tolar Gande',
                    'parent_id' => 18,
                ),
            50 =>
                array (
                    'id' => 1552,
                    'nombre' => 'Urundel',
                    'parent_id' => 18,
                ),
            51 =>
                array (
                    'id' => 1553,
                    'nombre' => 'Vaqueros',
                    'parent_id' => 18,
                ),
            52 =>
                array (
                    'id' => 1554,
                    'nombre' => 'Villa San Lorenzo',
                    'parent_id' => 18,
                ),
            53 =>
                array (
                    'id' => 1555,
                    'nombre' => '25 De Mayo',
                    'parent_id' => 19,
                ),
            54 =>
                array (
                    'id' => 1556,
                    'nombre' => '9 De Julio',
                    'parent_id' => 19,
                ),
            55 =>
                array (
                    'id' => 1557,
                    'nombre' => 'Albardon',
                    'parent_id' => 19,
                ),
            56 =>
                array (
                    'id' => 1558,
                    'nombre' => 'Angaco',
                    'parent_id' => 19,
                ),
            57 =>
                array (
                    'id' => 1559,
                    'nombre' => 'Calingasta',
                    'parent_id' => 19,
                ),
            58 =>
                array (
                    'id' => 1560,
                    'nombre' => 'Caucete',
                    'parent_id' => 19,
                ),
            59 =>
                array (
                    'id' => 1561,
                    'nombre' => 'Chimbas',
                    'parent_id' => 19,
                ),
            60 =>
                array (
                    'id' => 1562,
                    'nombre' => 'Iglesia',
                    'parent_id' => 19,
                ),
            61 =>
                array (
                    'id' => 1563,
                    'nombre' => 'Jachal',
                    'parent_id' => 19,
                ),
            62 =>
                array (
                    'id' => 1564,
                    'nombre' => 'Pocito',
                    'parent_id' => 19,
                ),
            63 =>
                array (
                    'id' => 1565,
                    'nombre' => 'Rawson',
                    'parent_id' => 19,
                ),
            64 =>
                array (
                    'id' => 1566,
                    'nombre' => 'Rivadavia',
                    'parent_id' => 19,
                ),
            65 =>
                array (
                    'id' => 1567,
                    'nombre' => 'San Juan',
                    'parent_id' => 19,
                ),
            66 =>
                array (
                    'id' => 1568,
                    'nombre' => 'San Martin',
                    'parent_id' => 19,
                ),
            67 =>
                array (
                    'id' => 1569,
                    'nombre' => 'Santa Lucia',
                    'parent_id' => 19,
                ),
            68 =>
                array (
                    'id' => 1570,
                    'nombre' => 'Sarmiento',
                    'parent_id' => 19,
                ),
            69 =>
                array (
                    'id' => 1571,
                    'nombre' => 'Ullum',
                    'parent_id' => 19,
                ),
            70 =>
                array (
                    'id' => 1572,
                    'nombre' => 'Valle Fertil',
                    'parent_id' => 19,
                ),
            71 =>
                array (
                    'id' => 1573,
                    'nombre' => 'Zonda',
                    'parent_id' => 19,
                ),
            72 =>
                array (
                    'id' => 1574,
                    'nombre' => 'Balde',
                    'parent_id' => 20,
                ),
            73 =>
                array (
                    'id' => 1575,
                    'nombre' => 'Carpintería ',
                    'parent_id' => 20,
                ),
            74 =>
                array (
                    'id' => 1576,
                    'nombre' => 'Concarán',
                    'parent_id' => 20,
                ),
            75 =>
                array (
                    'id' => 1577,
                    'nombre' => 'Cortaderas',
                    'parent_id' => 20,
                ),
            76 =>
                array (
                    'id' => 1578,
                    'nombre' => 'El Trapiche ',
                    'parent_id' => 20,
                ),
            77 =>
                array (
                    'id' => 1579,
                    'nombre' => 'La Carolina ',
                    'parent_id' => 20,
                ),
            78 =>
                array (
                    'id' => 1580,
                    'nombre' => 'La Punta ',
                    'parent_id' => 20,
                ),
            79 =>
                array (
                    'id' => 1581,
                    'nombre' => 'La Toma ',
                    'parent_id' => 20,
                ),
            80 =>
                array (
                    'id' => 1582,
                    'nombre' => 'Los Molles',
                    'parent_id' => 20,
                ),
            81 =>
                array (
                    'id' => 1583,
                    'nombre' => 'Lujan',
                    'parent_id' => 20,
                ),
            82 =>
                array (
                    'id' => 1584,
                    'nombre' => 'Merlo',
                    'parent_id' => 20,
                ),
            83 =>
                array (
                    'id' => 1585,
                    'nombre' => 'Nogolí',
                    'parent_id' => 20,
                ),
            84 =>
                array (
                    'id' => 1586,
                    'nombre' => 'Papagayos',
                    'parent_id' => 20,
                ),
            85 =>
                array (
                    'id' => 1587,
                    'nombre' => 'Potrero de los Funes',
                    'parent_id' => 20,
                ),
            86 =>
                array (
                    'id' => 1588,
                    'nombre' => 'Quines',
                    'parent_id' => 20,
                ),
            87 =>
                array (
                    'id' => 1589,
                    'nombre' => 'San Francisco del Monte',
                    'parent_id' => 20,
                ),
            88 =>
                array (
                    'id' => 1590,
                    'nombre' => 'San Luis Capital',
                    'parent_id' => 20,
                ),
            89 =>
                array (
                    'id' => 1591,
                    'nombre' => 'Santa Rosa del Conlara',
                    'parent_id' => 20,
                ),
            90 =>
                array (
                    'id' => 1592,
                    'nombre' => 'Villa Elena',
                    'parent_id' => 20,
                ),
            91 =>
                array (
                    'id' => 1593,
                    'nombre' => 'Villa la Quebrada',
                    'parent_id' => 20,
                ),
            92 =>
                array (
                    'id' => 1594,
                    'nombre' => 'Villa Larca',
                    'parent_id' => 20,
                ),
            93 =>
                array (
                    'id' => 1595,
                    'nombre' => 'Villa Mercedes',
                    'parent_id' => 20,
                ),
            94 =>
                array (
                    'id' => 1596,
                    'nombre' => '28 De Noviembre',
                    'parent_id' => 21,
                ),
            95 =>
                array (
                    'id' => 1597,
                    'nombre' => 'Caleta Olivia',
                    'parent_id' => 21,
                ),
            96 =>
                array (
                    'id' => 1598,
                    'nombre' => 'Cañadon Seco',
                    'parent_id' => 21,
                ),
            97 =>
                array (
                    'id' => 1599,
                    'nombre' => 'Comandante Luis Piedrabuena',
                    'parent_id' => 21,
                ),
            98 =>
                array (
                    'id' => 1600,
                    'nombre' => 'El Calafate',
                    'parent_id' => 21,
                ),
            99 =>
                array (
                    'id' => 1601,
                    'nombre' => 'El Chalten',
                    'parent_id' => 21,
                ),
            100 =>
                array (
                    'id' => 1602,
                    'nombre' => 'Gobernador Gregores',
                    'parent_id' => 21,
                ),
            101 =>
                array (
                    'id' => 1603,
                    'nombre' => 'Hipolito Irigoyen',
                    'parent_id' => 21,
                ),
            102 =>
                array (
                    'id' => 1604,
                    'nombre' => 'Jaramillo',
                    'parent_id' => 21,
                ),
            103 =>
                array (
                    'id' => 1605,
                    'nombre' => 'Koluel Kaike',
                    'parent_id' => 21,
                ),
            104 =>
                array (
                    'id' => 1606,
                    'nombre' => 'Las Heras',
                    'parent_id' => 21,
                ),
            105 =>
                array (
                    'id' => 1607,
                    'nombre' => 'Los Antiguos',
                    'parent_id' => 21,
                ),
            106 =>
                array (
                    'id' => 1608,
                    'nombre' => 'Perito Moreno',
                    'parent_id' => 21,
                ),
            107 =>
                array (
                    'id' => 1609,
                    'nombre' => 'Pico Truncado',
                    'parent_id' => 21,
                ),
            108 =>
                array (
                    'id' => 1610,
                    'nombre' => 'Puerto Deseado',
                    'parent_id' => 21,
                ),
            109 =>
                array (
                    'id' => 1611,
                    'nombre' => 'Puerto San Julian',
                    'parent_id' => 21,
                ),
            110 =>
                array (
                    'id' => 1612,
                    'nombre' => 'Puerto Santa Cruz',
                    'parent_id' => 21,
                ),
            111 =>
                array (
                    'id' => 1613,
                    'nombre' => 'Rio Gallegos',
                    'parent_id' => 21,
                ),
            112 =>
                array (
                    'id' => 1614,
                    'nombre' => 'Rio Turbio',
                    'parent_id' => 21,
                ),
            113 =>
                array (
                    'id' => 1615,
                    'nombre' => 'Tres Lagos',
                    'parent_id' => 21,
                ),
            114 =>
                array (
                    'id' => 1616,
                    'nombre' => 'Acebal',
                    'parent_id' => 22,
                ),
            115 =>
                array (
                    'id' => 1617,
                    'nombre' => 'Aguara Grande',
                    'parent_id' => 22,
                ),
            116 =>
                array (
                    'id' => 1618,
                    'nombre' => 'Albarellos',
                    'parent_id' => 22,
                ),
            117 =>
                array (
                    'id' => 1619,
                    'nombre' => 'Alcorta',
                    'parent_id' => 22,
                ),
            118 =>
                array (
                    'id' => 1620,
                    'nombre' => 'Aldao',
                    'parent_id' => 22,
                ),
            119 =>
                array (
                    'id' => 1621,
                    'nombre' => 'Aldao ( C )',
                    'parent_id' => 22,
                ),
            120 =>
                array (
                    'id' => 1622,
                    'nombre' => 'Alejandra',
                    'parent_id' => 22,
                ),
            121 =>
                array (
                    'id' => 1623,
                    'nombre' => 'Alvarez',
                    'parent_id' => 22,
                ),
            122 =>
                array (
                    'id' => 1624,
                    'nombre' => 'Alvear',
                    'parent_id' => 22,
                ),
            123 =>
                array (
                    'id' => 1625,
                    'nombre' => 'Ambrosetti',
                    'parent_id' => 22,
                ),
            124 =>
                array (
                    'id' => 1626,
                    'nombre' => 'Amenabar',
                    'parent_id' => 22,
                ),
            125 =>
                array (
                    'id' => 1627,
                    'nombre' => 'Angelica',
                    'parent_id' => 22,
                ),
            126 =>
                array (
                    'id' => 1628,
                    'nombre' => 'Angeloni',
                    'parent_id' => 22,
                ),
            127 =>
                array (
                    'id' => 1629,
                    'nombre' => 'Arequito',
                    'parent_id' => 22,
                ),
            128 =>
                array (
                    'id' => 1630,
                    'nombre' => 'Arminda',
                    'parent_id' => 22,
                ),
            129 =>
                array (
                    'id' => 1631,
                    'nombre' => 'Armstrong',
                    'parent_id' => 22,
                ),
            130 =>
                array (
                    'id' => 1632,
                    'nombre' => 'Arocena',
                    'parent_id' => 22,
                ),
            131 =>
                array (
                    'id' => 1633,
                    'nombre' => 'Aron Castellanos',
                    'parent_id' => 22,
                ),
            132 =>
                array (
                    'id' => 1634,
                    'nombre' => 'Arroyo Aguiar',
                    'parent_id' => 22,
                ),
            133 =>
                array (
                    'id' => 1635,
                    'nombre' => 'Arroyo Ceibal',
                    'parent_id' => 22,
                ),
            134 =>
                array (
                    'id' => 1636,
                    'nombre' => 'Arroyo Leyes',
                    'parent_id' => 22,
                ),
            135 =>
                array (
                    'id' => 1637,
                    'nombre' => 'Arroyo Seco',
                    'parent_id' => 22,
                ),
            136 =>
                array (
                    'id' => 1638,
                    'nombre' => 'Arrufo',
                    'parent_id' => 22,
                ),
            137 =>
                array (
                    'id' => 1639,
                    'nombre' => 'Arteaga',
                    'parent_id' => 22,
                ),
            138 =>
                array (
                    'id' => 1640,
                    'nombre' => 'Ataliva',
                    'parent_id' => 22,
                ),
            139 =>
                array (
                    'id' => 1641,
                    'nombre' => 'Aurelia',
                    'parent_id' => 22,
                ),
            140 =>
                array (
                    'id' => 1642,
                    'nombre' => 'Avellaneda',
                    'parent_id' => 22,
                ),
            141 =>
                array (
                    'id' => 1643,
                    'nombre' => 'Barrancas',
                    'parent_id' => 22,
                ),
            142 =>
                array (
                    'id' => 1644,
                    'nombre' => 'Bauer Y Sigel',
                    'parent_id' => 22,
                ),
            143 =>
                array (
                    'id' => 1645,
                    'nombre' => 'Bella Italia',
                    'parent_id' => 22,
                ),
            144 =>
                array (
                    'id' => 1646,
                    'nombre' => 'Berabevu',
                    'parent_id' => 22,
                ),
            145 =>
                array (
                    'id' => 1647,
                    'nombre' => 'Berna',
                    'parent_id' => 22,
                ),
            146 =>
                array (
                    'id' => 1648,
                    'nombre' => 'Bernardo De Irigoyen',
                    'parent_id' => 22,
                ),
            147 =>
                array (
                    'id' => 1649,
                    'nombre' => 'Bigand',
                    'parent_id' => 22,
                ),
            148 =>
                array (
                    'id' => 1650,
                    'nombre' => 'Bombal',
                    'parent_id' => 22,
                ),
            149 =>
                array (
                    'id' => 1651,
                    'nombre' => 'Bouquet',
                    'parent_id' => 22,
                ),
            150 =>
                array (
                    'id' => 1652,
                    'nombre' => 'Bustinza',
                    'parent_id' => 22,
                ),
            151 =>
                array (
                    'id' => 1653,
                    'nombre' => 'Cabal',
                    'parent_id' => 22,
                ),
            152 =>
                array (
                    'id' => 1654,
                    'nombre' => 'Cacique Ariacaiquin',
                    'parent_id' => 22,
                ),
            153 =>
                array (
                    'id' => 1655,
                    'nombre' => 'Cafferata',
                    'parent_id' => 22,
                ),
            154 =>
                array (
                    'id' => 1656,
                    'nombre' => 'Calchaqui',
                    'parent_id' => 22,
                ),
            155 =>
                array (
                    'id' => 1657,
                    'nombre' => 'Campo Andino',
                    'parent_id' => 22,
                ),
            156 =>
                array (
                    'id' => 1658,
                    'nombre' => 'Campo Piaggio',
                    'parent_id' => 22,
                ),
            157 =>
                array (
                    'id' => 1659,
                    'nombre' => 'Cañada De Gomez',
                    'parent_id' => 22,
                ),
            158 =>
                array (
                    'id' => 1660,
                    'nombre' => 'Cañada Del Ucle',
                    'parent_id' => 22,
                ),
            159 =>
                array (
                    'id' => 1661,
                    'nombre' => 'Cañada Ombu',
                    'parent_id' => 22,
                ),
            160 =>
                array (
                    'id' => 1662,
                    'nombre' => 'Cañada Rica',
                    'parent_id' => 22,
                ),
            161 =>
                array (
                    'id' => 1663,
                    'nombre' => 'Cañada Rosquin',
                    'parent_id' => 22,
                ),
            162 =>
                array (
                    'id' => 1664,
                    'nombre' => 'Candioti',
                    'parent_id' => 22,
                ),
            163 =>
                array (
                    'id' => 1665,
                    'nombre' => 'Capitan Bermudez',
                    'parent_id' => 22,
                ),
            164 =>
                array (
                    'id' => 1666,
                    'nombre' => 'Capivara',
                    'parent_id' => 22,
                ),
            165 =>
                array (
                    'id' => 1667,
                    'nombre' => 'Carcaraña',
                    'parent_id' => 22,
                ),
            166 =>
                array (
                    'id' => 1668,
                    'nombre' => 'Carlos Pellegrini',
                    'parent_id' => 22,
                ),
            167 =>
                array (
                    'id' => 1669,
                    'nombre' => 'Carmen',
                    'parent_id' => 22,
                ),
            168 =>
                array (
                    'id' => 1670,
                    'nombre' => 'Carmen Del Sauce',
                    'parent_id' => 22,
                ),
            169 =>
                array (
                    'id' => 1671,
                    'nombre' => 'Carreras',
                    'parent_id' => 22,
                ),
            170 =>
                array (
                    'id' => 1672,
                    'nombre' => 'Carrizales',
                    'parent_id' => 22,
                ),
            171 =>
                array (
                    'id' => 1673,
                    'nombre' => 'Casalegno',
                    'parent_id' => 22,
                ),
            172 =>
                array (
                    'id' => 1674,
                    'nombre' => 'Casas',
                    'parent_id' => 22,
                ),
            173 =>
                array (
                    'id' => 1675,
                    'nombre' => 'Casilda',
                    'parent_id' => 22,
                ),
            174 =>
                array (
                    'id' => 1676,
                    'nombre' => 'Castelar',
                    'parent_id' => 22,
                ),
            175 =>
                array (
                    'id' => 1677,
                    'nombre' => 'Castellanos',
                    'parent_id' => 22,
                ),
            176 =>
                array (
                    'id' => 1678,
                    'nombre' => 'Cavour',
                    'parent_id' => 22,
                ),
            177 =>
                array (
                    'id' => 1679,
                    'nombre' => 'Cayasta',
                    'parent_id' => 22,
                ),
            178 =>
                array (
                    'id' => 1680,
                    'nombre' => 'Cayastacito',
                    'parent_id' => 22,
                ),
            179 =>
                array (
                    'id' => 1681,
                    'nombre' => 'Centeno',
                    'parent_id' => 22,
                ),
            180 =>
                array (
                    'id' => 1682,
                    'nombre' => 'Cepeda',
                    'parent_id' => 22,
                ),
            181 =>
                array (
                    'id' => 1683,
                    'nombre' => 'Ceres',
                    'parent_id' => 22,
                ),
            182 =>
                array (
                    'id' => 1684,
                    'nombre' => 'Chabas',
                    'parent_id' => 22,
                ),
            183 =>
                array (
                    'id' => 1685,
                    'nombre' => 'Chañar Ladeado',
                    'parent_id' => 22,
                ),
            184 =>
                array (
                    'id' => 1686,
                    'nombre' => 'Chapuy',
                    'parent_id' => 22,
                ),
            185 =>
                array (
                    'id' => 1687,
                    'nombre' => 'Chovet',
                    'parent_id' => 22,
                ),
            186 =>
                array (
                    'id' => 1688,
                    'nombre' => 'Christophersen',
                    'parent_id' => 22,
                ),
            187 =>
                array (
                    'id' => 1689,
                    'nombre' => 'Classon',
                    'parent_id' => 22,
                ),
            188 =>
                array (
                    'id' => 1690,
                    'nombre' => 'Clucellas',
                    'parent_id' => 22,
                ),
            189 =>
                array (
                    'id' => 1691,
                    'nombre' => 'Colonia Ana',
                    'parent_id' => 22,
                ),
            190 =>
                array (
                    'id' => 1692,
                    'nombre' => 'Colonia Belgrano',
                    'parent_id' => 22,
                ),
            191 =>
                array (
                    'id' => 1693,
                    'nombre' => 'Colonia Bicha',
                    'parent_id' => 22,
                ),
            192 =>
                array (
                    'id' => 1694,
                    'nombre' => 'Colonia Bigand',
                    'parent_id' => 22,
                ),
            193 =>
                array (
                    'id' => 1695,
                    'nombre' => 'Colonia Bossi',
                    'parent_id' => 22,
                ),
            194 =>
                array (
                    'id' => 1696,
                    'nombre' => 'Colonia Cello',
                    'parent_id' => 22,
                ),
            195 =>
                array (
                    'id' => 1697,
                    'nombre' => 'Colonia Dolores',
                    'parent_id' => 22,
                ),
            196 =>
                array (
                    'id' => 1698,
                    'nombre' => 'Colonia Duran',
                    'parent_id' => 22,
                ),
            197 =>
                array (
                    'id' => 1699,
                    'nombre' => 'Colonia Iturraspe',
                    'parent_id' => 22,
                ),
            198 =>
                array (
                    'id' => 1700,
                    'nombre' => 'Colonia Margarita',
                    'parent_id' => 22,
                ),
            199 =>
                array (
                    'id' => 1701,
                    'nombre' => 'Colonia Mascias',
                    'parent_id' => 22,
                ),
            200 =>
                array (
                    'id' => 1702,
                    'nombre' => 'Colonia Raquel',
                    'parent_id' => 22,
                ),
            201 =>
                array (
                    'id' => 1703,
                    'nombre' => 'Colonia Rosa',
                    'parent_id' => 22,
                ),
            202 =>
                array (
                    'id' => 1704,
                    'nombre' => 'Colonia San Jose',
                    'parent_id' => 22,
                ),
            203 =>
                array (
                    'id' => 1705,
                    'nombre' => 'Constanza',
                    'parent_id' => 22,
                ),
            204 =>
                array (
                    'id' => 1706,
                    'nombre' => 'Coronda',
                    'parent_id' => 22,
                ),
            205 =>
                array (
                    'id' => 1707,
                    'nombre' => 'Coronel Arnold',
                    'parent_id' => 22,
                ),
            206 =>
                array (
                    'id' => 1708,
                    'nombre' => 'Coronel Bogado',
                    'parent_id' => 22,
                ),
            207 =>
                array (
                    'id' => 1709,
                    'nombre' => 'Coronel Dominguez',
                    'parent_id' => 22,
                ),
            208 =>
                array (
                    'id' => 1710,
                    'nombre' => 'Coronel Fraga',
                    'parent_id' => 22,
                ),
            209 =>
                array (
                    'id' => 1711,
                    'nombre' => 'Correa',
                    'parent_id' => 22,
                ),
            210 =>
                array (
                    'id' => 1712,
                    'nombre' => 'Crespo',
                    'parent_id' => 22,
                ),
            211 =>
                array (
                    'id' => 1713,
                    'nombre' => 'Crispi',
                    'parent_id' => 22,
                ),
            212 =>
                array (
                    'id' => 1714,
                    'nombre' => 'Cululu',
                    'parent_id' => 22,
                ),
            213 =>
                array (
                    'id' => 1715,
                    'nombre' => 'Curupaity',
                    'parent_id' => 22,
                ),
            214 =>
                array (
                    'id' => 1716,
                    'nombre' => 'Desvio Arijon',
                    'parent_id' => 22,
                ),
            215 =>
                array (
                    'id' => 1717,
                    'nombre' => 'Diego De Alvear',
                    'parent_id' => 22,
                ),
            216 =>
                array (
                    'id' => 1718,
                    'nombre' => 'Dos Rosas Y La Legua',
                    'parent_id' => 22,
                ),
            217 =>
                array (
                    'id' => 1719,
                    'nombre' => 'Egusquiza',
                    'parent_id' => 22,
                ),
            218 =>
                array (
                    'id' => 1720,
                    'nombre' => 'El Araza',
                    'parent_id' => 22,
                ),
            219 =>
                array (
                    'id' => 1721,
                    'nombre' => 'El Rabon',
                    'parent_id' => 22,
                ),
            220 =>
                array (
                    'id' => 1722,
                    'nombre' => 'El Sombrerito',
                    'parent_id' => 22,
                ),
            221 =>
                array (
                    'id' => 1723,
                    'nombre' => 'El Trebol',
                    'parent_id' => 22,
                ),
            222 =>
                array (
                    'id' => 1724,
                    'nombre' => 'Elisa',
                    'parent_id' => 22,
                ),
            223 =>
                array (
                    'id' => 1725,
                    'nombre' => 'Elortondo',
                    'parent_id' => 22,
                ),
            224 =>
                array (
                    'id' => 1726,
                    'nombre' => 'Emilia',
                    'parent_id' => 22,
                ),
            225 =>
                array (
                    'id' => 1727,
                    'nombre' => 'Empalme San Carlos',
                    'parent_id' => 22,
                ),
            226 =>
                array (
                    'id' => 1728,
                    'nombre' => 'Empalme Villa Constitucion',
                    'parent_id' => 22,
                ),
            227 =>
                array (
                    'id' => 1729,
                    'nombre' => 'Esmeralda',
                    'parent_id' => 22,
                ),
            228 =>
                array (
                    'id' => 1730,
                    'nombre' => 'Esperanza',
                    'parent_id' => 22,
                ),
            229 =>
                array (
                    'id' => 1731,
                    'nombre' => 'Estacion Clucellas',
                    'parent_id' => 22,
                ),
            230 =>
                array (
                    'id' => 1732,
                    'nombre' => 'Estacion Diaz',
                    'parent_id' => 22,
                ),
            231 =>
                array (
                    'id' => 1733,
                    'nombre' => 'Esteban Rams',
                    'parent_id' => 22,
                ),
            232 =>
                array (
                    'id' => 1734,
                    'nombre' => 'Esther',
                    'parent_id' => 22,
                ),
            233 =>
                array (
                    'id' => 1735,
                    'nombre' => 'Eusebia Y Carolina',
                    'parent_id' => 22,
                ),
            234 =>
                array (
                    'id' => 1736,
                    'nombre' => 'Eustolia',
                    'parent_id' => 22,
                ),
            235 =>
                array (
                    'id' => 1737,
                    'nombre' => 'Felicia',
                    'parent_id' => 22,
                ),
            236 =>
                array (
                    'id' => 1738,
                    'nombre' => 'Fidela',
                    'parent_id' => 22,
                ),
            237 =>
                array (
                    'id' => 1739,
                    'nombre' => 'Fighiera',
                    'parent_id' => 22,
                ),
            238 =>
                array (
                    'id' => 1740,
                    'nombre' => 'Firmat',
                    'parent_id' => 22,
                ),
            239 =>
                array (
                    'id' => 1741,
                    'nombre' => 'Florencia',
                    'parent_id' => 22,
                ),
            240 =>
                array (
                    'id' => 1742,
                    'nombre' => 'Fortin Olmos',
                    'parent_id' => 22,
                ),
            241 =>
                array (
                    'id' => 1743,
                    'nombre' => 'Franck',
                    'parent_id' => 22,
                ),
            242 =>
                array (
                    'id' => 1744,
                    'nombre' => 'Fray Luis Beltran',
                    'parent_id' => 22,
                ),
            243 =>
                array (
                    'id' => 1745,
                    'nombre' => 'Frontera',
                    'parent_id' => 22,
                ),
            244 =>
                array (
                    'id' => 1746,
                    'nombre' => 'Fuentes',
                    'parent_id' => 22,
                ),
            245 =>
                array (
                    'id' => 1747,
                    'nombre' => 'Funes',
                    'parent_id' => 22,
                ),
            246 =>
                array (
                    'id' => 1748,
                    'nombre' => 'G- Perez De Denis - El Noche',
                    'parent_id' => 22,
                ),
            247 =>
                array (
                    'id' => 1749,
                    'nombre' => 'Gaboto',
                    'parent_id' => 22,
                ),
            248 =>
                array (
                    'id' => 1750,
                    'nombre' => 'Galisteo',
                    'parent_id' => 22,
                ),
            249 =>
                array (
                    'id' => 1751,
                    'nombre' => 'Galvez',
                    'parent_id' => 22,
                ),
            250 =>
                array (
                    'id' => 1752,
                    'nombre' => 'Garabato',
                    'parent_id' => 22,
                ),
            251 =>
                array (
                    'id' => 1753,
                    'nombre' => 'Garibaldi',
                    'parent_id' => 22,
                ),
            252 =>
                array (
                    'id' => 1754,
                    'nombre' => 'Gato Colorado',
                    'parent_id' => 22,
                ),
            253 =>
                array (
                    'id' => 1755,
                    'nombre' => 'General Gelly',
                    'parent_id' => 22,
                ),
            254 =>
                array (
                    'id' => 1756,
                    'nombre' => 'General Lagos',
                    'parent_id' => 22,
                ),
            255 =>
                array (
                    'id' => 1757,
                    'nombre' => 'Gessler',
                    'parent_id' => 22,
                ),
            256 =>
                array (
                    'id' => 1758,
                    'nombre' => 'Godeken',
                    'parent_id' => 22,
                ),
            257 =>
                array (
                    'id' => 1759,
                    'nombre' => 'Godoy',
                    'parent_id' => 22,
                ),
            258 =>
                array (
                    'id' => 1760,
                    'nombre' => 'Golondrina',
                    'parent_id' => 22,
                ),
            259 =>
                array (
                    'id' => 1761,
                    'nombre' => 'Granadero Baigorria',
                    'parent_id' => 22,
                ),
            260 =>
                array (
                    'id' => 1762,
                    'nombre' => 'Grutly',
                    'parent_id' => 22,
                ),
            261 =>
                array (
                    'id' => 1763,
                    'nombre' => 'Guadalupe Norte',
                    'parent_id' => 22,
                ),
            262 =>
                array (
                    'id' => 1764,
                    'nombre' => 'Helvecia',
                    'parent_id' => 22,
                ),
            263 =>
                array (
                    'id' => 1765,
                    'nombre' => 'Hersilia',
                    'parent_id' => 22,
                ),
            264 =>
                array (
                    'id' => 1766,
                    'nombre' => 'Hipatia',
                    'parent_id' => 22,
                ),
            265 =>
                array (
                    'id' => 1767,
                    'nombre' => 'Huanqueros',
                    'parent_id' => 22,
                ),
            266 =>
                array (
                    'id' => 1768,
                    'nombre' => 'Hugentobler',
                    'parent_id' => 22,
                ),
            267 =>
                array (
                    'id' => 1769,
                    'nombre' => 'Hughes',
                    'parent_id' => 22,
                ),
            268 =>
                array (
                    'id' => 1770,
                    'nombre' => 'Humberto Primo',
                    'parent_id' => 22,
                ),
            269 =>
                array (
                    'id' => 1771,
                    'nombre' => 'Humboldt',
                    'parent_id' => 22,
                ),
            270 =>
                array (
                    'id' => 1772,
                    'nombre' => 'Ibarlucea',
                    'parent_id' => 22,
                ),
            271 =>
                array (
                    'id' => 1773,
                    'nombre' => 'Ingeniero Chanourdie',
                    'parent_id' => 22,
                ),
            272 =>
                array (
                    'id' => 1774,
                    'nombre' => 'Intiyaco',
                    'parent_id' => 22,
                ),
            273 =>
                array (
                    'id' => 1775,
                    'nombre' => 'Irigoyen',
                    'parent_id' => 22,
                ),
            274 =>
                array (
                    'id' => 1776,
                    'nombre' => 'Ituzaingo',
                    'parent_id' => 22,
                ),
            275 =>
                array (
                    'id' => 1777,
                    'nombre' => 'Jacinto L. Arauz',
                    'parent_id' => 22,
                ),
            276 =>
                array (
                    'id' => 1778,
                    'nombre' => 'Josefina',
                    'parent_id' => 22,
                ),
            277 =>
                array (
                    'id' => 1779,
                    'nombre' => 'Juan Bernabé Molina',
                    'parent_id' => 22,
                ),
            278 =>
                array (
                    'id' => 1780,
                    'nombre' => 'Juan De Garay',
                    'parent_id' => 22,
                ),
            279 =>
                array (
                    'id' => 1781,
                    'nombre' => 'Juncal',
                    'parent_id' => 22,
                ),
            280 =>
                array (
                    'id' => 1782,
                    'nombre' => 'La Brava',
                    'parent_id' => 22,
                ),
            281 =>
                array (
                    'id' => 1783,
                    'nombre' => 'La Cabral',
                    'parent_id' => 22,
                ),
            282 =>
                array (
                    'id' => 1784,
                    'nombre' => 'La Camila',
                    'parent_id' => 22,
                ),
            283 =>
                array (
                    'id' => 1785,
                    'nombre' => 'La Chispa',
                    'parent_id' => 22,
                ),
            284 =>
                array (
                    'id' => 1786,
                    'nombre' => 'La Clara',
                    'parent_id' => 22,
                ),
            285 =>
                array (
                    'id' => 1787,
                    'nombre' => 'La Criolla',
                    'parent_id' => 22,
                ),
            286 =>
                array (
                    'id' => 1788,
                    'nombre' => 'La Gallareta',
                    'parent_id' => 22,
                ),
            287 =>
                array (
                    'id' => 1789,
                    'nombre' => 'La Lucila',
                    'parent_id' => 22,
                ),
            288 =>
                array (
                    'id' => 1790,
                    'nombre' => 'La Pelada',
                    'parent_id' => 22,
                ),
            289 =>
                array (
                    'id' => 1791,
                    'nombre' => 'La Penca Y Caraguata',
                    'parent_id' => 22,
                ),
            290 =>
                array (
                    'id' => 1792,
                    'nombre' => 'La Rubia',
                    'parent_id' => 22,
                ),
            291 =>
                array (
                    'id' => 1793,
                    'nombre' => 'La Sarita',
                    'parent_id' => 22,
                ),
            292 =>
                array (
                    'id' => 1794,
                    'nombre' => 'La Vanguardia',
                    'parent_id' => 22,
                ),
            293 =>
                array (
                    'id' => 1795,
                    'nombre' => 'Labordeboy',
                    'parent_id' => 22,
                ),
            294 =>
                array (
                    'id' => 1796,
                    'nombre' => 'Laguna Paiva',
                    'parent_id' => 22,
                ),
            295 =>
                array (
                    'id' => 1797,
                    'nombre' => 'Landeta',
                    'parent_id' => 22,
                ),
            296 =>
                array (
                    'id' => 1798,
                    'nombre' => 'Lanteri',
                    'parent_id' => 22,
                ),
            297 =>
                array (
                    'id' => 1799,
                    'nombre' => 'Larrechea',
                    'parent_id' => 22,
                ),
            298 =>
                array (
                    'id' => 1800,
                    'nombre' => 'Las Avispas',
                    'parent_id' => 22,
                ),
            299 =>
                array (
                    'id' => 1801,
                    'nombre' => 'Las Bandurrias',
                    'parent_id' => 22,
                ),
            300 =>
                array (
                    'id' => 1802,
                    'nombre' => 'Las Garzas',
                    'parent_id' => 22,
                ),
            301 =>
                array (
                    'id' => 1803,
                    'nombre' => 'Las Palmeras',
                    'parent_id' => 22,
                ),
            302 =>
                array (
                    'id' => 1804,
                    'nombre' => 'Las Parejas',
                    'parent_id' => 22,
                ),
            303 =>
                array (
                    'id' => 1805,
                    'nombre' => 'Las Petacas',
                    'parent_id' => 22,
                ),
            304 =>
                array (
                    'id' => 1806,
                    'nombre' => 'Las Rosas',
                    'parent_id' => 22,
                ),
            305 =>
                array (
                    'id' => 1807,
                    'nombre' => 'Las Toscas',
                    'parent_id' => 22,
                ),
            306 =>
                array (
                    'id' => 1808,
                    'nombre' => 'Las Tunas',
                    'parent_id' => 22,
                ),
            307 =>
                array (
                    'id' => 1809,
                    'nombre' => 'Lazzarino',
                    'parent_id' => 22,
                ),
            308 =>
                array (
                    'id' => 1810,
                    'nombre' => 'Lehmann',
                    'parent_id' => 22,
                ),
            309 =>
                array (
                    'id' => 1811,
                    'nombre' => 'Llambi Campbell',
                    'parent_id' => 22,
                ),
            310 =>
                array (
                    'id' => 1812,
                    'nombre' => 'Logroño',
                    'parent_id' => 22,
                ),
            311 =>
                array (
                    'id' => 1813,
                    'nombre' => 'Loma Alta',
                    'parent_id' => 22,
                ),
            312 =>
                array (
                    'id' => 1814,
                    'nombre' => 'Lopez',
                    'parent_id' => 22,
                ),
            313 =>
                array (
                    'id' => 1815,
                    'nombre' => 'Los Amores',
                    'parent_id' => 22,
                ),
            314 =>
                array (
                    'id' => 1816,
                    'nombre' => 'Los Cardos',
                    'parent_id' => 22,
                ),
            315 =>
                array (
                    'id' => 1817,
                    'nombre' => 'Los Laureles',
                    'parent_id' => 22,
                ),
            316 =>
                array (
                    'id' => 1818,
                    'nombre' => 'Los Molinos',
                    'parent_id' => 22,
                ),
            317 =>
                array (
                    'id' => 1819,
                    'nombre' => 'Los Quirquinchos',
                    'parent_id' => 22,
                ),
            318 =>
                array (
                    'id' => 1820,
                    'nombre' => 'Lucio V. Lopez',
                    'parent_id' => 22,
                ),
            319 =>
                array (
                    'id' => 1821,
                    'nombre' => 'Luis Palacios',
                    'parent_id' => 22,
                ),
            320 =>
                array (
                    'id' => 1822,
                    'nombre' => 'Maciel',
                    'parent_id' => 22,
                ),
            321 =>
                array (
                    'id' => 1823,
                    'nombre' => 'Maggiolo',
                    'parent_id' => 22,
                ),
            322 =>
                array (
                    'id' => 1824,
                    'nombre' => 'Malabrigo',
                    'parent_id' => 22,
                ),
            323 =>
                array (
                    'id' => 1825,
                    'nombre' => 'Marcelino Escalada',
                    'parent_id' => 22,
                ),
            324 =>
                array (
                    'id' => 1826,
                    'nombre' => 'Margarita',
                    'parent_id' => 22,
                ),
            325 =>
                array (
                    'id' => 1827,
                    'nombre' => 'Maria Juana',
                    'parent_id' => 22,
                ),
            326 =>
                array (
                    'id' => 1828,
                    'nombre' => 'Maria Luisa',
                    'parent_id' => 22,
                ),
            327 =>
                array (
                    'id' => 1829,
                    'nombre' => 'Maria Susana',
                    'parent_id' => 22,
                ),
            328 =>
                array (
                    'id' => 1830,
                    'nombre' => 'Maria Teresa',
                    'parent_id' => 22,
                ),
            329 =>
                array (
                    'id' => 1831,
                    'nombre' => 'Matilde',
                    'parent_id' => 22,
                ),
            330 =>
                array (
                    'id' => 1832,
                    'nombre' => 'Maua',
                    'parent_id' => 22,
                ),
            331 =>
                array (
                    'id' => 1833,
                    'nombre' => 'Maximo Paz',
                    'parent_id' => 22,
                ),
            332 =>
                array (
                    'id' => 1834,
                    'nombre' => 'Melincue',
                    'parent_id' => 22,
                ),
            333 =>
                array (
                    'id' => 1835,
                    'nombre' => 'Miguel Torres',
                    'parent_id' => 22,
                ),
            334 =>
                array (
                    'id' => 1836,
                    'nombre' => 'Moises Ville',
                    'parent_id' => 22,
                ),
            335 =>
                array (
                    'id' => 1837,
                    'nombre' => 'Monigotes',
                    'parent_id' => 22,
                ),
            336 =>
                array (
                    'id' => 1838,
                    'nombre' => 'Monje',
                    'parent_id' => 22,
                ),
            337 =>
                array (
                    'id' => 1839,
                    'nombre' => 'Monte Oscuridad',
                    'parent_id' => 22,
                ),
            338 =>
                array (
                    'id' => 1840,
                    'nombre' => 'Monte Vera',
                    'parent_id' => 22,
                ),
            339 =>
                array (
                    'id' => 1841,
                    'nombre' => 'Montefiore',
                    'parent_id' => 22,
                ),
            340 =>
                array (
                    'id' => 1842,
                    'nombre' => 'Montes De Oca',
                    'parent_id' => 22,
                ),
            341 =>
                array (
                    'id' => 1843,
                    'nombre' => 'Murphy',
                    'parent_id' => 22,
                ),
            342 =>
                array (
                    'id' => 1844,
                    'nombre' => 'Ñanducita',
                    'parent_id' => 22,
                ),
            343 =>
                array (
                    'id' => 1845,
                    'nombre' => 'Nare',
                    'parent_id' => 22,
                ),
            344 =>
                array (
                    'id' => 1846,
                    'nombre' => 'Nelson',
                    'parent_id' => 22,
                ),
            345 =>
                array (
                    'id' => 1847,
                    'nombre' => 'Nicanor Molinas',
                    'parent_id' => 22,
                ),
            346 =>
                array (
                    'id' => 1848,
                    'nombre' => 'Nuevo Torino',
                    'parent_id' => 22,
                ),
            347 =>
                array (
                    'id' => 1849,
                    'nombre' => 'Oliveros',
                    'parent_id' => 22,
                ),
            348 =>
                array (
                    'id' => 1850,
                    'nombre' => 'Palacios',
                    'parent_id' => 22,
                ),
            349 =>
                array (
                    'id' => 1851,
                    'nombre' => 'Pavon',
                    'parent_id' => 22,
                ),
            350 =>
                array (
                    'id' => 1852,
                    'nombre' => 'Pavon Arriba',
                    'parent_id' => 22,
                ),
            351 =>
                array (
                    'id' => 1853,
                    'nombre' => 'Pedro Gomez Cello',
                    'parent_id' => 22,
                ),
            352 =>
                array (
                    'id' => 1854,
                    'nombre' => 'Perez',
                    'parent_id' => 22,
                ),
            353 =>
                array (
                    'id' => 1855,
                    'nombre' => 'Peyrano',
                    'parent_id' => 22,
                ),
            354 =>
                array (
                    'id' => 1856,
                    'nombre' => 'Piamonte',
                    'parent_id' => 22,
                ),
            355 =>
                array (
                    'id' => 1857,
                    'nombre' => 'Pilar',
                    'parent_id' => 22,
                ),
            356 =>
                array (
                    'id' => 1858,
                    'nombre' => 'Piñero',
                    'parent_id' => 22,
                ),
            357 =>
                array (
                    'id' => 1859,
                    'nombre' => 'Portugalete',
                    'parent_id' => 22,
                ),
            358 =>
                array (
                    'id' => 1860,
                    'nombre' => 'Pozo Borrado',
                    'parent_id' => 22,
                ),
            359 =>
                array (
                    'id' => 1861,
                    'nombre' => 'Presidente Roca',
                    'parent_id' => 22,
                ),
            360 =>
                array (
                    'id' => 1862,
                    'nombre' => 'Progreso',
                    'parent_id' => 22,
                ),
            361 =>
                array (
                    'id' => 1863,
                    'nombre' => 'Providencia',
                    'parent_id' => 22,
                ),
            362 =>
                array (
                    'id' => 1864,
                    'nombre' => 'Pto.General San Martin',
                    'parent_id' => 22,
                ),
            363 =>
                array (
                    'id' => 1865,
                    'nombre' => 'Pueblo Andino',
                    'parent_id' => 22,
                ),
            364 =>
                array (
                    'id' => 1866,
                    'nombre' => 'Pueblo Esther',
                    'parent_id' => 22,
                ),
            365 =>
                array (
                    'id' => 1867,
                    'nombre' => 'Pueblo Marini',
                    'parent_id' => 22,
                ),
            366 =>
                array (
                    'id' => 1868,
                    'nombre' => 'Pueblo Muñoz',
                    'parent_id' => 22,
                ),
            367 =>
                array (
                    'id' => 1869,
                    'nombre' => 'Pueblo San Bernardo',
                    'parent_id' => 22,
                ),
            368 =>
                array (
                    'id' => 1870,
                    'nombre' => 'Pueblo Uranga',
                    'parent_id' => 22,
                ),
            369 =>
                array (
                    'id' => 1871,
                    'nombre' => 'Pujato',
                    'parent_id' => 22,
                ),
            370 =>
                array (
                    'id' => 1872,
                    'nombre' => 'Pujato Norte',
                    'parent_id' => 22,
                ),
            371 =>
                array (
                    'id' => 1873,
                    'nombre' => 'Rafaela',
                    'parent_id' => 22,
                ),
            372 =>
                array (
                    'id' => 1874,
                    'nombre' => 'Ramayon',
                    'parent_id' => 22,
                ),
            373 =>
                array (
                    'id' => 1875,
                    'nombre' => 'Ramona',
                    'parent_id' => 22,
                ),
            374 =>
                array (
                    'id' => 1876,
                    'nombre' => 'Reconquista',
                    'parent_id' => 22,
                ),
            375 =>
                array (
                    'id' => 1877,
                    'nombre' => 'Recreo',
                    'parent_id' => 22,
                ),
            376 =>
                array (
                    'id' => 1878,
                    'nombre' => 'Ricardone',
                    'parent_id' => 22,
                ),
            377 =>
                array (
                    'id' => 1879,
                    'nombre' => 'Rivadavia',
                    'parent_id' => 22,
                ),
            378 =>
                array (
                    'id' => 1880,
                    'nombre' => 'Roldan',
                    'parent_id' => 22,
                ),
            379 =>
                array (
                    'id' => 1881,
                    'nombre' => 'Romang',
                    'parent_id' => 22,
                ),
            380 =>
                array (
                    'id' => 1882,
                    'nombre' => 'Rosario',
                    'parent_id' => 22,
                ),
            381 =>
                array (
                    'id' => 1883,
                    'nombre' => 'Rueda',
                    'parent_id' => 22,
                ),
            382 =>
                array (
                    'id' => 1884,
                    'nombre' => 'Rufino',
                    'parent_id' => 22,
                ),
            383 =>
                array (
                    'id' => 1885,
                    'nombre' => 'Sa Pereira',
                    'parent_id' => 22,
                ),
            384 =>
                array (
                    'id' => 1886,
                    'nombre' => 'Saguier',
                    'parent_id' => 22,
                ),
            385 =>
                array (
                    'id' => 1887,
                    'nombre' => 'Saladero Mariano Cabal',
                    'parent_id' => 22,
                ),
            386 =>
                array (
                    'id' => 1888,
                    'nombre' => 'Salto Grande',
                    'parent_id' => 22,
                ),
            387 =>
                array (
                    'id' => 1889,
                    'nombre' => 'San Agustin',
                    'parent_id' => 22,
                ),
            388 =>
                array (
                    'id' => 1890,
                    'nombre' => 'San Antonio',
                    'parent_id' => 22,
                ),
            389 =>
                array (
                    'id' => 1891,
                    'nombre' => 'San Antonio De Obligado',
                    'parent_id' => 22,
                ),
            390 =>
                array (
                    'id' => 1892,
                    'nombre' => 'San Bernardo',
                    'parent_id' => 22,
                ),
            391 =>
                array (
                    'id' => 1893,
                    'nombre' => 'San Carlos Centro',
                    'parent_id' => 22,
                ),
            392 =>
                array (
                    'id' => 1894,
                    'nombre' => 'San Carlos Norte',
                    'parent_id' => 22,
                ),
            393 =>
                array (
                    'id' => 1895,
                    'nombre' => 'San Carlos Sud',
                    'parent_id' => 22,
                ),
            394 =>
                array (
                    'id' => 1896,
                    'nombre' => 'San Cristobal',
                    'parent_id' => 22,
                ),
            395 =>
                array (
                    'id' => 1897,
                    'nombre' => 'San Eduardo',
                    'parent_id' => 22,
                ),
            396 =>
                array (
                    'id' => 1898,
                    'nombre' => 'San Eugenio',
                    'parent_id' => 22,
                ),
            397 =>
                array (
                    'id' => 1899,
                    'nombre' => 'San Fabian',
                    'parent_id' => 22,
                ),
            398 =>
                array (
                    'id' => 1900,
                    'nombre' => 'San Francisco De Santa Fe',
                    'parent_id' => 22,
                ),
            399 =>
                array (
                    'id' => 1901,
                    'nombre' => 'San Genaro',
                    'parent_id' => 22,
                ),
            400 =>
                array (
                    'id' => 1902,
                    'nombre' => 'San Genaro Norte',
                    'parent_id' => 22,
                ),
            401 =>
                array (
                    'id' => 1903,
                    'nombre' => 'San Gregorio',
                    'parent_id' => 22,
                ),
            402 =>
                array (
                    'id' => 1904,
                    'nombre' => 'San Guillermo',
                    'parent_id' => 22,
                ),
            403 =>
                array (
                    'id' => 1905,
                    'nombre' => 'San Javier',
                    'parent_id' => 22,
                ),
            404 =>
                array (
                    'id' => 1906,
                    'nombre' => 'San Jeronimo Del Sauce',
                    'parent_id' => 22,
                ),
            405 =>
                array (
                    'id' => 1907,
                    'nombre' => 'San Jeronimo Norte',
                    'parent_id' => 22,
                ),
            406 =>
                array (
                    'id' => 1908,
                    'nombre' => 'San Jeronimo Sud',
                    'parent_id' => 22,
                ),
            407 =>
                array (
                    'id' => 1909,
                    'nombre' => 'San Jorge',
                    'parent_id' => 22,
                ),
            408 =>
                array (
                    'id' => 1910,
                    'nombre' => 'San Jose De La Esquina',
                    'parent_id' => 22,
                ),
            409 =>
                array (
                    'id' => 1911,
                    'nombre' => 'San Jose Del Rincon',
                    'parent_id' => 22,
                ),
            410 =>
                array (
                    'id' => 1912,
                    'nombre' => 'San Justo',
                    'parent_id' => 22,
                ),
            411 =>
                array (
                    'id' => 1913,
                    'nombre' => 'San Lorenzo',
                    'parent_id' => 22,
                ),
            412 =>
                array (
                    'id' => 1914,
                    'nombre' => 'San Mariano',
                    'parent_id' => 22,
                ),
            413 =>
                array (
                    'id' => 1915,
                    'nombre' => 'San Martín De Las Escobas',
                    'parent_id' => 22,
                ),
            414 =>
                array (
                    'id' => 1916,
                    'nombre' => 'San Martin Norte',
                    'parent_id' => 22,
                ),
            415 =>
                array (
                    'id' => 1917,
                    'nombre' => 'San Vicente',
                    'parent_id' => 22,
                ),
            416 =>
                array (
                    'id' => 1918,
                    'nombre' => 'Sancti Spiritu',
                    'parent_id' => 22,
                ),
            417 =>
                array (
                    'id' => 1919,
                    'nombre' => 'Sanford',
                    'parent_id' => 22,
                ),
            418 =>
                array (
                    'id' => 1920,
                    'nombre' => 'Santa Clara De Buena Vista',
                    'parent_id' => 22,
                ),
            419 =>
                array (
                    'id' => 1921,
                    'nombre' => 'Santa Clara De Saguier',
                    'parent_id' => 22,
                ),
            420 =>
                array (
                    'id' => 1922,
                    'nombre' => 'Santa Fe',
                    'parent_id' => 22,
                ),
            421 =>
                array (
                    'id' => 1923,
                    'nombre' => 'Santa Isabel',
                    'parent_id' => 22,
                ),
            422 =>
                array (
                    'id' => 1924,
                    'nombre' => 'Santa Margarita',
                    'parent_id' => 22,
                ),
            423 =>
                array (
                    'id' => 1925,
                    'nombre' => 'Santa Maria Centro',
                    'parent_id' => 22,
                ),
            424 =>
                array (
                    'id' => 1926,
                    'nombre' => 'Santa Maria Norte',
                    'parent_id' => 22,
                ),
            425 =>
                array (
                    'id' => 1927,
                    'nombre' => 'Santa Rosa',
                    'parent_id' => 22,
                ),
            426 =>
                array (
                    'id' => 1928,
                    'nombre' => 'Santa Teresa',
                    'parent_id' => 22,
                ),
            427 =>
                array (
                    'id' => 1929,
                    'nombre' => 'Santo Domingo',
                    'parent_id' => 22,
                ),
            428 =>
                array (
                    'id' => 1930,
                    'nombre' => 'Santo Tome',
                    'parent_id' => 22,
                ),
            429 =>
                array (
                    'id' => 1931,
                    'nombre' => 'Santurce',
                    'parent_id' => 22,
                ),
            430 =>
                array (
                    'id' => 1932,
                    'nombre' => 'Sargento Cabral',
                    'parent_id' => 22,
                ),
            431 =>
                array (
                    'id' => 1933,
                    'nombre' => 'Sarmiento',
                    'parent_id' => 22,
                ),
            432 =>
                array (
                    'id' => 1934,
                    'nombre' => 'Sastre',
                    'parent_id' => 22,
                ),
            433 =>
                array (
                    'id' => 1935,
                    'nombre' => 'Sauce Viejo',
                    'parent_id' => 22,
                ),
            434 =>
                array (
                    'id' => 1936,
                    'nombre' => 'Serodino',
                    'parent_id' => 22,
                ),
            435 =>
                array (
                    'id' => 1937,
                    'nombre' => 'Silva',
                    'parent_id' => 22,
                ),
            436 =>
                array (
                    'id' => 1938,
                    'nombre' => 'Soldini',
                    'parent_id' => 22,
                ),
            437 =>
                array (
                    'id' => 1939,
                    'nombre' => 'Soledad',
                    'parent_id' => 22,
                ),
            438 =>
                array (
                    'id' => 1940,
                    'nombre' => 'Soutomayor',
                    'parent_id' => 22,
                ),
            439 =>
                array (
                    'id' => 1941,
                    'nombre' => 'Suardi',
                    'parent_id' => 22,
                ),
            440 =>
                array (
                    'id' => 1942,
                    'nombre' => 'Sunchales',
                    'parent_id' => 22,
                ),
            441 =>
                array (
                    'id' => 1943,
                    'nombre' => 'Susana',
                    'parent_id' => 22,
                ),
            442 =>
                array (
                    'id' => 1944,
                    'nombre' => 'Tacuarendi',
                    'parent_id' => 22,
                ),
            443 =>
                array (
                    'id' => 1945,
                    'nombre' => 'Tacural',
                    'parent_id' => 22,
                ),
            444 =>
                array (
                    'id' => 1946,
                    'nombre' => 'Tacurales',
                    'parent_id' => 22,
                ),
            445 =>
                array (
                    'id' => 1947,
                    'nombre' => 'Tartagal',
                    'parent_id' => 22,
                ),
            446 =>
                array (
                    'id' => 1948,
                    'nombre' => 'Teodelina',
                    'parent_id' => 22,
                ),
            447 =>
                array (
                    'id' => 1949,
                    'nombre' => 'Theobald',
                    'parent_id' => 22,
                ),
            448 =>
                array (
                    'id' => 1950,
                    'nombre' => 'Timbues - Jesus Maria',
                    'parent_id' => 22,
                ),
            449 =>
                array (
                    'id' => 1951,
                    'nombre' => 'Toba',
                    'parent_id' => 22,
                ),
            450 =>
                array (
                    'id' => 1952,
                    'nombre' => 'Tortugas',
                    'parent_id' => 22,
                ),
            451 =>
                array (
                    'id' => 1953,
                    'nombre' => 'Tostado',
                    'parent_id' => 22,
                ),
            452 =>
                array (
                    'id' => 1954,
                    'nombre' => 'Totoras',
                    'parent_id' => 22,
                ),
            453 =>
                array (
                    'id' => 1955,
                    'nombre' => 'Traill',
                    'parent_id' => 22,
                ),
            454 =>
                array (
                    'id' => 1956,
                    'nombre' => 'Venado Tuerto',
                    'parent_id' => 22,
                ),
            455 =>
                array (
                    'id' => 1957,
                    'nombre' => 'Vera',
                    'parent_id' => 22,
                ),
            456 =>
                array (
                    'id' => 1958,
                    'nombre' => 'Vera Y Pintado',
                    'parent_id' => 22,
                ),
            457 =>
                array (
                    'id' => 1959,
                    'nombre' => 'Videla',
                    'parent_id' => 22,
                ),
            458 =>
                array (
                    'id' => 1960,
                    'nombre' => 'Vila',
                    'parent_id' => 22,
                ),
            459 =>
                array (
                    'id' => 1961,
                    'nombre' => 'Villa Amelia',
                    'parent_id' => 22,
                ),
            460 =>
                array (
                    'id' => 1962,
                    'nombre' => 'Villa Ana',
                    'parent_id' => 22,
                ),
            461 =>
                array (
                    'id' => 1963,
                    'nombre' => 'Villa Cañas',
                    'parent_id' => 22,
                ),
            462 =>
                array (
                    'id' => 1964,
                    'nombre' => 'Villa Constitucion',
                    'parent_id' => 22,
                ),
            463 =>
                array (
                    'id' => 1965,
                    'nombre' => 'Villa Eloisa',
                    'parent_id' => 22,
                ),
            464 =>
                array (
                    'id' => 1966,
                    'nombre' => 'Villa Goberanador Galvez',
                    'parent_id' => 22,
                ),
            465 =>
                array (
                    'id' => 1967,
                    'nombre' => 'Villa Guillermina',
                    'parent_id' => 22,
                ),
            466 =>
                array (
                    'id' => 1968,
                    'nombre' => 'Villa Minetti',
                    'parent_id' => 22,
                ),
            467 =>
                array (
                    'id' => 1969,
                    'nombre' => 'Villa Mugueta',
                    'parent_id' => 22,
                ),
            468 =>
                array (
                    'id' => 1970,
                    'nombre' => 'Villa Ocampo',
                    'parent_id' => 22,
                ),
            469 =>
                array (
                    'id' => 1971,
                    'nombre' => 'Villa San Jose',
                    'parent_id' => 22,
                ),
            470 =>
                array (
                    'id' => 1972,
                    'nombre' => 'Villa Saralegui',
                    'parent_id' => 22,
                ),
            471 =>
                array (
                    'id' => 1973,
                    'nombre' => 'Villa Trinidad',
                    'parent_id' => 22,
                ),
            472 =>
                array (
                    'id' => 1974,
                    'nombre' => 'Villada',
                    'parent_id' => 22,
                ),
            473 =>
                array (
                    'id' => 1975,
                    'nombre' => 'Virginia',
                    'parent_id' => 22,
                ),
            474 =>
                array (
                    'id' => 1976,
                    'nombre' => 'Wheelwright',
                    'parent_id' => 22,
                ),
            475 =>
                array (
                    'id' => 1977,
                    'nombre' => 'Zaballa',
                    'parent_id' => 22,
                ),
            476 =>
                array (
                    'id' => 1978,
                    'nombre' => 'Zenon Pereyra',
                    'parent_id' => 22,
                ),
            477 =>
                array (
                    'id' => 1979,
                    'nombre' => 'Añatuya',
                    'parent_id' => 23,
                ),
            478 =>
                array (
                    'id' => 1980,
                    'nombre' => 'Arraga',
                    'parent_id' => 23,
                ),
            479 =>
                array (
                    'id' => 1981,
                    'nombre' => 'Bandera',
                    'parent_id' => 23,
                ),
            480 =>
                array (
                    'id' => 1982,
                    'nombre' => 'Bandera Bajada',
                    'parent_id' => 23,
                ),
            481 =>
                array (
                    'id' => 1983,
                    'nombre' => 'Beltran',
                    'parent_id' => 23,
                ),
            482 =>
                array (
                    'id' => 1984,
                    'nombre' => 'Bobadal',
                    'parent_id' => 23,
                ),
            483 =>
                array (
                    'id' => 1985,
                    'nombre' => 'Brea Pozo',
                    'parent_id' => 23,
                ),
            484 =>
                array (
                    'id' => 1986,
                    'nombre' => 'Campo Gallo',
                    'parent_id' => 23,
                ),
            485 =>
                array (
                    'id' => 1987,
                    'nombre' => 'Chilca Juliana',
                    'parent_id' => 23,
                ),
            486 =>
                array (
                    'id' => 1988,
                    'nombre' => 'Choya',
                    'parent_id' => 23,
                ),
            487 =>
                array (
                    'id' => 1989,
                    'nombre' => 'Clodomira',
                    'parent_id' => 23,
                ),
            488 =>
                array (
                    'id' => 1990,
                    'nombre' => 'Colonia Alpina',
                    'parent_id' => 23,
                ),
            489 =>
                array (
                    'id' => 1991,
                    'nombre' => 'Colonia Dora',
                    'parent_id' => 23,
                ),
            490 =>
                array (
                    'id' => 1992,
                    'nombre' => 'El Charco',
                    'parent_id' => 23,
                ),
            491 =>
                array (
                    'id' => 1993,
                    'nombre' => 'El Mojon',
                    'parent_id' => 23,
                ),
            492 =>
                array (
                    'id' => 1994,
                    'nombre' => 'El Simbolar',
                    'parent_id' => 23,
                ),
            493 =>
                array (
                    'id' => 1995,
                    'nombre' => 'Fernandez',
                    'parent_id' => 23,
                ),
            494 =>
                array (
                    'id' => 1996,
                    'nombre' => 'Fortin Inca',
                    'parent_id' => 23,
                ),
            495 =>
                array (
                    'id' => 1997,
                    'nombre' => 'Frias',
                    'parent_id' => 23,
                ),
            496 =>
                array (
                    'id' => 1998,
                    'nombre' => 'Garza',
                    'parent_id' => 23,
                ),
            497 =>
                array (
                    'id' => 1999,
                    'nombre' => 'Gramilla',
                    'parent_id' => 23,
                ),
            498 =>
                array (
                    'id' => 2000,
                    'nombre' => 'Guardia Escolta',
                    'parent_id' => 23,
                ),
            499 =>
                array (
                    'id' => 2001,
                    'nombre' => 'Herrera',
                    'parent_id' => 23,
                ),
        ));
        \DB::table('geolocalizacion')->insert(array (
            0 =>
                array (
                    'id' => 2002,
                    'nombre' => 'Icaño',
                    'parent_id' => 23,
                ),
            1 =>
                array (
                    'id' => 2003,
                    'nombre' => 'Ingeniero Forres',
                    'parent_id' => 23,
                ),
            2 =>
                array (
                    'id' => 2004,
                    'nombre' => 'Juan F. Ibarra',
                    'parent_id' => 23,
                ),
            3 =>
                array (
                    'id' => 2005,
                    'nombre' => 'La Banda',
                    'parent_id' => 23,
                ),
            4 =>
                array (
                    'id' => 2006,
                    'nombre' => 'La Cañada',
                    'parent_id' => 23,
                ),
            5 =>
                array (
                    'id' => 2007,
                    'nombre' => 'Laprida',
                    'parent_id' => 23,
                ),
            6 =>
                array (
                    'id' => 2008,
                    'nombre' => 'Lavalle',
                    'parent_id' => 23,
                ),
            7 =>
                array (
                    'id' => 2009,
                    'nombre' => 'Loreto',
                    'parent_id' => 23,
                ),
            8 =>
                array (
                    'id' => 2010,
                    'nombre' => 'Los Juries',
                    'parent_id' => 23,
                ),
            9 =>
                array (
                    'id' => 2011,
                    'nombre' => 'Los Nuñez',
                    'parent_id' => 23,
                ),
            10 =>
                array (
                    'id' => 2012,
                    'nombre' => 'Los Pirpintos',
                    'parent_id' => 23,
                ),
            11 =>
                array (
                    'id' => 2013,
                    'nombre' => 'Los Quirogas',
                    'parent_id' => 23,
                ),
            12 =>
                array (
                    'id' => 2014,
                    'nombre' => 'Los Telares',
                    'parent_id' => 23,
                ),
            13 =>
                array (
                    'id' => 2015,
                    'nombre' => 'Lugones',
                    'parent_id' => 23,
                ),
            14 =>
                array (
                    'id' => 2016,
                    'nombre' => 'Malbrán',
                    'parent_id' => 23,
                ),
            15 =>
                array (
                    'id' => 2017,
                    'nombre' => 'Matara',
                    'parent_id' => 23,
                ),
            16 =>
                array (
                    'id' => 2018,
                    'nombre' => 'Medellin',
                    'parent_id' => 23,
                ),
            17 =>
                array (
                    'id' => 2019,
                    'nombre' => 'Monte Quemado',
                    'parent_id' => 23,
                ),
            18 =>
                array (
                    'id' => 2020,
                    'nombre' => 'Nueva Esperanza',
                    'parent_id' => 23,
                ),
            19 =>
                array (
                    'id' => 2021,
                    'nombre' => 'Nueva Francia',
                    'parent_id' => 23,
                ),
            20 =>
                array (
                    'id' => 2022,
                    'nombre' => 'Palo Negro',
                    'parent_id' => 23,
                ),
            21 =>
                array (
                    'id' => 2023,
                    'nombre' => 'Pampa De Los Guanacos',
                    'parent_id' => 23,
                ),
            22 =>
                array (
                    'id' => 2024,
                    'nombre' => 'Pinto',
                    'parent_id' => 23,
                ),
            23 =>
                array (
                    'id' => 2025,
                    'nombre' => 'Pozo Hondo',
                    'parent_id' => 23,
                ),
            24 =>
                array (
                    'id' => 2026,
                    'nombre' => 'Quimili',
                    'parent_id' => 23,
                ),
            25 =>
                array (
                    'id' => 2027,
                    'nombre' => 'Real Sayana',
                    'parent_id' => 23,
                ),
            26 =>
                array (
                    'id' => 2028,
                    'nombre' => 'Sachayoi',
                    'parent_id' => 23,
                ),
            27 =>
                array (
                    'id' => 2029,
                    'nombre' => 'San Pedro De Guazaya',
                    'parent_id' => 23,
                ),
            28 =>
                array (
                    'id' => 2030,
                    'nombre' => 'Santiago Del Estero',
                    'parent_id' => 23,
                ),
            29 =>
                array (
                    'id' => 2031,
                    'nombre' => 'Selva',
                    'parent_id' => 23,
                ),
            30 =>
                array (
                    'id' => 2032,
                    'nombre' => 'Simbolar',
                    'parent_id' => 23,
                ),
            31 =>
                array (
                    'id' => 2033,
                    'nombre' => 'Sol De Julio',
                    'parent_id' => 23,
                ),
            32 =>
                array (
                    'id' => 2034,
                    'nombre' => 'Sumampa',
                    'parent_id' => 23,
                ),
            33 =>
                array (
                    'id' => 2035,
                    'nombre' => 'Suncho Corral',
                    'parent_id' => 23,
                ),
            34 =>
                array (
                    'id' => 2036,
                    'nombre' => 'Taboada',
                    'parent_id' => 23,
                ),
            35 =>
                array (
                    'id' => 2037,
                    'nombre' => 'Tapso',
                    'parent_id' => 23,
                ),
            36 =>
                array (
                    'id' => 2038,
                    'nombre' => 'Termas De Rio Hondo',
                    'parent_id' => 23,
                ),
            37 =>
                array (
                    'id' => 2039,
                    'nombre' => 'Tintina',
                    'parent_id' => 23,
                ),
            38 =>
                array (
                    'id' => 2040,
                    'nombre' => 'Tomas Young',
                    'parent_id' => 23,
                ),
            39 =>
                array (
                    'id' => 2041,
                    'nombre' => 'Vilelas',
                    'parent_id' => 23,
                ),
            40 =>
                array (
                    'id' => 2042,
                    'nombre' => 'Villa Atamisqui',
                    'parent_id' => 23,
                ),
            41 =>
                array (
                    'id' => 2043,
                    'nombre' => 'Villa La Punta',
                    'parent_id' => 23,
                ),
            42 =>
                array (
                    'id' => 2044,
                    'nombre' => 'Villa Ojo De Agua',
                    'parent_id' => 23,
                ),
            43 =>
                array (
                    'id' => 2045,
                    'nombre' => 'Villa Rio Hondo',
                    'parent_id' => 23,
                ),
            44 =>
                array (
                    'id' => 2046,
                    'nombre' => 'Villa Salavina',
                    'parent_id' => 23,
                ),
            45 =>
                array (
                    'id' => 2047,
                    'nombre' => 'Villa Union',
                    'parent_id' => 23,
                ),
            46 =>
                array (
                    'id' => 2048,
                    'nombre' => 'Vilmer',
                    'parent_id' => 23,
                ),
            47 =>
                array (
                    'id' => 2049,
                    'nombre' => 'Weisburd',
                    'parent_id' => 23,
                ),
            48 =>
                array (
                    'id' => 2050,
                    'nombre' => 'Río Grande',
                    'parent_id' => 24,
                ),
            49 =>
                array (
                    'id' => 2051,
                    'nombre' => 'Tolhuin',
                    'parent_id' => 24,
                ),
            50 =>
                array (
                    'id' => 2052,
                    'nombre' => 'Ushuaia',
                    'parent_id' => 24,
                ),
            51 =>
                array (
                    'id' => 2053,
                    'nombre' => '7 De Abril',
                    'parent_id' => 25,
                ),
            52 =>
                array (
                    'id' => 2054,
                    'nombre' => 'Acheral',
                    'parent_id' => 25,
                ),
            53 =>
                array (
                    'id' => 2055,
                    'nombre' => 'Agua Dulce Y La Soledad',
                    'parent_id' => 25,
                ),
            54 =>
                array (
                    'id' => 2056,
                    'nombre' => 'Aguilares',
                    'parent_id' => 25,
                ),
            55 =>
                array (
                    'id' => 2057,
                    'nombre' => 'Alderetes',
                    'parent_id' => 25,
                ),
            56 =>
                array (
                    'id' => 2058,
                    'nombre' => 'Alpachiri Y El Molino',
                    'parent_id' => 25,
                ),
            57 =>
                array (
                    'id' => 2059,
                    'nombre' => 'Alto Verde Y Los Guchea',
                    'parent_id' => 25,
                ),
            58 =>
                array (
                    'id' => 2060,
                    'nombre' => 'Amaicha Del Valle',
                    'parent_id' => 25,
                ),
            59 =>
                array (
                    'id' => 2061,
                    'nombre' => 'Amberes',
                    'parent_id' => 25,
                ),
            60 =>
                array (
                    'id' => 2062,
                    'nombre' => 'Ancajuli',
                    'parent_id' => 25,
                ),
            61 =>
                array (
                    'id' => 2063,
                    'nombre' => 'Arcadia',
                    'parent_id' => 25,
                ),
            62 =>
                array (
                    'id' => 2064,
                    'nombre' => 'Atahona',
                    'parent_id' => 25,
                ),
            63 =>
                array (
                    'id' => 2065,
                    'nombre' => 'Banda Del Río Salí',
                    'parent_id' => 25,
                ),
            64 =>
                array (
                    'id' => 2066,
                    'nombre' => 'Bella Vista',
                    'parent_id' => 25,
                ),
            65 =>
                array (
                    'id' => 2067,
                    'nombre' => 'Buena Vista',
                    'parent_id' => 25,
                ),
            66 =>
                array (
                    'id' => 2068,
                    'nombre' => 'Burruyacú',
                    'parent_id' => 25,
                ),
            67 =>
                array (
                    'id' => 2069,
                    'nombre' => 'Capitán Cáceres',
                    'parent_id' => 25,
                ),
            68 =>
                array (
                    'id' => 2070,
                    'nombre' => 'Cevil Redondo',
                    'parent_id' => 25,
                ),
            69 =>
                array (
                    'id' => 2071,
                    'nombre' => 'Choromoro',
                    'parent_id' => 25,
                ),
            70 =>
                array (
                    'id' => 2072,
                    'nombre' => 'Ciudacita',
                    'parent_id' => 25,
                ),
            71 =>
                array (
                    'id' => 2073,
                    'nombre' => 'Colalao Del Valle',
                    'parent_id' => 25,
                ),
            72 =>
                array (
                    'id' => 2074,
                    'nombre' => 'Colombres',
                    'parent_id' => 25,
                ),
            73 =>
                array (
                    'id' => 2075,
                    'nombre' => 'Comuna De Yerba Buena',
                    'parent_id' => 25,
                ),
            74 =>
                array (
                    'id' => 2076,
                    'nombre' => 'Concepción',
                    'parent_id' => 25,
                ),
            75 =>
                array (
                    'id' => 2077,
                    'nombre' => 'Delfín Gallo',
                    'parent_id' => 25,
                ),
            76 =>
                array (
                    'id' => 2078,
                    'nombre' => 'El Bracho Y El Cevilar',
                    'parent_id' => 25,
                ),
            77 =>
                array (
                    'id' => 2079,
                    'nombre' => 'El Cadillal',
                    'parent_id' => 25,
                ),
            78 =>
                array (
                    'id' => 2080,
                    'nombre' => 'El Cercado',
                    'parent_id' => 25,
                ),
            79 =>
                array (
                    'id' => 2081,
                    'nombre' => 'El Chañar',
                    'parent_id' => 25,
                ),
            80 =>
                array (
                    'id' => 2082,
                    'nombre' => 'El Manantial',
                    'parent_id' => 25,
                ),
            81 =>
                array (
                    'id' => 2083,
                    'nombre' => 'El Mojón',
                    'parent_id' => 25,
                ),
            82 =>
                array (
                    'id' => 2084,
                    'nombre' => 'El Mollar',
                    'parent_id' => 25,
                ),
            83 =>
                array (
                    'id' => 2085,
                    'nombre' => 'El Naranjito',
                    'parent_id' => 25,
                ),
            84 =>
                array (
                    'id' => 2086,
                    'nombre' => 'El Naranjo Y El Sunchal',
                    'parent_id' => 25,
                ),
            85 =>
                array (
                    'id' => 2087,
                    'nombre' => 'El Polear',
                    'parent_id' => 25,
                ),
            86 =>
                array (
                    'id' => 2088,
                    'nombre' => 'El Puestito',
                    'parent_id' => 25,
                ),
            87 =>
                array (
                    'id' => 2089,
                    'nombre' => 'El Sacrificio',
                    'parent_id' => 25,
                ),
            88 =>
                array (
                    'id' => 2090,
                    'nombre' => 'El Timbo',
                    'parent_id' => 25,
                ),
            89 =>
                array (
                    'id' => 2091,
                    'nombre' => 'Escaba',
                    'parent_id' => 25,
                ),
            90 =>
                array (
                    'id' => 2092,
                    'nombre' => 'Esquina Y Mancopa',
                    'parent_id' => 25,
                ),
            91 =>
                array (
                    'id' => 2093,
                    'nombre' => 'Estación Aráoz Y Tacanas',
                    'parent_id' => 25,
                ),
            92 =>
                array (
                    'id' => 2094,
                    'nombre' => 'Famaillá',
                    'parent_id' => 25,
                ),
            93 =>
                array (
                    'id' => 2095,
                    'nombre' => 'Gastona Y Belicha',
                    'parent_id' => 25,
                ),
            94 =>
                array (
                    'id' => 2096,
                    'nombre' => 'Gobernador Garmendia',
                    'parent_id' => 25,
                ),
            95 =>
                array (
                    'id' => 2097,
                    'nombre' => 'Gobernador Piedrabuena',
                    'parent_id' => 25,
                ),
            96 =>
                array (
                    'id' => 2098,
                    'nombre' => 'Graneros',
                    'parent_id' => 25,
                ),
            97 =>
                array (
                    'id' => 2099,
                    'nombre' => 'Huasa Pampa',
                    'parent_id' => 25,
                ),
            98 =>
                array (
                    'id' => 2100,
                    'nombre' => 'Juan Bautista Alberdi',
                    'parent_id' => 25,
                ),
            99 =>
                array (
                    'id' => 2101,
                    'nombre' => 'La Cocha',
                    'parent_id' => 25,
                ),
            100 =>
                array (
                    'id' => 2102,
                    'nombre' => 'La Esperanza',
                    'parent_id' => 25,
                ),
            101 =>
                array (
                    'id' => 2103,
                    'nombre' => 'La Florida Y Luisiana',
                    'parent_id' => 25,
                ),
            102 =>
                array (
                    'id' => 2104,
                    'nombre' => 'La Ramada Y La Cruz',
                    'parent_id' => 25,
                ),
            103 =>
                array (
                    'id' => 2105,
                    'nombre' => 'La Trinidad',
                    'parent_id' => 25,
                ),
            104 =>
                array (
                    'id' => 2106,
                    'nombre' => 'Lamadrid',
                    'parent_id' => 25,
                ),
            105 =>
                array (
                    'id' => 2107,
                    'nombre' => 'Las Cejas',
                    'parent_id' => 25,
                ),
            106 =>
                array (
                    'id' => 2108,
                    'nombre' => 'Las Talas',
                    'parent_id' => 25,
                ),
            107 =>
                array (
                    'id' => 2109,
                    'nombre' => 'Las Talitas',
                    'parent_id' => 25,
                ),
            108 =>
                array (
                    'id' => 2110,
                    'nombre' => 'León Rouges Y Santa Rosa',
                    'parent_id' => 25,
                ),
            109 =>
                array (
                    'id' => 2111,
                    'nombre' => 'Los Bulacio Y Los Villagra',
                    'parent_id' => 25,
                ),
            110 =>
                array (
                    'id' => 2112,
                    'nombre' => 'Los Gómez',
                    'parent_id' => 25,
                ),
            111 =>
                array (
                    'id' => 2113,
                    'nombre' => 'Los Nogales',
                    'parent_id' => 25,
                ),
            112 =>
                array (
                    'id' => 2114,
                    'nombre' => 'Los Pereyra',
                    'parent_id' => 25,
                ),
            113 =>
                array (
                    'id' => 2115,
                    'nombre' => 'Los Pérez',
                    'parent_id' => 25,
                ),
            114 =>
                array (
                    'id' => 2116,
                    'nombre' => 'Los Puestos',
                    'parent_id' => 25,
                ),
            115 =>
                array (
                    'id' => 2117,
                    'nombre' => 'Los Ralos',
                    'parent_id' => 25,
                ),
            116 =>
                array (
                    'id' => 2118,
                    'nombre' => 'Los Sarmientos Y La Tipa',
                    'parent_id' => 25,
                ),
            117 =>
                array (
                    'id' => 2119,
                    'nombre' => 'Los Sosa',
                    'parent_id' => 25,
                ),
            118 =>
                array (
                    'id' => 2120,
                    'nombre' => 'Lules',
                    'parent_id' => 25,
                ),
            119 =>
                array (
                    'id' => 2121,
                    'nombre' => 'Manuel García Fernández',
                    'parent_id' => 25,
                ),
            120 =>
                array (
                    'id' => 2122,
                    'nombre' => 'Manuela Pedraza',
                    'parent_id' => 25,
                ),
            121 =>
                array (
                    'id' => 2123,
                    'nombre' => 'Medina',
                    'parent_id' => 25,
                ),
            122 =>
                array (
                    'id' => 2124,
                    'nombre' => 'Monte Bello',
                    'parent_id' => 25,
                ),
            123 =>
                array (
                    'id' => 2125,
                    'nombre' => 'Monteagudo',
                    'parent_id' => 25,
                ),
            124 =>
                array (
                    'id' => 2126,
                    'nombre' => 'Monteros',
                    'parent_id' => 25,
                ),
            125 =>
                array (
                    'id' => 2127,
                    'nombre' => 'Pampa Mayo',
                    'parent_id' => 25,
                ),
            126 =>
                array (
                    'id' => 2128,
                    'nombre' => 'Quilmes Y Los Sueldos',
                    'parent_id' => 25,
                ),
            127 =>
                array (
                    'id' => 2129,
                    'nombre' => 'Raco',
                    'parent_id' => 25,
                ),
            128 =>
                array (
                    'id' => 2130,
                    'nombre' => 'Ranchillos Y San Miguel',
                    'parent_id' => 25,
                ),
            129 =>
                array (
                    'id' => 2131,
                    'nombre' => 'Río Chico Y Nueva Trinidad',
                    'parent_id' => 25,
                ),
            130 =>
                array (
                    'id' => 2132,
                    'nombre' => 'Río Colorado',
                    'parent_id' => 25,
                ),
            131 =>
                array (
                    'id' => 2133,
                    'nombre' => 'Río Seco',
                    'parent_id' => 25,
                ),
            132 =>
                array (
                    'id' => 2134,
                    'nombre' => 'Rumi Punco',
                    'parent_id' => 25,
                ),
            133 =>
                array (
                    'id' => 2135,
                    'nombre' => 'San Andrés',
                    'parent_id' => 25,
                ),
            134 =>
                array (
                    'id' => 2136,
                    'nombre' => 'San Felipe Y Santa Bárbara',
                    'parent_id' => 25,
                ),
            135 =>
                array (
                    'id' => 2137,
                    'nombre' => 'San Ignacio',
                    'parent_id' => 25,
                ),
            136 =>
                array (
                    'id' => 2138,
                    'nombre' => 'San Javier',
                    'parent_id' => 25,
                ),
            137 =>
                array (
                    'id' => 2139,
                    'nombre' => 'San José De La Cocha',
                    'parent_id' => 25,
                ),
            138 =>
                array (
                    'id' => 2140,
                    'nombre' => 'San Miguel De Tucumán',
                    'parent_id' => 25,
                ),
            139 =>
                array (
                    'id' => 2141,
                    'nombre' => 'San Pablo Y Villa Nougués',
                    'parent_id' => 25,
                ),
            140 =>
                array (
                    'id' => 2142,
                    'nombre' => 'San Pedro De Colalao',
                    'parent_id' => 25,
                ),
            141 =>
                array (
                    'id' => 2143,
                    'nombre' => 'San Pedro Y San Antonio',
                    'parent_id' => 25,
                ),
            142 =>
                array (
                    'id' => 2144,
                    'nombre' => 'Santa Ana',
                    'parent_id' => 25,
                ),
            143 =>
                array (
                    'id' => 2145,
                    'nombre' => 'Santa Cruz Y La Tuna',
                    'parent_id' => 25,
                ),
            144 =>
                array (
                    'id' => 2146,
                    'nombre' => 'Santa Lucía',
                    'parent_id' => 25,
                ),
            145 =>
                array (
                    'id' => 2147,
                    'nombre' => 'Santa Rosa De Leales Y Laguna Blanca',
                    'parent_id' => 25,
                ),
            146 =>
                array (
                    'id' => 2148,
                    'nombre' => 'Sargento Moya',
                    'parent_id' => 25,
                ),
            147 =>
                array (
                    'id' => 2149,
                    'nombre' => 'Simoca',
                    'parent_id' => 25,
                ),
            148 =>
                array (
                    'id' => 2150,
                    'nombre' => 'Soldado Maldonado',
                    'parent_id' => 25,
                ),
            149 =>
                array (
                    'id' => 2151,
                    'nombre' => 'Taco Ralo',
                    'parent_id' => 25,
                ),
            150 =>
                array (
                    'id' => 2152,
                    'nombre' => 'Tafí Del Valle',
                    'parent_id' => 25,
                ),
            151 =>
                array (
                    'id' => 2153,
                    'nombre' => 'Tafí Viejo',
                    'parent_id' => 25,
                ),
            152 =>
                array (
                    'id' => 2154,
                    'nombre' => 'Tapia',
                    'parent_id' => 25,
                ),
            153 =>
                array (
                    'id' => 2155,
                    'nombre' => 'Teniente Berdina',
                    'parent_id' => 25,
                ),
            154 =>
                array (
                    'id' => 2156,
                    'nombre' => 'Trancas',
                    'parent_id' => 25,
                ),
            155 =>
                array (
                    'id' => 2157,
                    'nombre' => 'Villa Belgrano',
                    'parent_id' => 25,
                ),
            156 =>
                array (
                    'id' => 2158,
                    'nombre' => 'Villa Benjamín Aráoz Y El Tajamar',
                    'parent_id' => 25,
                ),
            157 =>
                array (
                    'id' => 2159,
                    'nombre' => 'Villa Chicligasta',
                    'parent_id' => 25,
                ),
            158 =>
                array (
                    'id' => 2160,
                    'nombre' => 'Villa De Leales',
                    'parent_id' => 25,
                ),
            159 =>
                array (
                    'id' => 2161,
                    'nombre' => 'Villa Padre Monti',
                    'parent_id' => 25,
                ),
            160 =>
                array (
                    'id' => 2162,
                    'nombre' => 'Villa Quinteros',
                    'parent_id' => 25,
                ),
            161 =>
                array (
                    'id' => 2163,
                    'nombre' => 'Yanima',
                    'parent_id' => 25,
                ),
            162 =>
                array (
                    'id' => 2164,
                    'nombre' => 'Yerba Buena',
                    'parent_id' => 25,
                ),
            163 =>
                array (
                    'id' => 2165,
                    'nombre' => 'Agronomía',
                    'parent_id' => 26,
                ),
            164 =>
                array (
                    'id' => 2166,
                    'nombre' => 'Almagro',
                    'parent_id' => 26,
                ),
            165 =>
                array (
                    'id' => 2167,
                    'nombre' => 'Balvanera',
                    'parent_id' => 26,
                ),
            166 =>
                array (
                    'id' => 2168,
                    'nombre' => 'Barracas',
                    'parent_id' => 26,
                ),
            167 =>
                array (
                    'id' => 2169,
                    'nombre' => 'Belgrano',
                    'parent_id' => 26,
                ),
            168 =>
                array (
                    'id' => 2170,
                    'nombre' => 'Boedo',
                    'parent_id' => 26,
                ),
            169 =>
                array (
                    'id' => 2171,
                    'nombre' => 'Caballito',
                    'parent_id' => 26,
                ),
            170 =>
                array (
                    'id' => 2172,
                    'nombre' => 'Chacarita',
                    'parent_id' => 26,
                ),
            171 =>
                array (
                    'id' => 2173,
                    'nombre' => 'Coghlan',
                    'parent_id' => 26,
                ),
            172 =>
                array (
                    'id' => 2174,
                    'nombre' => 'Colegiales',
                    'parent_id' => 26,
                ),
            173 =>
                array (
                    'id' => 2175,
                    'nombre' => 'Constitución',
                    'parent_id' => 26,
                ),
            174 =>
                array (
                    'id' => 2176,
                    'nombre' => 'Flores',
                    'parent_id' => 26,
                ),
            175 =>
                array (
                    'id' => 2177,
                    'nombre' => 'Floresta',
                    'parent_id' => 26,
                ),
            176 =>
                array (
                    'id' => 2178,
                    'nombre' => 'La Boca',
                    'parent_id' => 26,
                ),
            177 =>
                array (
                    'id' => 2179,
                    'nombre' => 'La Paternal',
                    'parent_id' => 26,
                ),
            178 =>
                array (
                    'id' => 2180,
                    'nombre' => 'Liniers',
                    'parent_id' => 26,
                ),
            179 =>
                array (
                    'id' => 2181,
                    'nombre' => 'Mataderos',
                    'parent_id' => 26,
                ),
            180 =>
                array (
                    'id' => 2182,
                    'nombre' => 'Monte Castro',
                    'parent_id' => 26,
                ),
            181 =>
                array (
                    'id' => 2183,
                    'nombre' => 'Montserrat',
                    'parent_id' => 26,
                ),
            182 =>
                array (
                    'id' => 2184,
                    'nombre' => 'Nueva Pompeya',
                    'parent_id' => 26,
                ),
            183 =>
                array (
                    'id' => 2185,
                    'nombre' => 'Nuñez',
                    'parent_id' => 26,
                ),
            184 =>
                array (
                    'id' => 2186,
                    'nombre' => 'Palermo',
                    'parent_id' => 26,
                ),
            185 =>
                array (
                    'id' => 2187,
                    'nombre' => 'Parque Avellaneda',
                    'parent_id' => 26,
                ),
            186 =>
                array (
                    'id' => 2188,
                    'nombre' => 'Parque Chacabuco',
                    'parent_id' => 26,
                ),
            187 =>
                array (
                    'id' => 2189,
                    'nombre' => 'Parque Chas',
                    'parent_id' => 26,
                ),
            188 =>
                array (
                    'id' => 2190,
                    'nombre' => 'Parque Patricios',
                    'parent_id' => 26,
                ),
            189 =>
                array (
                    'id' => 2191,
                    'nombre' => 'Puerto Madero',
                    'parent_id' => 26,
                ),
            190 =>
                array (
                    'id' => 2192,
                    'nombre' => 'Recoleta',
                    'parent_id' => 26,
                ),
            191 =>
                array (
                    'id' => 2193,
                    'nombre' => 'Retiro',
                    'parent_id' => 26,
                ),
            192 =>
                array (
                    'id' => 2194,
                    'nombre' => 'Saavedra',
                    'parent_id' => 26,
                ),
            193 =>
                array (
                    'id' => 2195,
                    'nombre' => 'San Cristóbal',
                    'parent_id' => 26,
                ),
            194 =>
                array (
                    'id' => 2196,
                    'nombre' => 'San Nicolás',
                    'parent_id' => 26,
                ),
            195 =>
                array (
                    'id' => 2197,
                    'nombre' => 'San Telmo',
                    'parent_id' => 26,
                ),
            196 =>
                array (
                    'id' => 2198,
                    'nombre' => 'Versalles',
                    'parent_id' => 26,
                ),
            197 =>
                array (
                    'id' => 2199,
                    'nombre' => 'Villa Crespo',
                    'parent_id' => 26,
                ),
            198 =>
                array (
                    'id' => 2200,
                    'nombre' => 'Villa Devoto',
                    'parent_id' => 26,
                ),
            199 =>
                array (
                    'id' => 2201,
                    'nombre' => 'Villa General Mitre',
                    'parent_id' => 26,
                ),
            200 =>
                array (
                    'id' => 2202,
                    'nombre' => 'Villa Lugano',
                    'parent_id' => 26,
                ),
            201 =>
                array (
                    'id' => 2203,
                    'nombre' => 'Villa Luro',
                    'parent_id' => 26,
                ),
            202 =>
                array (
                    'id' => 2204,
                    'nombre' => 'Villa Ortúzar',
                    'parent_id' => 26,
                ),
            203 =>
                array (
                    'id' => 2205,
                    'nombre' => 'Villa Pueyrredón',
                    'parent_id' => 26,
                ),
            204 =>
                array (
                    'id' => 2206,
                    'nombre' => 'Villa Real',
                    'parent_id' => 26,
                ),
            205 =>
                array (
                    'id' => 2207,
                    'nombre' => 'Villa Riachuelo',
                    'parent_id' => 26,
                ),
            206 =>
                array (
                    'id' => 2208,
                    'nombre' => 'Villa Santa Rita',
                    'parent_id' => 26,
                ),
            207 =>
                array (
                    'id' => 2209,
                    'nombre' => 'Villa Soldati',
                    'parent_id' => 26,
                ),
            208 =>
                array (
                    'id' => 2210,
                    'nombre' => 'Villa Urquiza',
                    'parent_id' => 26,
                ),
            209 =>
                array (
                    'id' => 2211,
                    'nombre' => 'Villa del Parque',
                    'parent_id' => 26,
                ),
            210 =>
                array (
                    'id' => 2212,
                    'nombre' => 'Vélez Sarsfield',
                    'parent_id' => 26,
                ),
            211 =>
                array (
                    'id' => 2213,
                    'nombre' => 'Agronomia',
                    'parent_id' => 2,
                ),
            212 =>
                array (
                    'id' => 2214,
                    'nombre' => 'Almagro',
                    'parent_id' => 2,
                ),
            213 =>
                array (
                    'id' => 2215,
                    'nombre' => 'Caballito',
                    'parent_id' => 2,
                ),
            214 =>
                array (
                    'id' => 2216,
                    'nombre' => 'Chacarita',
                    'parent_id' => 2,
                ),
            215 =>
                array (
                    'id' => 2217,
                    'nombre' => 'Coghlan',
                    'parent_id' => 2,
                ),
            216 =>
                array (
                    'id' => 2218,
                    'nombre' => 'Constitución',
                    'parent_id' => 2,
                ),
            217 =>
                array (
                    'id' => 2219,
                    'nombre' => 'Flores',
                    'parent_id' => 2,
                ),
            218 =>
                array (
                    'id' => 2220,
                    'nombre' => 'Floresta',
                    'parent_id' => 2,
                ),
            219 =>
                array (
                    'id' => 2221,
                    'nombre' => 'La Boca',
                    'parent_id' => 2,
                ),
            220 =>
                array (
                    'id' => 2222,
                    'nombre' => 'La Paternal',
                    'parent_id' => 2,
                ),
            221 =>
                array (
                    'id' => 2223,
                    'nombre' => 'Liniers',
                    'parent_id' => 2,
                ),
            222 =>
                array (
                    'id' => 2224,
                    'nombre' => 'Mataderos',
                    'parent_id' => 2,
                ),
            223 =>
                array (
                    'id' => 2225,
                    'nombre' => 'Monte Castro',
                    'parent_id' => 2,
                ),
            224 =>
                array (
                    'id' => 2226,
                    'nombre' => 'Montserrat',
                    'parent_id' => 2,
                ),
            225 =>
                array (
                    'id' => 2227,
                    'nombre' => 'Nueva Pompeya',
                    'parent_id' => 2,
                ),
            226 =>
                array (
                    'id' => 2228,
                    'nombre' => 'Nuñez',
                    'parent_id' => 2,
                ),
            227 =>
                array (
                    'id' => 2229,
                    'nombre' => 'Palermo',
                    'parent_id' => 2,
                ),
            228 =>
                array (
                    'id' => 2230,
                    'nombre' => 'Parque Avellaneda',
                    'parent_id' => 2,
                ),
            229 =>
                array (
                    'id' => 2231,
                    'nombre' => 'Parque Chacabuco',
                    'parent_id' => 2,
                ),
            230 =>
                array (
                    'id' => 2232,
                    'nombre' => 'Parque Chas',
                    'parent_id' => 2,
                ),
            231 =>
                array (
                    'id' => 2233,
                    'nombre' => 'Parque Patricios',
                    'parent_id' => 2,
                ),
            232 =>
                array (
                    'id' => 2234,
                    'nombre' => 'Puerto Madero',
                    'parent_id' => 2,
                ),
            233 =>
                array (
                    'id' => 2235,
                    'nombre' => 'Recoleta',
                    'parent_id' => 2,
                ),
            234 =>
                array (
                    'id' => 2236,
                    'nombre' => 'Retiro',
                    'parent_id' => 2,
                ),
            235 =>
                array (
                    'id' => 2237,
                    'nombre' => 'Saavedra',
                    'parent_id' => 2,
                ),
            236 =>
                array (
                    'id' => 2238,
                    'nombre' => 'San Cristóbal',
                    'parent_id' => 2,
                ),
            237 =>
                array (
                    'id' => 2239,
                    'nombre' => 'San Nicolás',
                    'parent_id' => 2,
                ),
            238 =>
                array (
                    'id' => 2240,
                    'nombre' => 'San Telmo',
                    'parent_id' => 2,
                ),
            239 =>
                array (
                    'id' => 2241,
                    'nombre' => 'Versalles',
                    'parent_id' => 2,
                ),
            240 =>
                array (
                    'id' => 2242,
                    'nombre' => 'Villa Crespo',
                    'parent_id' => 2,
                ),
            241 =>
                array (
                    'id' => 2243,
                    'nombre' => 'Villa Devoto',
                    'parent_id' => 2,
                ),
            242 =>
                array (
                    'id' => 2244,
                    'nombre' => 'Villa General Mitre',
                    'parent_id' => 2,
                ),
            243 =>
                array (
                    'id' => 2245,
                    'nombre' => 'Villa Lugano',
                    'parent_id' => 2,
                ),
            244 =>
                array (
                    'id' => 2246,
                    'nombre' => 'Villa Luro',
                    'parent_id' => 2,
                ),
            245 =>
                array (
                    'id' => 2247,
                    'nombre' => 'Villa Ortúzar',
                    'parent_id' => 2,
                ),
            246 =>
                array (
                    'id' => 2248,
                    'nombre' => 'Villa Pueyrredón',
                    'parent_id' => 2,
                ),
            247 =>
                array (
                    'id' => 2249,
                    'nombre' => 'Villa Real',
                    'parent_id' => 2,
                ),
            248 =>
                array (
                    'id' => 2250,
                    'nombre' => 'Villa Riachuelo',
                    'parent_id' => 2,
                ),
            249 =>
                array (
                    'id' => 2251,
                    'nombre' => 'Villa Santa Rita',
                    'parent_id' => 2,
                ),
            250 =>
                array (
                    'id' => 2252,
                    'nombre' => 'Villa Soldati',
                    'parent_id' => 2,
                ),
            251 =>
                array (
                    'id' => 2253,
                    'nombre' => 'Villa Urquiza',
                    'parent_id' => 2,
                ),
            252 =>
                array (
                    'id' => 2254,
                    'nombre' => 'Villa del Parque',
                    'parent_id' => 2,
                ),
            253 =>
                array (
                    'id' => 2255,
                    'nombre' => 'Vélez Sarsfield',
                    'parent_id' => 2,
                ),
            254 =>
                array (
                    'id' => 2256,
                    'nombre' => 'Balvanera',
                    'parent_id' => 2,
                ),
            255 =>
                array (
                    'id' => 2257,
                    'nombre' => 'Barracas',
                    'parent_id' => 2,
                ),
            256 =>
                array (
                    'id' => 2258,
                    'nombre' => 'Belgrano',
                    'parent_id' => 2,
                ),
            257 =>
                array (
                    'id' => 2259,
                    'nombre' => 'Boedo',
                    'parent_id' => 2,
                ),
            258 =>
                array (
                    'id' => 2260,
                    'nombre' => 'Colegiales',
                    'parent_id' => 2,
                ),
        ));


    }
}
