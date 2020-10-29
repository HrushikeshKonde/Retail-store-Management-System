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
	
$EmployeeId= $_POST['eid'];   
$fname=$_POST['fullanme'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email']; 
$password=$_POST['password']; 
$cnf=$_POST['confirmpassword'];
$ownerid=$_POST['oid'];
if($password != $cnf)
{
	echo "<script>alert('Password Not Matched');</script>";
}
else{	
$sql="INSERT INTO employees(EmpId,EmpName,EmailId,MobileNumber,OwnerId,Password) VALUES(:EmployeeId,:fname,:email,:mobileno,:ownerid,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':EmployeeId',$EmployeeId,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Employee added successfully";
header('location:manage-employees.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-employees.php');
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
    <title>Retail Store Management System | Add Employee</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>    

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add employee</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-14 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Employee Info
</div>
<div class="panel-body">

<form role="form" method="post">

<div class="form-group">

<label>Enter Employee ID</label>
<input class="form-control" type="text" name="eid" autocomplete="off" required />
</div>

<div class="form-group">

<label>Enter Full Name</label>
<input class="form-control" type="text" name="fullanme" autocomplete="off" required />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>

<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
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
