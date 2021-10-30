<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Settings\Store;
use App\Http\Resources\Settings\StoreResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StoreController extends BaseController
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

        $stores = Store::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);

        return StoreResource::collection($stores);
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
            'name' => 'required|unique:stores,name',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $store = Store::create($input);
        return $this->handleResponse(new StoreResource($store), 'Sucursal creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return new StoreResource($store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:stores,name,'.$store->id,
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $store->update($request->all());
        return $this->handleResponse(new StoreResource($store), 'Sucursal actualizada exitosamente.', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        try {
            $store->delete();
            return $this->handleResponse(new StoreResource($store), 'Sucursal eliminada exitosamente.', 200);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
    }
}
