<div class = "row header_row" style ="padding:10px;background-color:#d3d3d3;border:1px solid #b3b3b3;">
	<div class = "col-md-12">
		<div class = "col-md-4">
			<img src="{{ URL::to('images/blog.png') }}" width="64">
		</div>
		<div class = "col-md-6">
			<h1>Blogs on Laravel</h1>
		</div>
		
		<div class = "col-md-2">      
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@php 
					$userId = \Session::get('id');
				@endphp
				@if(!$userId)
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
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
			</ul>
		</div>
	</div>
</div>