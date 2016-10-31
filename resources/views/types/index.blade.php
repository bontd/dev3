@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')
<div id="main-content">
	<h4>
		<a href="{{url('./types/add/')}}"><i class="fa fa-plus-circle"></i></a>
	</h4>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
		@foreach ($types as $type)
			<tr>
				<td>{{$type->id}}</td>
				<td>{{$type->names}}</td>
				<td>{{$type->created}}</td>
				<td>{{$type->Modified}}</td>
				<td><p style="width:75px;margin:auto;"><a href="types/view/{{$type->id}}"><i class="fa fa-eye"></i></a> <a href="types/delete/{{$type->id}}"onClick="return confirm('Bạn có Muốn Xóa')"><i class="fa fa-trash-o"></i></a> 
    			<a href="types/edit/{{$type->id}}"><i class="fa fa-pencil-square-o"></i></a></p></td>
			</tr>
		@endforeach
	</tbody>
    </table>
</div>
@stop