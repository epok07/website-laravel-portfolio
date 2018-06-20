@extends('layouts.main_blank')
@push('js')
	<script type="text/javascript" src="{{asset("/js/cv/resume.js")}}"></script>
@endpush

@push('css')
	<link rel="stylesheet" href="{{asset("/css/cv/resume.css")}}">
@endpush

@section('content')
	{{-- <div class="container-fluid"> --}}
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
	      <a class="navbar-brand js-scroll-trigger" href="#page-top"><a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav">
	          <li class="nav-item">
	            <a class="nav-link js-scroll-trigger" href="#about">About</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll-trigger" href="#education">Education</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
	          </li>
			  <li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#recommendations">Recommendations</a>
			  </li>
	        </ul>
	      </div>
	    </nav>

	    {{-- <div class="container-fluid p-0"> --}}

			@include('cv.about')
			@include('cv.experience')
			@include('cv.education')
			@include('cv.skills')
			@include('cv.interests')
			@include('cv.recommendations')

	    {{-- </div> --}}
	{{-- </div> --}}

@endsection
