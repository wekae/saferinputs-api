<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GapResource extends JsonResource
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
            'practices' => $this->practices,
            'pests_diseases_weeds_controlled' => $this->pests_diseases_weeds_controlled,
            'references' => $this->references,
            'created_at' => $this->creation_date,
            'updated_at' => $this->last_update,
        ];
    }
}
