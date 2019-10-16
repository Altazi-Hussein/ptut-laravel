<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function getPatient(int $id){
        return $this::where('id', $id)->first();
    }

    public function rdvs(){
        return $this->hasMany(\App\Rdv::class);
    }
}
