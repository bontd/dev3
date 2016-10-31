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
                <div class="modal-content" style="width:450px;height:260px;">
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
                      <li>Password: </li>
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
    </nav>

      <div class="col-md-8">
        <article id="main">
        @yield('detail')
          <div class="col-sm-7">
            <figure id="img-new">
              @yield('content')
          </div>
          @yield('news')
          <div class="col-md-7">
          @yield('other')
          </div>
          <div class="col-md-5">
            @yield('photos')
            </div>
          <div class="col-md-5">
            @yield('videos')
          </div>
          <div class="col-md-12">

            @yield('football')

          </div>
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
              <li>
                  <figure>
                    <a href=""><img src="{{url('./public/img/b1.jpg')}}"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="{{url('./public/img/b5.jpg')}}"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b7.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b4.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b2.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              
            </ul>
          </div>
          <div id="advertisement">
            <figure>
              <img src="./public/img/qc2.jpg"/>
            </figure>  
          </div>
          <div class="right-box-tdn">
            <h4>Tin Trong Ngày</h4>
            <ul>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b8.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b9.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b10.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b11.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              <li>
                  <figure>
                    <a href=""><img src="./public/img/b12.jpg"/></a>
                  </figure>
                  <p><span>18:45 20/05/2016</span></p>
                  <p><a href="">ĐT Việt Nam gặp khó tại vòng loại U16 và U19 nữ châu Á 2017</a></p>
              </li>
              
            </ul>
          </div>

        </div>
      </div>
      <div class="col-md-12">
        <div id="footer">
          Toàn bộ nội dung bài viết, ý kiến thành viên được kiểm duyệt, cung cấp và bảo trợ thông tin bởi Báo Thể Thao Việt Nam – Cơ quan thuộc Tổng Cục Thể Dục Thể Thao.</br>
          Chịu trách nhiệm nội dung: </br>
          Phó giám đốc Công ty Cổ phần Yêu Thể Thao</br>
          Giấy phép số 15/GP-TTĐT do Bộ Thông tin và Truyền thông cấp ngày 29/01/2010 và giấy phép số 89/GP-TTĐT của Sở Thông tin và Truyền thông TP.HCM cấp ngày 28/7/2015</br></br></br>

          Bản quyền và phát triển bởi Công ty Cổ Phần Thể Thao</br>
          Địa chỉ: </br>
          Điện thoại: (0963551594, email: hotro@thethaocapnhat.com</br>
          Mọi hành vi vi phạm bản quyền, sao chép sẽ chịu hoàn toàn trách nhiệm trước pháp luật Việt Nam. 
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
	
