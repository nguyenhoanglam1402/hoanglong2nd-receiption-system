<?php


class DailyData
{
    public function __construct($cardPicture, $studioPicture,
                                $weddingItems, $weddingPicture)
    {
        $this->$cardPicture = $cardPicture;
        $this->$studioPicture = $studioPicture;
        $this->$weddingItems = $weddingItems;
        $this->$weddingPicture = $weddingPicture;
    }
}