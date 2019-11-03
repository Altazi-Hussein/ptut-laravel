<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Patient as PatientResources;
use App\Http\Resources\User as UserResources;

class Rdv extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'patient' => new PatientResources($this->patient),
            'user' => new UserResources($this->user),
            'reason' => $this->reason
        ];
    }
}
