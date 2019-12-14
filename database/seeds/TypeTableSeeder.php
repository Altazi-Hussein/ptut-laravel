<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['Prise de sang','07:00:00', '10:00:00'],
            ['Dextro + injection insuline','07:00:00', '08:00:00'],
            ['Pansement','10:00:00', '12:00:00'],
            ['Injections sous cutanées (soir)','13:00:00', '18:00:00'],
            ['Injections sous cutanées (matin)','07:00:00', '12:00:00'],
            ['Toilettes','10:00:00', '12:00:00'],
            ['Anticoagulants',null, null]
        ];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'nom' => $type[0],
                'heureDebut' => $type[1],
                'heureFin' => $type[2],
            ]);
        }
        
    }
}
