<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Validator;

class Blog extends Model
{
	protected $rules = array(
		'title'=>'required',
		'description'=>'required',
	);
	
	protected $messsages = array(
		'title.required'=>'Plesae enter Blog Title.',
		'description.required'=>'Plesae enter Description.',
	);
	
    /**
     * Validate user input.
     *
     * @param   array $request
     * @return  Validator object
     */
	public function validate(array $request)
	{
		return Validator::make($request, $this->rules, $this->messsages);
	}
	
	/**
     * Store Blogs.
     *
     * @param  object $request, int $id
     * @return  boolean 
     */
	public function store(Request $request, $id = '')
	{
		if($id != ''){
			$classObj = $this::find($id);
		} else {
			$classObj = $this;
		}
		$obj = Helper::createObj($request, $classObj);

		$obj->is_published = ($request->is_published)??0;
		$obj->created_by = \Session::get('id');
		$obj->updated_by = \Session::get('id');
		if($obj->save()){
			return true;
		} else {
			return false;
		}
	}
	
	/**
     * Get blog details.
     *
     * @param  int $showUnpublished
     * @return  object 
     */
	public function getBlogs($showUnpublished = 0)
	{
		$query = $this
				->select('blogs.id', 'blogs.title', 'blogs.description', 'blogs.is_published', 'users.name', 'created_by')
				->leftjoin('users', 'users.id', '=', 'blogs.created_by');
		if($showUnpublished == 1){
			$query->where('is_published', '=', 1);
		}
		
		return $query->orderBy('blogs.updated_at', 'DESC')->get();
	}
}
