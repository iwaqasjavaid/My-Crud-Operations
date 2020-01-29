<?php

include '../DAL/dal.php';

$obj = new Waqas();


if(isset($_REQUEST['submit']))
{


$name=$_REQUEST['name'];
$age=$_REQUEST['age'];
$address=$_REQUEST['address'];


// echo $name;
// echo $age;
// echo $address;

$result=$obj->insert($name,$age,$address);

if($result){

	header('location:../index.php?value=add');
}else{

	echo "failed";
}


}




if (isset($_REQUEST['deleteid']))
 {
	
 $id = $_REQUEST['deleteid'];
 
  $result= $obj->Delete($id);


if($result){

	header('location:../view.php?del=value');
}else{

	echo "failed to delete";
}


}






if(isset($_REQUEST['cancel']))
{

	header('location:../index.php');
}






if(isset($_REQUEST['update'])) {
	
if(($_REQUEST['name']=="")  || ($_REQUEST['age']=="")  || ($_REQUEST['address']==""))
{
 
  echo "<small> Filll all the data</small>";

}else{
  $id=$_REQUEST['id'];
  $name=$_REQUEST['name'];
  $age=$_REQUEST['age'];
  $address=$_REQUEST['address'];

$mir=$obj->update($id,$name,$age,$address);

if($mir){
header('location:../view.php?value=update');
}else{

	echo " cannot update ";
}

}





}




?>