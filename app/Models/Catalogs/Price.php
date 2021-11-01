<?php

namespace App\Models\Catalogs;

use App\Http\Resources\Catalogs\PriceResource;
use App\Models\Contacts\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'price',
    ];

    public function scopeFilter($query, $field, $value)
    {
        if ($value) {
            $query->where($field, '=', $value);
        }
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->whereHas('product', function($query) use ($term) {
            $query->where('name', 'LIKE', $term);
        })->orWhereHas('supplier', function($query) use ($term) {
            $query->where('name', 'LIKE', $term);
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Obtener los productos de un proveedor
    public static function getProductsBySupplier($supplier_id, $searchParam, $sortField, $sortDirection, $perPage)
    {
        $searchParam = "%$searchParam%";
        
        $products = Price::where('supplier_id', $supplier_id)
            ->whereHas('product', function($query) use ($searchParam) {
                $query->where('name', 'LIKE', $searchParam);
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage);

        return PriceResource::collection($products);
    }
}
