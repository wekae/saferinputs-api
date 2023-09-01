<?php


namespace App\Repositories;


interface AgrochemRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function getAgrochemNames();


    public function findCrops(array $attributes);
    public function findActiveIngredients(array $attributes);
    public function findPestDiseaseWeeds(array $attributes);


    public function summaryCount(array $attributes);
    public function summaryCountActiveIngredients(array $attributes);
    public function summaryCountPestsDiseaseWeed(array $attributes);
    public function summaryCountCrops(array $attributes);


    public function summaryNames(array $attributes);
}
