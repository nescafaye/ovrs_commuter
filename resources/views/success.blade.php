<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="icon" type="image/x-icon" href="{{ asset('assets/fanicon.png') }}">
    <title>Payment successful!</title>

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
	'resources/sass/success.scss',
	'resources/js/app.js', 
	'resources/js/main.js', 
	'resources/js/login.js'])

</head>
<body>

	<div class="success">

		<div class="success-container">

			<div class="success-head">
				<span class="iconify-inline" data-icon="ep:success-filled" data-width="120" data-height="120"></span>
				<div class="success-message">You have successfully made a transaction!</div>
			</div>
	
			<div class="success-id">
				<div class="success-text">Here's your transaction number:</div>
				<div class="transaction-no">#{{ $transactionNo }}</div>
			</div>
	
			<div class="success-button">
				<a href="#" class="button another">View details</a>
				<a href="{{ route('transactions') }}" class="button proceed">Proceed to transactions</a>
			</div>

		</div>

	</div>


    
</body>
</html>
