<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        User::create([
            'name' => 'Home de Ferro',
            'email' => 'ferro@gmail.com',
            'password' => bcrypt('123456'),
        ]);
         */
        factory(User::class, 10)->create();
    }
}
