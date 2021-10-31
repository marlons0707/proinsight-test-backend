<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Catalogs\Unit;
use App\Http\Resources\Catalogs\UnitResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UnitController extends BaseController
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

        $units = Unit::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);

        return UnitResource::collection($units);
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
            'name' => 'required|unique:units,name',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $unit = Unit::create($input);
        return $this->handleResponse(new UnitResource($unit), 'Presentación creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return new UnitResource($unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:units,name,'.$unit->id,
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $unit->update($request->all());
        return $this->handleResponse(new UnitResource($unit), 'Presentación actualizada exitosamente.', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();
            return $this->handleResponse(new UnitResource($unit), 'Presentación eliminada exitosamente.', 200);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
    }
}
