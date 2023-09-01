<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActiveIngredientsResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'potential_harm'=>$this->potential_harm,
            'aquatic'=>$this->aquatic,
            'aquatic_desc'=>$this->aquatic_desc,
            'bees'=>$this->bees,
            'bees_desc'=>$this->bees_desc,
            'earthworm'=>$this->earthworm,
            'earthworm_desc'=>$this->earthworm_desc,
            'birds'=>$this->birds,
            'birds_desc'=>$this->birds_desc,
            'leachability'=>$this->leachability,
            'leachability_desc'=>$this->leachability_desc,
            'carcinogenicity'=>$this->carcinogenicity,
            'mutagenicity'=>$this->mutagenicity,
            'edc'=>$this->edc,
            'reproduction'=>$this->reproduction,
            'ache'=>$this->ache,
            'neurotoxicant'=>$this->neurotoxicant,
            'who_classification'=>$this->who_classification,
            'eu_approved'=>$this->eu_approved,
            'image'=>$this->image,
            'agrochems'=>$this->agrochem,
//            'created_at' => $this->creation_date,
//            'updated_at' => $this->last_update,
        ];
    }
}
