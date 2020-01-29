<?php
 $hostname = "localhost";
 $root="root";
 $pswd="";
 $Dbn="haris";
 $con="";

 $con=mysqli_connect($hostname,$root,$pswd,$Dbn);
       // echo "Connected";

if($con){

	echo "connecteddd";
}else
{
	echo "errrrrr";
}


// sql query to get all data
$sql="select * from prepareharis";

//prepared statement
$result=mysqli_prepare($con,$sql);

//bind result in variables..
mysqli_stmt_bind_result($result,$id,$name,$age);

//execute prepare satament..
mysqli_stmt_execute($result);

//fetching data..
mysqli_stmt_fetch($result);

echo $id;



?>