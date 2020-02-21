@extends('layouts.main_blank')

@push('js')
	<script type="text/javascript" src="{{asset("/js/projects/cloth-fire-simulation.js")}}"></script>
@endpush

@push('css')
	<link rel="stylesheet" href="{{asset("/css/projects/cloth-fire-simulation.css")}}">
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
          <a class="list-group-item js-scroll-trigger" href="#gallery">Gallery</a>
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
                <dd>Cloth Fire Simulation</dd>
                <dl class="dl-horizontal">
                    <dt>Private repository (Requires Request) </dt>
                    <dd>
                            <a href="https://github.com/Erik-A-Smith/opengl-comp-477-cloth-fire-simulation">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                    </dd>

                    <dt>Technologies</dt>
                    <dd>
                        <ul>
                            <li><a href="https://www.opengl.org/">OpenGl</a></li>
                            
                        </ul>
                    </dd>

                </dl>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container" id="goal">
                <h1>Goal</h1>
                    <dd>
                        This simulation was the final project for COMP 477. It simulates fire spreading across a fire grid. The fire spreads from ignition points (the balls between links).
                        As the cloth burns, parts of the cloth degrade and start to fall off the main structure. The blue cube can be controlled and as it passes through the fire, it itself wall combust.
                        Main objectives of this project were to create from scratch: Particles & particle systems, cloth, fire spreading logic.
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
                            <img class="d-block w-100" src="/media/cloth-fire-simulation.png" alt="cloth-fire-simulation">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/cloth-fire-simulation-1.png" alt="cloth-fire-simulation-1">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/cloth-fire-simulation-2.png" alt="cloth-fire-simulation-2">
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

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


@endsection