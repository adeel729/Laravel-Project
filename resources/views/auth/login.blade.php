<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js"')}}></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{url('assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/pages/login.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form action="{{route('userlogin.soft')}}" method="post">
						@csrf
              
                                    <div class="login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
                                                @if(Session::has('UserNotExist'))
                                                <div class="alert alert-danger alert-bordered alert-rounded">
                                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                                <span class="text-semibold">Problem</span> {{Session::get('UserNotExist')}}
                                                </div> 
                                                @endif
                                                @if(Session::has('IncorrectPassowrd'))
                                                <div class="alert alert-danger alert-bordered alert-rounded">
                                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                                <span class="text-semibold">Problem</span> {{Session::get('IncorrectPassowrd')}}
                                                </div> 
                                                @endif
                                                @if(Session::has('UserAdded'))
                                                <div class="alert alert-dange ralert-bordered alert-rounded">
                                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                                <span class="text-semibold">Problem</span> {{Session::get('UserAdded')}}
                                                </div> 
                                                @endif
                                                @if(Session::has('failedlogin'))
                                                <div class="alert alert-dange ralert-bordered alert-rounded">
                                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                                <span class="text-semibold">Problem</span> {{Session::get('failedlogin')}}
                                                </div> 
                                                @endif
                                          </div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control input-lg" name="useremail" placeholder="Username" value="{{old('useremail')}}">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
                                                <div class="text-danger">
                                                            @error('useremail')
                                                                  {{$message}}
                                                            @enderror
                                                </div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="userpassword" class="form-control input-lg" placeholder="Password" >
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
                                                <div class="text-danger">
                                                      @error('userpassword')
                                                            {{$message}}
                                                      @enderror
                                                </div>
							</div>

						
							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block btn-lg">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>

						
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					{{-- <div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> --}}
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
