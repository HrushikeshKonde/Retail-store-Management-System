<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
	$quantity="";
	$stkid="";
	$rs=1;
	$prd="";
	$pids="";
	$amt=0;
	$CusId =$_POST['cid'];
	$EmpId =$_POST['eid'];
	$a=count($_POST["pid"]);
	for($count = 0; $count < count($_POST["pid"]); $count++)
 {  	
	$prd=$_POST["pid"][$count];
	$q=$_POST["qty"][$count];

	$pids= $prd." , ".$pids;
	$sql1="SELECT products.ProdPrice,stocks.StkQty,stocks.StkId,products.ProdId from products,stocks where stocks.StkQty>='$q' AND products.ProdId='$prd' AND products.StkId=stocks.StkId";
	$query1 = $dbh->prepare($sql1);
	//$query1->bindParam(':prd',$_POST["pid"][$count],PDO::PARAM_STR);
	//$query1->bindParam(':q',$_POST["qty"][$count],PDO::PARAM_STR);
	$query1->execute();

	$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt1=1;
if($query1->rowCount() > 0)
{
	foreach($results1 as $result1){          
	
	$rs=$result1->ProdPrice;
	$qt=$result1->StkQty;	
	$stid=$result1->StkId;	
		
	if($qt < $_POST["qty"][$count])
	{
		$flag=0;
		$_SESSION['error']="Insufficient Quantity";
		goto error;
		}
	else
	{
	$amt=$rs*$q;
	$tamt=$tamt+$amt;
	$quantity= $qt - $_POST["qty"][$count];
	$stkid= $stid;

	$sql2="UPDATE stocks SET StkQty='$quantity' WHERE StkId='$stkid'";

	$query2 = $dbh->prepare($sql2);
	$query2->execute();

	$flag=1;
	}
	}
	
}
}
if($flag == 1)
{
$sql="INSERT INTO buys(CusId,BillAmount,ProdId,EmpId) VALUES(:CusId,:tamt,:pids,:empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':CusId',$CusId,PDO::PARAM_STR);
$query->bindParam(':tamt',$tamt,PDO::PARAM_STR);
$query->bindParam(':pids',$pids,PDO::PARAM_STR);
$query->bindParam(':empid',$EmpId,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
$_SESSION['msg']="$a";
header('location:manage-orders.php');
}
else 
{
$_SESSION['error']="$amt";
error:
header('location:manage-orders.php');
}


}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Retail Store Management System | Create Order</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>


<script>
$(document).ready(function(){
 $(document).on('click', '.add', function(){
 
 var html = '';
  html += '<tr>'
  html += '<td><div class="form-group"><div><select class="form-control" name="pid[]" required="required"><option value=""> Select Product</option><?php $sql = "SELECT * from  products ";$query = $dbh -> prepare($sql);$query->execute();$results=$query->fetchAll(PDO::FETCH_OBJ);$cnt=1;if($query->rowCount() > 0){foreach($results as $result){               ?>  <option value="<?php echo htmlentities($result->ProdId);?>"><?php echo htmlentities($result->ProdName);?></option> <?php }} ?> </select></div></div></td>';
  html += '<td><div class="form-group"><div><select class="form-control" name="qty[]" required="required"><option value=""> Select Quantity</option><?php for ($x = 1; $x <= 10; $x++) {?><option value="<?php echo htmlentities($x);?>"><?php echo htmlentities($x);?></option> <?php } ?> </select> </div> </div></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
  
  
  $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 

  });

 </script>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Create Order</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-14 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Order Details
</div>
<div class="panel-body">

<form role="form" method="post">

<div class="form-group">
<label>Select Customer <span style="color:red;">*</span></label>
<select class="form-control" name="cid" required="required">
<option value=""> Select Customer</option>
<?php 

$sql = "SELECT * from  customers ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->CusId);?>"><?php echo htmlentities($result->CusName);?></option>
 <?php }} ?> 
</select>
</div>

 <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Select Product Name</th>
       <th>Select Quantity</th>

		
	<th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
		<tr>
			<td><div class="form-group"><div><select class="form-control" name="pid[]" required="required"><option value=""> Select Product</option><?php $sql = "SELECT * from  products ";$query = $dbh -> prepare($sql);$query->execute();$results=$query->fetchAll(PDO::FETCH_OBJ);$cnt=1;if($query->rowCount() > 0){foreach($results as $result){               ?>  <option value="<?php echo htmlentities($result->ProdId);?>"><?php echo htmlentities($result->ProdName);?></option> <?php }} ?> </select></div></div></td>
			<td><div class="form-group"><div><select class="form-control" name="qty[]" required="required"><option value=""> Select Quantity</option><?php for ($x = 1; $x <= 10; $x++) {?><option value="<?php echo htmlentities($x);?>"><?php echo htmlentities($x);?></option> <?php } ?> </select> </div> </div></td>
		</tr>
 	  

     </table>

 <?php 
$un=$_SESSION['login'];        ?>  
<div class="form-group">
<label> Employee ID</label>
<input class="form-control" type="text" name="eid" value="<?php echo htmlentities($un);?>" autocomplete="off" readonly required />
</div>
 
<button type="submit" name="create" class="btn btn-info" >Create </button>
                                    </form>
</div>                           
						   </div>
                        </div>
                            </div>

        </div>
   
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

