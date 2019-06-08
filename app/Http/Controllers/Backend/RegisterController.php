<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Backend\User;

class RegisterController extends Controller
{
    public function index()
	{
		return view('backend.create_user');
	}
	
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
	public function register(Request $request)
	{

		$user = new User();
		$res = $user->validate($request->all());
		
		if($res->fails())
		{
			return redirect()->back()->with('errors', $res->errors());
		} else {
			$save = $user->saveUser($request);
			if($save){
				return redirect('/backend/blogs');
			} else {
				return redirect()->back()->with('failed', 'Somethind went wrong, Please try again.');
			}
		}
	}
	
	/**
     * Login view
     *
     * @return \Illuminate\Http\Response
     */
	public function loginView()
	{
		return view('backend.login');
	}
	
	/**
     * Check Login
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
	public function checkLogin(Request $request)
	{
		$validator = \Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
		if($validator->fails())
		{
			return redirect()->back()->with('errors', $validator->errors());
		} else {
			$user = new User();
			
			$valid = $user->checkLogin($request);

			if($valid){
				return redirect('/backend/blogs');
			} else {
				return redirect()->back()->with('failed', 'Unvalid credentials..');
			}
		}
	}
	
	/**
     * Logout
     *
     * @return \Illuminate\Http\Response
     */
	public function logout()
	{
		return redirect('/backend/login');
	}

}
