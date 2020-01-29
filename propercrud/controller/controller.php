<?php

include '../Dal/dal.php';

$obj = new Haris();

if(isset($_REQUEST['insert']))
{

    $name=$_REQUEST['name'];
    $age=$_REQUEST['age'];
   // $password=$_REQUEST['password'];

   $result=$obj->insert($name,$age);
  
   if($result)
   {

   //	echo "inserted successfully";

   header('location:../index.php');

   }else
   {

   echo "not inserted";   	
   }


}


if(isset($_REQUEST['iddel'])) {
	
  $id=$_REQUEST['iddel'];

 $result=$obj->Delete($id);

if($result){
header('location:../index.php');
}else{


	echo " not deleted";
}

}





if(isset($_REQUEST['update'])) {
	
  $id=$_REQUEST['id'];
  $name=$_REQUEST['name'];
  $age=$_REQUEST['age'];

$result=$obj->update($id,$name,$age);

if($result){
header('location:../index.php');
}else{

	echo " cannot update ";
}

}









?>