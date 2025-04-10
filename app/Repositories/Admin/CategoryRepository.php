<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    public function getAllPaginated(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        return Category::query()
            ->when(isset($filters['search']), function ($query) use ($filters) {
                $query->where('name', 'like', "%{$filters['search']}%");
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }
}
