<?php
$ftel = $_POST['ftel'];
$femail = $_POST['femail'];
$x=false;
 // подключаемся к базе
    include ("bd.php");
    $rez=mysqli_query($link, "SELECT Email FROM Importers WHERE Email='$femail' OR Telephone='$ftel'");
    $res=mysqli_fetch_array($rez);
    if($femail!='')
    { 	
    	$pass=rand(1000,100000);
      	$result=mysqli_query($link, "UPDATE Importers SET Password='".md5($pass)."'WHERE Email='$femail'");
    	$x=true;
    	$message="Ваш новый пароль для сайта crm.mangobox.ru: $pass";
    	mail($res[0],"Сброс пароля", $message);
 		echo 0;
    }
    
    if($ftel!='')
    { 	
    	$pass=rand(1000,100000);
      	$result=mysqli_query($link, "UPDATE Importers SET Password='".md5($pass)."'WHERE Telephone='$ftel'");//
    	$x=true;
    	$message="Ваш новый пароль для сайта crm.mangobox.ru: $pass";
    	mail($res[0],"Сброс пароля", $message);
 		echo 1;
    }
    
    if(!$x)
    {echo 2;}
?>
    
   
