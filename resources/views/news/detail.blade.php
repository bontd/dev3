@extends('templates.master')
@section('title')
The thao 24h
@endsection
@section('content')
	<div class="detail">
		<div class="title">
			<h4><a href="">{!!$views->title!!}</a></h4>
			<i>{!!$views->created!!}</i> <i class="fa fa-eye"> {!!$views->viewed!!}</i><br/>
			<div id="desc"> 
			{!!$views->description!!}
			</div>
		</div>
		<div class="nd"> 
			{!!$views->content!!}
		</div>
		<div class="fb-comments" data-href="{{url('./news/detail/'.$views->id)}}" data-width="730px" data-numposts="5"></div>
	</div>
@stop