<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luiz Inacio',
            'email' => 'luizinacio@brazil.com.br',
            'password' => bcrypt ('123'),
            'birthdate' => '08/08/1970'
        ]);
    }
}
