<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;
use App\User;
use Laravel\Scout\Searchable;

class Rdv extends Model
{
    use Searchable;
    protected $table = 'rdvs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type', 'patient', 'commentaire',
    ];

    public $asYouType = true;

    public function toSearchableArray(){
        $array = $this->toArray();
        $array['patient_id'] = Patient::find($array['patient_id']);
        $array['user_id'] = isset($array['user_id']) ? User::find($array['user_id']) : null;
        return $array;
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
