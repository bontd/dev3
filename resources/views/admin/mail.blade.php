@extends('templates.teamplate')
@section('title')
day la title trang about
@endsection
@section('content')
<div id="wrapper">
<form method="post">
	<table >
	{{ csrf_field() }}
		<tr>
			<td>Tiêu đề: </td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>Nội dung: </td>
			<td><textarea name="content"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"></td>
		</tr>
	</table>
</div>
</form>
@stop
$mailer = new \App\Http\Controllers\AuthController
$mailer->recommendTo('bontd2501@gmail.com',\App\Http\Controllers\AuthController::first())

