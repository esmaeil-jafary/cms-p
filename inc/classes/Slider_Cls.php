<?php


class Slider extends DB
{
    public function getAlSlider()
    {
        return $this->connect()->query("select * from slider")->fetchAll (PDO::FETCH_ASSOC);
    }
}