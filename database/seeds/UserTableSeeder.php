<?php

use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();

        $user = User::create([
            'name' => 'Yo',
            'email' => 'yo@io.com',
            'password' => Bcrypt('123123')
        ]); 

        $role = Role::create([
            'key' => 'Admin',
            'name' => 'Administrador',
            'description'=> 'Administrador'
        ]);

    }
}
