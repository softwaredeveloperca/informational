<html>
        <head>
                <title>@yield('Name')</title>

	<link rel="stylesheet" href="/css/app.css"> 
	<script src="/js/jquery.min.js"></script> 
	 <script src="/js/bootstrap.min.js"></script>
	<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Roboto:400);
body {
  background-color:#e0e0e0;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}
.navbar-default {background-color:#f4f4f4;margin-top:0px;border-width:0;z-index:5;}
.navbar-default .navbar-nav > .active > a,.navbar-default .navbar-nav > li:hover > a {border:0 solid #4285f4;border-bottom-width:2px;font-weight:800;background-color:transparent;}
.navbar-default .dropdown-menu {background-color:#ffffff;}
.navbar-default .dropdown-menu li > a {padding-left:30px;}

.header {background-color:#f4f4f4;border-width:0;}
.header .navbar-collapse {background-color:#ffffff;}
.btn,.form-control,.panel,.list-group,.well {border-radius:1px;box-shadow:0 0 0;}
.form-control {border-color:#d7d7d7;}
.btn-primary {border-color:transparent;}
.btn-primary,.label-primary,.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {background-color:#4285f4;}
.btn-plus {background-color:#ffffff;border-width:1px;border-color:#dddddd;box-shadow:1px 1px 0 #999999;border-radius:3px;color:#666666;text-shadow:0 0 1px #bbbbbb;}
.well,.panel {border-color:#d2d2d2;box-shadow:0 1px 0 #cfcfcf;border-radius:3px;}
.btn-success,.label-success,.progress-bar-success{background-color:#65b045;}
.btn-info,.label-info,.progress-bar-info{background-color:#a0c3ff;border-color:#a0c3ff;}
.btn-danger,.label-danger,.progress-bar-danger{background-color:#dd4b39;}
.btn-warning,.label-warning,.progress-bar-warning{background-color:#f4b400;color:#444444;}

hr {border-color:#ececec;}
button {
 outline: 0;
}
textarea {
 resize: none;
 outline: 0; 
}
.panel .btn i,.btn span{
 color:#666666;
}
.panel .panel-heading {
 background-color:#ffffff;
 font-weight:700;
 font-size:16px;
 color:#262626;
 border-color:#ffffff;
}
.panel .panel-heading a {
 font-weight:400;
 font-size:11px;
}
.panel .panel-default {
 border-color:#cccccc;
}
.panel .panel-thumbnail {
 padding:0;
}
.panel .img-circle {
 width:50px;
 height:50px;
}
.list-group-item:first-child,.list-group-item:last-child {
 border-radius:0;
}
h3,h4,h5 { 
 border:0 solid #efefef; 
 border-bottom-width:1px;
 padding-bottom:10px;
}
.modal-dialog {
 width: 450px;
}
.modal-footer {
 border-width:0;
}
.dropdown-menu {
 background-color:#f4f4f4;
 border-color:#f0f0f0;
 border-radius:0;
 margin-top:-1px;
}

.informationalfooter {
 float: none; 
 display: inline-block; 
 vertical-align: top;
}
/* end theme */

/* template layout*/
#subnav {
 position:fixed;
 width:100%;
}

@media (max-width: 768px) {
 #subnav {
  padding-top: 6px;
 }
}

#main {
 padding-top:140px;
}
</style>
	</head>
	<body>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">
         <img src="http://www.homemedicine.ca/images/header.gif"> 
          
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav">
	    @foreach ($Links as $link)
		<li>
                <a href="/{{$link['HomePage']}}">{{$link['Label']}}</a>
            </li>
	    @endforeach
	<li>
	
	 <div class="input-group nav-right" style="width: 150px">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
	</li>
	 </ul>
        </div>	
     
</div>	
</div>
        <div class="panel panel-default main">
		<br><br>
            @yield('content')
        </div>
	<footer class="footer">
<div class="collapse navbar-collapse text-center" id="navbar-collapse2">
	<ul class="nav navbar-nav text-center informationalfooter"><li>
	<a href="/">Home</a></li><li><a href="/Privacy.html">Privacy</a></li><li><a href="/Login">Login</a></li><li><a href="/Register">Register</a></li><li><a href="/MyAccount">My Account</a></li></ul> 
     </div>
	<div class="text-center"><a href="http://www.informational.ca"><img src="http://www.informational.ca/images/share/small_informational.jpg" border="0"> Informational.ca</a><br><br></div>
    </footer>
    </body>
</html>
