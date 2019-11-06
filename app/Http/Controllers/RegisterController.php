<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;


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
    	 	'username' => 'required|unique:users|max:15',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:15',
            'age' => 'required|numeric|min:18|max:99'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();            
        }
        else { 
				$user = new User(); 
				$user->username = $request['username']; 
				$user->email = $request['email']; 
				$user->password = md5($request['password']); 
				$user->age = $request['age']; 
				$user->save();		
				$message ='Saved';	
		}

        return response()->json($message);
    }
}
