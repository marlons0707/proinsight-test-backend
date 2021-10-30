<?php

namespace App\Http\Resources\Catalogs;

use App\Models\Catalogs\Category;
use App\Models\Catalogs\Unit;
use App\Models\Settings\Location;
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

            'category_id' => $this->category_id,
            'location_id' => $this->location_id,
            'unit_id' => $this->unit_id,

            'category' => Category::find($this->category_id)->name,
            'location' => Location::find($this->location_id)->name,
            'unit' => Unit::find($this->unit_id)->name,

            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'cost' => $this->cost,
            'image' => $this->image,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d/m/Y h:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y h:i:s'),
        ];
    }
}
