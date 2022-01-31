<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            EntrepriseSeeder::class,
            PersonnecontactSeeder::class
        ]);
        \App\Models\Tache::factory(5)->create();

    }
}
