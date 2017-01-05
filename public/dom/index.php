<?php
include('connect.php');
// example of how to modify HTML contents
include('simple_html_dom.php');

// get DOM from URL or file


$url = 'http://www.bongda.com.vn/';
    $html = file_get_html($url);
    $tieude = $html->find('.list_top_news .pkg h2 a');
	//$tieude = $html->find('.sldhome img');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test</title>
<style type="text/css">
h1{
	color:red !important;
	list-style:none;
}
#wrapper{
	width:800px;
	margin:auto;
}
img{
	margin:0 0 10px 0;
}

</style>
<script type="text/javascript">
    init_reload();
    function init_reload(){
        setInterval( function() {
                   window.location.reload();
 
          },6000000);
    }
    </script>
</head>
<body>
<div id="wrapper">	
	<?php
	foreach($tieude as $value){
	//echo $value->href;echo '</br>';

    $abc = file_get_html($value->href);
    $title = $abc->find('.col630 .time_detail_news',0);
    $img = $abc->find('#content_detail .exp_content .expNoEdit img',0)->src;
    $noidung = $abc->find('.col630 .sapo_detail',0);
    $noidung2 = $abc->find('#content_detail .exp_content',0);
    echo $title;echo "<br/>";
    // echo $noidung;echo '<br/>';
    // echo $noidung2;echo '<br/>';
    // echo $img;
	$u = 'image/'. basename($img);
	$i = basename($img);
	file_put_contents($u, file_get_contents($img));
	
	$sql ="insert into news (category_id,type_id,title,description,content,image,author) values('2','7',N'$title->innertext',N'$noidung->plaintext',N'$noidung2','$i','bontd')";
	$db->exec($sql);
	//echo $sql;
	}
	?>
</div>
</body>
</html>