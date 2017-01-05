@extends('templates.master')
@section('title')
The thao 24h
@endsection
@section('content')
<div class="col-sm-7">
	@if(!empty($shift))
	<figure id="img-new">
		<a href="{{url('/news/detail/'.Crypt::encrypt($shift->id))}}"><img src="{{url('./public/dom/image/'.$shift->image)}}" ></a>
	</figure>

	<h4><a href="{{url('/news/detail/'.Crypt::encrypt($shift->id))}}">{{strip_tags($shift->title)}}</a></h4>
	<p>{{strip_tags($shift->description)}}</p>
	@endif
</div>
<div class="col-sm-5">
	Tin mới nhất »
	@foreach($news as $new)
	<div class="new-box">
	  <figure>
	    <a href="{{url('news/detail/'.Crypt::encrypt($new->id))}}"><img src="{{url('./public/dom/image/'.$new->image)}}"/></a>
	  </figure>
	  <p><span>{{$new->created}}</span></p>
	  <p><a href="{{url('news/detail/'.Crypt::encrypt($new->id))}}">{{$new->title}}</a></p>
	</div>
	@endforeach
</div>
<div class="col-md-7">
	<div class="lx">
		<h4>Tin Chính Khác</h4>
		@foreach($other as $value)
		<div class="new-box">
			<figure>
			  <a href="{{url('news/detail/'.Crypt::encrypt($value->id))}}"><img src="{{url('./public/dom/image/'.$value->image)}}"/></a>
			</figure>
			<p><span>{{$value->created}}</span></p>
			<p><a href="{{url('news/detail/'.Crypt::encrypt($value->id))}}">{{$value->title}}</a></p>
		</div>
		@endforeach
	</div>
</div>
<div class="col-md-5">
	<h4>Photo new</h4>
    <div class="cx">
    @foreach($photo as $photos)
      <div class="new-box">
        <figure>
          <a href="{{url('news/detail/'.Crypt::encrypt($photos->id))}}"><img src="{{url('./public/dom/image/'.$photos->image)}}"/></a>
        </figure>
        <p><span>{{$photos->created}}</span></p>
        <p><a href="{{url('news/detail/'.Crypt::encrypt($photos->id))}}">{{$photos->title}}</a></p>
      </div>
      @endforeach
    </div>
</div>
<div class="col-md-5">
<h4>Videos new</h4>
    <div class="cx">
    @foreach($video as $videos)
		<div class="new-box">
			<figure>
			  <a href="{{url('news/detail/'.Crypt::encrypt($videos->id))}}"><img src="{{url('./public/dom/image/'.$videos->image)}}"/></a>
			</figure>
			<p><span>{{$videos->created}}</span></p>
			<p><a href="{{url('news/detail/'.Crypt::encrypt($videos->id))}}">{{$videos->title}}</a></p>
		</div>
	@endforeach
    </div>
</div>
<div class="col-md-12">
	<div class="tqt">
		<div class="mnu">
			<h4>C1</h4>
			<div class="new-box-tqt">
			  <figure>
			    <a href="{{url('news/detail/'.Crypt::encrypt($fooballs->id))}}"><img src="{{url('./public/dom/image/'.$fooballs->image)}}"/></a>
			  </figure>
			  <a href="{{url('news/detail/'.Crypt::encrypt($fooballs->id))}}">{{$fooballs->title}}</a>
			  <p>{{$fooballs->description}}</p>
			</div>
			<div class="box-border">
				@foreach($fooball as $value)
				<div class="new-box-tqt-dt">
					<div class="new-box-dt">
						<figure>
						<a href="{{url('news/detail/'.Crypt::encrypt($value->id))}}"><img src="{{url('./public/dom/image/'.$value->image)}}"/></a>
						</figure>
						<a href="{{url('news/detail/'.Crypt::encrypt($value->id))}}">{{$value->title}}</a>
						<p>{{substr($value->description,0,250)}}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="tqt">
		<div class="mnu">
			<h4>Môn Khác</h4>
			<div class="new-box-tqt">
			  <figure>
			    <a href="{{url('news/detail/'.Crypt::encrypt($fooballs->id))}}"><img src="{{url('./public/dom/image/'.$f1_other->image)}}"/></a>
			  </figure>
			  <a href="{{url('news/detail/'.Crypt::encrypt($fooballs->id))}}">{{$f1_other->title}}</a>
			  <p>{{$f1_other->description}}</p>
			</div>
			<div class="box-border">
				@foreach($F1 as $value)
				<div class="new-box-tqt-dt">
					<div class="new-box-dt">
						<figure>
						<a href="{{url('news/detail/'.Crypt::encrypt($value->id))}}"><img src="{{url('./public/dom/image/'.$value->image)}}"/></a>
						</figure>
						<a href="{{url('news/detail/'.Crypt::encrypt($value->id))}}">{{$value->title}}</a>
						<p>{{substr($value->description,0,250)}}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop
