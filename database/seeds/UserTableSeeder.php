<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        user 1
        DB::table('users')->insert([
            'ci' => '3553534',
            'first_name' => 'Sara',
            'second_name' => 'Sara',
            'last_name' => 'Mamani',
            'mother_last_name' => 'Calle',
            'gender' => 'F',
            'email' => 'sara'.'@gmail.com',
            'password' => bcrypt('12345678'),
            'active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

//        user 2
        DB::table('users')->insert([
            'ci' => '3553534',
            'first_name' => 'Raul',
            'second_name' => 'Raul',
            'last_name' => 'Nanavarro',
            'mother_last_name' => 'Portuguez',
            'gender' => 'M',
            'email' => 'raul'.'@gmail.com',
            'password' => bcrypt('12345678'),
            'active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

//        user 3
        DB::table('users')->insert([
            'ci' => '3553534',
            'first_name' => 'Julio',
            'second_name' => 'Pedro',
            'last_name' => 'Gomez',
            'mother_last_name' => 'Perales',
            'gender' => 'M',
            'email' => 'julio'.'@gmail.com',
            'password' => bcrypt('12345678'),
            'active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

//        user 3
        DB::table('users')->insert([
            'ci' => '3553534',
            'first_name' => 'Pedro',
            'second_name' => 'Lucas',
            'last_name' => 'Martinez',
            'mother_last_name' => 'Perez',
            'gender' => 'M',
            'email' => 'pedro'.'@gmail.com',
            'password' => bcrypt('12345678'),
            'active' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
