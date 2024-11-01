<?php

namespace App\Entity;

use App\Repository\ParsedProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParsedProductRepository::class)]
#[ORM\Table(name: 'parsed_product')]
class ParsedProduct
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public ?int $id = null;

    /**
     * @param  string  $title
     * @param  float  $price
     * @param  string  $imageUrl
     * @param  string  $productUrl
     */
    public function __construct(
        #[ORM\Column(type: 'string', length: 255)]
        public string $title,

        #[ORM\Column(type: 'float')]
        public float $price,

        #[ORM\Column(type: 'string', length: 255)]
        public string $imageUrl,

        #[ORM\Column(type: 'string', length: 255)]
        public string $productUrl,
    ){

    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param  string  $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param  float  $price
     *
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param  string  $imageUrl
     *
     * @return $this
     */
    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductUrl(): string
    {
        return $this->productUrl;
    }

    /**
     * @param  string  $productUrl
     *
     * @return $this
     */
    public function setProductUrl(string $productUrl): self
    {
        $this->productUrl = $productUrl;

        return $this;
    }
}
