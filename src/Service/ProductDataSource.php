<?php

namespace App\Service;

class ProductDataSource
{
    /**
     * Method to implement retrieving data for parse, can be db, file etc. Array for simple example
     *
     * @return string[]
     */
    public function getProductsUrls(): array
    {
        return [
            'https://veloplaneta.ua/ua/zamok-u-obraznyy-onguard-bulldog-medium-razmer-skoby-90-x-175mm-tolshchina-13mm-povorotnoe-kreplenie',
            'https://veloplaneta.ua/ua/velosiped-28-pride-jet-rocx-rama-l-2023-seryy',
            'https://veloplaneta.ua/ua/velosiped-28-marin-gestalt-2-rama-56sm-2024-gloss-black-red',
        ];
    }
}
