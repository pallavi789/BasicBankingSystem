<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Credit-Wise</title>
  </head>
  <body style="background:#FFCEAD;" >
    

    <!--navigation bar -->

    <?php
    include 'bank_navbar.php'
    ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $message = $_POST[ 'message' ];
   // echo"success";
//SUBMIT THESE TO DATABASE
//connecting to DATABASE

$servername = "localhost";
$username = "root";
$password = "";
$database = "contactus";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
    die ("SORRY WE ARE FAILED TO CONNECT: " . mysqli_connect_error());
}
else{
 // echo "success <br>";

  //insertion of data into table

$sql = "INSERT INTO `user-details` ( `name`, `email-id`, `message`)
 VALUES ('$name', '$email', '$message')";
$result = mysqli_query($conn, $sql);


//CHECK FOR TABLE CREATION
if($result)
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> SUCCESS </strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else{
    echo "The record has not inserted successfully because of this ---> <br>" . mysqli_error($conn);
}
}
}
?>



<!--FORM-->

<div class="container mt-3">
<h1 style="align='center'">PLEASE ENTER YOUR DETAILS </h1>

<form action="CONTACT_US.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAME: </label>
    <input type="text" name="name" class="form-control"  aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">EMAIL </label>
    <input type="text" name="email" class="form-control"  aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

