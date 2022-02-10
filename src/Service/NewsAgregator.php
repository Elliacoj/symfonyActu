<?php

namespace App\Service;

class NewsAgregator {
    /**
     * Return all data api
     * @return array
     */
    public function allData(): array {
        $newsOne = (new ApiNewsOne())->getData();
        $newsTwo = (new ApiNewsTwo())->getData();
        $newsThree = (new ApiNewsThree())->getData();

        return array_merge($newsTwo, $newsOne, $newsThree);
    }
}
