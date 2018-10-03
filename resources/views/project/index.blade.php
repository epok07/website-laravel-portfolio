@extends('layouts.main')

@section('content')
	<h1 class="text-center mt-2">List of Projects</h1>

	{{-- Generate file --}}
	<div class="card">
		<div class="card-header">
		Summary Generator (Deprecated)
		</div>
		<div class="card-body">
			<h5 class="card-title">Summary Generator</h5>
			<p class="card-text">generates a summary given an source material</p>
			<a href="/project/summarizer" class="btn btn-primary">Go To</a>
		</div>
	</div>

	{{-- TacSource --}}
	<div class="card">
		<div class="card-header">
		TacSource Project
		</div>
		<div class="card-body">
			<h5 class="card-title">Tacsource Website</h5>
			<p class="card-text">TacSource is an online military simulation group who contacted me for a website.
			It is an event planning site with rewards for participating and organizing said activitied.</p>
			<a href="http://54.202.242.214/" class="btn btn-primary">Go To</a>
		</div>
	</div>

	{{-- Tavernside --}}
	<div class="card">
		<div class="card-header">
		Tavernside Podcast
		</div>
		<div class="card-body">
			<h5 class="card-title">Tavernside Website</h5>
			<p class="card-text">Tavernside is a small Podcast that I run with some friends. I also built the website.</p>
			<a href="http://tavernsidepodcast.com" class="btn btn-primary">Go To</a>
		</div>
	</div>

	{{-- Rainbow 6 siege --}}
	<div class="card">
		<div class="card-header">
		R6 maps Project
		</div>
		<div class="card-body">
			<h5 class="card-title">R6 maps Website</h5>
			<p class="card-text">R6 maps is a website used the the rainbow 6 siege community to plan tactics for gameplay on all levels.
			A challenge when building this website was making it so that the map will automatically update for all users connected to the session.</p>
			<a href="http://r6.eriksmith.io" class="btn btn-primary">Go To</a>
		</div>
	</div>
@endsection
