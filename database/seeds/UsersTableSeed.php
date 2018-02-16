<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('users')->insert(array(
            [
                'name' => 'Figura',
                'email' => 'figura.graphik@gmail.com',
                'password' => Hash::make('Ff15051982$'),
                'role' => 'admin'
            ],
            [
                'name' => 'user',
                'email' => 'user@client.com',
                'password' => Hash::make('user'),
                'role' => 'user'
            ],
        ));
    }
}
