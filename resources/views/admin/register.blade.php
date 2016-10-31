@extends('templates.teamplate')
@section('title')

Admin - add new
@endsection
@section('content')
<div id="main-content-add">
    <h4>ADD News User</h4>
    <form method="POST">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td style="width:150px;">Name: </td>
                <td><input type="text" name="name" value="{{old('name')}}"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value="{{old('email')}}"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Types: </td>
                <td>
                    <select name="types">
                        <option>user</option>
                        <option>Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit"><i class="fa fa-check"></i>Register</button></td>
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