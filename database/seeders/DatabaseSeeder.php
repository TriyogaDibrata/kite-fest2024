<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Participant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([UserRolePermissionSeeder::class]);
        $this->call([MenuSeeder::class]);
        $this->call([KategoriFlightSeeder::class]);
        
        $faker = Faker::create('id_ID');
        $length = 100;
        for($i = 0; $i < $length; $i++) {
            $paticipant = Participant::create([
                'name' => $faker->name('male'),
                'address' => $faker->address(),
                'category_id' => 3,
                'flight_id' => 3,
                'phone' => $faker->phoneNumber()
            ]);
        }
    }
}
