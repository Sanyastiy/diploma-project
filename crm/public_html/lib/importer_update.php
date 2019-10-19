<?php
session_start();
$fname = $_POST['fname'];
$ffam = $_POST['ffam'];
$femail = $_POST['femail'];
$fcity= $_POST['fcity'];
$fadress= $_POST['fadress'];
$fradius= $_POST['fradius'];
$fvk= $_POST['fvk'];
$ftelegram= $_POST['ftelegram'];
$finstagram= $_POST['finstagram'];

 $fpass=$_POST['fpass'];
 $fpassconf = $_POST['fpassconf'];
 
$fimpid=$_SESSION['ID_USER'];


$fname=stripslashes($fname);
$fname=htmlspecialchars($fname);
$fname=trim($fname);

$ffam=stripslashes($ffam);
$ffam=htmlspecialchars($ffam);
$ffam=trim($ffam);

$femail=stripslashes($femail);
$femail=htmlspecialchars($femail);
$femail=trim($femail);

$fcity=stripslashes($fcity);
$fcity=htmlspecialchars($fcity);
$fcity=trim($fcity);

$fadress=stripslashes($fadress);
$fadress=htmlspecialchars($fadress);
$fadress=trim($fadress);

$fradius=stripslashes($fradius);
$fradius=htmlspecialchars($fradius);
$fradius=trim($fradius);

$fvk=stripslashes($fvk);
$fvk=htmlspecialchars($fvk);
$fvk=trim($fvk);

$ftelefram=stripslashes($ftelefram);
$ftelefram=htmlspecialchars($ftelefram);
$ftelefram=trim($ftelefram);

$finstagram=stripslashes($finstagram);
$finstagram=htmlspecialchars($finstagram);
$finstagram=trim($finstagram);

$fpass=stripslashes($fpass);
$fpass=htmlspecialchars($fpass);
$fpass=trim($fpass);

$fpassconf=stripslashes($fpassconf);
$fpassconf=htmlspecialchars($fpassconf);
$fpassconf=trim($fpassconf);
    
 // подключаемся к базе
    include ("bd.php");
    $x=false;
    if(($fname!='')&&($fname!=$_SESSION['Name']))
    { 		
    	$result=mysqli_query($link, "UPDATE Importers SET First_name='$fname'WHERE ID='$fimpid'");
 		$_SESSION['Name']=$fname;
 		$x=true;
 		echo "Имя изменено <br>";
    }
    
    if(($ffam!='')&&($ffam!=$_SESSION['fam']))
    { 		
    	$result=mysqli_query($link, "UPDATE Importers SET Last_name='$ffam'WHERE ID='$fimpid'");
 		$_SESSION['fam']=$ffam;
 		$x=true;
 		echo "Фамилия изменена <br>";
    }
    
    
    if(($femail!='')&&($femail!=$_SESSION['email']))
    {    	
    	$result=mysqli_query($link, "UPDATE Importers SET Email='$femail' WHERE ID='$fimpid'");
		$_SESSION['email']=$femail;
		$x=true;
		echo "Почта изменена <br>";
    }
    
    
    if(($fcity!='')&&($fcity!=$_SESSION['city']))
    { 		
    	$result=mysqli_query($link, "UPDATE Importers SET Sity='$fcity'WHERE ID='$fimpid'");
 		$_SESSION['city']=$fcity;
 		$x=true;
 		echo "Город изменен <br>";
    }
    
    if(($fadress!='')&&($fadress!=$_SESSION['adress']))
    { 		
    	$result=mysqli_query($link, "UPDATE Importers SET Adres='$fadress'WHERE ID='$fimpid'");
 		$_SESSION['adress']=$fadress;
 		$x=true;
 		echo "Адрес изменен <br>";
    }
    
    
    if(($fradius!='')&&($fradius!=$_SESSION['radius']))
    {    	
    	$result=mysqli_query($link, "UPDATE Importers SET radius='$fradius' WHERE ID='$fimpid'");
		$_SESSION['radius']=$fradius;
		$x=true;
		echo "Радиус изменен <br>";
    }
    
    if(($fvk!='')&&($fvk!=$_SESSION['vk']))
    { 		
    	$result=mysqli_query($link, "UPDATE Importers SET Vk_url='$fvk'WHERE ID='$fimpid'");
 		$_SESSION['vk']=$fvk;
 		$x=true;
 		echo "Vk изменен <br>";
    }
    
    if(($ftelegram!='')&&($ftelegram!=$_SESSION['telega']))
    { 		
    	$result=mysqli_query($link, "UPDATE Importers SET Teleg_url='$ftelegram'WHERE ID='$fimpid'");
 		$_SESSION['telega']=$ftelegram;
 		$x=true;
 		echo "Telegram изменен <br>";
    }
    
    
    if(($finstagram!='')&&($finstagram!=$_SESSION['insta']))
    {    	
    	$result=mysqli_query($link, "UPDATE Importers SET Inst_url='$finstagram' WHERE ID='$fimpid'");
		$_SESSION['insta']=$finstagram;
		$x=true;
		echo "Instagram изменен <br>";
    }
    
    if(($fpass!='')&&($fpassconf!='')&&($fpass==$fpassconf))
    {
    	$result=mysqli_query($link, "UPDATE Importers SET Password='".md5($fpass)."'WHERE ID='$fimpid'");
 		$x=true;
 		echo "Пароль изменен <br>";
    }
    if(!$x)
    {echo "Измените данные, чтобы обновить их";}
    ?>
    
   
