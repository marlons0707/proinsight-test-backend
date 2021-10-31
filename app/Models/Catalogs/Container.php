<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
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
}
