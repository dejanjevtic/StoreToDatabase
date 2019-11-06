<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Services\UserService;

class RegisterController extends Controller
{
	public function __construct(UserService $userservice)
    {
        $this->userservice = $userservice;
    }
	
	/**
     * Validating the input data
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
        	$message = $this->userservice->store($request); 
		}

        return response()->json($message);
    }
}
