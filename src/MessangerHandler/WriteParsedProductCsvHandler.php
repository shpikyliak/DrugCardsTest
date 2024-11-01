<?php

namespace App\MessangerHandler;

use App\Message\WriteParsedProductCsvMessage;
use App\Service\CsvWriter;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class WriteParsedProductCsvHandler
{
    /**
     * @param  CsvWriter  $csvWriter
     * @param  LoggerInterface  $logger
     */
    public function __construct(private CsvWriter $csvWriter, private LoggerInterface $logger)
    {
    }

    /**
     * @param  WriteParsedProductCsvMessage  $message
     *
     * @return void
     */
    public function __invoke(WriteParsedProductCsvMessage $message)
    {
        $parsedProductData = $message->getProductData();

        try{
            $this->csvWriter->write(
                $_ENV['PRODUCTS_CSV_FILEPATH'],
                [
                    $parsedProductData->getTitle(),
                    $parsedProductData->getPrice(),
                    $parsedProductData->getImageUrl(),
                    $parsedProductData->getProductUrl(),
                ]
            );
        }catch (\RuntimeException $e)
        {
            //add monolog for better logging
            $this->logger->error($e->getMessage());
        }

    }
}
