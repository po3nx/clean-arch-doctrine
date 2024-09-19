<?php
namespace App\Controller;

use App\Application\Service\ProductService;

class ProductController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function createProduct($request)
    {
        $name = $request->param('name');
        $price = $request->param('price');
        $description = $request->param('description');
        $this->productService->createProduct($name, $price, $description);
        echo "Product created successfully!";
    }

    public function getProduct($id)
    {
        $product = $this->productService->getProductById($id);
        if ($product) {
            echo json_encode([
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
            ]);
        } else {
            echo json_encode(['error' => 'Product not found!']);
        }
    }
    public function getAllProducts()
    {
        $products = $this->productService->getAllProducts();
        $productArray = [];

        foreach ($products as $product) {
            $productArray[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
            ];
        }

        echo json_encode($productArray);
    }
}