<?php


namespace App\Repositories\Cms;


use App\Repositories\CRUDRepository;

interface CommentsRepository extends CRUDRepository
{
    public function findByPost($userId);

    public function filter(array $attributes);

    public function summaryCount(array $attributes);
}
