<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Catalogs\Container;
use App\Http\Resources\Catalogs\ContainerResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContainerController extends BaseController
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

        $containers = Container::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);
        return ContainerResource::collection($containers);
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
            'name' => 'required|unique:containers,name',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        
        $product = Container::create($input);
        return $this->handleResponse(new ContainerResource($product), 'Contenedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Container $container)
    {
        try {
            $container->delete();
            return $this->handleResponse(new ContainerResource($container), 'Contenedor eliminado exitosamente.', 200);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
    }
}
