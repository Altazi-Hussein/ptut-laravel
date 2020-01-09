<?php

use Illuminate\Database\Seeder;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secteurs = [
            ['S1','bramans',1, 20],
            ['S1','aussois',2,20 ],
            ['S1','avrieux',3,20 ],
            ['S1','villarodin',4, 20],
            ['S1','bourget',5,20],
            ['S1', 'modane',6,20],
            ['S2','la praz',1,20],
            ['S2','saint andré',2,20],
            ['S2','le freney',3,20],
            ['S2','fourneaux',4,20],
            

        ];
        foreach ($secteurs as $secteur) {
            DB::table('secteur')->insert([
                'secteur' => $secteur[0],
                'ville' => $secteur[1],
                'priorite' => $secteur[2],
                'distance' => $secteur[3],

            ]);
        }
        
    }
}
