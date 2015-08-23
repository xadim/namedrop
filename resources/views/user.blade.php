@extends('layouts/layout')

@section('content')


		<!-- ONLY LOGO ON HEADER -->
		<div class="only-logo">
			<div class="navbar">
				<div class="navbar-header">
					<img alt="" src="">
				</div>
			</div>
		</div> <!-- /END ONLY LOGO ON HEADER -->
		
		<div class="row home-contents">
			<div class="col-md-12 col-sm-12">

				<div class="intro-section">

					<h1 class="intro">The Easiest Way for Your Clients to Recommend Your Business.</h1>
				</div>
			</div>
			<div id="download-button" class="buttons col-md-4">
				<a href="{{ $login_link }}" class="m-facebook-button"><i class="icon-facebook"></i><span>Sign up with Facebook</span></a>
				<a href="{{ $login_link }}" class="m-google-button"><i class="icon-google-plus"></i><span>Sign up with Google</span></a>
				<a href="{{ $login_link }}" class="m-linkedin-button"><i class="icon-linkedin"></i><span >Sign up with LinkedIn</span></a>

			</div>
			<div class="col-md-1 m-login-or-signup"></div>
			<div class="col-md-4">
				<input type="text" data-reactid=".pc0hi2igw0.2.0.0.1.0" tabindex="10" placeholder="Email" class="m-input-text" name="signup[email_address]">
    		</div>
    		<div class="col-md-2">
    			<button tabindex="11" type="" class="m-button bg-cerulean hbg-castle-rock c-white progress-button state-loading m-login-or-signup--sign-up-button" data-test_under="hello"><span data-reactid=".pc0hi2igw0.2.0.0.2.0" class="l-nowrap">SIGN UP FREE</span></button>
    		</div>
		</div>


</div>
</header>

@stop
