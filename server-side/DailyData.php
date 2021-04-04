<?php


class DailyData
{
    private string $typeOfService;
    private string $created_date;

    public function __construct($typeOfService, $created_date)
    {
        $this->typeOfService = $typeOfService;
        $this->created_date = $created_date;
    }
}