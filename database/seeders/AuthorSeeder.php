<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 users
        // factory(App\Models\User::class, 10)->create();
        \App\Models\User::factory()->count(10)->create();
    }
}
