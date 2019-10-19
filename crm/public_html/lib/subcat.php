<?
include ("bd.php");
$id = $_POST['id_cat'];

$result = mysqli_query($link,"SELECT * FROM Sub_category WHERE Category_ID=".$id);
$response = "";
while($mas = mysqli_fetch_array($result)){
	$response = $response."<option value='".$mas[0]."'>".$mas[2]."</option>";	
}	

echo "<option>Без подкатегории</option>".$response;
?>