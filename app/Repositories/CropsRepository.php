<?php


namespace App\Repositories;


interface CropsRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
