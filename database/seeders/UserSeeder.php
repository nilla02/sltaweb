<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
 
     */
    public function run()
    {
    $user = User::create([
        'fullname'=>"Kenilla Random",
        'username'=> "kenilla",
        'position'=>"accountant",
        'email'=>"knewe0502@gmail.com",
        'password' => Hash::make('password'),
    ]);
    }
}
