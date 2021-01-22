<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
  <title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!---fonts-->
  <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!---fonts-->
  <!--script-->
  <script src="js/modernizr.custom.97074.js"></script>
  <script src="js/jquery.chocolat.js"></script>
  <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
  <!--lightboxfiles-->
<!-- <script type="text/javascript">
  jQuery(function() {
  $('.team a').Chocolat();
  });
</script> 
--><script type="text/javascript" src="js/jquery.hoverdir.js"></script>  
<script type="text/javascript">
  $(function() {

    $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

  });
</script>           
<!--script-->
<style type="text/css">
  .showdata{
    margin-top: 10%;
    margin-left: 20%;
  }
  h4{
    font-weight: 900;
    line-height: 1.3;
  }
  h2{
    margin-left: 25%;
    font-weight: 800;
    text-decoration: underline;
  }
  #tax18, #other,#tamount{
    display: none;
  }
  #taxesshow{
    margin-left: 20%;
    margin-top: 10%;
  }
  #showmsg{
    background: #9ACD32;
    height: 50px;
    padding: 7px;
    font-size: 20px;
    margin-top: 3px;
    text-align: center;
    color: white;
    display: none;
  }
</style>
</head>
<body>
  <?php include 'header.php'; ?>
  <!---banner--->
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <form>
          <h2>Billing Address</h2><br>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="hname">House No</label>
            <input type="text" class="form-control" id="houseno" placeholder="Enter house number">
          </div>
          <div class="form-group">
            <label for="ciname">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter city">
          </div>
          <div class="form-group">
            <label for="sname">State</label>
            <select class="form-control" id="state">
              <option value="">Select State</option>
              <?php
              include_once 'Userclass.php';
              $user = new user();
              $data= $user->getState_name();
              print_r($data);
              unset($data[0]);
              foreach ($data as $key => $value) {
                echo "<option>".$value['name']."</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="cname">Country</label>
            <input type="text" class="form-control" value="India" readonly id="country" placeholder="Enter country name">
          </div>
          <div class="form-group">
            <label for="pname">Pincode</label>
            <input type="text" class="form-control" id="pincode" placeholder="Enter pincode">
          </div>
          <button type="submit" id="cod" class="btn btn-lg btn-danger">Cash on Delivery</button><br>
          <div class="text-success" id="showmsg"></div>
          
        </form><br><br>
      <div id="paypal-button"></div>
      </div>
      <div class="col-lg-5">
        <h2>Product Details</h2>
        <?php
        $total=0;
        if (isset($_SESSION['cartdata']) && count($_SESSION['cartdata'])>0) {
          $cartdata=$_SESSION['cartdata'];
          foreach ($cartdata as $key => $value1) {
            $total+=(int)$value1[3];
            
            ?>

            <div class="showdata" id="shdata">
              <h4>Product Id: <?php echo $value1[0]?></h4>
              <h4>Catagory Name: <?php echo $value1[1]?></h4>
              <h4>Product Name: <?php echo $value1[2]?></h4>
              <h4>Price/Plan Name:₹ <?php echo $value1[3]?></h4>
              <h4>Product Code: <?php echo $value1[4]?></h4>
              <h4>Quantity : <?php echo $value1[5]?></h4>
            </div>
            <?php
          }
        }
        else{}
        ?>
        <div id="taxesshow">
        <h4>Amount Before Tax: <?php echo $total; ?></h4>
        <h4 id="tax18">IGST Tax 18%:₹ <label id="taxdata"></label></h4>
        <div id="other">
          <h4>SGST Tax 9%:₹ <label id="taxsg"></label></h4>
          <h4>CGST Tax 9%:₹ <label id="taxcg"></label></h4>
          <h4>Total Tax:₹ <label id="ttax"></label></h4>
        </div>
        <h4 id="tamount">Total Amount After Tax:₹ <label id="totalam"></label></h4>
      </div>
      </div>
      <input type="text" name="amt" id="totalamn" style="display: none">
      <input type="text" name="amt" value="<?php echo $total ?>" id="totalamount" style="display: none">
    </div>
  </div>
  <br>
  <!---footer--->
  <?php include 'footer.php'; ?>
  <!---footer--->
  <script src="https://www.paypal.com/sdk/js?client-id=AfrTr4MKe026MriRDnj1DTpEgqleVXgT8kkuWMXe-tk9zgc8uDj-MRmU6W9MKOAu5hhcC4nNIUjSIi7J"></script>
</body>
<script type="text/javascript">
$(function(){
  
  var paypalarr='';

paypal.Buttons({
  createOrder: function(data, actions){
    var tamount = $("#totalamn").val();
    return actions.order.create({
      purchase_units:[{
        amount:{
          value:tamount
        }
      }]
    });

  },
  onApprove: function(data, actions){
    return actions.order.capture().then(function(details){
      alert("Payment Successfull");
      var data= details;
      var arr = Object.keys(data).map(function (key) { return data[key]; });
      console.log(data);
      paypalarr=arr;
      console.log(paypalarr[4]);
    })
  },
  onCancel: function(data)
  {
    console.log(data);
    alert("Payment Failed");
  }
}).render('#paypal-button');


  $("#cod").on("click", function(e)
  {
    e.preventDefault();
    var taxamount;
    var name = $("#name").val();
    var houseno = $("#houseno").val();
    var city = $("#city").val();
    var state = $("#state option:selected").val();
    var country = $("#country").val();
    var pincode = $("#pincode").val();
    var ttamount= $("#totalam").html();
    if($("#taxdata").html()!='')
    {
       taxamount= $("#taxdata").html();
    }
    else{
      taxamount= $("#ttax").html();
    }
    $.ajax({
      type: "POST",
      url: "usermediator.php",
      data:{action:"bill", name, houseno, city, state, country, pincode, taxamount, ttamount},
      success: function(data)
      {
        if (data==1) {
          $('#shdata').load(document.URL +  ' #shdata');
          $('#taxesshow').load(document.URL +  ' #taxesshow');
          $("#showmsg").show();
          $("#showmsg").text("Order success and Transaction Pending...");
        }
        else{
          $("#showmsg").text("Order error!");
        }
      }
    });
  });

  $('select').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var amount = $("#totalamount").val();
    $.ajax({
      type: "POST",
      url: "usermediator.php",
      data: {action: "changeselect",valueSelected},
      success: function(data)
      {
        if (data==0) {
          $("#tax18,#tamount").show();
          $("#other").hide();
          var taxamount= amount*0.18;
          $("#taxdata").html(parseFloat(taxamount));
          var totalam=parseFloat(amount)+parseFloat(taxamount);
         $("#totalam").html(totalam.toFixed(2));
         $("#totalamn").val(totalam.toFixed(2));
        }
        else{
          $("#tax18").hide();
          $("#other,#tamount").show();
          var cgst= amount*0.09;
          var sgst= amount*0.09;
          $("#taxcg").html(cgst);
          $("#taxsg").html(sgst);
          $("#ttax").html(parseFloat(cgst)+parseFloat(sgst));
          var tot=parseFloat(amount)+parseFloat(cgst)+parseFloat(sgst);
         $("#totalam").html(tot.toFixed(2));
         $("#totalamn").val(tot.toFixed(2));
        } 
      }
    });
  }); 
});
</script>
</html>