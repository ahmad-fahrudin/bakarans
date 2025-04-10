<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use App\Http\Requests\Admin\Products\StoreProductRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->only('search');
            $products = $this->productService->getAllProducts($filters);

            return Inertia::render('Admin/Products/Index', [
                'products' => $products,
                'filters' => $filters,
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching products: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $categories = $this->productService->getAllCategories();

            return Inertia::render('Admin/Products/Create', [
                'categories' => $categories
            ]);
        } catch (Exception $e) {
            Log::error('Error loading product create form: ' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'An error occurred while loading the create form.');
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->productService->createProduct($validated);

            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the product.')
                ->withInput();
        }
    }
}
