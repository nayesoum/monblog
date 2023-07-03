<?php

namespace App\Controller;
use App\Entity\Category;
use App\Controller\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository): Response
    {

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articleRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_article_show', methods: ['GET'])]
    public function show(Article $articles): Response
    {
        $category = $articles->getCategory();
        $articles = $category->articles();
        return $this->render('article/show.html.twig', [
            'articles' => $articles,
            'category' => $category
        ]);
    }    
}
