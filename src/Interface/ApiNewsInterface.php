<?php

namespace App\Interface;


interface ApiNewsInterface {
    /**
     * Return an array of news
     * @return array
     */
    public function getData(): array ;
}
