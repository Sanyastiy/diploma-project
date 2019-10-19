<?php
session_start();
$fname = $_POST['fname'];
$fcat = $_POST['fcat'];
$fsubcat=$_POST['fsubcat'];
$fstatus = $_POST['fstatus'];
$fdesc = $_POST['fdesc'];
$fcount = $_POST['fcount'];
$fprice = $_POST['fprice'];
$fimpid =$_SESSION['ID_USER'];
$photos = $_POST['photos'];

$token = "b6c3dcc9f5011f01078a90757955a95eb6393a8206f449c56b63bee8c9ddfdd7303efbf42c66df5bfe03a";
 // подключаемся к базе
    include ("bd.php");
    
    $cat_q = mysqli_query($link,"SELECT Symbol FROM Category WHERE ID=".$fcat);
    $cat = mysqli_fetch_array($cat_q);
    $cat = $cat[0];
    
    $s_cat_q = mysqli_query($link,"SELECT Symbol FROM Sub_category WHERE ID=".$fsubcat);
    $s_cat = mysqli_fetch_array($s_cat_q);
    $s_cat = $s_cat[0];
	

    $index_q = mysqli_query($link,"SELECT MAX(Index_ID) FROM Goods WHERE Importer_ID=".$fimpid);
    $index = mysqli_fetch_array($index_q);
    $index = $index[0];
    
    if((($fname=='')||($fcat==''))||(($fdesc=='')||($fprice==''))){
 		echo 'Ошибка добавления товара!';
    }else
    {
	$index = $index + 1;
    $date = date("Y-m-d");
    $art = '';
    if($s_cat!=''){
		$art = $cat.".".$s_cat."-".$fimpid.".".$index;
	}else{
		$art = $cat."-".$fimpid.".".$index;
	}
	
    $rozn = 0;
   if($fprice<650){
    	$rozn = $fprice * 100 / 70;
    }else if(($fprice>=650)&&($fprice<1500)){
    	$rozn = $fprice * 100 / 75;
    }else if(($fprice>=1500)&&($fprice<2500)){
    	$rozn = $fprice * 100 / 80;
    }else if(($fprice>=2500)&&($fprice<5000)){
    	$rozn = $fprice * 100 / 85;
    }else if($fprice>=5000){
    	$rozn = $fprice * 100 / 90;
    }
    $rozn=ceil($rozn);
    $result=mysqli_query($link, "INSERT INTO Goods (Article,Index_ID,Importer_ID,Name,Description,Category,Sub_Category,Count,Price,Add_date, status_id,Price_roz) VALUES('$art','$index','$fimpid','$fname','$fdesc','$fcat','$fsubcat','$fcount','$fprice','$date','$fstatus','$rozn')");
    $res = mysqli_query($link,"SELECT MAX(ID) FROM Goods WHERE Importer_ID=".$fimpid);
    $id = mysqli_fetch_array($res);
   	$id_g = $id[0];
   	
   	$mkdir = "../photo_goods/".$fimpid;
   	mkdir($mkdir);
   	$mkdir = "../photo_goods/".$fimpid."/".$id_g."/";
   	mkdir($mkdir);
   	
   	$b = explode(';', $photos);
   	
   	$i = 0;
   	$path ='';
   	$pharray = array();
   	foreach($b as $p){
   		if($p!=''){
   		$p_n = trim($p); 
   		$main = "../photo_goods/".$p_n;
   		$path = "../photo_goods/".$fimpid."/".$id_g."/".$art."_".$i.".jpg";
   		rename($main,$path);
   		$pharray[] = $path;
   		}
		$i=$i+1;
   	}

   	include('main_photo.php');
   	
	include('other_photo.php');

	$url = 'https://api.vk.com/method/market.add';
	$params = array(
    	    'owner_id' => '-160560075',
    	    'name' => "$art ".$fname,
    	    'description' => $fdesc,
    	    'category_id' => 907,
    	    'price' => $rozn,
    	    'main_photo_id'=>$main_image_id,
    	    'photo_ids'=>$photos_string,
    	    'access_token' => $token,  // access_token
    	    'v' => '5.37',
   		);	

    $result = file_get_contents($url, false, stream_context_create(array(
		 		'http' => array(
    	        'method'  => 'POST',
    	        'header'  => 'Content-type: application/x-www-form-urlencoded',
   		        'content' => http_build_query($params)
   		    )
	)));
	
	$good = json_decode($result, $assoc=true);
    //print_r($good);
	$id_good = $good[response][market_item_id];
	$result=mysqli_query($link, "UPDATE Goods SET VK_URL='$id_good', VK_MAIN_PHOTO='$image_id', VK_PHOTOS='$photos_string' WHERE ID='$id_g'");

	if($fsubcat!=0){
	    $fcat=$fsubcat;
    }

	$postdata = http_build_query(
    	array(
        	'title' => $fname,
        	'parent' => $fcat,
        	'article' => $art,
        	'price' => $rozn,
        	'files' =>$pharray,
        	'description' => $fdesc
    	)
	);

	$opts = array('http' =>
    	array(
        	'method'  => 'POST',
        	'header'  => 'Content-type: application/x-www-form-urlencoded',
        	'content' => $postdata
    	)
	);

	$context  = stream_context_create($opts);

	$result = file_get_contents('http://shop.mangobox.ru/add.php', false, $context);
	
	$update=mysqli_query($link, "UPDATE Goods SET ID_SHOP='$result' WHERE ID='$id_g'");

    echo 'Товар успешно добавлен!';
    }
    
?>