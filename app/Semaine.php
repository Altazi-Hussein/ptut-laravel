<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Laravel\Scout\Searchable;

class Semaine extends Model
{
    protected $table = 'semaines';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'typeSemaine', 'dateSemaine'
    ];
}
