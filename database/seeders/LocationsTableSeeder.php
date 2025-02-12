<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Antalya',
                'latitude' => '36.88410000',
                'longitude' => '30.70560000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:06:10',
                'updated_at' => '2025-02-12 12:06:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Burdur',
                'latitude' => '37.72240000',
                'longitude' => '30.06600000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:06:20',
                'updated_at' => '2025-02-12 12:06:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Denizli',
                'latitude' => '37.77420000',
                'longitude' => '29.79800000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:06:28',
                'updated_at' => '2025-02-12 12:06:28',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Afyon',
                'latitude' => '38.75850000',
                'longitude' => '30.54520000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:06:37',
                'updated_at' => '2025-02-12 12:06:37',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Ankara',
                'latitude' => '39.93340000',
                'longitude' => '32.85970000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:06:47',
                'updated_at' => '2025-02-12 12:06:47',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'İzmir',
                'latitude' => '38.41920000',
                'longitude' => '27.12870000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:06:54',
                'updated_at' => '2025-02-12 12:06:54',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sakarya',
                'latitude' => '40.77440000',
                'longitude' => '30.43540000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:07:02',
                'updated_at' => '2025-02-12 12:07:02',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'İstanbul',
                'latitude' => '41.00820000',
                'longitude' => '28.97840000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:07:10',
                'updated_at' => '2025-02-12 12:07:10',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Şanlıurfa',
                'latitude' => '37.06620000',
                'longitude' => '38.20720000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:12',
                'updated_at' => '2025-02-12 12:33:12',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Mersin',
                'latitude' => '36.81310000',
                'longitude' => '34.64160000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:19',
                'updated_at' => '2025-02-12 12:33:19',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Adana',
                'latitude' => '37.00000000',
                'longitude' => '35.32130000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:26',
                'updated_at' => '2025-02-12 12:33:26',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Gaziantep',
                'latitude' => '37.06620000',
                'longitude' => '37.38330000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:33',
                'updated_at' => '2025-02-12 12:33:33',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Konya',
                'latitude' => '37.86630000',
                'longitude' => '32.48220000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:40',
                'updated_at' => '2025-02-12 12:33:40',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Ardahan',
                'latitude' => '41.11000000',
                'longitude' => '42.70220000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:46',
                'updated_at' => '2025-02-12 12:33:46',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Diyarbakır',
                'latitude' => '37.91470000',
                'longitude' => '40.23100000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:52',
                'updated_at' => '2025-02-12 12:33:52',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Şırnak',
                'latitude' => '37.51510000',
                'longitude' => '42.45950000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:33:58',
                'updated_at' => '2025-02-12 12:33:58',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Kahramanmaraş',
                'latitude' => '37.57470000',
                'longitude' => '36.93750000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:39:05',
                'updated_at' => '2025-02-12 12:39:05',
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Kayseri',
                'latitude' => '38.72260000',
                'longitude' => '35.48750000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:42:02',
                'updated_at' => '2025-02-12 12:42:02',
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Kocaeli',
                'latitude' => '40.98330000',
                'longitude' => '29.88160000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:53:57',
                'updated_at' => '2025-02-12 12:53:57',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Kırşehir',
                'latitude' => '39.14410000',
                'longitude' => '34.17510000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:55:32',
                'updated_at' => '2025-02-12 12:55:32',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'İzmit',
                'latitude' => '40.76690000',
                'longitude' => '29.91960000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:56:23',
                'updated_at' => '2025-02-12 12:56:23',
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Eskişehir',
                'latitude' => '39.92080000',
                'longitude' => '30.69550000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 12:58:21',
                'updated_at' => '2025-02-12 12:58:21',
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Isparta',
                'latitude' => '37.76450000',
                'longitude' => '30.55670000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 13:30:00',
                'updated_at' => '2025-02-12 13:30:00',
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'Aksaray',
                'latitude' => '38.27000000',
                'longitude' => '34.02940000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:09',
                'updated_at' => '2025-02-12 16:07:09',
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'Amasya',
                'latitude' => '40.65340000',
                'longitude' => '35.83320000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:15',
                'updated_at' => '2025-02-12 16:07:15',
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'Artvin',
                'latitude' => '41.18060000',
                'longitude' => '41.81970000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:19',
                'updated_at' => '2025-02-12 16:07:19',
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'Balıkesir',
                'latitude' => '39.64760000',
                'longitude' => '27.88250000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:25',
                'updated_at' => '2025-02-12 16:07:25',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'Bartın',
                'latitude' => '41.63500000',
                'longitude' => '32.33710000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:31',
                'updated_at' => '2025-02-12 16:07:31',
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'Bayburt',
                'latitude' => '40.25700000',
                'longitude' => '40.22560000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:36',
                'updated_at' => '2025-02-12 16:07:36',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'Bingöl',
                'latitude' => '38.88330000',
                'longitude' => '40.48500000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:41',
                'updated_at' => '2025-02-12 16:07:41',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Bitlis',
                'latitude' => '38.39390000',
                'longitude' => '42.10780000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:46',
                'updated_at' => '2025-02-12 16:07:46',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Bolu',
                'latitude' => '40.74100000',
                'longitude' => '31.62500000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:50',
                'updated_at' => '2025-02-12 16:07:50',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Çankırı',
                'latitude' => '40.60140000',
                'longitude' => '33.62170000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:07:58',
                'updated_at' => '2025-02-12 16:07:58',
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'Çorum',
                'latitude' => '40.54860000',
                'longitude' => '34.95510000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:08:02',
                'updated_at' => '2025-02-12 16:08:02',
            ),
            34 => 
            array (
                'id' => 37,
                'name' => 'Düzce',
                'latitude' => '40.84250000',
                'longitude' => '31.15670000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:08:11',
                'updated_at' => '2025-02-12 16:08:11',
            ),
            35 => 
            array (
                'id' => 38,
                'name' => 'Elazığ',
                'latitude' => '38.67400000',
                'longitude' => '39.22570000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:08:16',
                'updated_at' => '2025-02-12 16:08:16',
            ),
            36 => 
            array (
                'id' => 39,
                'name' => 'Erzincan',
                'latitude' => '39.74870000',
                'longitude' => '39.14600000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:08:21',
                'updated_at' => '2025-02-12 16:08:21',
            ),
            37 => 
            array (
                'id' => 40,
                'name' => 'Erzurum',
                'latitude' => '39.93340000',
                'longitude' => '41.26740000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:02',
                'updated_at' => '2025-02-12 16:09:02',
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'Giresun',
                'latitude' => '40.91250000',
                'longitude' => '38.39600000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:06',
                'updated_at' => '2025-02-12 16:09:06',
            ),
            39 => 
            array (
                'id' => 42,
                'name' => 'Gümüşhane',
                'latitude' => '40.45860000',
                'longitude' => '39.48250000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:10',
                'updated_at' => '2025-02-12 16:09:10',
            ),
            40 => 
            array (
                'id' => 43,
                'name' => 'Hakkari',
                'latitude' => '37.57410000',
                'longitude' => '43.74690000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:16',
                'updated_at' => '2025-02-12 16:09:16',
            ),
            41 => 
            array (
                'id' => 44,
                'name' => 'Hatay',
                'latitude' => '36.31950000',
                'longitude' => '36.55510000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:20',
                'updated_at' => '2025-02-12 16:09:20',
            ),
            42 => 
            array (
                'id' => 45,
                'name' => 'Iğdır',
                'latitude' => '40.38750000',
                'longitude' => '44.04060000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:26',
                'updated_at' => '2025-02-12 16:09:26',
            ),
            43 => 
            array (
                'id' => 47,
                'name' => 'Karabük',
                'latitude' => '41.20780000',
                'longitude' => '32.63280000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:39',
                'updated_at' => '2025-02-12 16:09:39',
            ),
            44 => 
            array (
                'id' => 48,
                'name' => 'Karaman',
                'latitude' => '37.18420000',
                'longitude' => '33.21540000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:44',
                'updated_at' => '2025-02-12 16:09:44',
            ),
            45 => 
            array (
                'id' => 49,
                'name' => 'Kastamonu',
                'latitude' => '41.38470000',
                'longitude' => '33.78690000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:49',
                'updated_at' => '2025-02-12 16:09:49',
            ),
            46 => 
            array (
                'id' => 50,
                'name' => 'Kırklareli',
                'latitude' => '41.73430000',
                'longitude' => '27.22030000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:09:55',
                'updated_at' => '2025-02-12 16:09:55',
            ),
            47 => 
            array (
                'id' => 51,
                'name' => 'Kırşehir',
                'latitude' => '39.14410000',
                'longitude' => '34.17510000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:00',
                'updated_at' => '2025-02-12 16:10:00',
            ),
            48 => 
            array (
                'id' => 52,
                'name' => 'Kütahya',
                'latitude' => '39.41990000',
                'longitude' => '29.97840000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:09',
                'updated_at' => '2025-02-12 16:10:09',
            ),
            49 => 
            array (
                'id' => 53,
                'name' => 'Manisa',
                'latitude' => '38.46830000',
                'longitude' => '27.12870000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:15',
                'updated_at' => '2025-02-12 16:10:15',
            ),
            50 => 
            array (
                'id' => 54,
                'name' => 'Mardin',
                'latitude' => '37.31920000',
                'longitude' => '40.74250000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:19',
                'updated_at' => '2025-02-12 16:10:19',
            ),
            51 => 
            array (
                'id' => 55,
                'name' => 'Muğla',
                'latitude' => '37.21470000',
                'longitude' => '28.36440000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:27',
                'updated_at' => '2025-02-12 16:10:27',
            ),
            52 => 
            array (
                'id' => 56,
                'name' => 'Nevşehir',
                'latitude' => '38.73330000',
                'longitude' => '34.68560000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:32',
                'updated_at' => '2025-02-12 16:10:32',
            ),
            53 => 
            array (
                'id' => 57,
                'name' => 'Niğde',
                'latitude' => '37.96700000',
                'longitude' => '34.68360000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:36',
                'updated_at' => '2025-02-12 16:10:36',
            ),
            54 => 
            array (
                'id' => 58,
                'name' => 'Osmaniye',
                'latitude' => '37.24930000',
                'longitude' => '36.24950000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:40',
                'updated_at' => '2025-02-12 16:10:40',
            ),
            55 => 
            array (
                'id' => 59,
                'name' => 'Rize',
                'latitude' => '41.02210000',
                'longitude' => '40.52050000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:45',
                'updated_at' => '2025-02-12 16:10:45',
            ),
            56 => 
            array (
                'id' => 60,
                'name' => 'Samsun',
                'latitude' => '41.28670000',
                'longitude' => '36.33000000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:51',
                'updated_at' => '2025-02-12 16:10:51',
            ),
            57 => 
            array (
                'id' => 61,
                'name' => 'Siirt',
                'latitude' => '37.93960000',
                'longitude' => '41.94310000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:10:56',
                'updated_at' => '2025-02-12 16:10:56',
            ),
            58 => 
            array (
                'id' => 62,
                'name' => 'Uşak',
                'latitude' => '38.68260000',
                'longitude' => '29.40890000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:04',
                'updated_at' => '2025-02-12 16:11:04',
            ),
            59 => 
            array (
                'id' => 63,
                'name' => 'Van',
                'latitude' => '38.30000000',
                'longitude' => '43.40000000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:09',
                'updated_at' => '2025-02-12 16:11:09',
            ),
            60 => 
            array (
                'id' => 64,
                'name' => 'Yalova',
                'latitude' => '40.65000000',
                'longitude' => '29.28000000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:14',
                'updated_at' => '2025-02-12 16:11:14',
            ),
            61 => 
            array (
                'id' => 65,
                'name' => 'Zonguldak',
                'latitude' => '41.45300000',
                'longitude' => '31.79850000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:20',
                'updated_at' => '2025-02-12 16:11:20',
            ),
            62 => 
            array (
                'id' => 66,
                'name' => 'Tekirdağ',
                'latitude' => '40.97400000',
                'longitude' => '27.51220000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:28',
                'updated_at' => '2025-02-12 16:11:28',
            ),
            63 => 
            array (
                'id' => 67,
                'name' => 'Tokat',
                'latitude' => '40.31500000',
                'longitude' => '36.55330000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:34',
                'updated_at' => '2025-02-12 16:11:34',
            ),
            64 => 
            array (
                'id' => 68,
                'name' => 'Tunceli',
                'latitude' => '39.10000000',
                'longitude' => '39.53330000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:40',
                'updated_at' => '2025-02-12 16:11:40',
            ),
            65 => 
            array (
                'id' => 69,
                'name' => 'Ordu',
                'latitude' => '40.98620000',
                'longitude' => '37.87700000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:45',
                'updated_at' => '2025-02-12 16:11:45',
            ),
            66 => 
            array (
                'id' => 70,
                'name' => 'Sinop',
                'latitude' => '42.01010000',
                'longitude' => '35.15420000',
                'marker_color' => 'FF5733',
                'location' => NULL,
                'created_at' => '2025-02-12 16:11:49',
                'updated_at' => '2025-02-12 16:11:49',
            ),
        ));
        
        
    }
}