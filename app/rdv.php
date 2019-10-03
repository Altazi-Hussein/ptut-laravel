<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $table = 'rdvs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'raison', 'patient'
    ];
}
