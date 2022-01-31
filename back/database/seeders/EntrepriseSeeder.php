<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entreprises')->insert([
            'num_tva' => 'BE0448826918',
            'nom' => 'SA CARREFOUR BELGIUM',
            'activite' => 'Supermarché',
            'adresse' => 'Avenue des olympiades 20',
            'ville' => 'Evere',
            'pays' => 'België',
            'num_fixe' => '02427132',
            'code_postal' => '1140',
            'user_id' => 2,

        ]);
    }
}
