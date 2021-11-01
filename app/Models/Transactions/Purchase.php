<?php

namespace App\Models\Transactions;

use App\Models\Contacts\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'user_id',
        'container_id',
        'purchase_date',
        'document_type',
        'date_attempt',
        'place_arrival',
        'document',
        'status',
        'comments',
    ];

    protected $dates = ['purchase_date'];

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
            $query->where('id', 'LIKE', $term);
        });
    }

    public static function hdrInfo($searchParam, $sortField, $sortDirection, $perPage)
    {
        $searchParam = "%$searchParam%";

        $query = DB::table('purchases')
        ->join('purchase_details', 'purchases.id', 'purchase_details.purchase_id')
        ->join('suppliers', 'purchases.supplier_id', 'suppliers.id')
        ->join('users', 'purchases.user_id', 'users.id')
        ->join('containers', 'purchases.container_id', 'containers.id')
        ->select(
            'purchases.id',
            'purchases.status',
            'suppliers.name as supplier',
            'purchases.document',
            DB::raw('SUM(purchase_details.real_cost * purchase_details.quantity) as total'),
            'purchases.comments',
            'users.name as user',
            'containers.name as container',
            'containers.type as container_type',
            
            DB::raw('DATE_FORMAT(purchases.date_attempt, "%d/%m/%Y") as date_attempt'),
            DB::raw('DATE_FORMAT(purchases.purchase_date, "%d/%m/%Y") as purchase_date'),
            DB::raw('DATE_FORMAT(purchases.created_at, "%d/%m/%Y %h:%i:%s") as created_at'),
        )
        ->where('purchases.status', 'LIKE', $searchParam)
        ->orWhere('purchases.document', 'LIKE', $searchParam)
        ->orWhere('purchases.created_at', 'LIKE', $searchParam)
        ->orWhere('suppliers.name', 'LIKE', $searchParam)
        ->orWhere('users.name', 'LIKE', $searchParam)
        ->groupBy('id')
        ->orderBy($sortField, $sortDirection)
        ->paginate($perPage);

        return $query;
    }

    public static function detInfo($purchaseId)
    {
        $query = DB::table('purchase_details')
        ->join('products', 'purchase_details.product_id', 'products.id')
        ->select(
            'products.name as product',
            'purchase_details.quantity as qty',
            'purchase_details.real_cost as cost',
            DB::raw('(purchase_details.quantity * purchase_details.real_cost) as total'),
        )
        ->where('purchase_details.purchase_id', $purchaseId)
        ->get();

        return $query;
    }

    public static function summaryInfo($purchaseId)
    {
        $query = DB::table('purchase_details')
        ->select(
            DB::raw('SUM(purchase_details.quantity * purchase_details.real_cost) as total'),
        )
        ->where('purchase_details.purchase_id', $purchaseId)
        ->get();

        return $query;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}

