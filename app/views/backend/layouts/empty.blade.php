<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		@include('backend.widgets.css')

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
        {{ HTML::script('packages/ace/js/html5shiv.min.js') }}
        {{ HTML::script('packages/ace/js/respond.min.js') }}
		<![endif]-->
		
		<!--[if !IE]> -->
        {{ HTML::script('packages/ace/js/jquery-2.1.4.min.js') }}
		<!-- <![endif]-->
    {{ HTML::script('packages/validator/js/validator.min.js') }}

		<!--[if IE]>
        {{ HTML::script('packages/ace/js/jquery-1.11.3.min.js') }}
        <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='packages/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	</head>

	<body class="login-layout">
		<div class="main-container">
            @yield('content')
		</div><!-- /.main-container -->
	</body>
</html>
