@extends('layouts.main')

@section('content')
	<h1 class="text-center mt-2">List of Apps</h1>

	{{-- Generate file --}}
	<div class="card">
		<div class="card-header">
		Thesis Generator
		</div>
		<div class="card-body">
			<h5 class="card-title">Thesis Generator</h5>
			<p class="card-text">generates a thesis paper given an innitial thesis and source material</p>
			<a href="app/thesis" class="btn btn-primary">Go To</a>
		</div>
	</div>
@endsection
