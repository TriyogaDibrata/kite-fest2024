<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Flight;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriFlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {

            Category::create([
                'id' => 1,
                'name' => 'Bebean Plastik',
                'slug' => 'bebean-plastik',
                'acronym' => 'BP',
                'price' => 50000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:14:53',
                'updated_at' => '2024-07-02 05:14:53'
            ]);

            Category::create([
                'id' => 2,
                'name' => 'Pecukan Plastik',
                'slug' => 'pecukan-plastik',
                'acronym' => 'PP',
                'price' => 50000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:15:19',
                'updated_at' => '2024-07-02 05:15:19'
            ]);

            Category::create([
                'id' => 3,
                'name' => 'Janggan Buntut Plastik',
                'slug' => 'janggan-buntut-plastik',
                'acronym' => 'JBP',
                'price' => 50000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:15:38',
                'updated_at' => '2024-07-02 05:15:38'
            ]);

            Category::create([
                'id' => 4,
                'name' => 'Janggan Plastik',
                'slug' => 'janggan-plastik',
                'acronym' => 'JP',
                'price' => 50000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:15:56',
                'updated_at' => '2024-07-02 05:15:56'
            ]);

            Category::create([
                'id' => 5,
                'name' => 'Bebeban Big Plastik',
                'slug' => 'bebeban-big-plastik',
                'acronym' => 'BBP',
                'price' => 80000,
                'chest_no_prefix' => '0000',
                'chest_no_digits' => 4,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:16:20',
                'updated_at' => '2024-07-02 05:16:20'
            ]);

            Category::create([
                'id' => 6,
                'name' => 'Bebean Remaja',
                'slug' => 'bebean-remaja',
                'acronym' => 'BR',
                'price' => 80000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:17:38',
                'updated_at' => '2024-07-02 05:17:38'
            ]);

            Category::create([
                'id' => 7,
                'name' => 'Pecukan Remaja',
                'slug' => 'pecukan-remaja',
                'acronym' => 'PR',
                'price' => 80000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:17:54',
                'updated_at' => '2024-07-02 05:17:54'
            ]);

            Category::create([
                'id' => 8,
                'name' => 'Janggan Buntut Remaja',
                'slug' => 'janggan-buntut-remaja',
                'acronym' => 'JBR',
                'price' => 80000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:18:31',
                'updated_at' => '2024-07-02 05:18:31'
            ]);

            Category::create([
                'id' => 9,
                'name' => 'Janggan Remaja',
                'slug' => 'janggan-remaja',
                'acronym' => 'JR',
                'price' => 80000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:18:46',
                'updated_at' => '2024-07-02 05:18:46'
            ]);

            Category::create([
                'id' => 10,
                'name' => 'Bebean Dewasa',
                'slug' => 'bebean-dewasa',
                'acronym' => 'BD',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:19:06',
                'updated_at' => '2024-07-02 05:19:06'
            ]);

            Category::create([
                'id' => 11,
                'name' => 'Pecukan Dewasa',
                'slug' => 'pecukan-dewasa',
                'acronym' => 'PD',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:19:28',
                'updated_at' => '2024-07-02 05:19:28'
            ]);

            Category::create([
                'id' => 12,
                'name' => 'Janggan Buntut Dewasa',
                'slug' => 'janggan-buntut-dewasa',
                'acronym' => 'JBD',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:19:57',
                'updated_at' => '2024-07-02 05:19:57'
            ]);

            Category::create([
                'id' => 13,
                'name' => 'Janggan Dewasa',
                'slug' => 'janggan-dewasa',
                'acronym' => 'JD',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:20:25',
                'updated_at' => '2024-07-02 05:20:25'
            ]);

            Category::create([
                'id' => 14,
                'name' => 'Cotekan',
                'slug' => 'cotekan',
                'acronym' => 'C',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:20:47',
                'updated_at' => '2024-07-02 05:20:47'
            ]);

            Category::create([
                'id' => 15,
                'name' => 'Kaplik Kain',
                'slug' => 'kaplik-kain',
                'acronym' => 'KK',
                'price' => 80000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:21:08',
                'updated_at' => '2024-07-02 05:21:08'
            ]);

            Category::create([
                'id' => 16,
                'name' => 'Celepuk Cutting',
                'slug' => 'celepuk-cutting',
                'acronym' => 'CC',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:21:59',
                'updated_at' => '2024-07-02 05:21:59'
            ]);

            Category::create([
                'id' => 17,
                'name' => 'Celepuk Air Brush',
                'slug' => 'celepuk-air-brush',
                'acronym' => 'CAB',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:22:19',
                'updated_at' => '2024-07-02 05:22:19'
            ]);

            Category::create([
                'id' => 18,
                'name' => 'Bebean Big Size',
                'slug' => 'bebean-big-size',
                'acronym' => 'BBS',
                'price' => 150000,
                'chest_no_prefix' => '0000',
                'chest_no_digits' => 4,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:22:36',
                'updated_at' => '2024-07-02 05:22:36'
            ]);

            Category::create([
                'id' => 19,
                'name' => 'Janggan Buntut Big Size',
                'slug' => 'janggan-buntut-big-size',
                'acronym' => 'JBBS',
                'price' => 150000,
                'chest_no_prefix' => '0000',
                'chest_no_digits' => 4,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:22:51',
                'updated_at' => '2024-07-02 05:22:51'
            ]);

            Category::create([
                'id' => 20,
                'name' => 'Kober Rare Angon',
                'slug' => 'kober-rare-angon',
                'acronym' => 'KRA',
                'price' => 50000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:23:16',
                'updated_at' => '2024-07-02 05:23:16'
            ]);

            Category::create([
                'id' => 21,
                'name' => 'Pindekan Bali',
                'slug' => 'pindekan-bali',
                'acronym' => 'PB',
                'price' => 100000,
                'chest_no_prefix' => '000',
                'chest_no_digits' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:23:35',
                'updated_at' => '2024-07-02 05:23:35'
            ]);

            Flight::create([
                'id' => 1,
                'serie' => 'A',
                'session' => 1,
                'category_id' => 2,
                'date' => '2024-07-26',
                'start' => '12:30:00',
                'end' => '13:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:37:53',
                'updated_at' => '2024-07-02 05:37:53'
            ]);



            Flight::create([
                'id' => 2,
                'serie' => 'A',
                'session' => 2,
                'category_id' => 3,
                'date' => '2024-07-26',
                'start' => '12:30:00',
                'end' => '13:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:38:22',
                'updated_at' => '2024-07-02 05:38:22'
            ]);



            Flight::create([
                'id' => 3,
                'serie' => 'A',
                'session' => 3,
                'category_id' => 1,
                'date' => '2024-07-26',
                'start' => '12:30:00',
                'end' => '13:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:38:55',
                'updated_at' => '2024-07-02 05:38:55'
            ]);



            Flight::create([
                'id' => 4,
                'serie' => 'A',
                'session' => 4,
                'category_id' => 17,
                'date' => '2024-07-26',
                'start' => '12:30:00',
                'end' => '13:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:39:19',
                'updated_at' => '2024-07-02 05:39:19'
            ]);



            Flight::create([
                'id' => 5,
                'serie' => 'B',
                'session' => 1,
                'category_id' => 2,
                'date' => '2024-07-26',
                'start' => '13:30:00',
                'end' => '14:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:39:50',
                'updated_at' => '2024-07-02 05:39:50'
            ]);



            Flight::create([
                'id' => 6,
                'serie' => 'B',
                'session' => 2,
                'category_id' => 16,
                'date' => '2024-07-26',
                'start' => '13:30:00',
                'end' => '14:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:40:13',
                'updated_at' => '2024-07-02 05:40:13'
            ]);



            Flight::create([
                'id' => 7,
                'serie' => 'B',
                'session' => 3,
                'category_id' => 1,
                'date' => '2024-07-26',
                'start' => '13:30:00',
                'end' => '14:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:40:32',
                'updated_at' => '2024-07-02 05:40:32'
            ]);



            Flight::create([
                'id' => 8,
                'serie' => 'B',
                'session' => 4,
                'category_id' => 4,
                'date' => '2024-07-26',
                'start' => '13:30:00',
                'end' => '14:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:40:56',
                'updated_at' => '2024-07-02 05:40:56'
            ]);



            Flight::create([
                'id' => 9,
                'serie' => 'C',
                'session' => 1,
                'category_id' => 2,
                'date' => '2024-07-26',
                'start' => '14:30:00',
                'end' => '15:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:41:20',
                'updated_at' => '2024-07-02 05:41:20'
            ]);



            Flight::create([
                'id' => 10,
                'serie' => 'C',
                'session' => 2,
                'category_id' => 3,
                'date' => '2024-07-26',
                'start' => '14:30:00',
                'end' => '15:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:41:41',
                'updated_at' => '2024-07-02 05:41:41'
            ]);



            Flight::create([
                'id' => 11,
                'serie' => 'C',
                'session' => 3,
                'category_id' => 5,
                'date' => '2024-07-26',
                'start' => '14:30:00',
                'end' => '15:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:42:03',
                'updated_at' => '2024-07-02 05:42:03'
            ]);



            Flight::create([
                'id' => 12,
                'serie' => 'C',
                'session' => 4,
                'category_id' => 4,
                'date' => '2024-07-26',
                'start' => '14:30:00',
                'end' => '15:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:42:36',
                'updated_at' => '2024-07-02 05:42:36'
            ]);



            Flight::create([
                'id' => 13,
                'serie' => 'D',
                'session' => 1,
                'category_id' => 15,
                'date' => '2024-07-26',
                'start' => '15:30:00',
                'end' => '16:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:43:19',
                'updated_at' => '2024-07-02 05:43:19'
            ]);



            Flight::create([
                'id' => 14,
                'serie' => 'D',
                'session' => 2,
                'category_id' => 1,
                'date' => '2024-07-26',
                'start' => '15:30:00',
                'end' => '16:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:43:45',
                'updated_at' => '2024-07-02 05:43:45'
            ]);



            Flight::create([
                'id' => 15,
                'serie' => 'D',
                'session' => 3,
                'category_id' => 14,
                'date' => '2024-07-26',
                'start' => '15:30:00',
                'end' => '16:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:44:18',
                'updated_at' => '2024-07-02 05:44:18'
            ]);



            Flight::create([
                'id' => 16,
                'serie' => 'D',
                'session' => 4,
                'category_id' => 4,
                'date' => '2024-07-26',
                'start' => '15:30:00',
                'end' => '16:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:44:49',
                'updated_at' => '2024-07-02 05:44:49'
            ]);



            Flight::create([
                'id' => 17,
                'serie' => 'E',
                'session' => 1,
                'category_id' => 1,
                'date' => '2024-07-26',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:45:18',
                'updated_at' => '2024-07-02 05:48:19'
            ]);



            Flight::create([
                'id' => 18,
                'serie' => 'E',
                'session' => 2,
                'category_id' => 15,
                'date' => '2024-07-26',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:45:43',
                'updated_at' => '2024-07-02 05:48:30'
            ]);



            Flight::create([
                'id' => 19,
                'serie' => 'E',
                'session' => 3,
                'category_id' => 5,
                'date' => '2024-07-26',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:46:07',
                'updated_at' => '2024-07-02 05:48:41'
            ]);



            Flight::create([
                'id' => 20,
                'serie' => 'E',
                'session' => 4,
                'category_id' => 4,
                'date' => '2024-07-26',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'limit' => 80,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:46:42',
                'updated_at' => '2024-07-02 05:48:55'
            ]);



            Flight::create([
                'id' => 21,
                'serie' => 'E',
                'session' => 5,
                'category_id' => 5,
                'date' => '2024-07-26',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:49:23',
                'updated_at' => '2024-07-02 05:49:23'
            ]);



            Flight::create([
                'id' => 22,
                'serie' => 'E',
                'session' => 6,
                'category_id' => 14,
                'date' => '2024-07-26',
                'start' => '16:30:00',
                'end' => '17:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:49:53',
                'updated_at' => '2024-07-02 05:49:53'
            ]);



            Flight::create([
                'id' => 23,
                'serie' => 'A',
                'session' => 1,
                'category_id' => 6,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:50:47',
                'updated_at' => '2024-07-02 05:50:47'
            ]);



            Flight::create([
                'id' => 24,
                'serie' => 'A',
                'session' => 2,
                'category_id' => 7,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:51:14',
                'updated_at' => '2024-07-02 05:51:14'
            ]);



            Flight::create([
                'id' => 25,
                'serie' => 'A',
                'session' => 3,
                'category_id' => 8,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:52:32',
                'updated_at' => '2024-07-02 05:54:39'
            ]);



            Flight::create([
                'id' => 26,
                'serie' => 'A',
                'session' => 4,
                'category_id' => 6,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:52:58',
                'updated_at' => '2024-07-02 05:52:58'
            ]);



            Flight::create([
                'id' => 27,
                'serie' => 'A',
                'session' => 5,
                'category_id' => 8,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:53:27',
                'updated_at' => '2024-07-02 05:53:27'
            ]);



            Flight::create([
                'id' => 28,
                'serie' => 'A',
                'session' => 6,
                'category_id' => 7,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:53:55',
                'updated_at' => '2024-07-02 05:53:55'
            ]);



            Flight::create([
                'id' => 29,
                'serie' => 'A',
                'session' => 7,
                'category_id' => 9,
                'date' => '2024-07-27',
                'start' => '10:00:00',
                'end' => '12:30:00',
                'limit' => 30,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:55:10',
                'updated_at' => '2024-07-02 05:55:10'
            ]);



            Flight::create([
                'id' => 30,
                'serie' => 'B',
                'session' => 1,
                'category_id' => 11,
                'date' => '2024-07-27',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:55:39',
                'updated_at' => '2024-07-02 05:56:15'
            ]);



            Flight::create([
                'id' => 31,
                'serie' => 'B',
                'session' => 2,
                'category_id' => 12,
                'date' => '2024-07-27',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:56:04',
                'updated_at' => '2024-07-02 05:56:04'
            ]);



            Flight::create([
                'id' => 32,
                'serie' => 'B',
                'session' => 3,
                'category_id' => 18,
                'date' => '2024-07-27',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:56:46',
                'updated_at' => '2024-07-02 05:56:46'
            ]);



            Flight::create([
                'id' => 33,
                'serie' => 'B',
                'session' => 4,
                'category_id' => 10,
                'date' => '2024-07-27',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:57:16',
                'updated_at' => '2024-07-02 05:57:16'
            ]);



            Flight::create([
                'id' => 34,
                'serie' => 'B',
                'session' => 5,
                'category_id' => 19,
                'date' => '2024-07-27',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:57:40',
                'updated_at' => '2024-07-02 05:57:40'
            ]);



            Flight::create([
                'id' => 35,
                'serie' => 'C',
                'session' => 1,
                'category_id' => 13,
                'date' => '2024-07-27',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:58:07',
                'updated_at' => '2024-07-02 05:58:07'
            ]);



            Flight::create([
                'id' => 36,
                'serie' => 'C',
                'session' => 2,
                'category_id' => 10,
                'date' => '2024-07-27',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:58:38',
                'updated_at' => '2024-07-02 05:58:38'
            ]);



            Flight::create([
                'id' => 37,
                'serie' => 'C',
                'session' => 3,
                'category_id' => 12,
                'date' => '2024-07-27',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:59:08',
                'updated_at' => '2024-07-02 05:59:08'
            ]);



            Flight::create([
                'id' => 38,
                'serie' => 'C',
                'session' => 4,
                'category_id' => 18,
                'date' => '2024-07-27',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:59:33',
                'updated_at' => '2024-07-02 05:59:33'
            ]);



            Flight::create([
                'id' => 39,
                'serie' => 'C',
                'session' => 5,
                'category_id' => 11,
                'date' => '2024-07-27',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 05:59:55',
                'updated_at' => '2024-07-02 05:59:55'
            ]);



            Flight::create([
                'id' => 40,
                'serie' => 'D',
                'session' => 1,
                'category_id' => 13,
                'date' => '2024-07-27',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:00:25',
                'updated_at' => '2024-07-02 06:00:25'
            ]);



            Flight::create([
                'id' => 41,
                'serie' => 'D',
                'session' => 2,
                'category_id' => 10,
                'date' => '2024-07-27',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:00:47',
                'updated_at' => '2024-07-02 06:00:47'
            ]);



            Flight::create([
                'id' => 42,
                'serie' => 'D',
                'session' => 3,
                'category_id' => 19,
                'date' => '2024-07-27',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:01:22',
                'updated_at' => '2024-07-02 06:01:22'
            ]);



            Flight::create([
                'id' => 43,
                'serie' => 'D',
                'session' => 4,
                'category_id' => 18,
                'date' => '2024-07-27',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:01:41',
                'updated_at' => '2024-07-02 06:01:41'
            ]);



            Flight::create([
                'id' => 44,
                'serie' => 'A',
                'session' => 1,
                'category_id' => 6,
                'date' => '2024-07-28',
                'start' => '10:00:00',
                'end' => '11:00:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:02:22',
                'updated_at' => '2024-07-02 06:02:22'
            ]);



            Flight::create([
                'id' => 45,
                'serie' => 'A',
                'session' => 2,
                'category_id' => 8,
                'date' => '2024-07-28',
                'start' => '10:00:00',
                'end' => '11:00:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:02:45',
                'updated_at' => '2024-07-02 06:02:45'
            ]);



            Flight::create([
                'id' => 46,
                'serie' => 'A',
                'session' => 3,
                'category_id' => 7,
                'date' => '2024-07-28',
                'start' => '10:00:00',
                'end' => '11:00:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:03:06',
                'updated_at' => '2024-07-02 06:03:06'
            ]);



            Flight::create([
                'id' => 47,
                'serie' => 'A',
                'session' => 4,
                'category_id' => 6,
                'date' => '2024-07-28',
                'start' => '10:00:00',
                'end' => '11:00:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:03:27',
                'updated_at' => '2024-07-02 06:03:27'
            ]);



            Flight::create([
                'id' => 48,
                'serie' => 'B',
                'session' => 1,
                'category_id' => 8,
                'date' => '2024-07-28',
                'start' => '11:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:03:56',
                'updated_at' => '2024-07-02 06:03:56'
            ]);



            Flight::create([
                'id' => 49,
                'serie' => 'B',
                'session' => 2,
                'category_id' => 6,
                'date' => '2024-07-28',
                'start' => '11:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:04:23',
                'updated_at' => '2024-07-02 06:04:23'
            ]);



            Flight::create([
                'id' => 50,
                'serie' => 'B',
                'session' => 3,
                'category_id' => 7,
                'date' => '2024-07-28',
                'start' => '11:00:00',
                'end' => '12:30:00',
                'limit' => 70,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:04:50',
                'updated_at' => '2024-07-02 06:04:50'
            ]);



            Flight::create([
                'id' => 51,
                'serie' => 'B',
                'session' => 4,
                'category_id' => 9,
                'date' => '2024-07-28',
                'start' => '11:00:00',
                'end' => '12:30:00',
                'limit' => 30,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:05:17',
                'updated_at' => '2024-07-02 06:05:17'
            ]);



            Flight::create([
                'id' => 52,
                'serie' => 'C',
                'session' => 1,
                'category_id' => 11,
                'date' => '2024-07-28',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:05:54',
                'updated_at' => '2024-07-02 06:05:54'
            ]);



            Flight::create([
                'id' => 53,
                'serie' => 'C',
                'session' => 2,
                'category_id' => 10,
                'date' => '2024-07-28',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:06:18',
                'updated_at' => '2024-07-02 06:06:18'
            ]);



            Flight::create([
                'id' => 54,
                'serie' => 'C',
                'session' => 3,
                'category_id' => 18,
                'date' => '2024-07-28',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:06:47',
                'updated_at' => '2024-07-02 06:06:47'
            ]);



            Flight::create([
                'id' => 55,
                'serie' => 'C',
                'session' => 4,
                'category_id' => 12,
                'date' => '2024-07-28',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:07:08',
                'updated_at' => '2024-07-02 06:07:08'
            ]);



            Flight::create([
                'id' => 56,
                'serie' => 'C',
                'session' => 5,
                'category_id' => 11,
                'date' => '2024-07-28',
                'start' => '12:30:00',
                'end' => '14:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:07:32',
                'updated_at' => '2024-07-02 06:07:32'
            ]);



            Flight::create([
                'id' => 57,
                'serie' => 'D',
                'session' => 1,
                'category_id' => 13,
                'date' => '2024-07-28',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:08:07',
                'updated_at' => '2024-07-02 06:08:07'
            ]);



            Flight::create([
                'id' => 58,
                'serie' => 'D',
                'session' => 2,
                'category_id' => 19,
                'date' => '2024-07-28',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:08:30',
                'updated_at' => '2024-07-02 06:08:44'
            ]);



            Flight::create([
                'id' => 59,
                'serie' => 'D',
                'session' => 3,
                'category_id' => 10,
                'date' => '2024-07-28',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:09:10',
                'updated_at' => '2024-07-02 06:09:10'
            ]);



            Flight::create([
                'id' => 60,
                'serie' => 'D',
                'session' => 4,
                'category_id' => 18,
                'date' => '2024-07-28',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:09:33',
                'updated_at' => '2024-07-02 06:09:33'
            ]);



            Flight::create([
                'id' => 61,
                'serie' => 'D',
                'session' => 5,
                'category_id' => 12,
                'date' => '2024-07-28',
                'start' => '14:00:00',
                'end' => '15:30:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:10:04',
                'updated_at' => '2024-07-02 06:10:04'
            ]);



            Flight::create([
                'id' => 62,
                'serie' => 'E',
                'session' => 1,
                'category_id' => 13,
                'date' => '2024-07-28',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:10:43',
                'updated_at' => '2024-07-02 06:10:43'
            ]);



            Flight::create([
                'id' => 63,
                'serie' => 'E',
                'session' => 2,
                'category_id' => 19,
                'date' => '2024-07-28',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:11:08',
                'updated_at' => '2024-07-02 06:11:08'
            ]);



            Flight::create([
                'id' => 64,
                'serie' => 'E',
                'session' => 3,
                'category_id' => 10,
                'date' => '2024-07-28',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:11:30',
                'updated_at' => '2024-07-02 06:11:30'
            ]);



            Flight::create([
                'id' => 65,
                'serie' => 'E',
                'session' => 4,
                'category_id' => 18,
                'date' => '2024-07-28',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 25,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:11:50',
                'updated_at' => '2024-07-02 06:11:50'
            ]);



            Flight::create([
                'id' => 66,
                'serie' => 'E',
                'session' => 5,
                'category_id' => 10,
                'date' => '2024-07-28',
                'start' => '15:30:00',
                'end' => '17:00:00',
                'limit' => 40,
                'deleted_at' => NULL,
                'created_at' => '2024-07-02 06:12:16',
                'updated_at' => '2024-07-02 06:12:16'
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
