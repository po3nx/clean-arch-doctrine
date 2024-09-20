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
        try {
            $this->productService->createProduct($name, $price, $description);
            $response = [
                'status' => 'success',
                'message' => 'Product created successfully!',
                'data' => null
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Failed to create product',
                'data' => null
            ];
        }

        echo json_encode($response);
    }

    public function updateProduct($request)
    {
        $id = $request->param('id');
        $name = $request->param('name');
        $price = $request->param('price');
        $description = $request->param('description');
        try {
            $this->productService->updateProduct($id, $name, $price, $description);
            $response = [
                'status' => 'success',
                'message' => 'Product updated successfully!',
                'data' => null
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update product',
                'data' => null
            ];
        }

        echo json_encode($response);
    }

    public function deleteProduct($request)
    {
        $id = $request->param('id');
        try {
            $this->productService->deleteProduct($id);
            $response = [
                'status' => 'success',
                'message' => 'Product deleted successfully!',
                'data' => null
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Failed to delete product',
                'data' => null
            ];
        }

        echo json_encode($response);
    }

    public function getProduct($id)
    {
        try {
            $product = $this->productService->getProductById($id);
            if ($product) {
                $data = [
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'description' => $product->getDescription(),
                ];
                $response = [
                    'status' => 'success',
                    'message' => 'Product found',
                    'data' => $data
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Product not found',
                    'data' => null
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Failed to retrieve product',
                'data' => null
            ];
        }

        echo json_encode($response);
    }

    public function getAllProducts()
    {
        try {
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

            $response = [
                'status' => 'success',
                'message' => 'Products found',
                'data' => $productArray
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Failed to retrieve products',
                'data' => null
            ];
        }

        echo json_encode($response);
    }
}