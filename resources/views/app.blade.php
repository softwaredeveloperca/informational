<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ isset($PageName) ? $PageName :  'Informational.ca'}}</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<? /*
	<style>
	.navbar-default .navbar-text {
  color: #cac967;
}
.navbar-default .navbar-nav > li > a {
#  color: #FF0000;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
#  color: #00FF00;
  background-color: transparent;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #0000FF;
  background-color: #e7e7e7;
}
.navbar-default .navbar-nav > .disabled > a,
.navbar-default .navbar-nav > .disabled > a:hover,
.navbar-default .navbar-nav > .disabled > a:focus {
  color: #F0F0F0;
  background-color: transparent;
}


.navbar-default .navbar-toggle {
  border-color: #FF0000;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #FF0000;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #0000FF;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #00FF00;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  background-color: #FF0000;
  color: #FF0000;
}


	</style> */ ?>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<style>
.navbar-default {
  background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
  border-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.navbar-default .navbar-brand {
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
  color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
}
.navbar-default .navbar-text {
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-nav > li > a {
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
}
.navbar-default .navbar-nav > li > .dropdown-menu {
  background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
  color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
  background-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
  background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color: #ffbbbc;
  background-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
  background-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.navbar-default .navbar-toggle {
  border-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-link {
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}
.navbar-default .navbar-link:hover {
  color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
    background-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
  }
}


#footer {
	background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
}

#footer a:link {
    color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}

#footer a:visited {
    color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
}

#footer a:hover {
    color: #{{isset($ColorActive) ? $ColorActive : 'ffbbbc'}};
}

#footer a:active {
color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};

}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {

  background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
  border-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
 }

.btn
{
  background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
  border-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
  color: #{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};

}

.panel-default > .panel-heading {
    cursor: pointer;
	background-color: #{{isset($ColorBackground) ? $ColorBackground : '7d7753'}};
	color:#{{isset($ColorDefault) ? $ColorDefault : 'ecf0f1'}};
	padding-top: 15px;
	padding-bottom: 15px;
	border-radius: 4px 4px 0px 0px;
	border-bottom: 1px solid #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
}
.panel-heading.collapsed {
    background-color: #{{isset($ColorBackgroundActive) ? $ColorBackgroundActive : '3b3534'}};
} 

</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" background-image="http://www.freejokes.ca/images/freejokes3_02.gif">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	@if (isset($Name))
                <a class="navbar-brand" style="color: #{{isset($ColorDefault) ? $ColorDefault : "000"}};"  href="/">{{$Name}}</a>
        @else
               <a class="navbar-brand" style="color: #{{isset($ColorDefault) ? $ColorDefault : "000"}};"  href="http://www.informational.ca">
		<img class="img-circle" src="http://www.informational.ca/images/share/small_informational.jpg"></a>
        @endif


    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
	<li><a href="{{ url('/') }}">Home</a></li>
                                        @if(isset($Links))
                                          @foreach ($Links as $link)
                                        <li>
                                                <a id="appcss" href="/{{$link['HomePage']}}">{{$link['Label']}}</a>
                                        </li>
                                          @endforeach
                                        @endif

      </ul>
<form class="navbar-form navbar-left" role="search" method="post" action="/Search">
	   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </div>
          </div>
        </form>
      <ul class="nav navbar-nav navbar-right">

                                        @if (Auth::guest())
                                                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                                                <li><a href="{{ url('/auth/register') }}">Register</a></li>
                                        @else
                                                <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                                                        </ul>
                                                </li>
                                                <li class="dropdown">
                                                </li>
                                        @endif
                                </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--
<div class="container-fluid">
        <div class="jumbotron">
            <h1>Best Vacation Rentals</h1>
            <p>Sed placerat fringilla quam et.</p>
            <a class="btn btn-primary btn-lg">Start Now!</a>
        </div>
     	</div>-->

	@yield('content')

<div id="footer">
  <div class="container-fluid">
    <p class="text-muted"><a href="http://www.informational.ca"><img class="img-circle" src="http://www.informational.ca/images/share/small_informational.jpg" border="0"> Informational.ca</a> - <a href="/About.html">About</a> -  <a href="/Privacy.html">Privacy</a></p>
  </div>
</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
