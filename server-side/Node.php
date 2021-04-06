<?php

class Node
{
    public $title;
    public $amount;

    public function __construct($title, $amount)
    {
        $this->amount = $amount;
        $this->title = $title;
    }
}