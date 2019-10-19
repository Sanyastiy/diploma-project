<?php
session_start();
$fid = $_POST['fid'];
$fname = $_POST['fname'];
 $fcat = $_POST['fcat'];
 $fsubcat=$_POST['fsubcat'];
 $fstatus = $_POST['fstatus'];
 $fdesc = $_POST['fdesc'];
 $freason = $_POST['freason'];
 $fcount = $_POST['fcount'];
$fprice = $_POST['fprice'];
$fimpid=$_SESSION['ID_USER'];


$token = "c7a4cb3e9ad466c926af0c5eb18ff739e2722885a1ffa909b22175a14aa133e1cc857fccd0c404ad8ae92";    
 // подключаемся к базе
    include ("bd.php");

    $cat_q = mysqli_query($link,"SELECT Symbol FROM Category WHERE ID=".$fcat);
    $cat = mysqli_fetch_array($cat_q);
    $cat = $cat[0];
    
    $s_cat_q = mysqli_query($link,"SELECT Symbol FROM Sub_category WHERE ID=".$fsubcat);
    $s_cat = mysqli_fetch_array($s_cat_q);
    $s_cat = $s_cat[0];

    $index_q = mysqli_query($link,"SELECT Index_ID FROM Goods WHERE ID=".$fid);
    $index = mysqli_fetch_array($index_q);
    $index = $index[0];
    
    $vk = mysqli_query($link,"SELECT VK_URL FROM Goods WHERE ID=".$fid);
    $vk = mysqli_fetch_array($vk);
    $vk_url = $vk[0];
    
    $vk_main = mysqli_query($link,"SELECT VK_MAIN_PHOTO FROM Goods WHERE ID=".$fid);
    $vk_main = mysqli_fetch_array($vk_main);
    $vk_main = $vk_main[0];
    
    if((($fid=='')||($fcat==''))||(($fdesc=='')||($fprice==''))){
 		echo 'Обновление товара не удалось!';
    }else
    {
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
    $date = date("Y-m-d");
    $result=mysqli_query($link, "UPDATE Goods SET status_reason='$freason', Price_roz='$rozn', Article='$art', Name='$fname', Description='$fdesc', Category='$fcat', Sub_Category='$fsubcat', status_id='$fstatus', Count='$fcount', Price='$fprice' WHERE ID='$fid'");
    
    $url = 'https://api.vk.com/method/market.edit';
	$params = array(
    	    'owner_id' => '-160560075',
    	    'item_id'=> $vk_url,
    	    'name' => "$art ".$fname,
    	    'description' => $fdesc,
    	    'category_id' => 907,
    	    'price' => $rozn,
    	    'main_photo_id'=>$vk_main,
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

    echo 'Товар успешно обновлен!';
    }
    
?>
    
   
