<?php


namespace App\Repositories;


interface GapRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function getGapNames();


    public function findPestsDiseaseWeed(array $attributes);


    public function summaryCount(array $attributes);
    public function summaryCountPestsDiseaseWeed(array $attributes);


    public function summaryNames(array $attributes);
}
