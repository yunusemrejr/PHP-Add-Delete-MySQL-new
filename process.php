<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
$update=false;
$id=0;
$name='';
$location='';
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    
    $mysqli->query("insert into data (name, location) values('$name','$location')") or 
    die($mysqli->error);

    $_SESSION['message']="User Information Saved!";
    $_SESSION['msg_type']="success";

    header("location:index.php");
}

if(isset($_GET['delete'])) {

   $id = $_GET['delete'];
   $mysqli -> query("delete from data where id=$id") or die($mysqli -> error());

   $_SESSION['message']="User Deleted!";
   $_SESSION['msg_type']="danger";
   header("location:index.php");

}

 
?>