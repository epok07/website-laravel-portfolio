@extends('layouts.main_blank')

@push('js')
	<script type="text/javascript" src="{{asset("/js/projects/battleplanner.js")}}"></script>
@endpush

@push('css')
	<link rel="stylesheet" href="{{asset("/css/projects/battleplanner.css")}}">
@endpush

@section('content')
           <!-- Navigation -->
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/#projects">Back to CV</a>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container content">

    <div class="row">

      <div class="col-lg-3 quick-jump">

        <!-- <h1 class="my-4">Shop Name</h1> -->
        <div class="list-group sticky-top">
          <a class="list-group-item js-scroll-trigger" href="#the-project">The Project</a>
          <a class="list-group-item js-scroll-trigger" href="#goal">Goal</a>
          <a class="list-group-item js-scroll-trigger" href="#how-to-use">How to use</a>
          <a class="list-group-item js-scroll-trigger" href="#gallery">Gallery</a>
          <a class="list-group-item js-scroll-trigger" href="#video">Video</a>
        </div>

        <hr>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

      <div class="jumbotron jumbotron-fluid">
            <div class="container" id="the-project">
                <h1>The Project</h1>
                <hr>
                <dt>Project Name</dt>
                <dd>The Painted Towers</dd>
                <dl class="dl-horizontal">
                    <dt>Private repository (Requires Request)</dt>
                    <dd>
                            <a href="https://github.com/Erik-A-Smith/unity-3d-comp-376-tower-defense">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                    </dd>
                    
                    <dt>Technologies</dt>
                    <dd>
                        <ul>
                            <li><a href="https://unity.com/">Unity</a></li>
                        </ul>
                    </dd>

                </dl>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container" id="goal">
                <h1>Goal</h1>
                    <dd>
                        This was a project for COMP 376. We proposed and built from the ground up a turn based tower defence game where you need to build and upgrade
                        towers in order to stop waves of minions from swarming and killing your nexus (base). All game code and mecanics were implemented by us, however the
                        assets used were bought from the unity store.    
                    </dd>

                </dl>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container" id="gallery">
                <h1>Gallery</h1>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/media/tower-defence.png" alt="tower-defence">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/tower-defence-1.png" alt="tower-defence-1">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/tower-defence-2.png" alt="tower-defence-2">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/tower-defence-3.png" alt="tower-defence-3">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/tower-defence-4.png" alt="tower-defence-4">
                        </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="jumbotron jumbotron-fluid">
            <div class="container" id="video">
                <h1>Video</h1>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="/media/tower-defence.mp4" allowfullscreen></iframe>
                </div>
            </div>
        </div>


        

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


@endsection