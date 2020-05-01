<?php


namespace App\Repositories;


interface AgrochemRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
