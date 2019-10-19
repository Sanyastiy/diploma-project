<?
$url = 'https://api.vk.com/method/photos.getMarketUploadServer';
   	$token = "c7a4cb3e9ad466c926af0c5eb18ff739e2722885a1ffa909b22175a14aa133e1cc857fccd0c404ad8ae92";
   	
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
	
	$link = $url['response']['upload_url'];
	
    $path  = "../photo_goods/2/7/G-31.6_0.jpg";
    
	
    $basename = pathinfo($path); 
    //echo $basename['basename'];
    $info = getimagesize($path);
    //echo $info['mime'];
    
    

	$curl = curl_init();
	
	$dir = curl_file_create($path, $info['mime'], $basename['basename']);
	
    curl_setopt($curl, CURLOPT_URL, $link);
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
	
	$image_id = $res['response'][0]['id'];

?>
