<?php


namespace App\Repositories;


interface PestsDiseaseWeedRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);


    public function findAgrochems(array $attributes);
    public function findCommercialOrganic(array $attributes);
    public function findControlMethods(array $attributes);
    public function findCrops(array $attributes);
    public function findGap(array $attributes);
    public function findHomemadeOrganic(array $attributes);
    public function findLocalNames(array $attributes);


    public function getPestDiseasesWeedsNames();


    public function summaryCount(array  $attributes);
    public function summaryCountAgrochem(array $attributes);
    public function summaryCountCommercialOrganic(array $attributes);
    public function summaryCountControlMethods(array $attributes);
    public function summaryCountCrops(array $attributes);
    public function summaryCountGap(array $attributes);
    public function summaryCountHomemadeOrganic(array $attributes);
    public function summaryCountLocalNames(array $attributes);


    public function summaryNames(array $attributes);
}
