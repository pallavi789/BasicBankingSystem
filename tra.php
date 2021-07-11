<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="bank";

$conn = mysqli_connect($servername, $username, $password,$database);
if($conn)
{
//echo  "CONNECTION WAS SUCCESSFULL";
}
else{
die("connection to this database failed due to " .mysqli_connect_error());
}


if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    
    $sql = "SELECT * FROM `user-details` WHERE id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * FROM `user-details` WHERE id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }

    else {
        
        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE `user-details` SET `balance`= $newbalance WHERE id=$from";
        mysqli_query($conn,$sql);

        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE `user-details` SET `balance`= $newbalance WHERE id=$to";
        mysqli_query($conn,$sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
             echo "<script> alert('Transaction Successful');
                             window.location='transactionhistory.php';
                   </script>";
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>


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
  <body style="background:#FFF4C9;">
  
  
  
  <?php
  include 'bank_navbar.php';
  ?>


<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="bank";

$conn = mysqli_connect($servername, $username, $password,$database);
if($conn)
{
//echo  "CONNECTION WAS SUCCESSFULL";
}
else{
die("connection to this database failed due to " .mysqli_connect_error());
}

if(isset($_GET['id']))
{
    $sid = $_GET['id'];
    $sql = "SELECT * FROM `user-details` WHERE  id = '$sid' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

?>
<form method="post" name="tcredit" class="tabletext" ><br>
 <div>
    <table class="table table-striped table-condensed table-bordered">
     <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Account No</th>
        <th class="text-center">Email</th>
        <th class="text-center">Balance</th>
    </tr>

   
   <?php
        if($num>0)
         {
            while($row = mysqli_fetch_array($result))
           {
                
    ?>  
    <tr>

                   <td><?php  echo $row['id']; ?></td>
                   <td><?php  echo $row['name']; ?></td>
                   <td><?php  echo $row['account_no']; ?></td>
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

    </table>
        </div>

        <?php
        
}
        ?>

<br>

<!--transfer_dropdown-->

<label>Transfer To:</label>
<select name="to" class="form-control" required> 
<option value="" disabled selected>Choose</option>  


<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database="bank";
 
 $conn = mysqli_connect($servername, $username, $password,$database);
 if($conn)
 {
 //echo  "CONNECTION WAS SUCCESSFULL";
 }
 else{
 die("connection to this database failed due to " .mysqli_connect_error());
 }



 if(isset($_GET['id']))
 {
 $sid=$_GET['id'];
 $sql = "SELECT * FROM `user-details` WHERE  id!= '$sid' ";
 $result=mysqli_query($conn,$sql);
 $num= mysqli_num_rows($result);
?>

<?php
if(!$result)
{
 echo "Error ".$sql."<br>".mysqli_error($conn);
 }
 }
while($rows = mysqli_fetch_assoc($result)) {
?>
<option class="table" value="<?php echo $rows['id'];?>" >
                
<?php echo $rows['name'] ;?> (Balance: 
<?php echo $rows['balance'] ;?> ) 
               
</option>

<?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn btn-success" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>