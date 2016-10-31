@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')

<div id="main-content">
	<h4>
		<a href="{{url('./articles/test-post/')}}"><i class="fa fa-plus-circle"></i></a>
	</h4>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Author</th>
				<th>Image</th>
				<th>Content</th>
				<th>users</th>
				<th>created_at</th>
				<th>updated_at</th>
				<th>Actions</th>
			</tr>
		<tfoot>
            <tr>
            	<th>Id</th>
				<th>Name</th>
				<th>Author</th>
				<th>Image</th>
				<th>Content</th>
				<th>users</th>
				<th>created_at</th>
				<th>updated_at</th>
				<th>Actions</th>
			</tr>
		</tfoot>
        <tbody>
		@foreach ($articles as $article)
			<tr>
				<td>{{$article->id}}</td>
				<td>{{$article->title}}</td>
				<td>{{$article->author}}</td>
				<td><img src="{{url('./public/image/'.$article->file)}}" width="100" /></td>
				<td>{{strip_tags($article->content)}}</td>
				<td>{{$article->name}}</td>
				<td>{{$article->created_at}}</td>
				<td>{{$article->updated_at}}</td>
				<td><p style="width:75px;margin:auto; font-size:18px;">
				<a href="articles/view/{{$article->id}}"><i class="fa fa-eye"></i></a>
				<a href="articles/delete/{{$article->id}}" onClick="return confirm('Bạn có Muốn Xóa')"><i class="fa fa-trash-o"></i></a> 
    			<a href="articles/edit/{{$article->id}}"><i class="fa fa-pencil-square-o"></i></a>

    			<a href="" class="test-popup" onclick="delete_popup({{$article->id}});" data-toggle="modal" data-target="#myModal">
				  <i class="fa fa-trash-o"></i>
				</a>
    			</p></td>
    			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				        <h4 class="modal-title" id="myModalLabel">Delete Articles</h4>
				      </div>
				      <div class="modal-body">
				        Bạn có muôn xóa không
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" id="confirm-cancel" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary" id="confirm-ok">  Ok  </button>
				      </div>
				    </div>
				  </div>
				</div>
			</tr>
		@endforeach
	</tbody>
    </table>
</div>
<script type="text/javascript">
	function popupConfirm(sz_content,OkCallBack){
		$("#myModal .modal-content .modal-body").text(sz_content);
		//$("#myModal").modal("show");
		$("#confirm-ok").click(function(){ 
		//$("#myModal").modal("hide");
		OkCallBack();
	});
	  	$("#confirm-cancel").click(function(){
	   		$("#myModal").modal("hide");
	  	});
	 }
	 $(document).ready(function(){
	 	$(".test-popup").click(function(){
	 		popupConfirm('Bạn có muốn xóa', function delete_popup(i_id){
	 			//alert('da click OK');
	 			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				$.ajax({
		   	      type: 'post',
		   	      url: 'articles/delete',
		   	      data: {id: i_id, _token: CSRF_TOKEN},
		   	      dataType:"json",
		   	      success: function(data) {
		   	      	//console.log(data);return;
		   	      	
		   	    	  if(data.delete == 'ok'){
		   	    	  	alert('ok');   	    	  	
		   	    	  }   	    	  
		   	      }
		   	      
		   	    });
	 		});
	 	});
	 });
</script>
@stop
