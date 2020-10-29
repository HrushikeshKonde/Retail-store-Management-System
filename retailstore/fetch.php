<?php
	define('HOST','localhost');
	define('USERNAME', 'root');
	define('PASSWORD','');
	define('DB','rms');
	
	$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);
	
	$pid = $_GET['pid'];
	
	$sql = "SELECT ProdPrice from products where ProdId='$pid'";
	
	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($res)){
		array_push($result, 
				array('ProdPrice'=>$row[0]));
	}
	
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>