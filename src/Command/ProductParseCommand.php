<?php

namespace App\Command;

use App\Entity\ParsedProduct;
use App\Message\WriteParsedProductCsvMessage;
use App\Repository\ParsedProductRepository;
use App\Service\ProductDataSource;
use App\Service\ProductParser\VeloplanetaParser;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Command to send product urls to parse. Write data to db and send message for async write to csv
 */
#[AsCommand("product:parse")]
class ProductParseCommand extends Command
{
    /**
     * @param  VeloplanetaParser  $parser
     * @param  ParsedProductRepository  $parsedProductRepository
     * @param  MessageBusInterface  $bus
     * @param  ProductDataSource  $productDataSource
     */
    public function __construct(
        private VeloplanetaParser $parser,
        private ParsedProductRepository $parsedProductRepository,
        private MessageBusInterface $bus,
        private ProductDataSource $productDataSource,
    ){
        parent::__construct();
    }

    /**
     * @param  InputInterface  $input
     * @param  OutputInterface  $output
     *
     * @return int
     * @throws \Symfony\Component\Messenger\Exception\ExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $urls = $this->productDataSource->getProductsUrls();

        foreach ($urls as $url) {
            //Can use another service to parse url, depends on host. For test case I leave it as it is.
            //But best way to implement such approach is  by Service Locator. To do it you need to change DI to ContainerInterface, register services and resolve Service in additional method
            //Also, for  example you can change DI to RozetkaParser to test app with rozetka urls

            try{
                $this->parser->setProductUrl($url);
                $product = new ParsedProduct(
                    $this->parser->getProductTitle(),
                    $this->parser->getProductPrice(),
                    $this->parser->getProductImgUrl(),
                    $url
                );
            }catch (\Exception $e)
            {
                $output->writeln("<error>".$e->getMessage()."</error>");
                return Command::FAILURE;
            }

            //maybe check, if this url was already saved, but depends on needs
            $this->parsedProductRepository->saveParsedProduct($product);
            $this->bus->dispatch(new WriteParsedProductCsvMessage($product));
        }

        return Command::SUCCESS;
    }
}
