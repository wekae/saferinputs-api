<?php


namespace App\Repositories;


interface HomeMadeOrganicRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
