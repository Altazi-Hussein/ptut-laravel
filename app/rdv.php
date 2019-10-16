<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $table = 'rdvs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'raison', 'patient', 'commentaire',
    ];

    public function patient()
    {
        return $this->belongsTo(\App\Patient::class);
    }
    
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
