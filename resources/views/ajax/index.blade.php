@extends('templates.teamplate')
@section('title')
Admin
@endsection
@section('content')

@foreach ($types as $value)
<p id="type-{{$value->id}}" class="">
	{{$value->names}} <a href="javascript:void(0)" onclick="delete_type({{$value->id}});">Delete</a> {{$value->id}}
</p>
@endforeach
<script type="text/javascript">
	function delete_type(id){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		// confirm('ban co muon xoa');
		// console.log(id);return;
		$.ajax({
			url: "ajax/test-ajax",
			type: 'post',
			dataType: "json",
			data: {id: id, _token: CSRF_TOKEN},
			success: function(data){
				if(data.status == 'ok'){
					alert('You delete success');
					$("#type-"+id).remove();
				}
			}
		});
	}
</script>

@stop