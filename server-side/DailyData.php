<?php

class DailyData
{
    public string $typeOfService;
    public string $created_date;

    public function __construct($typeOfService, $created_date)
    {
        $this->typeOfService = $typeOfService;
        $this->created_date = $created_date;
    }
}