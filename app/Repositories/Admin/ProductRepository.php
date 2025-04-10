<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
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
            ->with('category')
            ->paginate($perPage);
    }

    public function create(array $data)
    {
        $imageBase64 = null;
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $imageContent = file_get_contents($data['image']->getRealPath());
            $imageBase64 = 'data:' . $data['image']->getMimeType() . ';base64,' . base64_encode($imageContent);
        }

        $id = DB::table('products')->insertGetId([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'stock' => $data['stock'],
            'image' => $imageBase64, // Use the base64 converted image
            'is_active' => $data['is_active'] ?? 'Y',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Return the newly created product
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->first();
    }
}
