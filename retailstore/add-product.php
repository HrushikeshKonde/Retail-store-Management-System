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

$PrdId= $_POST['pid'];   
$PrdName=$_POST['pname'];
$PrdCat=$_POST['pcat'];
$PrdPrice=$_POST['price'];
$SId=$_POST['sid']; 

$sql="INSERT INTO products(ProdId,ProdName,ProdCat,ProdPrice,StkId) VALUES(:PrdId,:PrdName,:PrdCat,:PrdPrice,:SId)";
$query = $dbh->prepare($sql);
$query->bindParam(':PrdId',$PrdId,PDO::PARAM_STR);
$query->bindParam(':PrdName',$PrdName,PDO::PARAM_STR);
$query->bindParam(':PrdCat',$PrdCat,PDO::PARAM_STR);
$query->bindParam(':PrdPrice',$PrdPrice,PDO::PARAM_STR);
$query->bindParam(':SId',$SId,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Product added successfully";
header('location:manage-products.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-products.php');
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
    <title>Retail Store Management System | Add Products</title>
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
                <h4 class="header-line">Add Product</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-14 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Product Info
</div>
<div class="panel-body">

<form role="form" method="post">

<div class="form-group">

<label>Enter Product ID</label>
<input class="form-control" type="text" name="pid" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Product Name</label>
<input class="form-control" type="text" name="pname" autocomplete="off" required />
</div>

<div class="form-group">
<label>Enter Product Category</label>
<input class="form-control" type="text" name="pcat" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Enter Product Price</label>
<input class="form-control" type="text" name="price" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Select Stock <span style="color:red;">*</span></label>
<select class="form-control" name="sid" required="required">
<option value=""> Select Stock</option>
<?php 

$sql = "SELECT * from  stocks ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->StkId);?>"><?php echo htmlentities($result->StkType);?></option>
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
