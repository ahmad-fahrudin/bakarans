<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->only('search');
            $categories = $this->categoryService->getAllCategories($filters);

            return Inertia::render('Admin/Categories/Index', [
                'categories' => $categories,
                'filters' => $filters,
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching categories: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            return Inertia::render('Admin/Categories/Create');
        } catch (Exception $e) {
            Log::error('Error loading category create form: ' . $e->getMessage());
            return redirect()->route('categories.index');
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->categoryService->createCategory($validated);

            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (Exception $e) {
            Log::error('Error creating category: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Category $category)
    {
        try {
            return Inertia::render('Admin/Categories/Edit', [
                'category' => $category
            ]);
        } catch (Exception $e) {
            Log::error('Error loading category edit form: ' . $e->getMessage());
            return redirect()->route('categories.index');
        }
    }

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $validated = $request->validated();
            $this->categoryService->updateCategory($category, $validated);

            return redirect()->route('categories.index');
        } catch (Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryService->deleteCategory($category);

            return redirect()->route('categories.index');
        } catch (Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return redirect()->route('categories.index');
        }
    }
}
