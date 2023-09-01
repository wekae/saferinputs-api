<?php


namespace App\Repositories;


interface ActiveIngredientsRepository extends CRUDRepository
{
    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function findAgrochems(array $attributes);

    public function getActiveIngredientNames();


    public function summaryCount(array $attributes);
    public function summaryCountAgrochem(array $attributes);


    public function summaryNames(array $attributes);
}
