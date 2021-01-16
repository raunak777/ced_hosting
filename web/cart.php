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
</head>
<body>
  <?php include 'header.php'; ?>
  <!---banner--->
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush" id="showcart">
              <thead class="thead-light">
                <tr>
                  <th>Product ID</th>
                  <th>Product Parent Name</th>
                  <th>Product Name</th>
                  <th>Monthly/Annual Price</th>
                  <th>SKU</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>


        </div>
      </div>
    </div>
    <div style="float: right; margin-top: 5%; margin-bottom: 5%">
      <button type="button" class="checkout btn btn-lg btn-danger">Checkout</button>
    </div>
  </div>

  <!---footer--->
  <?php include 'footer.php'; ?>
  <!---footer--->


</body>
<script type="text/javascript">
  $(function(){

    // $.ajax({
    //     type: "POST",
    //     url: "usermediator.php",
    //     data:{action: 'cartdata'},
    //     success: function(data)
    //     {
    //       console.log(data); 
    //     } 
    //   });

    var table=$("#showcart").DataTable({
      "ajax":{
        "url":"usermediator.php",
        "dataSrc":"data",
        "type":"POST",
        "data":{"action": 'cartdata'}
      },
      "columnDefs":[{
        "targets":-1,
        "data":null,
        "defaultContent":"<button class='btn btn-danger' id='del'><i class='fa fa-trash' aria-hidden='true'></i></button>"
      }]
    })

    $('#showcart tbody').on("click","#del", function(){
      if (confirm("Are you sure?")) {
        var data= table.row($(this).parents('tr')).data();
        var delid= data['6'];
        console.log(delid);
        $.ajax({
          type: "POST",
          url: "usermediator.php",
          data:{action: "delcart", delid},
          success: function(data){
          // console.log(data);
          location.reload();
        }
      });
      }
    });

    $(".checkout").on("click",function(){
      $.ajax({
        type: "POST",
        url: "usermediator.php",
        data:{action: 'checkout'},
        success: function(data)
        {
          console.log(data); 
          if (data==0) {
            location.replace("login.php");
          }
          else if(data==1)
          {
            alert("No item in cart");
          }
          else if(data==2)
          {
           location.replace("checkoutpage.php");
          }
        } 
      });
    })
  });
</script>
</html>