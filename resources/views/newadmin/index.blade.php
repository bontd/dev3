@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')
<div id="main-content">
	<h4>
		<a href="{{url('./admin-news/add')}}"><i class="fa fa-plus-circle"></i></a>
	</h4>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category_id</th>
                <th>Type_id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Content</th>
                <th>Author</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Category_id</th>
                <th>Type_id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Content</th>
                <th>Author</th>
                <th>Created</th>
                <th>Modified</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($news as $new)
			<tr>
				<td>{{$new->id}}</td>
				<td>{{$new->name}}</td>
				<td>{{$new->names}}</td>
				<td>{{$new->title}}</td>
				<td>{{substr($new->description,0,30)}}</td>
				<td><img src="{{url('./public/image/'.$new->image)}}" width="100" height="100" /></td>
				<td>{{strip_tags(substr($new->content,0, 200))}}</td>
				<td>{{$new->author}}</td>
				<td>{{$new->created}}</td>
				<td>{{$new->modified}}</td>
				<td><p style="width:75px;float:left;"><a href="admin-news/view/{{$new->id}}"><i class="fa fa-eye"></i></a> <a href="admin-news/delete/{{$new->id}}"onClick="return confirm('Bạn có Muốn Xóa')"><i class="fa fa-trash-o"></i></a>
    			<a href="admin-news/edit/{{$new->id}}"><i class="fa fa-pencil-square-o"></i></a></p></td>
			</tr>
		@endforeach
        </tbody>
    </table>
</div>
@stop