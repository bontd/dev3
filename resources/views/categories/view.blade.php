@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')
<div id="main-content">
<div id="view">
	<h4>
		<a href="{{url('./categories')}}">Back</a><p>View Categories</p>
	</h4>
	<table cellspacing="0" width="100%">
        <tr>
            <td style="width:200px;">ID</td>
            <td>{{$category->id}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{$category->name}}</td>
        </tr>
        <tr>
            <td>Created</td>
            <td>{{$category->created}}</td>
        </tr>
        <tr>
            <td>Modified</td>
            <td>{{$category->modified}}</td>
        </tr>
    </table>
</div>
</div>
@stop