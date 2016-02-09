@extends('app')

@section('Name', $Name)

@section('PageName', $PageName)

@section('content')
		<div class="container-fluid">
		   <div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><h1 class="panel-title">{{ ucfirst(trans($Data->PageData->Title)) }}</h1></div>
					<div class="panel-body">
					{!! nl2br(e($Data->PageData->Content)) !!}
					<br><br>
					<div class="btn-group" role="group">
    						<button type="button" class="btn btn-default">Previous</button>
  					</div>
					<div class="btn-group" role="group">
    						<button type="button" class="btn btn-default">Next</button>
  					</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
                                <div class="panel panel-default">
					<div class="panel-heading"><h1 class="panel-title">More </h1></div>
                                        <div class="panel-body">
                                @foreach ($Data->sidedata as $Content)
                                <a href="/{{$Data->BaseDirectory}}/{{$Content->PageName}}.html">{{$Content->Title}}</a><br>
                                @endforeach
                                        </div>
                               </div>
                        </div>


		   </div>
		</div>
@endsection
