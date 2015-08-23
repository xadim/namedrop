<!DOCTYPE html>
<html lang="en">
  <head>

    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="description" content="Namedrop - Recommandation system">
    <meta name="keywords" content="The Easiest Way for Your Clients to Recommend Your Business - Plumbers - Remodelers - Handymen - Doctors - Dentists - More! Deals - Local Ratings - Reviews">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google-site-verification" content="" />

    <!-- =========================
          FAV AND TOUCH ICONS
    ============================== -->
    <link rel="icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Facebook integration for Laravel">
    <meta name="author" content="Khadime Diakhate @xadim">

    <title>Namedrop, The Easiest Way for Your Clients to Recommend Your Business</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/nivo-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/nivo_default.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/elegant-icons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/colors/blue.css') }}" rel="stylesheet">



    <style type="text/css">
      body {
        padding: 90px;
      }
      .navbar {
        margin-bottom: 140px !important;
      }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->
  </head>

  <body>

<!-- COLOR OVER IMAGE -->
 <!-- To make header full screen. Use .full-screen class with color overlay. Example: <div class="color-overlay full-screen">  -->

  <!-- STICKY NAVIGATION -->
  <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation" style="top: 0px;">
    <div class="container">
      <div class="navbar-header">

        <!-- LOGO ON STICKY NAV BAR -->
        <button data-target="#kane-navigation" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

        <a href="{{url('/')}}" class="navbar-brand"><img alt="" src="{{ asset('/img/logo.png') }}"></a>

      </div>

      <!-- NAVIGATION LINKS -->
      <div id="kane-navigation" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right main-navigation">
          <li></li>
          <li><a href="#download">Download</a></li>
          @if(Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img class="profil-image" src="{!! Auth::user()->photo !!}" alt="{!! Auth::user()->name !!}"></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                <li><a href="{{url('profile')}}">Profile</a></li>
              </ul>
            </li>
          @endif
        </ul>

      </div>
    </div> <!-- /END CONTAINER -->
  </div> <!-- /END STICKY NAVIGATION -->

  <!-- CONTAINER -->
  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->

      @yield('content')

    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>

  </body>
</html>
