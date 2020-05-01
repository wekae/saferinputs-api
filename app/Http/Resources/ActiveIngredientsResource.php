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
            'fish'=>$this->fish,
            'daphnia'=>$this->daphnia,
            'bee'=>$this->bee,
            'algae'=>$this->algae,
            'dt50'=>$this->dt50,
            'koc'=>$this->koc,
            'gus'=>$this->gus,
            'carcinogenicity'=>$this->carcinogenicity,
            'mutagenicity'=>$this->mutagenicity,
            'edc'=>$this->edc,
            'reproduction'=>$this->reproduction,
            'ache'=>$this->ache,
            'neurotoxicant'=>$this->neurotoxicant,
            'who_classification'=>$this->who_classification,
            'tp_sum'=>$this->tp_sum,
        ];
    }
}
