@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')

<div id="main-content">
	@if ($status == 'Admin')
		<h4>
			<a href="{{url('/admin/register')}}"><i class="fa fa-plus-circle"></i></a>
		</h4>
	@else				    
	@endif
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>status</th>
                <th>Types</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>status</th>
                <th>Types</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
		@foreach ($user as $users)
			<tr>
				<td>{{$users->id}}</td>
				<td>{{$users->name}}</td>
				<td>{{$users->email}}</td>
				<td>{{$users->password}}</td>
				<td>
				@if($status == 'Admin')		
					@if($users->status == 1)
					<a href="javascript:void(0);"  data={{$users->status}}>
						<p id="test-{{$users->id}}" onclick="update_status({{$users->id}});"  style="width:20px;height:20px;" class="fa fa-check"></p>
					</a>
					@else
					<a href="javascript:void(0);"  data={{$users->status}}>
						<p id="test-{{$users->id}}" onclick="update_status({{$users->id}},{{$users->status}});" style="width:20px;height:20px;" class="fa fa-lock"></p>
					</a>

					@endif
				@else
					@if($users->status == 1)
					<a href="javascript:void(0);"  data={{$users->status}}>
						<p id="test-{{$users->id}}"  style="width:20px;height:20px;" class="fa fa-check"></p>
					</a>
					@else
					<a href="javascript:void(0);"  data={{$users->status}}>
						<p id="test-{{$users->id}}" style="width:20px;height:20px;" class="fa fa-lock"></p>
					</a>

					@endif
				@endif
				</td>
				<td>{{$users->type}}</td>
				<td> <p style="width:75px;margin:auto;">
					<a href="admin/view/{{$users->id}}"><i class="fa fa-eye"></i></a> 
					@if ($status == 'Admin')
					    <a href="admin/delete/{{$users->id}}"onClick="return confirm('Bạn có Muốn Xóa')"><i class="fa fa-trash-o"></i></a>
    					<a href="admin/edit/{{$users->id}}"><i class="fa fa-pencil-square-o"></i></a>
					@else
					   
					@endif
					</p>
				</td>
			</tr>
		@endforeach
	</tbody>
    </table>	
</div>
<script type="text/javascript">
	function update_status(i_id){

		//var Status = $('input[name="stauts"]').val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var i_status = $("#test-"+i_id).parent().attr('data');		
		$.ajax({
   	      type: 'post',
   	      url: 'admin/test-ajax',
   	      data: {id: i_id,status: i_status, _token: CSRF_TOKEN},
   	      dataType:"json",
   	      success: function(data) {
   	      	//console.log(data);return;
   	      	
   	    	  if(data.status == 'ok'){
   	    	  	//alert('ok');   	    	  	
   	    	  	if(i_status == 1){
   	    	  		$("#test-"+i_id).removeClass('fa-check');
   	    	  		$("#test-"+i_id).addClass('fa-lock');
   	    	  		$("#test-"+i_id).parent().attr('data',0);
   	    	  	}
   	    	  	else{
   	    	  		$("#test-"+i_id).removeClass('fa-lock');
   	    	  		$("#test-"+i_id).addClass('fa-check');
   	    	  		$("#test-"+i_id).parent().attr('data',1);
   	    	  	}

   	    	  }   	    	  
   	      }
   	      
   	    });	
		//alert(i_status);
		// if(i_status == 1){			
			
		// 	$('p').removeClass('fa-unlock').addClass('fa-lock');
		// }
		// else{
			
		// 	$('p').removeClass('fa-lock').addClass('fa-unlock');
		// }
	}
</script>
@endsection