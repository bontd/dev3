@extends('templates.teamplate')
@section('title')
Admin - add new
@endsection
@section('content')
<div id="main-content-add">
<h4>Edit Articles</h4>
<form  method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<table>
	<input type="hidden" value="{{$edits->id}}" name="id">
	<tr>
		<td style="width:50px;"><label>Name: </label></td>
		<td><input name="name" type="text" onclick="this.value=''" onblur="if(this.value=='') this.value='{{$edits->name}}'" value="{{$edits->name}}" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label>Email: </label></td>
		<td><input name="email" type="text" onclick="this.value=''" onblur="if(this.value=='') this.value='{{$edits->email}}'" value="{{$edits->email}}"  required="required" /></td>
		<td></td>
	</tr>
	<tr>
		<td><label>Password: </label></td>
		<td><input type="password" name="password"></td>
		<td></td>
	</tr>
	<tr>
		<td><label>Types: </label></td>
		<td>
			<select name="types">
                <option>Admin</option>
                <option>user</option>
            </select>
        </td>
		<td></td>
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