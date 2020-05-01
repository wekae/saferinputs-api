<?php

namespace App\Http\Resources;

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
            'distributing_company' => $this->distributing_company,
            'registrant' => $this->registrant,
            'type' => $this->type,
            'phi_days' => $this->phi_days,
            'crops' => CropsResource::collection($this->crops),
            'pests_disease_weed' => $this->pestsDiseaseWeed,
            'image' => $this->image,
            'active_ingredients' => ActiveIngredientsResource::collection($this->activeIngredients),
            'created_at' => $this->creation_date,
            'updated_at' => $this->last_update,
        ];
    }
}
