<?php


namespace App\Repositories\Cms;


use App\Repositories\CRUDRepository;

interface PostsRepository extends CRUDRepository
{
    public function  updateImageToken($id, array $attributes);

    public function findByYear(array $attributes);

    public function findByMonth(array $attributes);

    public function findByYearAndMonth(array $attributes);

    public function filter(array $attributes);

    public function findByTag(array $attributes);

    public function datatable(array $attributes);

    public function summaryCount(array $attributes);

    public function summaryNames(array $attributes);
}
