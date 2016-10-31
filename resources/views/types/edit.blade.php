@extends('templates.teamplate')
@section('title')

Admin - add new
@endsection
@section('content')
<div id="main-content-add">
    <h4>Edit Types</h4>
    <form method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$edit->id}}">
        <table>
            <tr>
                <td style="width:150px;">Name: </td>
                <td><input type="text" name="name" value="{{old('name'). $edit->names}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Save</button></td>
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