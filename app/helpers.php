<?php

namespace App\Helpers;
use Illuminate\Http\Request;

class Helper
{
	/**
     * Create object to store or update the record.
     *
     * @param   array $request, object $classObj
     * @return  object $classObj
     */
    public static function createObj(Request $object, $classObj)
    {		
        if(count($object->all())>0){
			foreach($object->all() as $k => $val){
				if($k != '_token' && $k != '_method' && $k != 'password_confirmation'){
					$classObj->$k = $val;
				}
			}
		}
		return $classObj;
    }
}