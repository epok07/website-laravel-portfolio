@extends('layouts.main')

@section('content')
	<h1 class="text-center mt-2">List of Apps</h1>

	{{-- Generate file --}}
	<div class="card">
		<div class="card-header">
		Summary Generator
		</div>
		<div class="card-body">
			<h5 class="card-title">Summary Generator</h5>
			<p class="card-text">generates a summary given an source material</p>
			<a href="/app/summarizer" class="btn btn-primary">Go To</a>
		</div>
	</div>
@endsection
