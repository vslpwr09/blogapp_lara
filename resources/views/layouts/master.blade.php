<!doctype html>
<html>
<head>
   @include('layouts.head')
</head>
<body>
<div class="">
   <header class="row">
		@include('layouts.header')
   </header>
	<div id="wrapper">
		@include('layouts.sidebar')
	   <div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
					   @yield('content')
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