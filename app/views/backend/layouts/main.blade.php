
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		@include('backend.widgets.css')
    {{ HTML::style('packages/jstree/themes/default/style.min.css') }}
    {{ HTML::style('packages/uploadify/uploadify.css?' . time()) }}


		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
    {{ HTML::script('packages/ace/js/ace-extra.min.js') }}

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
        {{ HTML::script('packages/ace/js/html5shiv.min.js') }}
        {{ HTML::script('packages/ace/js/respond.min.js') }}
		<![endif]-->
		
		<!--[if !IE]> -->
    {{ HTML::script('packages/ace/js/jquery-2.1.4.min.js') }}
    <!-- uploadify -->
    {{ HTML::script('packages/uploadify/jquery.uploadify.js?' . time()) }}

		<!-- <![endif]-->

		<!--[if IE]>
        {{ HTML::script('packages/ace/js/jquery-1.11.3.min.js') }}
    <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='packages/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
    {{ HTML::script('packages/ace/js/bootstrap.min.js') }}

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
    {{ HTML::script('packages/ace/js/ace-elements.min.js') }}
    {{ HTML::script('packages/ace/js/ace.min.js') }}
    {{ HTML::script('packages/validator/js/validator.min.js') }}
    {{ HTML::script('packages/jstree/jstree.min.js') }}
	</head>

	<body class="no-skin">
		@include('backend.layouts.main.navigation')
		
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			@include('backend.layouts.main.sidebar')
			
			<div class="main-content">
				<div class="main-content-inner">
          @include('backend.layouts.main.breadcrumbs')
          
					<div class="page-content">
              @yield('content')
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

      @include('backend.layouts.main.footer')

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!-- inline scripts related to this page -->
    <script type='text/javascript'>
    //send a DELETE request when outside of a form
    (function() {
        setTimeout(function(){$("#flashdata").fadeOut("slow");},2000);
      var laravel = {
        initialize: function() {
          this.methodLinks = $('a[data-method]');

          this.registerEvents();
        },

        registerEvents: function() {
          this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
          var link = $(this);
          var httpMethod = link.data('method').toUpperCase();
          var form;

          // If the data-method attribute is not PUT or DELETE,
          // then we don't know what to do. Just ignore.
          if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
            return;
          }

          // Allow user to optionally provide data-confirm="Are you sure?"
          if ( link.data('confirm') ) {
            if ( ! laravel.verifyConfirm(link) ) {
              return false;
            }
          }

          form = laravel.createForm(link);
          form.submit();

          e.preventDefault();
        },

        verifyConfirm: function(link) {
          return confirm(link.data('confirm'));
        },

        createForm: function(link) {
          var form =
          $('<form>', {
            'method': 'POST',
            'action': link.attr('href')
          });

          var token =
          $('<input>', {
            'type': 'hidden',
            'name': '_token',
              'value': '{{ csrf_token() }}'
            });

          var hiddenInput =
          $('<input>', {
            'name': '_method',
            'type': 'hidden',
            'value': link.data('method')
          });

          return form.append(token, hiddenInput)
                     .appendTo('body');
        }
      };

      laravel.initialize();
    })();
    </script>
	</body>
</html>