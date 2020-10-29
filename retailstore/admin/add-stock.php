<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
	
$StkId= $_POST['stkid'];   
$StkType=$_POST['stype'];
$StkQty=$_POST['qty'];
$SId=$_POST['sid']; 

$sql="INSERT INTO stocks(StkId,StkType,StkQty,SId) VALUES(:StkId,:StkType,:StkQty,:SId)";
$query = $dbh->prepare($sql);
$query->bindParam(':StkId',$StkId,PDO::PARAM_STR);
$query->bindParam(':StkType',$StkType,PDO::PARAM_STR);
$query->bindParam(':StkQty',$StkQty,PDO::PARAM_STR);
$query->bindParam(':SId',$SId,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Supplier added successfully";
header('location:manage-stocks.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-stocks.php');
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
    <title>Retail Store Management System | Add Stocks</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add stock</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-14 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Stock Info
</div>
<div class="panel-body">

<form role="form" method="post">

<div class="form-group">

<label>Enter Stock ID</label>
<input class="form-control" type="text" name="stkid" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Stock Type</label>
<input class="form-control" type="text" name="stype" autocomplete="off" required />
</div>

<div class="form-group">
<label>Enter Stock Quantity</label>
<input class="form-control" type="text" name="qty" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Select Supplier <span style="color:red;">*</span></label>
<select class="form-control" name="sid" required="required">
<option value=""> Select Supplier</option>
<?php 

$sql = "SELECT * from  suppliers ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->SId);?>"><?php echo htmlentities($result->SName);?></option>
 <?php }} ?> 
</select>
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
