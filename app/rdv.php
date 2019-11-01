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
        'raison', 'patient', 'commentaire',
    ];

    public $asYouType = true;

    public function toSearchableArray(){
        $array = $this->toArray();
        $array['patient_id'] = Patient::find($array['patient_id']);
        $array['user_id'] = User::find($array['user_id']);
        return $array;
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
