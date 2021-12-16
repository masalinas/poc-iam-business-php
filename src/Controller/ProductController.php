<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Product;

class ProductController extends AbstractController
{
    private $products = array();

    public function __construct() {
        $this->products = [new Product("001", "Apple", 5, true),
                           new Product("002", "Banana", 4.3, false),
                           new Product("003", "Orange", 3.2, true)];
    }

    #[Route('/api/products', name: 'products')]
    public function getProducts(): Response {           
        foreach ($this->products as $product) {
            $response[] = array(
                "code" => $product->getCode(),
                "description" => $product->getDescription(),
                "price" => $product->getPrice(),
                "active" => $product->getActive()
            );
        }

        return new Response(json_encode($response));
    }
}