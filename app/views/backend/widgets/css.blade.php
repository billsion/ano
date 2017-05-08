<!-- bootstrap & fontawesome -->
    {{ HTML::style('packages/ace/css/bootstrap.min.css') }}
    {{ HTML::style('packages/ace/font-awesome/4.5.0/css/font-awesome.min.css') }}

<!-- text fonts -->
{{ HTML::style('packages/ace/css/fonts.googleapis.com.css') }}

<!-- ace styles -->
{{ HTML::style('packages/ace/css/ace.min.css?' . time()) }}

<!--[if lte IE 9]>
    {{ HTML::style('packages/css/ace-par2.min.css') }}
<![endif]-->
{{ HTML::style('packages/ace/css/ace-skins.min.css') }}
{{ HTML::style('packages/ace/css/ace-rtl.min.css') }}

<!--[if lte IE 9]>
    {{ HTML::style('packages/ace/css/ace-ie.min.css') }}
<![endif]-->