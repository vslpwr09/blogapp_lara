@extends('layouts.master')
@section('title')
	Blogs
@endsection
@section('content')
	@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
	@endif
	<div class="panel panel-success">
		<div class="panel-heading"><h3>Blogs</h3></div>
		<div class="panel-body">
			<table class ="table table-bordered">
				<thead>
					<tr>
						<th>Sr</th>
						<th>Title</th>
						<th>Description</th>
						<th>Status</th>
						<th>Created By</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@if(isset($blogs) && count($blogs) > 0)
					@foreach($blogs as $k => $blog)
						<tr>
							<td>{{$k+1}}</td>
							<td>{{$blog->title}}</td>
							<td>{{str_limit($blog->description, 25)}}</td>
							<td>{{($blog->is_published)?'Published':'Unpublished'}}</td>
							<td>{{$blog->name}}</td>
							<td>
								@if($blog->created_by == \Session::get('id'))
									<a href = "{{route('blogs.edit', $blog->id)}}">Edit</a>
								@endif
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan = "6">No Records Found</td>
					</tr>
				@endif
				</tbody>
			</table>
		</div>
    </div>
@endsection