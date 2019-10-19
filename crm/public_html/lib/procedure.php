<?	

	function get_category($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT Name FROM Category WHERE ID=".$id);
		$count = mysqli_fetch_array($query);
		return $count[0];
	}
	
	function count_goods($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Goods WHERE Importer_ID=".$id);
		$count = mysqli_fetch_array($query);
		return $count[0];
	}
	
	function count_goodsgood($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Goods WHERE Importer_ID=".$id." AND status_id=2");
		$count = mysqli_fetch_array($query);
		return $count[0];
	}
	
	function count_goodsnotgood($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Goods WHERE Importer_ID=".$id." AND status_id=3");
		$count = mysqli_fetch_array($query);
		return $count[0];
	}
	
	function count_goodscheking($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Goods WHERE Importer_ID=".$id." AND status_id=1");
		$count = mysqli_fetch_array($query);
		return $count[0];
	}
	
	function count_orders($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Orders WHERE Importer_ID=".$id);
		$count = mysqli_fetch_array($query);
		return $count[0];
	}
	
	function sum_salary($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT SUM(Summ) FROM Orders WHERE Importer_ID=".$id." AND Status=4");
		$count = mysqli_fetch_array($query);
		return $count[23994];
	}
	
	function not_end($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Orders WHERE Importer_ID=".$id." AND Status<4");
		$count = mysqli_fetch_array($query);
		return $count[0];		
	}
	
	function canceled_goods($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Orders WHERE Importer_ID=".$id." AND Status=5");
		$count = mysqli_fetch_array($query);
		return $count[0];		
	}
	
	function pay_goods($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Orders WHERE Importer_ID=".$id." AND Status=3");
		$count = mysqli_fetch_array($query);
		return $count[0];		
	}
	
	function completed_order($id){
		include("bd.php");
		$query = mysqli_query($link, "SELECT COUNT(1) FROM Orders WHERE Importer_ID=".$id." AND Status=4");
		$count = mysqli_fetch_array($query);
		return $count[0];	
	}
	
	
?>