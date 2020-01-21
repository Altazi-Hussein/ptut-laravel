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
        factory(App\User::class, 10)->create();
        $this->call(SecteurSeeder::class);
        $this->call(TypeTableSeeder::class);
        factory(App\Rdv::class, 15)->create();
    }
}
