<?php

namespace App\Models\Contacts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nit',
        'nit_name',
        'cellphone',
        'phone',
        'email',
        'fax',
        'address',
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
            $query->where('name', 'LIKE', $term)
                  ->orwhere('nit', 'LIKE', $term)
                  ->orwhere('nit_name', 'LIKE', $term)
                  ->orwhere('address', 'LIKE', $term);
        });            
    }
}
