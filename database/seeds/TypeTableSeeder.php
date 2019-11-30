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
            ['Prise de sang',[7,10]],
            ['Dextro + injection insuline',[7,8]],
            ['Pansement',[10,12]],
            ['Injections sous cutanées (soir)',[13,18]],
            ['Injections sous cutanées (matin)',[7,12]],
            ['Toilettes',[10,12]],
            ['Anticoagulants',[null,null]]
        ];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'nom' => $type[0],
                'heureDebut' => $type[1][0],
                'heureFin' => $type[1][1],
            ]);
        }
        
    }
}
