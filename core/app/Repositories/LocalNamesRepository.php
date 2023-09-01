<?php


namespace App\Repositories;


interface LocalNamesRepository extends CRUDRepository
{
    public function filter(array $attributes);
    public function datatable(array $attributes);

    public function findpestsDiseaseWeed(array $attributes);

    public function getLocalNameNames();


    public function summaryCount(array $attributes);
    public function summaryCountPestsDiseaseWeed(array $attributes);


    public function summaryNames(array $attributes);
}
