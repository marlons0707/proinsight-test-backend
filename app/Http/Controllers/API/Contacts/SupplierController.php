<?php

namespace App\Http\Controllers\API\Contacts;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Contacts\Supplier;
use App\Http\Resources\Contacts\SupplierResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = request('perPage', 10);
        $searchParam = request('query', '');
        $sortField = request('sortField', 'id');
        $sortDirection = request('sortDesc', 'asc');
        $filterField = request('filterField', '');
        $filterValue = request('filterValue', '');

        $suppliers = Supplier::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);

        return SupplierResource::collection($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|unique:suppliers,name',
            'nit' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $supplier = Supplier::create($input);
        return $this->handleResponse(new SupplierResource($supplier), 'Proveedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return new SupplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:suppliers,name,'.$supplier->id,
            'nit' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $supplier->update($input);
        return $this->handleResponse(new SupplierResource($supplier), 'Proveedor actualizado exitosamente', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return (new SupplierResource($supplier))
                    ->additional(['msg' => 'Proveedor eliminado correctamente']);
    }
}
