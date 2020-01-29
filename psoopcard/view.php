<?php
include 'DAL/dal.php';
$obj = new Waqas();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<title></title>
		
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body class="bg-dark">

<?php

 if(isset($_REQUEST['value']))
{
 
 echo "<script> alert('Updated'); 
  location.replace('view.php');
 </script>";
 //header('location:index.php');
 }

?>



<?php

 if(isset($_REQUEST['del']))
{
 
 echo "<script> alert('Deleted'); 
  location.replace('view.php');
 </script>";
 //header('location:index.php');
 }

?>






<div class="container">
	
	<div>
		<form action="index.php">
<button type="submit" class="btn btn-info"> Insert Data </button>
</form>
</div>


<div class="col-m-8 m-auto p-2">
	
  <div class="card mt-4">

  <div class="card-header  text-center text-primary">Card Table</div>
  
  <div class="card-body">
   
<?php

$result=$obj->show();

// Bind result set in variables
$result->bind_result($id,$name,$age,$address);

//Execute prepare statement
$result->execute();

//store result
$result->store_result();

if($result->num_rows > 0)
{

?>
  <div class="table-responsive">
  	
  <table class="table table-hover table-bordered">
  	
  	<thead class="thead-dark">
  		<tr>
  			<th>ID</th>
  			<th>NAME</th>
  			<th>AGE</th>
  			<th>ADDRESS</th>
  			<th colspan="2" class="text-center">ACTIONS</th>
  		</tr>
  	</thead>
  	<tbody>
             <?php while($result->fetch()){?>
  		<tr>
  			<td><?php echo $id;      ?></td>
   			<td><?php echo $name;    ?></td>
  			<td><?php echo $age;     ?></td>
  			<td><?php echo $address; ?></td>
<td><a href="index.php?editid=<?php echo $id; ?>" role="button" class="btn btn-warning">EDIT</a></td>
<td><a href="controller/controller.php?deleteid=<?php echo $id; ?>" role="button" class="btn btn-danger">DELETE</a></td>			
     </tr>

  <?php } ?>
</tbody>
</table>

<?php

}else{

	echo "no result found";
}

$result->close();

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