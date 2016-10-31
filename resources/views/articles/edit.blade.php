@extends('templates.teamplate')
@section('title')
Admin - add new
@endsection
@section('content')
<div id="main-content-add">
<h4>Edit Articles</h4>
@foreach($edit as $edits)
<form  method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<table>
	<input type="hidden" value="{{$edits->id}}" name="id">
	<tr>
		<td><label>Name: </label></td>
		<td><input type="text" name="name" value="{{$edits->title}}" required></td>
	</tr>
	<tr>
		<td><label>Author: </label></td>
		<td><input type="text" name="author" onclick="this.value=''" onblur="if(this.value=='') this.value='{{$edits->author}}'" value="{{$edits->author}}" required></td>
	</tr>
	<tr>
		<td><label>file: </label></td>
		<td><input type="file" name="myFile" value="{{$edits->file}}" ><img src="{{url('public/image/'.$edits->file)}}" width="100" /></td>
	</tr>
	<tr>
		<td>Content: </td>
		<td><textarea name="content" id="article-content" >{{$edits->content}}</textarea></td>
	</tr>
	<tr>
		<td><label>Update-at: </label></td>
		<td><input type="datetime-local" name="modified"></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit">Save</button></td>
	</tr>
</table>
</form>
@endforeach
@if (count($errors) > 0)
    <div class="alert alert-danger login-error" >
        <ul>
            @foreach ($errors->all() as $error)
                <li style="list-style:none;color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@stop