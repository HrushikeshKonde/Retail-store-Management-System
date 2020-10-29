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
	
$SId= $_POST['sid'];   
$fname=$_POST['fullanme'];
$mobileno=$_POST['mobileno'];
$add=$_POST['address']; 
$ownerid=$_POST['oid'];
$sql="INSERT INTO suppliers(SId,SName,SAddress,SPhoneNO,OwnerId) VALUES(:SId,:fname,:add,:mobileno,:ownerid)";
$query = $dbh->prepare($sql);
$query->bindParam(':SId',$SId,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Supplier added successfully";
header('location:manage-suppliers.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-suppliers.php');
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
    <title>Retail Store Management System | Add Supplier</title>
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
                <h4 class="header-line">Add supplier</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-14 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Supplier Info
</div>
<div class="panel-body">

<form role="form" method="post">

<div class="form-group">

<label>Enter Supplier ID</label>
<input class="form-control" type="text" name="sid" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Supplier Name</label>
<input class="form-control" type="text" name="fullanme" autocomplete="off" required />
</div>

<div class="form-group">
<label>Enter Address</label>
<input class="form-control" type="text" name="address" id="emailid" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Phone Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
</div>
                                        

<?php 
$un=$_SESSION['alogin'];
$sql = "SELECT * from  owners where UserName=:un";
$query = $dbh -> prepare($sql);
$query -> bindParam(':un',$un, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<div class="form-group">
<label> Owner ID</label>
<input class="form-control" type="text" name="oid" value="<?php echo htmlentities($result->OwnerId);?>" autocomplete="off" readonly required />
</div>

 <?php }} ?> 



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
