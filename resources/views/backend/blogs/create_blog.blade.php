@extends('layouts.master')
@section('title')
	Create Blog
@endsection
@section('content')
	@if ($message = Session::get('failed'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
	@endif
	<div class="panel panel-success">
		<div class="panel-heading"><h3>Create a New Blog</h3></div>
		<div class="panel-body">
			{!! Form::open(['url' => '/backend/blogs', 'class' => 'form-horizontal']) !!}
			
			<!-- Title -->
			<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				{!! Form::label('title', 'Title:', ['class' => 'col-lg-offset-1 col-lg-2 control-label']) !!}
				<div class="col-lg-5">
					{!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
					
					@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<!-- Desc -->
			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				{!! Form::label('description', 'Description:', ['class' => 'col-lg-offset-1  col-lg-2 control-label']) !!}
				<div class="col-lg-5">
					{!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 3, 'cols' => 40]) !!}
					
					@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif
				</div>
			</div>
			
			<!-- Publish -->
			<div class="form-group{{ $errors->has('is_published') ? ' has-error' : '' }}">
				{!! Form::label('Publish', 'Publish Blog:', ['class' => 'col-lg-offset-1  col-lg-2 control-label']) !!}
				<div class="col-lg-5">
					{{ Form::checkbox('is_published',1,null, array('id'=>'is_published')) }}
					@if ($errors->has('is_published'))
						<span class="help-block">
							<strong>{{ $errors->first('is_published') }}</strong>
						</span>
					@endif
				</div>
			</div>
			
			<!-- Submit -->
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-7">
					{!! Form::submit('Submit', ['class' => 'btn btn-success'] ) !!}
				</div>
			</div>
		
			{!! Form::close()  !!}
		</div>
    </div>
@endsection