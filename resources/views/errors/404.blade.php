<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="icon" type="image/x-icon" href="{{ asset('assets/fanicon.png') }}">
    <title>Page not found | 404 error</title>

    <!--Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="http://fonts.cdnfonts.com/css/circular-std" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

	<!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

	<!-- Script -->
	<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>

	<!-- Scripts -->
    @vite(['resources/sass/app.scss', 
	'resources/sass/error.scss',
	'resources/js/app.js', 
	'resources/js/main.js', 
	'resources/js/login.js'])

</head>
<body>

<div class="error-container">

	<div class="error-content">

		<div class="error-image">
			<img src="{{ asset('assets/404-error.svg') }}" width="280" height="280" alt="" srcset="">
		</div>
	
		<div class="error-message">
			<div class="error-text">Page not found</div>
			<div class="error-subtext">404 error</div>
		</div>

	</div>

</div>
    
</body>
</html>