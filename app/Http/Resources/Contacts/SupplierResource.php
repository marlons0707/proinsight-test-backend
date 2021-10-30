<?php

namespace App\Http\Resources\Contacts;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nit' => $this->nit,
            'nit_name' => $this->nit_name,
            'cellphone' => $this->cellphone,
            'phone' => $this->phone,
            'email' => $this->email,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'contact_email' => $this->contact_email,
            'fax' => $this->fax,
            'address' => $this->address,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d/m/Y h:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y h:i:s'),
        ];
    }
}
