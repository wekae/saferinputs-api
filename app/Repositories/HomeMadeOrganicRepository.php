<?php


namespace App\Repositories;


interface HomeMadeOrganicRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function getHomemadeOrganicNames();

    public function findPestsDiseaseWeed(array $attributes);


    public function summaryCount(array $attributes);
    public function summaryCountPestsDiseaseWeed(array $attributes);


    public function summaryNames(array $attributes);
}
