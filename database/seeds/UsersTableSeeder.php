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
        $users = [
            [
                'name' => 'Gordana',
                'email' => 'g@gmail.com'
            ],
            [
                'name' => 'Darko',
                'email' => 'd@gmail.com'
            ],
        ];

        foreach ($users as $user)
        {
            factory(App\User::class)->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'verified' => true
            ]);
        }

        factory(App\User::class, 15)->create();
    }
}
