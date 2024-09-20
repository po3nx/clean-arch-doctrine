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
        $data = $this->productService->createProduct($name, $price, $description);
        echo json_encode(['status'=>'success','message' => 'Product created successfully!','data'=> $data]);
    }

    public function getProduct($id)
    {
        $product = $this->productService->getProductById($id);
        if ($product) {
            $data = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
            ];
            echo json_encode(['status'=>'success','message' => 'Product found','data'=> $data]);
        } else {
            echo json_encode(['status'=>'error','message' => 'Product not found','data'=> []]);
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

        echo json_encode(['status'=>'success','message' => 'Product found','data'=> $productArray]);
    }
}