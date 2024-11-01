<?php

namespace App\Message;

use App\Entity\ParsedProduct;

class WriteParsedProductCsvMessage
{
    /**
     * @param  ParsedProduct  $productData
     */
    public function __construct(private ParsedProduct $productData)
    {
    }

    /**
     * @return ParsedProduct
     */
    public function getProductData(): ParsedProduct
    {
        return $this->productData;
    }
}
