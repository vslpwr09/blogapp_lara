<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\UserRole;
use Validator;

class User extends Model
{
	
	
    /**
     * Validate user input.
     *
     * @param   array $request
     * @return  Validator object
     */
	public function validate(array $request)
	{
		return Validator::make($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
	}
	
	/**
     * Store Users.
     *
     * @param  object $request, int $id
     * @return  boolean 
     */
    public function saveUser(Request $request, $id = '')
	{
		if($id != ''){
			$classObj = $this::find($id);
		} else {
			$classObj = $this;
		}
		$obj = Helper::createObj($request, $classObj);
	
		$obj->password = Hash::make($request->password);
		if($obj->save()){
			$this->saveRole($obj->id, $id);
			$this->setSession($obj->id);
			return true;
		} else {
			return false;
		}
	}
	
	/**
     * Save role for user
     *
     * @param  int  $userId
     * @return void
     */
	protected function saveRole(int $userId, $id='')
	{
		if($id == '' && $userId == 1){
			$role_id = 1;
		} else {
			$role_id = 2;
		}
		return UserRole::create([
            'user_id' => $userId,
            'role_id' => $role_id
        ]);
	}
	/**
     * Set Session for user
     *
     * @param  int  $userId
     * @return void
     */
	public function setSession(int $userId)
	{
		$user = $this->select('users.id', 'users.name', 'user_roles.role_id')->leftjoin('user_roles', 'user_roles.user_id', '=', 'users.id')->where('users.id', $userId)->first();
		
		if(!empty($user)){
			\Session::put('id', $user->id);
			\Session::put('name', $user->name);
			\Session::put('role_id', $user->role_id);
		}
	}
	
	/**
     * Validate User
     *
     * @param  Request  $request
     * @return boolean 
     */
	public function checkLogin(Request $request)
	{
		$user = $this->where('email', $request->email)->first();
		if($user){
			if (Hash::check($request->password, $user->password)) {
				$this->setSession($user->id);
				return true;
			}
		} else {
			return false;
		}
	}
}
