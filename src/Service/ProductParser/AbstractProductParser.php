<?php

namespace App\Service\ProductParser;

use App\Service\CurlParser;
use DOMDocument;
use DOMXPath;

abstract class AbstractProductParser implements ProductParserInterface
{
    /**
     * @var string
     */
    protected string $url;
    /**
     * @var DOMDocument
     */
    protected DOMDocument $dom;
    /**
     * @var DOMXPath
     */
    protected DOMXPath $xpath;

    /**
     * @param  CurlParser  $curlParser
     */
    public function __construct(
        private CurlParser $curlParser,
    ){
        $this->dom = new DomDocument();
    }

    /**
     * @param  string  $url
     *
     * @return void
     */
    public function setProductUrl(string $url): void
    {
        $this->url = $url;

        libxml_use_internal_errors(true);
        $this->dom->loadHTML(
            '<?xml encoding="UTF-8">'.$this->curlParser->parse($url),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_use_internal_errors(false);

        $this->xpath = new DomxPath($this->dom);
    }

    /**
     * @return string
     */
    abstract public function getProductImgUrl(): string;

    /**
     * @return float
     */
    abstract public function getProductPrice(): float;

    /**
     * @return string
     */
    abstract public function getProductTitle(): string;
}
