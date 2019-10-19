<?php
    
    $fn = $_POST['fn'];
    $fn = stripslashes($fn);
    $fn = htmlspecialchars($fn);
    
    $ln = $_POST['ln'];
 	$ln = stripslashes($ln);
    $ln = htmlspecialchars($ln);
    
    $tl = $_POST['tl'];
    $tl = stripslashes($tl);
    $tl = htmlspecialchars($tl);
    
    $em = $_POST['em'];
    $em = stripslashes($em);
    $em = htmlspecialchars($em);
    
    $code = $_POST['cd'];
    $code = stripslashes($code);
    $code = htmlspecialchars($code);
    
    $pass = $_POST['pw'];
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    
 //удаляем лишние пробелы
    $fn = trim($fn);
    $ln = trim($ln);
    $tl = trim($tl);
    $em = trim($em);
    $code = trim($code);
    $pass = trim($pass);
    
    
 // подключаемся к базе
    include ("bd.php");
    // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
 	if((($fn=='')||($ln=='')||($em==''))&(($tl=='')&($code==''))){
 		echo 0;
 	}else{
 		$result = mysqli_query($link,"SELECT id FROM Autorize_ID WHERE Code='$code'");
 		$myrow = mysqli_fetch_array($result);
 		if (empty($myrow['id'])){
    		echo 1;
    	}else{
    		$result = mysqli_query($link,"DELETE FROM Autorize_ID WHERE Code='$code'");
 
    		$result2 = mysqli_query($link, "INSERT INTO Importers (First_name,Last_name,Telephone,Email,Password) VALUES('$fn','$ln','$tl','$em','".md5($pass)."')");

            $res = mysqli_query($link,"SELECT MAX(ID) FROM Importers WHERE Telephone=".$tl);
            $id = mysqli_fetch_array($res);
            $id_path= $id[0];

    		if ($result2=='TRUE')
    		{
                mkdir("../photo_goods/".$id_path);
    			echo 2;
    		}
    	}
 	}
?>

