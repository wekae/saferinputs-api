<?php


namespace App\Repositories;


interface PestsDiseaseWeedRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
