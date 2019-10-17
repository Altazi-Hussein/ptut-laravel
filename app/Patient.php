<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'firstName', 'lastName',
    ];

    public function rdvs(){
        return $this->hasMany(\App\Rdv::class);
    }
}
