<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(array $filters): LengthAwarePaginator
    {
        return $this->productRepository->getAllPaginated($filters);
    }

    public function getAllCategories()
    {
        return Category::where('is_active', 'Y')->get(['id', 'name']);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }
}
