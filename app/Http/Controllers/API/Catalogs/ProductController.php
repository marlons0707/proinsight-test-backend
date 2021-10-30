<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Catalogs\Product;
use App\Http\Resources\Catalogs\ProductResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductController extends BaseController
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

        $products = Product::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);
        return ProductResource::collection($products);
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
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'location_id' => 'required',
            'unit_id' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'cost' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        
        $product = Product::create($input);
        return $this->handleResponse(new ProductResource($product), 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:products,name,'.$product->id,
            'category_id' => 'required',
            'location_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'cost' => 'required',
            'status' => 'ignore'
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $product->update($request->all());
        return $this->handleResponse(new ProductResource($product), 'Producto actualizado exitosamente.', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return $this->handleResponse(new ProductResource($product), 'Producto eliminado exitosamente.', 200);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
    }
}
