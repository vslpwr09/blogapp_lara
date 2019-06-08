<!doctype html>
<html>
<head>
   @include('layouts.head')
</head>
<body>
<div class="container">
   <header class="">
		<div class = "row header_row" style ="padding:10px;background-color:#d3d3d3;border:1px solid #b3b3b3;">
			<div class = "col-md-12">
				<div class = "col-md-4">
					<img src="{{ URL::to('images/blog.png') }}" width="64">
				</div>
				<div class = "col-md-6">
					<h1>Blogs on Laravel</h1>
				</div>
				<div class ="col-md-2">
					@php 
					$userId = \Session::get('id');
					@endphp
					@if(!$userId)
						<a class = "pull-right btn btn-primary" href = "{{route('backend.login')}}">Login</a>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
								{{ \Session::get('name') }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('backend.logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ route('backend.logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endguest
				</div>
			</div>
		</div>
   </header>
   </br>
	<div id="row">
	   <div id="">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						@if(isset($blogs) && count($blogs) > 0)
							@foreach($blogs as $k => $blog)
							   <div class="panel panel-info">
									<div class="panel-heading">{{$blog->title}}</div>
									<div class="panel-body">
										<div id="row">
											{{str_limit($blog->description, 150	)}}
										</div>
										<div id="row">
											<a class = "pull-right btn btn-success" href = "{{route('read-more', $blog->id)}}">read more >></a>
										</div>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	
   <footer class="row">
       @include('layouts.footer')
   </footer>
</div>
</body>
</html>