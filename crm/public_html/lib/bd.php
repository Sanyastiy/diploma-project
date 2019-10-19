
<?
$host = 'localhost'; // адрес сервера 
$database = 'cl53007_crm'; // имя базы данных
$user = 'cl53007_crm'; // имя пользователя
$password = 'krot33rus'; // пароль
$d = getdate();
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
?>
