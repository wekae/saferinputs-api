<?php


namespace App\Repositories;


interface ControlMethodsRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function findPestsDiseasesWeeds(array $attributes);
    public function findCommercialOrganic(array $attibutes);

    public function getControlMethodNames();


    public function summaryCount(array $attibutes);
    public function summaryCountPestsDiseasesWeeds(array $attibutes);
    public function summaryCountCommercialOrganic(array $attibutes);


    public function summaryNames(array $attibutes);
}

