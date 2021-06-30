<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder {

    public function run () {

        DB::table('admin_menu')->insert([
            ['parent_id' => 0, 'order' => 1, 'title' => 'Dashboard',     'icon' => 'fa-bar-chart', 'uri' => '/',],
            ['parent_id' => 0, 'order' => 2, 'title' => 'Admin',         'icon' => 'fa-tasks'    , 'uri' => '',],
            ['parent_id' => 2, 'order' => 3, 'title' => 'Users',         'icon' => 'fa-users'    , 'uri' => 'auth/users',],
            ['parent_id' => 2, 'order' => 4, 'title' => 'Roles',         'icon' => 'fa-user'     , 'uri' => 'auth/roles',],
            ['parent_id' => 2, 'order' => 5, 'title' => 'Permission',    'icon' => 'fa-ban'      , 'uri' => 'auth/permissions',],
            ['parent_id' => 2, 'order' => 6, 'title' => 'Menu',          'icon' => 'fa-bars'     , 'uri' => 'auth/menu',],
            ['parent_id' => 2, 'order' => 7, 'title' => 'Operation log', 'icon' => 'fa-history'  , 'uri' => 'auth/logs',],
            ['parent_id' => 0, 'order' => 8, 'title' => 'MatComponent',  'icon' => 'fa-th-large' , 'uri' => '/matComponent', 'permission' => '*', 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
            ['parent_id' => 0, 'order' => 9, 'title' => 'Media manager', 'icon' => 'fa-file'     , 'uri' => '/media',        'permission' => '*', 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
            ['parent_id' => 0, 'order' => 10, 'title' => 'Scheduling',   'icon' => 'fa-clock-o'  , 'uri' => '/scheduling',   'permission' => '*', 'created_at' => '2021-03-12 13:33:59', 'updated_at' => '2021-03-14 20:09:33'],
        ]);
    }
}
