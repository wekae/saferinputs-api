<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommercialOrganicResource extends JsonResource
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
            'pcpb_number' => $this->pcpb_number,
            'manufacturer' => $this->manufacturer,
            'distributor' => $this->distributor,
            'category' => $this->category,
            'contact_details' => $this->contact_details,
            'external_links' => $this->external_links,
            'application_details' => $this->application_details,
            'image' => $this->image,
            'pests_diseases_weed' => $this->pestsDiseaseWeed,
            'control_methods' => $this->controlMethods,
//            'created_at' => $this->creation_date,
//            'updated_at' => $this->last_update,
        ];
    }
}
