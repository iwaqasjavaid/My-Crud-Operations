<?php
include 'Dal/dal.php';
$obj=new Haris();
$ck=1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prepare Statement Checking</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>

<div class="container">
	
<div class="row">
	
<div class="col-sm-4">

<?php  

if(isset($_REQUEST['idupd']))
{  // $i=$_REQUEST['idupd'];
 // $cr = $obj->viewSpecificData($i);

$ck=2;

?>

<?php
//echo "aho";
$con=$obj->MakeConnection();
//echo "aho g";
$sql="select * from prepareharis where id = ?";
//echo "1";
// preparing statement mysqli..
$rts=mysqli_prepare($con,$sql);

//echo "2";
   //bind variables to prepare statment as parameters..
  mysqli_stmt_bind_param($rts,'i',$id);

  //echo "3";
  $id=$_REQUEST['idupd'];
  //echo "4";
  //binding values to variables of database..
  mysqli_stmt_bind_result($rts,$cid,$in,$age);

  //echo "5";
   mysqli_stmt_execute($rts);
  // echo "6";
   mysqli_stmt_fetch($rts);
   //echo "7";
   mysqli_stmt_close($rts);

  //echo "8";

  }

 ?>
<form action="controller/controller.php" method="post">

<div class="form-group">
<input type="text" name="id" class="form-control" hidden="hidden" value="<?php if(isset($cid)) {  echo $cid;  } ?>">
</div>

<div class="form-group">
<label for="name">Name:</label>
<input type="text" name="name" class="form-control"  value="<?php if(isset($in)) {echo $in ;}  ?>">
</div>


<div class="form-group">
<label for="Age">Age:</label>
<input type="text" name="age" class="form-control" value="<?php if(isset($age)) { echo $age; }  ?>">
</div>
<?php
if($ck==1)
{ ?>
<button type="submit" name="insert" id="insert" class="btn btn-primary">Insert</button>

<?php }elseif($ck==2){ ?>

<button type="submit"  name="update" id="update"  class="btn btn-primary">Update</button>
<?php
       }?>
</form>
</div>


	
<div class="col-sm-6 offset-sm-2">
	<h1>Helloo</h1>
<?php         

  $res=$obj->show();
 
//bind result in variables..
mysqli_stmt_bind_result($res,$id,$name,$age);

//execute prepare satament..
mysqli_stmt_execute($res);


mysqli_stmt_store_result($res);

if(mysqli_stmt_num_rows($res)>0)

{


?>

 <div class="table-responsive">

  <table class="table table-hover">
  	<thead class="thead-dark">
  		<tr>
  			<th>ID</th>
  			<th>NAME</th>
  			<th>AGE</th>
  			<th colspan="2">ACTIONS</th>
  		</tr>
  	</thead>
  	<tbody>
<?php
//fetching data..
while(mysqli_stmt_fetch($res)){

//  echo $id . $name . $age;

?>

		<tr>
  			<td><?php echo $id;?></td>
  			<td><?php echo $name;?></td>
  			<td><?php echo $age;?></td>
  			
<td><a href="index.php?idupd=<?php echo $id;?>" role="button" class="btn btn-secondary">EDIT</a></td>
<td><a href="controller/controller.php?iddel=<?php echo $id;?>" role="button" class="btn btn-danger">DELETE</a></td>			
     </tr>

<?php

}

mysqli_stmt_close($res);


}else{

	echo "no result found";
}
?>
</tbody>
  
 </table>

</div>

</div>

</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</body>
</html>