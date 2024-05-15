<?php

namespace Database\Seeders;

use App\Models\Menu;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            //1
            $menu = Menu::create([
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Dashboard',
                'icon' => 'ti-home',
                'uri' => '/dashboard',
                'permission' => 'dashboard',
            ]);

            //2
            $menu = Menu::create([
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Konifgurasi',
                'icon' => 'ti-settings',
                'uri' => '',
                'permission' => 'konfigurasi',
                'segment' => 'konfigurasi'
            ]);

            //3
            $menu = Menu::create([
                'parent_id' => 2,
                'order' => 1,
                'title' => 'Roles',
                'icon' => '',
                'uri' => '/konfigurasi/roles',
                'permission' => 'konfigurasi-roles',
                'segment' => 'konfigurasi'
            ]);

            //4
            $menu = Menu::create([
                'parent_id' => 2,
                'order' => 2,
                'title' => 'Users',
                'icon' => '',
                'uri' => '/konfigurasi/users',
                'permission' => 'konfigurasi-roles',
                'segment' => 'konfigurasi'
            ]);

             //5
             $menu = Menu::create([
                'parent_id' => 0,
                'order' => 3,
                'title' => 'Master Data',
                'icon' => 'ti-server',
                'uri' => '',
                'permission' => 'masterdata',
                'segment' => 'masterdata'
            ]);

            //6
            $menu = Menu::create([
                'parent_id' => 5,
                'order' => 1,
                'title' => 'Kategori Layangan',
                'icon' => '',
                'uri' => '/masterdata/categories',
                'permission' => 'masterdata-categories',
                'segment' => 'masterdata'
            ]);

            //7
            $menu = Menu::create([
                'parent_id' => 5,
                'order' => 1,
                'title' => 'Serie Terbang',
                'icon' => '',
                'uri' => '/masterdata/flights',
                'permission' => 'masterdata-flights',
                'segment' => 'masterdata'
            ]);

            //8
            $menu = Menu::create([
                'parent_id' => 0,
                'order' => 4,
                'title' => 'Peserta Lomba',
                'icon' => 'ti-cup',
                'uri' => '/participants',
                'permission' => 'participants'
            ]);

            //9
            $menu = Menu::create([
                'parent_id' => 0,
                'order' => 5,
                'title' => 'Penjurian',
                'icon' => 'ti-crown',
                'uri' => '',
                'permission' => 'judge',
                'segment' => 'judge'
            ]);

            //10
            $menu = Menu::create([
                'parent_id' => 9,
                'order' => 1,
                'title' => 'Input Nilai',
                'icon' => '',
                'uri' => '/judge/scores',
                'permission' => 'judge-scores',
                'segment' => 'judge'
            ]);

            //11
            $menu = Menu::create([
                'parent_id' => 9,
                'order' => 2,
                'title' => 'Input Photo',
                'icon' => '',
                'uri' => '/judge/photos',
                'permission' => 'judge-photos',
                'segment' => 'judge'
            ]);

            //12
            $menu = Menu::create([
                'parent_id' => 9,
                'order' => 3,
                'title' => 'Rekapitulasi Nilai',
                'icon' => '',
                'uri' => '/judge/recap',
                'permission' => 'judge-recap',
                'segment' => 'judge'
            ]);

            DB::commit();
        } catch(Exception $e) {
            DB::rollBack();
        }
    }
}
