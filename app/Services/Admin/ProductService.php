<?php

namespace App\Services\Admin;

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
}
