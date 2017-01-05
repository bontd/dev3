@extends('templates.master')
@section('title')
The thao 24h
@endsection
@section('content')
	<div id="types">
		<h4>{{$category->name}}</h4>
		<div id="new-box-type">
			<ul>
				@foreach($main as $category)
				<li>
				    <figure>
				      <a href="{{url('./news/detail/'.Crypt::encrypt($category->id))}}"><img src="{{url('./public/dom/image/'.$category->image)}}"/></a>
				    </figure>
				    <p><span>{!!$category->created!!}</span></p>
				    <p><a href="{{url('./news/detail/'.Crypt::encrypt($category->id))}}">{!!$category->title!!}</a></p>
				    <p>{!!$category->description!!}</p>
				</li>
				@endforeach
			</ul>
		</div>
		{!! $main->render() !!}
    </div>

@stop