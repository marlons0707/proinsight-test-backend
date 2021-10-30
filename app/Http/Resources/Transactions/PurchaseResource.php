<?php

namespace App\Http\Resources\Transactions;

use App\Models\Contacts\Supplier;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            'supplier_id' => $this->supplier_id,
            'supplier' => Supplier::find($this->supplier_id)->name,
            'contact' => Supplier::find($this->supplier_id)->contact_name,
            'user_id' => $this->user_id,
            'user' => User::find($this->user_id)->name,
            'document_type' => $this->document_type,
            'document' => $this->document,
            'status' => $this->status,
            'comments' => $this->comments,
            'purchase_date' => $this->purchase_date->format('d/m/Y'),
            'products' => $this->detInfo($this->id),
            'summaryInfo' => $this->summaryInfo($this->id),
            'created_at' => $this->created_at->format('d/m/Y h:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y h:i:s'),
        ];


        
    }
}
