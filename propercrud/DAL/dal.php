<?php

class Haris{

public $hostname = "localhost";
public $root="root";
public $pswd="";
public $Dbn="haris";
public $con="";

public function MakeConnection()
{

    try {
        $this->con=mysqli_connect($this->hostname,$this->root,$this->pswd,$this->Dbn);
       // echo "Connected";
    }catch (mysqli_sql_exception $e)
    
    {
      //  echo "Not Connected";
        $e->getMessage();
    }

  return $this->con;

}


public function insert($pname,$page)
{
   
// getting Connection Variable..
$con =$this->MakeConnection();


// query with anonymous place holder ? ?..
$query="insert into prepareharis(name,age) values(?,?)";

// preparing statement mysqli..
 $result=mysqli_prepare($con,$query);


   // bind variables to prepare statment as parameters..
   mysqli_stmt_bind_param($result,'si',$pname,$page);


 //stmt execute returns true on success false of failure we check it on controller..
 $ir=mysqli_stmt_execute($result);


return $ir;

mysqli_stmt_close($result);

}


// getting all data

public function show()
{

  // getting connection for process
$con=$this->MakeConnection();


// sql query to get all data
$sql="select * from prepareharis";

//prepared statement
$result=mysqli_prepare($con,$sql);

// //bind result in variables..
// mysqli_stmt_bind_result($result,$id,$name,$age);

// //execute prepare satament..
// $myres=mysqli_stmt_execute($result);

// //fetching data..
// // mysqli_stmt_fetch($result);
 return $result;




}



public function Delete($id)
{

$con=$this->MakeConnection();

$sql="delete from prepareharis where id=?";


 // preparing statement mysqli..
 $result=mysqli_prepare($con,$sql);


  // bind variables to prepare statment as parameters..
  mysqli_stmt_bind_param($result,'i',$id);


 //stmt execute returns true on success false of failure we check it on controller..
 $ir=mysqli_stmt_execute($result);


return $ir;


// $res=mysqli_query($con,$query);

// return $res;

mysqli_stmt_close($result);
}






public function viewSpecificData($id)
{

 $con=$this->MakeConnection();

 $sql="select * from prepareharis where id = ?";



     // preparing statement mysqli..
 $result=mysqli_prepare($con,$sql);


    // bind variables to prepare statment as parameters..
  //mysqli_stmt_bind_param($result,'i',$id);


 //stmt execute returns true on success false of failure we check it on controller..
// $ir=mysqli_stmt_execute($result);


return $result;


//mysqli_stmt_close($result);


}





public function update($id,$name,$age)
{

$con=$this->MakeConnection();

$sql="update prepareharis set name=? , age=? where id=?";


 $result=mysqli_prepare($con,$sql);


 mysqli_stmt_bind_param($result,'sii',$name,$age,$id);

$ir=mysqli_stmt_execute($result);


return $ir;

mysqli_stmt_close($result);


// $res=mysqli_query($con,$sql);

// return $res;

}









}

?>