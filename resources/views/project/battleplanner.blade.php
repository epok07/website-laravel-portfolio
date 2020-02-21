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
                <dd>Battleplanner(.io)</dd>
                <dl class="dl-horizontal">
                    <dt>Public repository</dt>
                    <dd>
                            <a href="https://github.com/Erik-A-Smith/website-laravel-battleplanner">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                    </dd>
                    
                    <dt>Application location</dt>
                    <dd><a href="https://www.battleplanner.io">https://www.battleplanner.io</a></dd>

                    <dt>Technologies</dt>
                    <dd>
                        <ul>
                            <li><a href="https://www.laravel.com">Laravel</a></li>
                            <li><a href="https://www.mysql.com/">Mysql</a></li>
                            <li><a href="https://redis.io/">Redis</a></li>
                            <li><a href="https://nodejs.org/en/">Node</a></li>
                            <li><a href="https://aws.amazon.com/ec2/">AWS EC2</a></li>
                        </ul>
                    </dd>

                </dl>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container" id="goal">
                <h1>Goal</h1>
                    <dd>
                        This project was created with the intent to deliver the <i>Rainbow6: Siege</i> community a free application to create coordinated plans for their team(s).
                        The projet has currently over 25k users and over 100k battleplans and counting! Other alternatives are available in the market, however this application
                        differentiates itself from the rest by having a lobby system where multiple users can edit the same plan simultaneously and changes are reflected in real time to all 
                        users in the lobby. Saving, sharing and copying existing plans is also supported within the system provided the plans are made public by the author. 
                    </dd>

                </dl>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container" id="how-to-use">
                <h1>How to use</h1>
                    <dt>Uses</dt>
                    <dd>
                        There are 2 major functionalities to the battleplanner: viewing public plans and create a plan.
                    </dd>

                    <dt>Public plans</dt>
                    <dd>
                        Viewing public plans is available to anyone regardless of their authenticated status (logged in / guest). Simply navigate to the <strong>public plans</strong> tab
                        which will load all the plans that are publicly available in a table. Clicking on plan will load the detailed view revealing the map and more information about the tactic. If the user is logged
                        into their accound, they will have the option to up/down vote the plan and made a copy for themselves.
                    </dd>

                    <dt>Creating a plan</dt>
                    <dd>
                        To create a plan, a user must be logged into their account. To begin, create or join a room by selecting the <strong>room</strong>. Once inside, you can use
                        the provided tools to draw, erase and drag icons onto the plan.
                    </dd>

                </dl>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container" id="how-to-use">
                <h1>Gallery</h1>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/media/battleplanner.png" alt="battleplanner">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/battleplanner-1.png" alt="battleplanner-1">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/battleplanner-2.png" alt="battleplanner-2">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/battleplanner-3.png" alt="battleplanner-3">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="/media/battleplanner-4.png" alt="battleplanner-4">
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