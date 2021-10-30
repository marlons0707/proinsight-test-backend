<?php

namespace App\Http\Controllers\API\Transactions;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Transactions\PurchaseResource;
use App\Models\Transactions\Purchase;
use App\Models\Transactions\PurchaseDetail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends BaseController
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

        return Purchase::hdrInfo($searchParam, $sortField, $sortDirection, $perPage);
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
            'supplier_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }

        DB::beginTransaction();
        try {
            $purchase = Purchase::create(
                [
                    'supplier_id' => $input['supplier_id'],
                    'user_id' => auth('sanctum')->user()->id, // Usuario de la sesion (token user)
                    'document' => $input['document'],
                    'contact' => $input['contact'],
                    'purchase_date' => $input['purchase_date'],
                    'comments' => $input['comments'],
                ]
            );

            foreach ($input["products"] as $value) {
                PurchaseDetail::create(
                    [
                        'purchase_id' => $purchase->id,
                        'product_id' => $value['product_id'],
                        'quantity' => $value['quantity'],
                        'original_cost' => $value['cost'],
                        'real_cost' => $value['cost'],
                    ],
                );
            }

            DB::commit();
            return $this->handleResponse(new PurchaseResource($purchase));

        } catch (\Throwable $e) {
            DB::rollback();
            return $this->handleError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return new PurchaseResource($purchase);
    }

    /**
     * Cancel a purchase
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function cancelPurchase($id)
    {
        try {
            $purchase = Purchase::find($id);
            $purchase->status = 'Inactive';
            $purchase->save();

            $purchase->inventoryExit($id);

            return $this->handleResponse(new PurchaseResource($purchase), 'La compra ha sido anulada.', 202);
        } catch (QueryException $e) {
            return $this->handleError($e->errorInfo);
        }
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
