<?php

namespace App\Service\ProductParser;

interface ProductParserInterface
{
    /**
     * @return string
     */
    public function getProductImgUrl(): string;

    /**
     * @return float
     */
    public function getProductPrice(): float;

    /**
     * @return string
     */
    public function getProductTitle(): string;

    /**
     * @param  string  $url
     *
     * @return void
     */
    public function setProductUrl(string $url): void;
}
