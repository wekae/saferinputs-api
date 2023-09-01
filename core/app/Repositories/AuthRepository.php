<?php


namespace App\Repositories;


interface AuthRepository extends CRUDRepository
{
    public function createKoanUser(array $attributes);
    public function createThirdPartyUser(array $attributes);

}
