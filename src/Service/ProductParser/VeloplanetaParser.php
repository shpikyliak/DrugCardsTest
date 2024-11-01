<?php

namespace App\Service\ProductParser;

use App\Service\CurlParser;

class VeloplanetaParser extends AbstractProductParser
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
        return ($node = $this->xpath->query('//img[@class="_sq"]')->item(0)) ?
            parse_url($this->url, PHP_URL_HOST).$node->getAttribute('src') : throw new \Exception("Not found elem '_sq'");
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function getProductPrice(): float
    {
        return ($node = $this->xpath->query('//div[@class="_r7"]')->item(0)) ?
            $this->xpath->evaluate("translate(//div[@class='_r7']/text(), ' грн', '')") : throw new \Exception("Not found elem '_r7'");
    }
}
