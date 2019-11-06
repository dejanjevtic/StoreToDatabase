<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;

class UserService
{
	/**
     * Stores new user
     *
     * @param $data
     * @return Respond
     * 
     */
	public function store($data)
	{
		$user = new User(); 
		$user->username = $data['username']; 
		$user->email = $data['email']; 
		$user->password = md5($data['password']); 
		$user->age = $data['age']; 
		$user->save();	
		return 'Saved';			
	}

}