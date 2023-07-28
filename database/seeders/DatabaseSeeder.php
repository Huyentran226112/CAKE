<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderDetailSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\GroupRoleSeeder;
use App\Models\Group;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(OrderDetailSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GroupRoleSeeder::class);
        // $this->importGroups();
        // $this->importRoles();
        // $this->importRole();
        // $this->call(UserSeeder::class);
        // $this->importGroupRole();
    }
        // function importRoles()
        // {
        //     $groups = ['Category', 'User','Product','Group'];
        //     $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','viewtrash'];
        //     foreach ($groups as $group) {
        //         foreach ($actions as $action) {
        //             DB::table('roles')->insert([
        //                 'name' => $group . '_' . $action,
        //                 'group_name' => $group,
        //             ]);
        //         }
        //     }
        // }
        // function importRole()
        // {
        //     $groups = ['Customer', 'Order'];
        //     $actions = ['viewAny', 'view'];
        //     foreach ($groups as $group) {
        //         foreach ($actions as $action) {
        //             DB::table('roles')->insert([
        //                 'name' => $group . '_' . $action,
        //                 'group_name' => $group,
    
        //             ]);
        //         }
        //     }
        // }
        // function importGroupRole()
        // {
        //     for ($i = 1; $i <= 36; $i++) {
        //         DB::table('group_role')->insert([
        //             'group_id' => 1,
        //             'role_id' => $i,
        //         ]);
        //     }
        // }
        // function importGroups()
        // {
        //     $userGroup = new Group();
        //     $userGroup->name = 'Supper Admin';
        //     $userGroup->save();
    
        //     $userGroup = new Group();
        //     $userGroup->name = 'Quản Lý';
        //     $userGroup->save();
    
        //     $userGroup = new Group();
        //     $userGroup->name = 'Giám Đốc';
        //     $userGroup->save();
    
    
        //     $userGroup = new Group();
        //     $userGroup->name = 'Nhân Viên';
        //     $userGroup->save();
        // }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }