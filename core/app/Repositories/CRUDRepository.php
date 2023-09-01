<?php


namespace App\Repositories;


interface CRUDRepository
{
    public function create(array $attributes);

    public function all(array $attributes);

    public function find($id);

    public function  update($id, array $attributes);

    public function delete($id);

}
