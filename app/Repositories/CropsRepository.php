<?php


namespace App\Repositories;


interface CropsRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function findAgrochems(array $attributes);
    public function findPestsDiseasesWeeds(array $attributes);


    public function getCropNames();


    public function summaryCount(array $attributes);
    public function summaryCountAgrochems(array $attributes);
    public function summaryCountPestsDiseasesWeeds(array $attributes);


    public function summaryNames(array $attributes);
}
