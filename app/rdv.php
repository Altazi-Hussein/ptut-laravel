<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;
use App\User;

class Rdv extends Model
{
    protected $table = 'rdvs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'raison', 'patient', 'commentaire',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
