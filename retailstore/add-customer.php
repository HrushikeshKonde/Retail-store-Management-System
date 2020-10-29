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
	
$CusId= $_POST['cid'];   
$name=$_POST['cname'];
$add=$_POST['cadd'];
$mobileno=$_POST['cno'];
$empid=$_POST['eid'];

$sql="INSERT INTO customers(CusId,CusName,CusAddress,CusPhoneNo,EmpId) VALUES(:CusId,:name,:add,:mobileno,:empid)";
$query = $dbh->prepare($sql);
$query->bindParam(':CusId',$CusId,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Customer added successfully";
header('location:manage-customers.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-customers.php');
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
    <title>Retail Store Management System | Add Customer</title>
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
                <h4 class="header-line">Add Customer</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-14 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Customer Info
</div>
<div class="panel-body">

<form role="form" method="post">

<div class="form-group">

<label>Enter Customer ID</label>
<input class="form-control" type="text" name="cid" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Customer Name</label>
<input class="form-control" type="text" name="cname" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Customer Address</label>
<input class="form-control" type="text" name="cadd" autocomplete="off" required />
</div>

<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="cno" maxlength="10" autocomplete="off" required />
</div>
                              

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
