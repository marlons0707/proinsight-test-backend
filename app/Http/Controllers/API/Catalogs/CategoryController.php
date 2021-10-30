<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Catalogs\Category;
use App\Http\Resources\Catalogs\CategoryResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends BaseController
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

        $categories = Category::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);

        return CategoryResource::collection($categories);
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
            'name' => 'required|unique:categories,name',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $category = Category::create($input);
        return $this->handleResponse(new CategoryResource($category), 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $category->update($request->all());
        return $this->handleResponse(new CategoryResource($category), 'Categoría actualizada exitosamente.', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return $this->handleResponse(new CategoryResource($category), 'Categoría eliminada exitosamente.', 200);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
    }
}
