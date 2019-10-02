<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nom = ["Christina","Ceola","Janita","Jackelyn","Carri","Russel","Fumiko","Madeline","Susannah","Percy","Isadora","Salley","Suellen","Rosaura","Kina","Harvey","Magdalena","Hyo","Sherley","Dorris","Ginny","Chris","Eldon","Adele","Evonne","Stephan","Ryan","Elmer","Lloyd","Jeromy","Bunny","Zena","Malisa","Chere","Linette","Deena","Teodora","Tanja","Doug","Kaitlin","Nova","September","Arlinda","Deb","Dania","Wan","Zaida","Arvilla","Tama","Rosaria",];
        $prenom = ["Clevenger","Chynoweth","Janco","Jobe","Connell","Rene","Floyd","Marcantel","Suarez","Paugh","Iwamoto","Santo","Schoonmaker","Raulerson","Klumpp","Hirata","Mcgary","Huffine","Stoney","Dearman","Gangestad","Clonts","Engelking","Armbruster","Evangelista","Sant","Radcliff","Erazo","Leonardi","July","Bankston","Zoller","Mccallister","Cotner","Linzy","Deslauriers","Takemoto","Tomaselli","Dinges","Kershner","Neel","Shepherd","Akridge","Difilippo","Dittman","Wardle","Zabel","Angus","Towery","Royston",];
        for($i = 0; $i < 50; $i++){
            DB::table('patients')->insert([
                'nom' => $nom[$i],
                'prenom' => $prenom[$i],
            ]);
        }
    }
}
