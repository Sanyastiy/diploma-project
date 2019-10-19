<?
$token = "2e56ec398a17dfbd8eca5316342dea5aa2a179c659ac45b53af600f73056ae9c08d76d5e21903284cc386";
$data = json_decode(file_get_contents('php://input')); 

switch ($data->type) { 

case 'message_new': 

$user_id = $data->object->user_id; 


if($user_id="36338339"){
	$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.1")); 

	$user_name = $user_info->response[0]->first_name; 
}

/*$request_params = array( 
'message' => "Hello, {$user_name}!", 
'user_id' => $user_id, 
'access_token' => $token, 
'v' => '5.1' 
); 

$get_params = http_build_query($request_params); 

file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); */


echo('ok'); 

break; 

}
?>