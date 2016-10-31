@extends('templates.master')
@section('title')
The thao 24h
@endsection
@section('detail')
	<div class="detail">
			<h4><a href="">{!!$views[0]->title!!}</a></h4>
			<i>{!!$views[0]->created!!}</i> <i class="fa fa-eye"> {!!$views[0]->viewed!!}</i><br/>
			{!!$views[0]->content!!}
			<div class="fb-comments" data-href="{{url('./news/detail/'.$views[0]->id)}}" data-width="730px" data-numposts="5"></div>
	</div>
@stop