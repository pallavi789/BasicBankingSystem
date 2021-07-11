<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    include 'bank_navbar.php';
    ?>

   <div class="container">
       <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> HOW TO FETCH DATA USING ID </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" name="get_id"  class="form-control" placeholder="enter-id" required>
                            </div>
                            <button type="submit" name="search_by_id" class="btn btn-primary">SEARCH 
                           </button>
                        </form>     
                    </div>
                </div>


                <?php

                   //connecting to database
                   
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
                   if(isset($_POST['search_by_id']))
                   {
                      $id = $_POST['get_id'];
                      $sql = "SELECT * FROM `user-details` WHERE id='$id' ";
                      $result = mysqli_query($conn,$sql); 
                      $num = mysqli_num_rows($result);
        
                   
                    ?>

            <div class="table-responsive">
            <table class="table table-bordered">
            <thead> </thead>
               <tr>
                  <th scope="col">S.NO</th>
                  <th scope="col">NAME</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">BALANCE</th>
                </tr>
            </thead>
            <tbody>
               
                <?php
                     if($num>0)
                     {
                      while($row = mysqli_fetch_array($result))
                      {
                
                ?>        
                <tr>
                   
                   <td><?php  echo $row['id']; ?></td>
                   <td><?php  echo $row['name']; ?></td>
                   <td><?php  echo $row['email'];?></td>
                   <td> <?php  echo $row['balance']; ?></td>
                </tr>
            <?php
                      }
                       }
                   else
                   {

                     ?>
                        <tr>
                           <td colspan="6">NO RECORD FOUND </td>
                         </tr>
                     <?php
                    }
            ?>
            </tbody>
           </table>
        </div>
         
        <?php
        
                }
        ?>

            </div> 
        </div>   
        </div>  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>