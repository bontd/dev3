@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')
<div id="main-content">
	<div id="view">
    <h4>
        <a href="{{url('./types')}}">Back</a><p>View Type</p>
    </h4>
    <table cellspacing="0" width="100%">
        <tr>
            <td style="width:200px;">ID</td>
            <td>{{$type->id}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{$type->names}}</td>
        </tr>
        <tr>
            <td>Created</td>
            <td>{{$type->created}}</td>
        </tr>
        <tr>
            <td>Modified</td>
            <td>{{$type->Modified}}</td>
        </tr>
    </table>
</div>
</div>
@stop