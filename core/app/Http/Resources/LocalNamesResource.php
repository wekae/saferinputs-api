<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalNamesResource extends JsonResource
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
            'language_ethnic_group' => $this->language_ethnic_group,
            'english_name' => $this->english_name,
            'local_name' => $this->local_name,
            'category' => $this->category,
            'region' => $this->region,
            'pests_diseases_weeds' => $this->pestsDiseaseWeed,
//            'created_at' => $this->creation_date,
//            'updated_at' => $this->last_update,
        ];
    }
}
