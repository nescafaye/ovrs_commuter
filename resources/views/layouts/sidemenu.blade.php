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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="cropperjs/cropper.min.css" rel="stylesheet" type="text/css"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/sass/dashboard.scss', 'resources/js/app.js', 'resources/js/main.js'])

</head>
<body onload="document.body.style.visibility=`visible`;">
    
    <script>document.body.style.visibility=`hidden`;</script>

    <main class="l-main">
        <section class="passengers section bd-container" id="settings">
            
            <div class="passenger-nav-container">
    
                <div class="sidebar_nav">

                    @if(Route::is('terms', 'privacy'))

                        <ul class="policy-class">
                            <li><a href="{{ route('home') }}" ><iconify-icon inline icon="cil:arrow-left" class="iconify-inline icon" width="20" height="20"></iconify-icon>Back</a></li>
                            <li><a href="{{ route('privacy') }}" class="{{ (request()->is('privacy-policy')) ? 'picked' : '' }}"><iconify-icon inline icon="ic:round-privacy-tip" class="iconify-inline {{ (request()->is('privacy-policy')) ? 'picked-icon' : '' }}" width="20" height="20"></iconify-icon>Privacy Policy</a></li>
                            <li><a href="{{ route('terms') }}" class="{{ (request()->is('terms-of-service')) ? 'picked' : '' }}"><iconify-icon inline icon="fluent:document-16-filled" class="iconify-inline {{ (request()->is('terms-of-service')) ? 'picked-icon' : '' }}" width="20" height="20"></iconify-icon>Terms of Service</a></li>
                        </ul>
                            
                    @else

                        <ul>
                            <li><a href="{{ route('profile') }}" class="{{ (request()->is('profile')) ? 'picked' : '' }}"><iconify-icon inline icon="gridicons:multiple-users" class="iconify-inline {{ (request()->is('profile')) ? 'picked-icon' : '' }}" width="20" height="20"></iconify-icon>Profile</a></li>
                            <li><a href="{{ route('settings') }}" class="{{ (request()->is('settings')) ? 'picked' : '' }}"><iconify-icon inline icon="ci:settings-filled" class="iconify-inline {{ (request()->is('settings')) ? 'picked-icon' : '' }}"></iconify-icon>Settings</a></li>
                        </ul>
                            
                        
                    @endif

                </div>
    
                    
            @yield('details')
    
            </div>
    
        
        </section>
    </main>

</body>
</html>
