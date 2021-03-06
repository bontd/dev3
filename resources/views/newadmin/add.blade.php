@extends('templates.teamplate')
@section('title')
Admin - add new
@endsection
@section('content')
<div id="main-content-add">
<h4>Edit News</h4>
<form  method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<table>
	<tr>
		<td>Categories:</td>
		<td>
			<select name="category">
			@foreach($category as $categories)
				<option value="{{$categories->id}}">{{$categories->name}}</option>
			@endforeach
			</select>
		</td>
	</tr>
	<tr>
		<td>Types:</td>
		<td>
			<select name="type">
			@foreach($type as $types)
				<option value="{{$types->id}}">{{$types->names}}</option>
			@endforeach
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Name: </label></td>
		<td><input type="text" name="title" value="{{old('title')}}" required></td>
	</tr>
	<tr>
		<td><label>description: </label></td>
		<td><input type="text" name="description" value="{{old('description')}}" required></td>
	</tr>
	<tr>
		<td><label>file: </label></td>
		<td><input type="file" name="myFile" value="{{old('myFile')}}" ></td>
	</tr>
	<tr>
		<td>Content: </td>
		<td><textarea name="content" id="article-content" value="{{old('content')}}" >{{old('content')}}</textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit">Add</button></td>
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