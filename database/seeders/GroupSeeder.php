<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = ['Programmer', 'Manager', 'User'];
        foreach ($positions as $position) {
            DB::table('groups')->insert([
                'name' => $position,
            ]);
        }
    }
}