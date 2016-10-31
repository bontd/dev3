@extends('templates.teamplate')
@section('title')
Admin - add new
@endsection
@section('content')
<div id="main-content-add">
<h4> ADD News Articles</h4>
<form  method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<table>
	<tr>
		<td><label>Name: </label></td>
		<td><input type="text" name="name" required maxlength="50" minlength="3"></td>
	</tr>
	<tr>
		<td><label>Author: </label></td>
		<td><input type="text" name="author" required></td>
	</tr>
	<tr>
		<td><label>file: </label></td>
		<td><input type="file" name="myFile"></td>
	</tr>
	<tr>
		<td>Content: </td>
		<td><textarea name="content" id="article-content"></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit">Save</button></td>
	</tr>
</table>
</form>
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