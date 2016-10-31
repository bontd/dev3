<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
	function testfunction(){
		document.getElementById('test').innerHTML='bontd25';
	}
	</script>
</head>
<body>
<p id="test"> tran duy bon</p>
<p id="test1" style="display:none;">James bond</p>
<p id="demo"></p>
<button onclick="testfunction()">next</button>
<button onclick="document.getElementById('test').style.fontSize='30px'">Size</button>
<button onclick="document.getElementById('test').style.display='none'">display</button>
<button onclick="testdisplay()">block</button>
<script type="text/javascript">
	function testdisplay(){
		document.getElementById('test1').style.display='block';
	}
	//window.alert('bontd');
	document.write('tran duy bon'); 
	console.log(5+6); 
	var a= 1;
	var b=2;
	var c = a+b*b;
	document.write(c);
	//document.getElementById("demo").innerHTML = c;

	var d = 'bon';
	var e = 'tran';
	document.getElementById('demo').innerHTML = e +' '+  d;
</script>
</body>
</html>