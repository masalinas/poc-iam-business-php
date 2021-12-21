<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;

class ProductController extends AbstractController
{
    private $products = array();

    public function __construct() {
        $this->data = [new Product("001", "Apple", 5, true),
                       new Product("002", "Banana", 4.3, false),
                       new Product("003", "Orange", 3.2, true)];
    }

    #[Route('/api/products', name: 'products')]
    public function getProducts(): Response {           
        foreach ($this->data as $product) {
            $products[] = array(
                "code" => $product->getCode(),
                "description" => $product->getDescription(),
                "price" => $product->getPrice(),
                "active" => $product->getActive()
            );
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        //$response->setContent(json_encode(['data' => $products]));
        $response->setContent(json_encode($products));

        return $response;
    }
}