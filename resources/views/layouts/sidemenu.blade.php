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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/sass/dashboard.scss', 'resources/js/app.js', 'resources/js/main.js'])

</head>
<body>

    <main class="l-main">
        <section class="passengers section bd-container" id="settings">
            
            
            <div class="passenger-nav-container">
    
                <div class="sidebar_nav">

                    @if(Route::is('terms', 'privacy'))

                        <ul class="policy-class">
                            <li><a href="{{ route('home') }}" ><span class="iconify-inline icon" data-icon="cil:arrow-left" data-width="20" data-height="20"></span>Back</a></li>
                            <li><a href="{{ route('privacy') }}" class="{{ (request()->is('privacy-policy')) ? 'picked' : '' }}"><span class="iconify-inline {{ (request()->is('privacy-policy')) ? 'picked-icon' : '' }}" data-icon="ic:round-privacy-tip" data-width="20" data-height="20"></span>Privacy Policy</a></li>
                            <li><a href="{{ route('terms') }}" class="{{ (request()->is('terms-of-service')) ? 'picked' : '' }}"><span class="iconify-inline {{ (request()->is('terms-of-service')) ? 'picked-icon' : '' }}" data-icon="gridicons:multiple-users"></span>Terms of Service</a></li>
                        </ul>
                            
                    @else

                        <ul>
                            <li><a href="{{ route('account') }}" class="{{ (request()->is('account/passengers')) ? 'picked' : '' }}"><span class="iconify-inline {{ (request()->is('account/passengers')) ? 'picked-icon' : '' }}" data-icon="gridicons:multiple-users"></span>Passengers</a></li>
                            <li><a href="{{ route('settings') }}" class="{{ (request()->is('account/settings')) ? 'picked' : '' }}"><span class="iconify-inline {{ (request()->is('account/settings')) ? 'picked-icon' : '' }}" data-icon="ci:settings-filled"></span>Settings</a></li>
                        </ul>
                            
                        
                    @endif

                </div>
    
                    
            @yield('details')
    
            </div>
    
        
        </section>
    </main>

</body>
</html>
