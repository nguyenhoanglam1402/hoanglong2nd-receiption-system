<?php


class DailyData
{
    private $typeOfService;
    private $created_date;

    public function __construct($typeOfService, $created_date)
    {
        $this->typeOfService = $typeOfService;
        $this->created_date = $created_date;
    }
}