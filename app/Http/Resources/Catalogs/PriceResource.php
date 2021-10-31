<?php

namespace App\Http\Resources\Catalogs;

use App\Models\Catalogs\Product;
use App\Models\Contacts\Supplier;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'supplier_id' => $this->supplier_id,
            'supplier' => Supplier::find($this->supplier_id)->name,
            'product_id' => $this->product_id,
            'product' => Product::find($this->product_id)->name,
            'created_at' => $this->created_at->format('d/m/Y h:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y h:i:s'),
        ];
    }
}
