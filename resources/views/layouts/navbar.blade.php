<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/main.js'])

</head>

<body>
    
    
<!--Scroll -->
<a href="#" class="scrolltop" id="scroll-top">
    <i class='bx bx-chevron-up scrolltop__icon'></i>
</a>

<!--Navigation -->

<header class="l-header" id="header">
 <nav class="nav bd-container">
     <a href="#" class="nav__logo">Van<mark style="background: none;color: "class="vango">Go</mark></a>
     <div class="nav__menu" id="nav-menu">
         <ul class="nav__list">
             <li class="nav__item"><a href="{{ url('/') }}" class="nav__link active-link">Home</a></li>
             <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
             <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
             <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
             <li class="nav__item"><a href="#" class="nav__link">Register</a></li>
             <li class="nav__item"><a href="{{ route('login') }}" class="nav__link">Log In</a></li>
             <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
         </ul>
     </div>
     <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
     </div>
 </nav>
</header>

</body>