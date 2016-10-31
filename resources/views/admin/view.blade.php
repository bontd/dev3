@extends('templates.teamplate')
@section('title')
Admin - View Users
@endsection
@section('content')
<div id="main-content">
<div id="view">
<h4><a href="{{url('./admin')}}">Back</a> <p>View Users</p></h4>
<table cellspacing="0" width="100%">
    <tr>
        <td style="width:200px;">ID:</td>
        <td>{{$views->id}}</td>
    </tr>
    <tr>
        <td>Name:</td>
        <td>{{$views->name}}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{$views->email}}</td>
    </tr>
    <tr>
        <td>Password:</td>
        <td>{{$views->password}}</td>
    </tr>
    <tr>    
        <td>status:</td>
        <td>
            @if($views->status == 1)
                <a href="javascript:void(0);"  data={{$views->status}}>
                    <p id="test-{{$views->id}}" onclick="update_status({{$views->id}});"  style="width:20px;height:20px;" class="fa fa-check"></p>
                </a>
            @else
                <a href="javascript:void(0);"  data={{$views->status}}>
                    <p id="test-{{$views->id}}" onclick="update_status({{$views->id}},{{$views->status}});" style="width:20px;height:20px;" class="fa fa-lock"></p>
                </a>
            @endif
        </td>
    </tr>
    <tr>
        <td>Types:</td>
        <td>{{$views->type}}</td>
    </tr>
</table>
</div>
</div>
@stop