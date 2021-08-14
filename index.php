<?php

$insert=false;
if (isset($_POST['name'])) {

    // set  connection  variables
$_SERVER="localhost";
$username="root";
$password="";

// Create   a   database    connection
$con=mysqli_connect($_SERVER,$username,$password);

// Check    for connection  success
if(!$con){
    die("connection failed  due to".mysqli_connect_err());
}

// collect  post    connections
$name= $_POST['name'];
$gender=   $_POST['gender'];
$age=  $_POST['age'];
$email =$_POST['email'];
$phone= $_POST['phone'];
$desc= $_POST['desc'];

$sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP)";

// Execute  query
if($con->query($sql)==  true){
    $insert=true;
    
//      <script> 
//    alert ("INSERTED   SUCCESSFULLY");
//     </script>
    
}
else {
    echo  "Error:$sql<br>  $con->error";
}

// close    the database    connection
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bgimg.png" alt="NIT Hamirpur">
    <div class="container">
        <h2><i>Welcome to NIT Hamirpur US Trip Form</i></h2>
        <p><i>Enter your Details and Submit this form to confirm your participation in the trip</i></p>
        <?php
        if($insert==true){
       echo "<p class='submitMsg'>Thanks for submitting  your  form .</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name"   required>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Any other information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>

    <script src="index.js"></script>
   
</body>

</html>