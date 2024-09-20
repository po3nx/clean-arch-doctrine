<?php
namespace App\Application\Service;

use App\Domain\Entity\Product;
use App\Infrastructure\Repository\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(string $name, float $price, ?string $description): void
    {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);

        $this->productRepository->save($product);
    }

    public function updateProduct(int $id, string $name, float $price, ?string $description): void
    {
        $product = $this->productRepository->find($id);
        if ($product) {
            $product->setName($name);
            $product->setPrice($price);
            $product->setDescription($description);

            $this->productRepository->save($product);
        }
    }

    public function deleteProduct(int $id): void
    {
        $product = $this->productRepository->find($id);
        if ($product) {
            $this->productRepository->delete($product);
        }
    }

    public function getProductById(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }

    public function getAllProducts(): array
    {
        return $this->productRepository->findAll();
    }
}