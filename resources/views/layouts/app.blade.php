<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FanIcon Link -->
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/fanicon.png') }}">

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 
	'resources/sass/dashboard.scss', 
	'resources/sass/login.scss', 
	'resources/js/app.js', 
	'resources/js/main.js', 
	'resources/js/login.js'])

	@livewireStyles

</head>
<body onload="document.body.style.visibility=`visible`;">
    <script>document.body.style.visibility=`hidden`;</script>

	@livewireScripts

    <div id="app">

        @include('layouts.main')
        
    </div>
	
</body>
</html>
