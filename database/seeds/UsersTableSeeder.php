<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 19)->create();

        App\User::create([
            'name' => 'Lucas Vallejo',
            'email' => 'lucas@ldvallejo.com',
            'password' => bcrypt('1234')
        ]);
    }
}
