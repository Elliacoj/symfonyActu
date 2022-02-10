<?php

namespace App\Service;

use App\Interface\ApiNewsInterface;

class ApiNewsTwo implements ApiNewsInterface {
    /**
     * Return an array of data
     * @return array
     */
    public function getData(): array {
        $array = [];
        $newApi =  json_decode(file_get_contents("https://newsapi.org/v2/everything?q=Apple&from=2022-02-10&sortBy=popularity&apiKey=e4497f15dc6349dc91006f4a337f9bff"));
        foreach ($newApi->articles as $article) {
            $array[] = [
                "author" => $article->author, "title" => $article->title, "description" => $article->description,
                "image" => $article->urlToImage, "content" => $article->content
            ];
        }
        return $array;
    }
}