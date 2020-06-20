<?php

namespace App\Http\Resources;

use App\Models\PestsDiseaseWeed;
use Illuminate\Http\Resources\Json\JsonResource;

class AgrochemResource extends JsonResource
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
            'product_name' => $this->product_name,
            'pcpb_number' => $this->pcpb_number,
            'distributing_company' => $this->distributing_company,
            'toxic' => $this->toxic,
            'who_class' => $this->who_class,
            'composition' => $this->composition,
            'registrant' => $this->registrant,
            'type' => $this->type,
            'phi_days' => $this->phi_days,
            'crops' => CropsResource::collection($this->crops),
//            'pests_disease_weed' => PestsDiseaseWeedResource::collection($this->whenLoaded('agrochem')),
            'pests_disease_weed' => $this->pestsDiseaseWeed,
            'image' => $this->image,
            'active_ingredients' => ActiveIngredientsResource::collection($this->activeIngredients),
//            'created_at' => $this->creation_date,
//            'updated_at' => $this->last_update,
        ];
    }
}
