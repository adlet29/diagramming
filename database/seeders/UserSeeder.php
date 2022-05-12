<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'role_id' => 1,
                'name' => "teacher_$i",
                'department' => 1,
                'subject' => 1,
                'kurs' => null,
                'group' => null,
                'email' => "teacher_$i".'@gmail.com',
                'password' => Hash::make('12345'),
            ]);
            DB::table('users')->insert([
                'role_id' => 2,
                'name' => "student_$i",
                'department' => 1,
                'subject' => null,
                'kurs' => 1,
                'group' => 1,
                'email' => "student_$i".'@gmail.com',
                'password' => Hash::make('12345'),
            ]);
        }
    }
}
