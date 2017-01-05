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
			<tr id="new-{{$new->id}}">
				<td>{{$new->id}}</td>
				<td>{{$new->name}}</td>
				<td>{{$new->names}}</td>
				<td>{{$new->title}}</td>
				<td>{{substr($new->description,0,30)}}</td>
				<td><img src="{{url('./public/dom/image/'.$new->image)}}" width="100" height="100" /></td>
				<td>{{strip_tags(substr($new->content,0,400))}}</td>
				<td>{{$new->author}}</td>
				<td>{{$new->created}}</td>
				<td>{{$new->modified}}</td>
				<td>
                    <p style="width:75px;float:left;">
                        <a href="admin-news/view/{{$new->id}}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-trash-o"></i>
                        </a>
            			<a href="admin-news/edit/{{$new->id}}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </p>
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">News Delete</h4>
                          </div>
                          <div class="modal-body">
                            <p>Do you want to delete</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="delete_new({{$new->id}})">Ok</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
			</tr>
		@endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function delete_new(id){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'admin-news/delete',
            type: 'post',
            dataType: 'json',
            data:{id: id, _token: token},
            success: function(data){
                if(data.status = 'ok'){
                    alert('Bạn đã xóa thành công');
                    $('#new-'+id).remove();

                }
            }
        });
    }
</script>
@stop