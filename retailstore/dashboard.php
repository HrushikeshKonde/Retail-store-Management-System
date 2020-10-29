<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Retail Store Management System | Employee Dash Board</title>
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
                <h4 class="header-line">EMPLOYEE DASHBOARD</h4>
                
                            </div>

        </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-database fa-5x"></i>
<?php 
$sql2 ="SELECT id from stocks ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$liststk=$query2->rowCount();
?>

                            <h3><?php echo htmlentities($liststk);?></h3>
                           Stocks Available 
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
                            <?php 
$sql3 ="SELECT id from products ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$listprd=$query3->rowCount();
?>
                            <h3><?php echo htmlentities($listprd);?></h3>
                           No of Products
                        </div>
                    </div>

        


 <div class="row">

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
<?php 
$eid=$_SESSION['login'];
$sql4 ="SELECT id from customers where EmpId=:eid";
$query4 = $dbh -> prepare($sql4);
$query4-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$listcus=$query4->rowCount();
?>


                            <h3><?php echo htmlentities($listcus);?></h3>
                      No of Customers
                        </div>
                    </div>

            
                 <div class="col-md-3 col-sm-3 rscol-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-shopping-cart fa-5x"></i>
<?php 
$eid=$_SESSION['login'];
$sql5 ="SELECT id from Buys where EmpId=:eid";
$query5 = $dbh -> prepare($sql5);
$query5-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$listodr=$query5->rowCount();
?>

                            <h3><?php echo htmlentities($listodr);?> </h3>
                           Orders Completed
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
