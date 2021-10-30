<?php

namespace App\Http\Controllers\API\Contacts;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Contacts\Customer;
use App\Http\Resources\Contacts\CustomerResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CustomerController extends BaseController
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
        // $filterParam = request('filter', '');
        $sortField = request('sortField', 'id');
        $sortDirection = request('sortDesc', 'asc');
        $filterField = request('filterField', '');
        $filterValue = request('filterValue', '');

        $customers = Customer::filter($filterField, $filterValue)->search(trim($searchParam))->orderBy($sortField, $sortDirection)->paginate($perPage);

        return CustomerResource::collection($customers);
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
            'name' => 'required|unique:customers,name',
            'nit' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }
        
        $customer = Customer::create($input);
        return $this->handleResponse(new CustomerResource($customer), 'Cliente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:customers,name,'.$customer->id,
            'nit' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $customer->update($input);
        return $this->handleResponse(new CustomerResource($customer), 'Cliente actualizado exitosamente', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return (new CustomerResource($customer))
                    ->additional(['msg' => 'Cliente eliminado correctamente']);
    }
}
