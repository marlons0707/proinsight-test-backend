<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Settings\Location;
use App\Http\Resources\Settings\LocationResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LocationController extends BaseController
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

        $locations = Location::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);

        return LocationResource::collection($locations);
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
            'name' => 'required|unique:locations,name',
            'store_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $location = Location::create($input);
        return $this->handleResponse(new LocationResource($location), 'Ubicación creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:locations,name,'.$location->id,
            'store_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $location->update($request->all());
        return $this->handleResponse(new LocationResource($location), 'Ubicación actualizada exitosamente.', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        try {
            $location->delete();
            return $this->handleResponse(new LocationResource($location), 'Ubicación eliminada exitosamente.', 200);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
    }
}
