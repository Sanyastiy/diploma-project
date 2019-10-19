<?
	session_start();
	$id = $_POST['ID_GOODS'];
	$url = $_POST['PHOTO_URL'];
	
	/*include ("bd.php");
	$res = mysqli_query($link,"SELECT MAX(`ID`) FROM `Goods` WHERE Importer_ID=".$_SESSION['ID_USER']);
	$mas = mysqli_fetch_array($res);
	$id = $mas[0];
	$result=mysqli_query($link,"INSERT INTO `photo_goods`(`ID_GOODS`, `PHOTO_URL`) VALUES ('".$id."','$url')");*/
	echo $url.";";
?>