<?php


namespace App\Services;


abstract class Service
{

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

}
