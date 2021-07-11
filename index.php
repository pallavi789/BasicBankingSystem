<html>
    <head>
        <meta charset="utf-8">
        <title> Credit-Wise </title>
        <link rel="stylesheet" href="index_css.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">

        <!--google-fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    </head>
    <body>
       <?php
       include 'bank_navbar.php';
       ?>
        <div class="main">
            
            <ul class="cards">
              <li class="cards_item">
                <div class="card">
                  <div class="card_image"><img src="images/user_details.png"></div>
                  <div class="card_content">
                    <h2 class="card_title">Customer Details</h2>
                    <p class="card_text"></p>
                    <a href="CUSTOMER_DETAILS.php"><button class="btn card_btn">Explore</button></a>
                  </div>
                </div>
              </li>
              <li class="cards_item">
                <div class="card">
                  <div class="card_image"><img src="images/money_transfer.png"></div>
                  <div class="card_content">
                    <h2 class="card_title">Transfer Money </h2>
                    <p class="card_text"></p>
                    <a href="CUSTOMER_DETAILS.php"><button class="btn card_btn">Explore</button> </a>
                  </div>
                </div>
              </li>
              <li class="cards_item">
                <div class="card">
                  <div class="card_image"><img src="images/calender-2389150_1280.png"></div>
                  <div class="card_content">
                    <h2 class="card_title">Transaction History </h2>
                    <p class="card_text"></p>
                    <a href="transactionhistory.php"><button class="btn card_btn">Explore</button> </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>




          <section class="course">
            <div class="row">
                <div class="course-col">
                   <a href="SEARCH_BAR.php"> <h2>Search User By Their ID:</h2> </a>
                    <p></p>
                </div>
            </div>
            </section>  


            <footer class="page-footer font-small unique-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    
    <li class="list-inline-item">
      <a href="About_me.php"><button type="button" class="btn btn-info">ABOUT Me</button></a>
    </li>
  </ul>
  <!-- Call to action -->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2021 Made By:PALLAVI PAYAL <br>
For The Sparks Foundation Project
  
</div>
<!-- Copyright -->

</footer>
         

    </body>
</html>