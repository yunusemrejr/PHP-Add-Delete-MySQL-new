<!DOCTYPE HTML>
<html>
    <head>
        <title>Yunus's PHP C.R.U.D.</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">

</head>
<body>
    <?php require_once 'process.php';?>
    <?php

if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php


echo $_SESSION['message'];
unset($_SESSION['message']);

?>
 </div>
 <?php endif ?>
    <div class="container">

    <?php
         $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
         $result = $mysqli -> query("select * from data") or die($mysqli->error);
         ?>

         <div class="row justify-content-center">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Name</th>
                             <th>Location</th>
                                 <th colspan="2">Action</th>
</tr>
</thead>

<?php

while($row = $result -> fetch_assoc()): ?>

<tr>

<td> <?php echo $row['name'];  ?> </td>
<td> <?php echo $row['location'];  ?> </td>
<td>

 <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>

</td>
</tr>

<?php endwhile; ?>



</div>
         <?php function pre1($array){
             echo '<pre>';
             print_r($array);
             echo '</pre>';
         }
         ?>

    <div class="row justify-content-center">
<form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $name; ?>">
</div>
<div class="form-group">
    <label>Location</label>
    <input type="text" class="form-control" name="location" placeholder="Enter your location" value="<?php echo $location; ?>">
</div>
<div class="form-group">
    <?php
if($update==true):

?>
 <?php
else:
?>
    <div style="padding-left:5px;padding-top:30px;"><button type="submit" name="save" style="border:3px solid blue;" class="btn btn-primary">Add</button></div>
<?php

endif;

?>
    </div>
</form>
</div>
        </div>
</body>
</html>