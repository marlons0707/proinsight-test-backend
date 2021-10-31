<?php

namespace App\Http\Controllers\API\Access;

use App\Http\Controllers\Controller;
use App\Http\Resources\Access\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

        $products = User::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);
        return UserResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
