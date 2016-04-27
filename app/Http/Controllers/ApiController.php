<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        echo "ehehe";
    }

    public function getRegister(){
        echo 'hahaha';
      // $returnData       = array();
      // $response         = "OK";
      // $statusCode       = 200;
      // $result           = null;
      // $message          = "Register account success.";
      // $isError          = FALSE;
      // $missingParams    = null;
  
      // // $input            = Input::all();
      // // $name             = (isset($input['name'])) ? $input['name']:null;
      // // $email            = (isset($input['email'])) ? $input['email']:null;
      // // $handphone        = (isset($input['handphone'])) ? $input['handphone']:null;
      // // $password         = (isset($input['password'])) ? $input['password']:null;
      // // $role             = Role::where('role_name','user')->first();
    
      

      // $returnData = array(
      //   'response' => $response,
      //   'status_code' => $statusCode,
      //   'message' => $message,
      //   'result' => $result
      //   );

      // return Response::json($returnData, $statusCode)->header('access-control-allow-origin', '*');

    }
}
