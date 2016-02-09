@extends('app')

@section('Name', $Name)

@section('content')
		<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading"><h2 class="panel-title">{{ ucfirst(trans($Dbs->Name)) }}</h2></div>
				<div class="panel-body">
					@foreach ($Dbs->data as $Content)
					<a href="/{{$Dbs->BaseDirectory}}/{{$Content->PageName}}.html">{{$Content->Title}}</a><br>
					@endforeach 
					
				 {!! $Dbs->data->render() !!}
					</div>
				</div>
		
			<? //include("/var/www/html/informational/InformationalAd.php");  ?>

		</div>
@endsection
