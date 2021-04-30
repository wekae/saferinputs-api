<?php


namespace App\Repositories\Cms;


use App\Repositories\CRUDRepository;

interface DownloadsRepository extends CRUDRepository
{
    public function findByToken($token);

    public function filter(array $attributes);

    public function datatable(array $attributes);

    public function summaryCount(array $attributes);

    public function summaryNames(array $attributes);
}
