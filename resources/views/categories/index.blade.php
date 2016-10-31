@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')
<div id="main-content">
	<h4>
		<a href="{{url('./categories/add-categori/')}}"><i class="fa fa-plus-circle"></i></a>
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
            @foreach ($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>{{$category->created}}</td>
				<td>{{$category->modified}}</td>
				<td><p style="width:75px;margin:auto;"><a href="categories/view/{{$category->id}}"><i class="fa fa-eye"></i></a> <a href="categories/delete/{{$category->id}}"onClick="return confirm('Bạn có Muốn Xóa')"><i class="fa fa-trash-o"></i></a> 
    			<a href="categories/edit/{{$category->id}}"><i class="fa fa-pencil-square-o"></i></a></p></td>
			</tr>
		@endforeach
        </tbody>
    </table>
</div>
@stop