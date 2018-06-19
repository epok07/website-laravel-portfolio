@extends('layouts.main')

@section('content')

	@include('landing.banner')

	<div class="container marketing">
		@include('landing.bio')
		<hr>
		@include('landing.dots')
		{{-- @include('landing.blocks') --}}
	</div>
@endsection
