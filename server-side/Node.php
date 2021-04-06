<?php


class Node
{
    public string $title;
    public int $amount;

    public function __construct($title, $amount)
    {
        $this->amount = $amount;
        $this->title = $title;
    }
}