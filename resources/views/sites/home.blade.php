@extends('app')

@section('Name', $Name)

@section('content')
	<body>
		<div class="container-fluid">
			<div class="row">
			<div class="col-md-12 content">
				<div class="panel panel-default">
				<div class="panel-body" align="center">
				<h1 align="center">{{ ucfirst(trans($Name)) }}</h1>

				Welcome to {{$Name}}<br>
				Home Medical Articles, Mother's Remedies and Household Tips. Home medicine is a free online resource offering tried and helpful medicial remedies that have been practised over the ages. Learn more about how your mind and body function and become your own doctor.

Welcome to Home Medicine. The free online resource offering tried and helpful medicial remedies that have been practised over the ages. Learn more about how your mind and body function and become your own doctor. 
				</div>
			</div></div>
			<div class="row">
			@foreach ($Dbs as $Db)
			<div class="col-md-4 col-sm-6 content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">{{$Db->Label}}</h1>
					</div>
					<div class="panel-body">
						@foreach ($Db->data as $Content)	
							<a href="{{$Db->BaseDirectory}}/{{$Content->PageName}}.html">{{$Content->Title}}</a><br>
						@endforeach
						<br>
						<a class="btn btn-default" href="{{$Db->HomePage}}">View More {{$Db->Label}}</a><br><br>
					</div>
				</div>
			</div>
			@endforeach
			</div>
		</div>
@endsection
