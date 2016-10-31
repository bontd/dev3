@extends('templates.teamplate')
@section('title')
Admin - add new
@endsection
@section('content')
<div id="main-content">
<div id="view">
<h4><a href="{{url('./admin-news')}}">Back</a><p>View Articles</p></h4>
<table cellspacing="0" width="100%">
    <tr>
        <td style="width:200px;">ID:</td>
        <td>{{$view[0]->id}}</td>
    </tr>
    <tr>
        <td>Title:</td>
        <td>{{$view[0]->title}}</td>
    </tr>
    <tr>
        <td>Description:</td>
        <td>{{substr($view[0]->description,0,30)}}</td>
    </tr>
    <tr>
        <td>Image:</td>
        <td><img src="{{url('/public/image/'.$view[0]->image)}}" width="100" height="100" /></td>
    </tr>
    <tr>
        <td>Content:</td>
        <td>{{strip_tags(substr($view[0]->content,0, 200))}}</td>
    </tr>
    <tr>
        <td>Author:</td>
        <td>{{$view[0]->author}}</td>
    </tr>
    <tr>
        <td>Created:</td>
        <td>{{$view[0]->created}}</td>
    </tr>
    <tr>
        <td>Modified:</td>
        <td>{{$view[0]->modified}}</td>
    </tr>
</table>
</div>
</div>
@stop