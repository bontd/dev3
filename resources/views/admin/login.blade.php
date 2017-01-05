<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="{{url('/public/css/csslogin.css')}}" rel="stylesheet">
    <link href="{{url('/public/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

  </head>
  <body>
<div id="wrapper">
    <div id="login">
    	<h3>AdminLTE</h3>
		{{ csrf_field() }}
		<form method="POST" >
			{!! csrf_field() !!}
			<table>
				<tr>
					<td><input type="email" name="email" value=""></td>
				</tr>
				<tr>
					<td><input type="password" name="password" id="password"></td>
				</tr>
				<tr>
					<td>
			    	<h4>{{$error or ""}}</h4>
			    	</td>
				</tr>
				<tr>
					<td><button type="submit">Login</button><p><a href="#">Forgot password</a></p></td>
				</tr>
			</table>
		</form>

		
	</div>
	
</div>
</body>
</html>