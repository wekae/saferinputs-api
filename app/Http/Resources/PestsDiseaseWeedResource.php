<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PestsDiseaseWeedResource extends JsonResource
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
            'type' => $this->type,
            'scientific_name' => $this->scientific_name,
            'crops_affected' => $this->crops_affected,
            'description_pest' => $this->description_pest,
            'description_impact' => $this->description_impact,
            'image' => $this->image,
            'references' => $this->references,
            'crops' => CropsResource::collection($this->crops),
            'local_names' => LocalNamesResource::collection($this->localNames),
            'agrochem_products' => AgrochemResource::collection($this->agrochemProducts),
            'gap' => GapResource::collection($this->gap),
            'homemade_organic' => HomeMadeOrganicResource::collection($this->homemadeOrganic),
            'commercial_organic' => CommercialOrganicResource::collection($this->commercialOrganic),
            'created_at' => $this->creation_date,
            'updated_at' => $this->last_update,
        ];
    }
}
