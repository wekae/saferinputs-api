<?php


namespace App\Repositories;


interface CommercialOrganicRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
