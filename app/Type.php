<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TypePersonnalise;

class Type extends Model
{
    protected $table = 'types';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'heureDebut', 'heureFin',
    ];
    public function rdvs()
    {
        return $this->hasMany(Rdv::class);
    }
}
