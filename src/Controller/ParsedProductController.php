<?php

namespace App\Controller;

use App\Repository\ParsedProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
class ParsedProductController extends AbstractController
{

    /**
     * @param  ParsedProductRepository  $parsedProductRepository
     */
    public function __construct(private ParsedProductRepository $parsedProductRepository)
    {
    }

    /**
     * @return JsonResponse
     */
    #[Route('/api/parsed-products', name: 'get_parsed_products', methods: ['GET'])]
    public function getParsedProducts(): JsonResponse
    {
        $products = $this->parsedProductRepository->findAll();

        return new JsonResponse(
            json_encode($products, JSON_UNESCAPED_UNICODE),
            200, ['Content-Type' => 'application/json; charset=utf-8'],
            true
        );
    }
}
