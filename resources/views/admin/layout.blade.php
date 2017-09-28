<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin | @yield('title')</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		@include('admin.assets.css')
	</head>

    <body class="hold-transition skin-blue sidebar-mini">
    	<div class="wrapper">
    		@include('admin.partials.header') 
    		@include('admin.partials.sidebar')
    
    		<div class="content-wrapper">
    		
    			@include('admin.partials.breadcrumb')
    			@yield('content')
    			
    		</div>
    
    		@include('admin.partials.footer')
    		@include('admin.partials.control_sidebar')
    	</div>
    </body>
    
    @include('admin.assets.js')
</html>
