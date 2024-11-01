<?php

namespace App\Repository;

use App\Entity\ParsedProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ParsedProductRepository extends ServiceEntityRepository
{
    /**
     * @param  ManagerRegistry  $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParsedProduct::class);
    }

    /**
     * @param  ParsedProduct  $product
     *
     * @return ParsedProduct
     */
    public function saveParsedProduct(ParsedProduct $product): ParsedProduct {

        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();

        return $product;
    }
}
