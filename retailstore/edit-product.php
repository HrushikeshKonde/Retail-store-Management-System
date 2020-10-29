<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$pid=$_GET['pid'];
	
$PrdId= $_POST['pid'];   
$PrdName=$_POST['fullanme'];
$PrdCat=$_POST['pcat'];
$PrdPrice=$_POST['price'];

$sql="UPDATE products SET ProdId= '$PrdId', ProdName='$PrdName' , ProdCat='$PrdCat' , ProdPrice='$PrdPrice' WHERE ProdId='$pid' ";

$query = $dbh->prepare($sql);
/*
$query->bindParam(':ProdId',$ProdId,PDO::PARAM_STR);
$query->bindParam(':PrdName',$PrdName,PDO::PARAM_STR);
$query->bindParam(':PrdCat',$PrdCat,PDO::PARAM_STR);
$query->bindParam(':PrdPrice',$PrdPrice,PDO::PARAM_STR);
$query-> bindParam(':pid',$pid, PDO::PARAM_STR); */
$query->execute();

$_SESSION['updatemsg']="Data updated successfully";
header('location:manage-products.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Retail Store Management System | Edit Products</title>
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
                <h4 class="header-line">Edit Product</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Product Info
</div>
 
<div class="panel-body">
<form role="form" method="post">
<?php 
$id=$_GET['pid'];
$sql="SELECT * from products where ProdId=:id";
$query=$dbh->prepare($sql);
$query-> bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               
  ?> 
<div class="form-group">

<label>Enter Product ID</label>
<input class="form-control" type="text" name="pid" value="<?php echo htmlentities($result->ProdId);?>" autocomplete="off" readonly required />
</div>

<div class="form-group">

<label>Enter Product Name</label>
<input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($result->ProdName);?>" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Product Category</label>
<input class="form-control" type="text" name="pcat" value="<?php echo htmlentities($result->ProdCat);?>" autocomplete="off" required />
</div>


<div class="form-group">
<label>Price</label>
<input class="form-control" type="text" name="price" maxlength="10" value="<?php echo htmlentities($result->ProdPrice);?>" autocomplete="off" required />
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
