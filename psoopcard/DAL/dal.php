<?php

class Waqas{

public $hostname = "localhost";
public $root="root";
public $pswd="";
public $Dbn="haris";
public $con="";

public function MakeConnection()
{

    try {
        
       $this->con=new mysqli($this->hostname,$this->root,$this->pswd,$this->Dbn);
       // echo "Connected";
    }catch (mysqli_sql_exception $e)
    
    {
        echo "Not Connected"."<br>";
        $e->getMessage();
    }

  return $this->con;

  $this->con->mysql_close();

}



public function insert($name,$age,$address)

{
  // getting connection as always
 $con =$this->MakeConnection();

 // sql statementss
 $sql="insert into psoop(name,age,address) values(?,?,?)";

// preparestatemnt
 $result= $con->prepare($sql);

// bind variables to prepare satament as parameters
$result->bind_param('sis',$name,$age,$address);

// execute prepare statement
$ir= $result->execute();


// if checking number of rows affected the
//$result->affected_rows . "rows inserted";


return ir;

// close prepare statement
$result->close();

// close connection
$con->mysql_close();



}






 public function show()
 {

$con= $this->MakeConnection();

// Select ALL Data
$sql= "select * from psoop";

// Prepare Statement
$result= $con->prepare($sql);

// //3


// // Bind Result Set in Variables
// // ye data db sy aa raha hai aur just main bind mapping kr raha hun neechy walay variables k sath..

// $result->bind_result($id,$name,$age,$address)

// // Execute Prepare Statement
//  $result->execute();

// // fetching just single row if thenn

// $result->fetch();

// // to check id name age address

//  echo $id;
//  echo $name;
// echo $age;
// echo $address;

// // sara fetch karna hai to just do fetching in while loop

//  while($result->fetch())

// // same eco karo sari chezen to then ye sab fetch krr k show kr dy gaa janii;



// // lets suppose mjhy sirf kisi specific id ka data fetch krna hai to in that case mjy sara code same rehny dyna hai just aik param
// // bind krna paray ga jo k prepared statement k baad jahan main ny 3 likha hai wahan ye likhna jusneechy

// //$result->bind_param('i',$id);

// // aur $id k liye $id=1,1 ya jo mery paramets main aye gi value wo attch krni hai just..

// // we can check number of rows also but us k liye aap video no 82 dekh lyna waqas abi zarorat  nahe hai advance php


// // close prepare statment
// $result->close();

// // close connection
// $con->close();


return $result;


 }





public function Delete($id)
{

$con=$this->MakeConnection();

$sql="delete from psoop where id=?";

// preparestatemnt
 $result= $con->prepare($sql);

// bind variables to prepare satament as parameters
$result->bind_param('i',$id);

// execute prepare statement
$ir= $result->execute();


// if checking number of rows affected the
//$result->affected_rows . "rows inserted";

     return ir;

// close prepare statement
$result->close();

// close connection
$con->mysql_close();

}







public function update($id,$name,$age,$address)
{

$con=$this->MakeConnection();

$sql="update psoop set name=?,age=?, address=? where id=?";

 $result=$con->prepare($sql);

 $result->bind_param('sisi',$name,$age,$address,$id);

$ir=$result->execute();

return $ir;

$result->close();

$con->close($result);

}




























}

// $obj = new Waqas();
// $obj->MakeConnection();

?>