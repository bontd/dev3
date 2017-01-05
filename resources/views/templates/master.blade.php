<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{url('/public/css/main.css')}}" rel="stylesheet">
    <link href="{{url('/public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/css/font-awesome.css')}}" type="text/css">
    <link href="{{url('/public/css/stylesheet.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">
      <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#fff;">Tin Tức 24h</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/news')}}">Home</a></li>
            @foreach($menu as $main)
            <li><a href="{{url('./news/category/'.Crypt::encrypt($main->id))}}">{{$main->name}}</a></li>
            @endforeach
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>login</h5>
                  </div>
                  <div class="modal-body">
                      <form method="post">
                        <ul>
                          <li>Username:</li>
                          <li><input type="text" value=""/></li>
                        </ul>
                        <ul>
                          <li>Password:</li>
                          <li><input type="password" value=""/></li>
                        </ul>
                        <ul>
                          <li><button type="button"/>login</button></li>
                        </ul>
                      </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </nav>

      <div class="col-md-8">
        <article id="main">
              @yield('content')
        </article>
      </div>
      <div class="col-md-4">
        <div class="col-md-12">
          <div id="advertisement">
            <figure>
              <img src="{{url('./public/img/heiniken.jpg')}}"/>
            </figure>  
          </div>
          <div class="right-box-tdn">
            <h4>Tin Đọc Nhiều</h4>
            <ul>
            @foreach($r_news as $r_new)
              <li>
                  <figure>
                    <a href=""><img src="{{url('./public/dom/image/'.$r_new->image)}}"/></a>
                  </figure>
                  <p><span>{{$r_new->created}}</span></p>
                  <p><a href="">{{$r_new->title}}</a></p>
              </li>
            @endforeach
              
            </ul>
          </div>
          <div id="advertisement">
            <figure>
              <img src="{{url('./public/img/qc2.jpg')}}"/>
            </figure>  
          </div>
          <div class="right-box-tdn">
            <h4>Tin Trong Ngày</h4>
            <ul>
              @foreach($r_news as $r_new)
              <li>
                  <figure>
                    <a href="{{url('news/detail/'.Crypt::encrypt($r_new->id))}}"><img src="{{url('./public/dom/image/'.$r_new->image)}}"/></a>
                  </figure>
                  <p><span>{{$r_new->created}}</span></p>
                  <p><a href="">{{$r_new->title}}</a></p>
              </li>
            @endforeach
            </ul>
        </div>
        </div>
      </div>
      <div class="col-md-12">
        <div id="footer">
          Toàn bộ nội dung bài viết, ý kiến thành viên được kiểm duyệt..</br>
          Chịu trách nhiệm nội dung: </br>
          </br>
          </br>
          Địa chỉ: </br>
          Điện thoại: (0963551594, email: hotro@thethaocapnhat.com</br>
        </div>
      </div>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1100729783357094";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('/public/js/bootstrap.min.js')}}"></script>
  </body>
</html>
	
