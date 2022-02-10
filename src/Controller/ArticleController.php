<?php

namespace App\Controller;

use App\Service\NewsAgregator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController {

    #[Route('/', name: 'allNews')]
    public function allNews(NewsAgregator $newsAgregator): Response {
        $dataAll = $newsAgregator->allData();

        $template = $this->renderView('article/listArticles.html.twig', ['articles' => $dataAll]);

        return (new Response())->setContent($template);
    }

    #[Route('/article/{id<[0-9]{1,10}>}', name: 'news')]
    public function article(NewsAgregator $newsAgregator, $id): Response {
        $data = $newsAgregator->allData();
        $template = $this->renderView('article/article.html.twig', ['article' => $data[$id]]);

        return (new Response())->setContent($template);
    }
}