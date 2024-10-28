<?php

namespace App\Controller\Shop;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/shop/product', name: 'app_shop_products')]
    public function index(): Response
    {
        return $this->render('shop/product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
