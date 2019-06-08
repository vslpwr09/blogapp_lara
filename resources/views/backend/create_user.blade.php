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
					<a class = "pull-right btn btn-primary" href = "{{route('login')}}">Login</a>
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
						<form class="form-horizontal" method="POST" action="{{ route('backend.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
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