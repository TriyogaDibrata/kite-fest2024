<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Participant;
use App\Models\Photo;
use App\Models\Score;
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
        $a_length = 50;
        $b_length = 30;
        $c_length = 43;
        for($i = 0; $i < $a_length; $i++) {
            $participanta = Participant::create([
                'name' => $faker->name('male'),
                'address' => $faker->address(),
                'category_id' => 3,
                'flight_id' => 3,
                'phone' => $faker->phoneNumber()
            ]);

            $photo = Photo::create([
                'participant_id' => $participanta->id,
                'path' => '/storage/uploads/1718197225_BR-001.png',
                'fullpath' => 'https://web-pelayang-badung.test/storage/uploads/1718197225_BR-001.png'
            ]);

            for($j = 0; $j < rand(1,3); $j++) {
                $score = Score::create([
                    'participant_id' => $participanta->id,
                    'score' => rand(60,99),
                    'note' => $faker->text(10)
                ]);
            }
        }

        for($i = 0; $i < $b_length; $i++) {
            $participantb = Participant::create([
                'name' => $faker->name('male'),
                'address' => $faker->address(),
                'category_id' => 2,
                'flight_id' => 2,
                'phone' => $faker->phoneNumber()
            ]);

            $photo = Photo::create([
                'participant_id' => $participantb->id,
                'path' => '/storage/uploads/1718197225_BR-001.png',
                'fullpath' => 'https://web-pelayang-badung.test/storage/uploads/1718197225_BR-001.png'
            ]);

            for($j = 0; $j < rand(1,3); $j++) {
                $score = Score::create([
                    'participant_id' => $participantb->id,
                    'score' => rand(60,99),
                    'note' => $faker->text(10)
                ]);
            }
        }

        for($i = 0; $i < $c_length; $i++) {
            $participantc = Participant::create([
                'name' => $faker->name('male'),
                'address' => $faker->address(),
                'category_id' => 1,
                'flight_id' => 1,
                'phone' => $faker->phoneNumber()
            ]);

            $photo = Photo::create([
                'participant_id' => $participantc->id,
                'path' => '/storage/uploads/1718197225_BR-001.png',
                'fullpath' => 'https://web-pelayang-badung.test/storage/uploads/1718197225_BR-001.png'
            ]);

            for($j = 0; $j < rand(1,3); $j++) {
                $score = Score::create([
                    'participant_id' => $participantc->id,
                    'score' => rand(60,99),
                    'note' => $faker->text(10)
                ]);
            }
        }
    }
}
