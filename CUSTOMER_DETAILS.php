<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <title>Credit-Wise</title>
  </head>
  
  <body style="background:#CAF7E3;">
    
 
    
    <?php 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "bank";
     
     //create a connection
     $conn = mysqli_connect($servername, $username, $password, $database);
     if(!$conn)
     {
         die ("SORRY WE ARE FAILED TO CONNECT: " . mysqli_connect_error());
     }
     else{
     //echo  "CONNECTION WAS SUCCESSFULL <br>";
     }

     $sql = "SELECT * FROM `user-details`";
     $result = mysqli_query($conn,$sql);
     ?>
     
     <?php
     include 'bank_navbar.php';
      ?>
    
    <div class="container">
      <h2 class="text-center pt-4">Transfer Money</h2>
      <br>
      <div class="row">
      <div class="col">
      <div class="table-responsive-sm">
      <table class="table table-hover table-sm table-striped table-condensed table-bordered">
      <thead>
      <tr>
      <th scope="col" class="text-center py-2">Id</th>
      <th scope="col" class="text-center py-2">Name</th>
      <th scope="col" class="text-center py-2">Account No</th>
      <th scope="col" class="text-center py-2">E-Mail</th>
      
      <th scope="col" class="text-center py-2">Operation</th>
      </tr>
      </thead>
      <tbody>

      <?php
      $num = mysqli_num_rows($result);
      //echo $num;
      //echo "<br>";
      if($num>0)
     {
     while($rows = mysqli_fetch_assoc($result))
     {
      ?>
      <tr>
      <td class="py-2"><?php echo $rows['id'] ?></td>
      <td class="py-2"><?php echo $rows['name']?></td>
      <td class="py-2"><?php echo $rows['account_no']?></td>
      <td class="py-2"><?php echo $rows['email']?></td>
      
      <td><a href="tra.php?id= <?php echo $rows['id'] ;?>"><button type="button" class="btn btn-lg btn-primary">View & Transact</button></a></td> 
      </tr>
      <?php
          }
        }
      ?>

    
    
    
    
    
    
    
    
    
    
    
    
    
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