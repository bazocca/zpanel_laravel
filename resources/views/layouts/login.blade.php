<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
		<meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
		<meta name="keywords" content="@yield('keywords')">
		<meta name="description" content="@yield('description')">
		<!-- END META SECTION -->
		<title>
			@yield('title')
		</title>
        <!-- CSS INCLUDE -->
		{!! Html::style(('css/theme-default.css')) !!}
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
		@yield('content')
    </body>
</html>