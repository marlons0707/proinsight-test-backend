<?php

namespace App\Models\Catalogs;

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
}
