<?php
session_start();
////////////////////////////////////////////////////////////////////////////////////////////////////////
include ("bd.php");
$token = "2e56ec398a17dfbd8eca5316342dea5aa2a179c659ac45b53af600f73056ae9c08d76d5e21903284cc386";
$url = 'https://api.vk.com/method/photos.getMessagesUploadServer';


$params = array(
'peer_id' => '87970810',
'oauth' => 1,
'access_token' => $token,  // access_token
'v' => '5.37',
);
//$url = urlencode($url);
$result = file_get_contents($url, false, stream_context_create
(array
('http' => array(
'method'  => 'POST',
'header'  => 'Content-type: application/x-www-form-urlencoded',
'content' => http_build_query($params)
))));
print_r($result);


$url = json_decode($result, $assoc=true);//-m
//print_r($url);
$link_vk = $url['response']['upload_url'];//-m
//print_r($link_vk);
$basename = pathinfo($path);
//echo $basename['basename'];
$info = getimagesize($path);
//echo $info['mime'];
//print_r($info);
//print_r($basename);
$curl = curl_init();

$dir = curl_file_create($path, $info['mime'], $basename['basename']);
//print_r($dir);
curl_setopt($curl, CURLOPT_URL, $link_vk);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data;charset=utf-8'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('file' => $dir));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$image = json_decode(curl_exec($curl), true);//имейдж пуст
curl_close($curl);

$url = 'https://api.vk.com/method/photos.saveMessagesPhoto';
$params = array(
'photo' => stripslashes($image['photo']),
'server' => $image['server'],
'hash' => $image['hash'],
'access_token' => $token,  // access_token
'v' => '5.37',
);
//print_r($image);
$result = file_get_contents($url, false, stream_context_create(array(
'http' => array(
'method'  => 'POST',
'header'  => 'Content-type: application/x-www-form-urlencoded',
'content' => http_build_query($params)
)
)));
$res = json_decode($result, $assoc=true);
//print_r($result);
$image_id = $res['response'][0]['id'];
$owner_id = $res['response'][0]['owner_id'];
$attachment = 'photo'.$owner_id.'_'.$image_id;//овнер и имейдж пусты
//print_r($attachment);
$url = 'https://api.vk.com/method/messages.send';
$id_user_message = 87970810;
//36338339
$message="Название товара: $fname
Описание: $fdesc
Цена: $fprice
Количество: $fcount
Категория: $fcat
Подкатегория: $fsubcat";

$params = array(
'user_id' => $id_user_message,
'message' => $message,
'attachment' => $attachment,
'access_token' => $token,
'v' => '5.37',
);

$result = file_get_contents($url, false,stream_context_create(array(
'http' => array(
'method' => 'POST',
'header' => 'Content-type: application/x-www-form-urlencoded',
'content' => http_build_query($params)
)
)));

$search = json_decode($result, $assoc=true);
print_r($search);
echo "<br>";
?>