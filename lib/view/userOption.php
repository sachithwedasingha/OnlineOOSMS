<?php
//star the session
session_start();
//chek its logd in?
if(empty($_SESSION['user_id'])){
  header('location:login.php');
}
  
// else{print_r($_SESSION['user_id']);}


include_once('../layout/app.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>choose what do you want</title>
    <link rel="stylesheet" href="../../css/stepform.css"/>
    <script src="../../js/stepform.js" defer></script>
</head>

<body id="bodyUO">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-4 py-5 px-5">
        <div class="card shadow card border-info" id="cardCOP" name="01">
          <div>
            <img src="../../upload/ui/buy.jpeg"  class="img-fluid card-img-top">
          </div>
          <div class="card-body">
            <h3 class="card-title">Buy Our Product</h3>
            <h7>Buy all Interior Items whatever you want. Furniture, Electric Appliances, Garden Decorations</h7>
          </div>
        </div>
      </div>
  
      <div class="col-4 py-5 px-5">
       <div class="card shadow card border-info" id="cardCOP1">
          <div>
            <img src="../../upload/ui/service.jpg" alt="image2" class="img-fluid card-img-top">
          </div>
          <div class="card-body">
          <h3 class="card-title">Buy Our Services</h3>
          <h7>Curtaining, Wiring, Floorrings, Wallpapering, Garden lighting, Partitioning</h7>
          </div>
        </div>
      </div>
      <div class="col-4 py-5 px-5">
        <div class="card shadow card border-info" id="cardCOP2">
          <div>
            <img src="../../upload/ui/project.jpg" alt="image3" class="img-fluid card-img-top">
          </div>
          <div class="card-body">
          <h3 class="card-title">My Orders</h3>
          <h7>Make Your Dream Place with us, Designing, All Items selecting and Fixing</h7>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
  <script type="text/javascript">
    $(document).ready(function(){
    //Load Product Add Form to Storkeeper page
    $('#cardCOP').click(function(){
      window.location.href = '../../index.php#indexproducttitel';
    });
    $('#cardCOP1').click(function(){
      window.location.href = '../../index.php#indexproducttitel1';
    });
    $('#cardCOP2').click(function(){
      window.location.href = 'design.php';
    });
    });
  </script>
</html>