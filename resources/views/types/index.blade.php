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
			<tr id="type-{{$type->id}}">
				<td>{{$type->id}}</td>
				<td>{{$type->names}}</td>
				<td>{{$type->created}}</td>
				<td>{{$type->Modified}}</td>
				<td>
                    <p>
                        <a href="types/view/{{$type->id}}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-trash-o"></i>
                        </a>
            			<a href="types/edit/{{$type->id}}">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </p>
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Type Delete</h4>
                          </div>
                          <div class="modal-body">
                            <p>Do you want to delete</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="delete_type({{$type->id}})">Ok</button>
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
    function delete_type(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'types/delete',
            type:'post',
            dataType: 'json',
            data: {id: id, _token: CSRF_TOKEN},
            success: function(data){
                if(data.status = 'ok'){
                    alert('Bạn đã xóa thành công');
                    $('#type-'+id).remove();
                }
            }
        });
    }
</script>
@stop