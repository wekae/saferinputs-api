<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ControlMethodsResource extends JsonResource
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
            'name' => $this->name,
            'category' => $this->category,
            'options' => $this->options,
            'external_links' => $this->external_links,
            'image' => $this->image,
            'pests_diseases_weeds' => $this->pestsDiseaseWeeds,
            'commercial_organic' => CommercialOrganicResource::collection($this->commercialOrganic),
//            'created_at' => $this->creation_date,
//            'updated_at' => $this->last_update,
        ];
    }
}
