<?php
session_start();
$login = $_POST['login'];
$pass = $_POST['pass'];

$login=stripslashes($login);
$pass=stripslashes($pass);

$login=htmlspecialchars($login);
$pass=htmlspecialchars($pass);

$login=trim($login);
$pass=trim($pass);

include("bd.php");
if(($login=='') or ($pass=='')){
	echo 0;
}else{
	$pass=md5($pass);
	$result=mysqli_query($link,"SELECT * FROM Importers WHERE Telephone='$login' AND Password='$pass'");
	$data=mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	if ($count<1)
	{
		echo 1;
	}else{
		$_SESSION['ID_USER'] = $data[0];
		$_SESSION['fam'] = $data[1];
		$_SESSION['Name'] = $data[2];
		$_SESSION['tel'] = $data[3];
		$_SESSION['vk'] = $data[4];
		$_SESSION['insta'] = $data[5];
		$_SESSION['telega'] = $data[6];
		$_SESSION['email'] = $data[7];
		$_SESSION['adress'] = $data[8];
		$_SESSION['city'] = $data[9];
		$_SESSION['radius'] = $data[10];
		$_SESSION['alert'] = $data[11];
		$_SESSION['admin'] = $data[14];
		$_SESSION['cookie'] = session_id();
		
		
		if($data[14]!=1){
			echo 2;
		}else{
			echo 3;
		}
	}
}

?>