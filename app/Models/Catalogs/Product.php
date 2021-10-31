<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'volume',
        'units_per_box',
        'category_id',
        'unit_id',
        'description',
        'image',
        'status',
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
        $query->where(function($query) use ($term) {
            $query->where('name', 'LIKE', $term);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
