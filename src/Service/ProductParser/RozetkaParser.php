<?php

namespace App\Service\ProductParser;

use App\Service\CurlParser;
use DOMDocument;
use DOMXPath;

class RozetkaParser extends AbstractProductParser
{
    /**
     * @return string
     * @throws \Exception
     */
    public function getProductTitle(): string
    {
        return ($node = $this->xpath->query('//h1')->item(0)) ? $node->nodeValue : throw new \Exception("Not found elem 'h1'");
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getProductImgUrl(): string
    {
        return ($node = $this->xpath->query('//img[@class="image"]')->item(0)) ? $node->getAttribute('src') : throw new \Exception("Not found elem 'image'");
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function getProductPrice(): float
    {
        return ($node = $this->xpath->query('//p[contains(@class, "product-price__big")]/text()')->item(0)) ? $node->nodeValue : throw new \Exception("Not found elem '_r7'");;
    }

}
