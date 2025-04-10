<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductRepository
{
    public function getAllPaginated(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        return Product::query()
            ->when(isset($filters['search']), function ($query) use ($filters) {
                $query->where('name', 'like', "%{$filters['search']}%");
            })
            ->orderBy('id', 'desc')
            ->when(isset($filters['category']), function ($query) use ($filters) {
                $query->where('category_id', $filters['category']);
            })
            ->paginate($perPage);
    }
}
