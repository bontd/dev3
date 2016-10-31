@extends('templates.teamplate')
@section('title')
Admin - add new
@endsection
@section('content')
<div id="main-content">
<div id="view">
<h4><a href="{{url('./articles')}}">Back</a><p>View Articles</p></h4>
<table cellspacing="0" width="100%">
    <tr>
        <td style="width:200px;">Id:</td>
        <td>{{$views->id}}</td>
    </tr>
    <tr>
        <td>Name:</td>
        <td>{{$views->title}}</td>
    </tr>
    <tr>
        <td>Author:</td>
        <td>{{$views->author}}</td>
    </tr>
    <tr>
        <td>Image:</td>
        <td><img src="{{url('/public/image/'.$views->file)}}" width="100" /></td>
    </tr>
    <tr>
        <td>Content:</td>
        <td>{{strip_tags($views->content)}}</td>
    </tr>
    <tr>
        <td>users:/td>
        <td>{{$views->user_id}}</td>
    </tr>
    <tr>
        <td>created_at:</td>
        <td>{{$views->created_at}}</td>
    </tr>
    <tr>
        <td>updated_at:</td>
        <td>{{$views->updated_at}}</td>
    </tr>
</table>
</div>
</div>
@stop