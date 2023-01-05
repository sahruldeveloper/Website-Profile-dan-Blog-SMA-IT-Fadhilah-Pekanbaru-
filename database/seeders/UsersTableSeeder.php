<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' =>'1',
            'name' => 'sahrul',
            'email' => 'sahrul@gmail.com',
            'password' => bcrypt('secret'),
            'roles' => 'ADMIN
            '
        ]);
    }
}