<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Patient::class, 80)->create();
        factory(App\User::class, 80)->create();
        $this->call(TypeTableSeeder::class);
        factory(App\Rdv::class, 80)->create();
    }
}
