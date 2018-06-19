
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <!-- CSRF Token -->
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	  {{-- <link rel="icon" href="../../../../favicon.ico"> --}}

	  <title>{{ config('app.name', 'Erik Smith') }}</title>

		{{-- JS --}}
		@include('layouts.css')
	</head>
	<body>

		@yield('content')

		{{-- JS --}}
		@include('layouts.js')

	</body>
</html>
