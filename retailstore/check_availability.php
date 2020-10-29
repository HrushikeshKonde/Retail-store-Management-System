<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT EmailId FROM employees WHERE EmailId=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}

 //code user id availablity
if(!empty($_POST["eid"])) {
	$eid= $_POST["eid"];
		$sql ="SELECT EmpId FROM employees WHERE EmpId=:eid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Employee ID already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Employee ID for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}



?>
