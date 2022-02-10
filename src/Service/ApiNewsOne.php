<?php

namespace App\Service;

use App\Interface\ApiNewsInterface;

class ApiNewsOne implements ApiNewsInterface {
    /**
     * Return an array of data
     * @return array
     */
    public function getData(): array {
        $queryString = http_build_query([
            'access_key' => '8f92de221cd41149c6531ad39fcd03a2',
            'categories' => '-general',
            'limit'=> 10
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.mediastack.com/v1/news', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);
        $array = json_decode($json, true);
        return $array['data'];
    }
}