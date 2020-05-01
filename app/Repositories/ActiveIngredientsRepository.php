<?php


namespace App\Repositories;


interface ActiveIngredientsRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
