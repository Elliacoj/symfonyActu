<?php

namespace App\Service;

use App\Interface\ApiNewsInterface;
use Symfony\Component\Validator\Constraints\Json;

class ApiNewsThree implements ApiNewsInterface {
    /**
     * Return an array of data
     * @return array
     */
    public function getData(): array {
        $array = [];
        $newApi =  json_decode(file_get_contents("https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/search/TrendingNewsAPI?pageNumber=1&pageSize=10&withThumbnails=false&location=us&rapidapi-key=8170f34745mshcd2eba5bd006917p1ba25bjsn95071e084059"));
        foreach ($newApi->value as $article) {
            $array[] = [
                "author" => $article->provider->name, "title" => $article->title, "description" => $article->description,
                "image" => $article->image->url, "content" => $article->body
            ];
        }
        return $array;
    }
}