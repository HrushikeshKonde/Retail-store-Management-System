<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$stkid=$_GET['stkid'];
	
$StockId= $_POST['skid'];   
$StockType=$_POST['stktype'];
$StockQty=$_POST['qty'];
$SId=$_POST['spid']; 

$sql="UPDATE stocks SET StkId=:StockId , StkType=:StockType , StkQty=:StockQty , SId=:SId WHERE StkId=:stkid";

$query = $dbh->prepare($sql);
$query->bindParam(':StockId',$StockId,PDO::PARAM_STR);
$query->bindParam(':StockType',$StockType,PDO::PARAM_STR);
$query->bindParam(':StockQty',$StockQty,PDO::PARAM_STR);
$query->bindParam(':SId',$SId,PDO::PARAM_STR);
$query->bindParam(':stkid',$stkid,PDO::PARAM_STR);

$query->execute();

$_SESSION['updatemsg']="Data updated successfully";
header('location:manage-stocks.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Retail Store Management System | Edit Stocks</title>
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
                <h4 class="header-line">Edit stock</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Stock Info
</div>
 
<div class="panel-body">
<form role="form" method="post">
<?php 
$stkid=$_GET['stkid'];
$sql="SELECT stocks.StkId,stocks.StkType,stocks.StkQty,stocks.SId,suppliers.SName,stocks.AddDate,stocks.UpdationDate from stocks,suppliers where stocks.SId=suppliers.SId AND StkId=:stkid";
$query=$dbh->prepare($sql);
$query-> bindParam(':stkid',$stkid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               
  ?> 
<div class="form-group">

<label>Enter Stock ID</label>
<input class="form-control" type="text" name="skid" value="<?php echo htmlentities($result->StkId);?>" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Stock Type</label>
<input class="form-control" type="text" name="stktype" value="<?php echo htmlentities($result->StkType);?>" autocomplete="off" required />
</div>


<div class="form-group">
<label>Enter Stock Quantity</label>
<input class="form-control" type="text" name="qty" maxlength="10" value="<?php echo htmlentities($result->StkQty);?>" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label> Select Supplier<span style="color:red;">*</span></label>
<select class="form-control" name="spid" required="required">
<option value="<?php echo htmlentities($result->SId);?>"> <?php echo htmlentities($spname=$result->SName);?></option>
<?php 
$status=1;
$sql1 = "SELECT * from  suppliers";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$resultss=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($resultss as $row)
{           
if($spname==$row->SName)
{
continue;
}
else
{
    ?>  
<option value="<?php echo htmlentities($row->SId);?>"><?php echo htmlentities($row->SName);?></option>
 <?php }}} ?> 
</select>
</div>

										
<?php }} ?>




<button type="submit" name="update" class="btn btn-info">Update </button>

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
