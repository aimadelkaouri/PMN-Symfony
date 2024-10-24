<?php

namespace App\Controller\Shop;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    #[Route('/shop/category', name: 'app_shop_category')]
    public function index(): Response
    {
        return $this->render('shop/category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
