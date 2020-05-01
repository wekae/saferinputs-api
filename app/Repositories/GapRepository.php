<?php


namespace App\Repositories;


interface GapRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);
}
