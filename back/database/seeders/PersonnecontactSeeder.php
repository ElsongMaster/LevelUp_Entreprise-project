<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnecontactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnecontacts')->insert([
            "email"=>"contact1@entreprise.com",
            "nom"=>"contact1",
            "num"=>"0242589896",
            "entreprise_id"=>1,
        ]);
    }
}
