<?php


namespace App\Repositories;


interface CommercialOrganicRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function getCommercialOrganicNames();


    public function findPestsDiseaseWeed(array $attributes);
    public function findControlMethods(array $attributes);


    public function summaryCount(array $attributes);
    public function summaryCountPestsDiseaseWeed(array $attributes);
    public function summaryCountControlMethods(array $attributes);


    public function summaryNames(array $attributes);
}
