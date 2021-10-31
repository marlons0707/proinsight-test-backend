<?php

namespace App\Http\Resources\Catalogs;

use App\Models\Catalogs\Category;
use App\Models\Catalogs\Unit;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,

            'sku' => $this->sku,
            'volume' => $this->volume,
            'units_per_box' => $this->units_per_box,

            'category_id' => $this->category_id,
            'unit_id' => $this->unit_id,

            'category' => Category::find($this->category_id)->name,
            'unit' => Unit::find($this->unit_id)->name,

            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d/m/Y h:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y h:i:s'),
        ];
    }
}
