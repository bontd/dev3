<!DOCTYPE html>
<html>
<head>
	<title>Created users</title>
<style>
	*{padding: 0;margin: 0;}
	#wrapper{width: 612px;margin: auto;}
	#header{width: 100%;height: 305px;float: left;background-color:#d4e9f3;}
	#header h1{color: white;font-size: 50px;font-family: 'Chiller';margin: 20px 0 0 100px;}
	#header h2{color: white;text-align: center;font-family: 'Chiller';font-size: 40px;}
	#header h3{color: white;text-align: center;font-family: 'Chiller';font-size: 40px;}
	#content{width: 95%;float: left;border:solid thin #ccc;padding: 15px;}
	#content p{margin: 10px 0 10px 0;}
	#footer{width: 96%;background-color: #d4e9f3;float: left;height: 100px;padding: 15px;text-align: center;}
</style>
</head>
<body>


<div id="wrapper">
	<header id="header">
		<img src="https://lh3.googleusercontent.com/PxnhCVzW-o7Es-lfO_Aa9dyvk3wwe6TMcbGebXgNytLuOkNhKp-psbT46w0JNFbRFbZDwafjhS0hnRtarvnBs1l8ebWDH2ijUdOyeXIJ5W8tJZIRzBLxib9lGUuhGXrkq--jOXBx7ZLeTUvoJvizF2PNsXqXNX2GM2gnq2HSVDIIBi72cHS69aoB-n-NDs_hw9ZxzXiGNB8J-iUUzl_tjfoLV39h0Rf-QOI3D0IQAPCn3w3qX6Zb1pfixaDhTqw0fp2d48kKmHuMJV1mI85uTwkcThVTiRWul6pwlnrOMzAt46TGGOwqz64mnDZ7Q5bVB1idMNNaN2Nf-LQrobYGit-eSmjAH9Bw-PNl6kgO2fT7TSJrWMGTR8BqgPjAkFfAVFcb-kOn1m81aehIvqG1BP8B1ajr9pMQh3RURxHQ6gzdoIBlfuEYEUrxYX1deRt_-uavKl_VkOsr7JdWKwSK0lQptHS1rjT-1tvFOQHF04rQl50JZc3kXP8CcJ2QFbkRWdGvumG9m3GJ30hj72zE3hehitMGKL0x_oEoe-QhPeJ2kBPpQ8Cr-pSvIGw6X5FZpqrzIpYTwqeH2Dl7OcDvZBPly_dXywX8wUKlbJQqixwBIxI=w612-h307-no"/>
	</header>
	<section id="content">
		<h2>Hi {{$a_data_mail [ 'name']}}, </h2>
		<p>tài khoản người dùng của bạn với địa chỉ e-mail {{$a_data_mail [ 'email']}} đã được tạo ra. </p>
		<p>Hãy làm theo các liên kết dưới đây để kích hoạt tài khoản của bạn. Các liên kết sẽ vẫn có hiệu lực trong 15 ngày. </p>
		<p><a href="thethaocapnhat.com">Click here</a></p>
	</section>
	<footer id="footer"><h1>Thể Thao Cập Nhật</h1></footer>
</div>
</body>
</html>