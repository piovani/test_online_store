<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Domain\User\User::class)->create([
            'login' => 'adm',
            'password' => 'adm'
        ]);
    }
}
