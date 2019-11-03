<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Rdv;

class Patient extends Model
{
    use Searchable;

    protected $table = "patients";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $asYouType = true;

    protected $fillable = [
        'firstName', 'lastName',
    ];

    public function toSearchableArray(){
        $array = $this->toArray();

        return $array;
    }
    public function rdvs(){
        return $this->hasMany(Rdv::class);
    }
}
