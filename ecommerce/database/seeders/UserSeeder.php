<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->password = Hash::make('password');
        $user->email = 'mrajnansky@gmail.com';
        $user->name = 'Marcelo Rajnansky';
        $user->save();
    }
}
