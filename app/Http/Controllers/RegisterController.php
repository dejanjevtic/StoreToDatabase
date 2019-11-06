<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class RegisterController extends Controller
{


	
	/**
     * validating the input data
     *
     * @param $request      
     * @return JSON Response    
     */
    public function register(Request $request){
    	
    	 $validator = Validator::make($request->all(), [
    	 	'username' => 'required|max:15',
            'email' => 'required|email|max:255',
            'password' => 'required|max:15',
            'age' => 'required|numeric|min:18|max:99'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            
        }
        else $message = 'OK';

        return $message;
    }
}
