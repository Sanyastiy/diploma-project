<?
	$url = 'https://api.vk.com/method/photos.getMarketUploadServer';
	$params = array(
    	    'group_id' => '160560075',
    	    'main_photo' => 1,
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

	$url = json_decode($result, $assoc=true);

	$link_vk = $url['response']['upload_url'];

    $basename = pathinfo($pharray[0]); 
    //echo $basename['basename'];
    $info = getimagesize($pharray[0]);
    //echo $info['mime'];

	$curl = curl_init();
	
	$dir = curl_file_create($pharray[0], $info['mime'], $basename['basename']);
	
    curl_setopt($curl, CURLOPT_URL, $link_vk);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data;charset=utf-8'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, array('file' => $dir));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $image = json_decode(curl_exec($curl), true);
    curl_close($curl);
   	
   	$url = 'https://api.vk.com/method/photos.saveMarketPhoto';
	$params = array(
    	    'group_id' => '160560075',
    	    'photo' => stripslashes($image['photo']),
    	    'server' => $image['server'],
    	    'hash' => $image['hash'],
    	    'crop_data' => $image['crop_data'],
    	    'crop_hash' => $image['crop_hash'],
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
	$res = json_decode($result, $assoc=true);
	$main_image_id = $res['response'][0]['id'];
	
	$query = mysqli_query($link,'INSERT INTO `photo_goods`(`url_photo`, `vk_id`) VALUES ("'.$pharray[0].'","'.$main_image_id.'")');
	sleep(1);
?>