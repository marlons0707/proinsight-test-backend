<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function handleResponse($result, $msg = 'Ok', $code = 200)
    {
    	$res = [
            'res' => true,
            'msg' => $msg,
            'data' => $result,
        ];
        return response()->json($res, $code);
    }

    public function handleError($error, $errorMsg = [], $code = 404)
    {
    	$res = [
            'res' => false,
            'msg' => 'Los datos proporcionados no son válidos.',
            'error' => $error,
        ];
        if(!empty($errorMsg)){
            $res['data'] = $errorMsg;
        }
        return response()->json($res, $code);
    }
}
