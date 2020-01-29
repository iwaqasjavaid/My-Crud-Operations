<?php
include 'DAL/dal.php';
$obj = new Waqas();
$ck=1;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crud with OOP and Bootstrap Card</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>
<div class="container">
<div class="row">
	<div>
		<form action="view.php">
<button type="submit" class="btn btn-info"> View Data </button>
</form>
</div>

 <div class="col-lg-6 m-auto p-2">
	
  <div class="card mt-5">
  <div class="card-header bg-dark text-center text-primary">Crud Operations Using OOP
<?php

 if(isset($_REQUEST['value']))
{
 
 echo "<script> alert('success'); 
  location.replace('view.php');
 </script>";
 //header('location:index.php');
 }

?>

  </div>
  
  <div class="card-body bg-info">
   
   <form action="controller/controller.php" method="POST">
  		  	
<?php
if (isset($_REQUEST['editid']))
 {
   
   $con = $obj->MakeConnection();

// if($con){

// 	echo "<script>alert('created'); </script>";
// }else{


// 	echo "<script>alert('failed'); </script>";
// }

	//select with where clause
   $sql = "select * from psoop where id= ?";


  // prepare statement
  $result= $con->prepare($sql);

   //bind parameter
  $result->bind_param('i',$id);
 
 //id coming from view.php
  $id= $_REQUEST['editid'];

//bind result set in variables
$result->bind_result($i,$n,$a,$d);

//execute stataement
$result->execute();

//fetch single row
$result->fetch();

//close prepared statement
$result->close();

// echo "id is ". $i;
// echo "name is ".$n;
$ck=2;

}

?>

<div class="form-group">
<input type="text" name="id" hidden="hidden" value="<?php if(isset($i)) {  echo $i; } ?>" >
</div>


 <div class="form-group">
<label for="Name">NAME:</label>
<input type="text" name="name"  value="<?php if(isset($n)){echo $n;}?>" class="form-control" placeholder="type name" required>
</div>
  
<div class="form-group">
<label for="Age">AGE:</label>
<input type="text" name="age" placeholder="Type Age" value="<?php if(isset($a)){echo $a;}?>" class="form-control" placeholder="type name" required>
</div>
  
<div class="form-group">
<label for="Address">ADDRESS:</label>
<input type="text" name="address" value="<?php if(isset($d)){echo $d;}?>" class="form-control" placeholder="Type Address"  required>
</div>
</div>

<hr>

  <div class="card-footer bg-light">
<?php
if ($ck==1){
?>
 <button type="submit" name="submit" class="btn btn-outline-primary float-right">Insert</button>
<?php }elseif($ck==2){ ?>
 <button type="submit" name="update" class="btn btn-outline-primary float-right offset-1">Update</button></form>
  <form action="controller/controller.php"><button type="submit" name="cancel" class="btn btn-outline-danger float-right offset-1">Cancel</button></form> 
<?php
} 
?>





  </div>


</div>

</div>


</div>

</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</body>
</html>