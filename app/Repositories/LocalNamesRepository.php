<?php


namespace App\Repositories;


interface LocalNamesRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
