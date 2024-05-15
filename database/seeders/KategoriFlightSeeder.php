<?php

namespace Database\Seeders;

use App\Models\Category;
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

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
