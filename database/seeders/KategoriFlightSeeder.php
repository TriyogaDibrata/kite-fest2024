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

            $category = Category::create([
                'name' => "Bebean Remaja",
                'slug' => strtolower(str_replace(" ", "-", "Bebean Remaja")),
                'price' => 50000
            ]);

            $category = Category::create([
                'name' => "Bebean Dewasa",
                'slug' => strtolower(str_replace(" ", "-", "Bebean Dewasa")),
                'price' => 100000
            ]);

            $category = Category::create([
                'name' => "Bebean Plastik",
                'slug' => strtolower(str_replace(" ", "-", "Bebean Plastik")),
                'price' => 25000
            ]);

            $flight = Flight::create([
                'serie' => "A",
                'session' => 1,
                'category_id' => 1,
                'date' => "2024-07-28",
                'start' => "10:00",
                'end' => "10:30",
                'limit' => 60
            ]);

            $flight = Flight::create([
                'serie' => "A",
                'session' => 2,
                'category_id' => 2,
                'date' => "2024-07-28",
                'start' => "10:00",
                'end' => "10:30",
                'limit' => 60
            ]);

            $flight = Flight::create([
                'serie' => "A",
                'session' => 3,
                'category_id' => 3,
                'date' => "2024-07-28",
                'start' => "10:00",
                'end' => "10:30",
                'limit' => 60
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
