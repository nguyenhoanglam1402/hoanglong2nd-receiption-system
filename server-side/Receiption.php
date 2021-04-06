<?php


class Receiption {
    // Propertives
    public $rid;
    public $name;
    public $dueDate;
    public $typeOfService;
    public $deposit;
    public $status;

    //Constructor
    public function __construct($rid, $name, $dueDate, $typeOfService, $deposit, $status){
        $this->rid = $rid;
        $this->name = $name;
        $this->dueDate = $dueDate;
        $this->typeOfService = $typeOfService;
        $this->deposit = $deposit;
        $this->status = $status;
    }


    public function setStatus($status){
        $this->status = $status;
    }

    public function getName(){
        return $this->name;
    }

    public function getDueDate(){
        return $this->dueDate;
    }

    public function getTypeOfService(){
        return $this->typeOfService;
    }

}