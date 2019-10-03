<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nom = ["Karg","Wass","Chadwick","Devito","Correira","Spring","Perrone","Lenoir","Junkin","Beesley","Thibodeaux","Crossland","Recio","Escalona","Jorge","Belles","Marquess","Tober","Dieterich","Raynes","Macdonald","Moll","Lambdin","Juarez","Kreger","Mares","Espey","Vallo","Defelice","Madia","Escobedo","Mcree","Elmendorf","Gregor","Egli","Ryerson","Gadd","Jasso","Petree","Rodiguez","Lentz","Yule","Leggett","Levitt","Thong","Liller","Bermeo","Roye","Johannes","Jaggers",];
        for($i = 0; $i < 50; $i++){
            DB::table('users')->insert([
                'name' => $nom[$i],
                'email' => $nom[$i] . '@ff.com',
                'password' => Str::random(),
            ]);
        }
    }
}