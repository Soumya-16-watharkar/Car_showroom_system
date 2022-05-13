<?php
//error_reporting(0);
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

include('includes/dbconnection.php');


if(isset($_POST['send']))
  {
   
    $subject="welcome to showroom";
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $aadhar=$_POST['aadhar'];
    $bookingnumber = mt_rand(100000000, 999999999);
    $carid=$_GET['carid'];
    $query1=mysqli_query($con,"insert into  tblbooking(CardId,FullName,Email,MobileNumber,aadhar,BookingNumber) value('$carid','$fullname','$email','$mobilenumber','$aadhar','$bookingnumber')");
        //if ($query1) {
 //echo '<script>alert("Your booking successfully send We contact you Shortely. Your Booking number is "+"'.$bookingnumber.'")</script>';
//echo "<script>window.location.href='accessories-list.php'</script>";

  //}
  //else
    //{
      //$msg="Something Went Wrong. Please try again";
   // }

  

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'watharkarsoumya@gmail.com';                 // SMTP username
$mail->Password = '7387384759';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('watharkarsoumya@gmail.com', 'Mailer');
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('watharkarsoumya@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "welcome to car showroom";
$mail->Body    = '<div style="background-color:white;border-radius:10px;padding:10px;"><h1>"your booking is succeccefully send. Your Booking number is "+"'.$bookingnumber.'  Thank you for your Booking</h1>"</div>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

}
  ?>

<!DOCTYPE html>
<html lang="zxx">
 
<head>
     <title>Car Showroom Management System / Accessories detail </title>
      
      <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="assets/css/master.css">
     
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
  </head>
  <body class="page">
               
    <!-- Loader-->
      <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->

      
        <?php include_once('includes/header.php');?>
            <!-- end .header-->
        <div class="section-title-page area-bg area-bg_dark area-bg_op_60">
          <div class="area-bg__inner">
            <div class="container">
              <div class="row">
                <div class="col offset-lg-3">
                  <div class="b-title-page__wrap">
                    <h1 class="b-title-page">Accessories details</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car details</li>
                      </ol>
                      <!-- end breadcrumb-->
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end .b-title-page-->
  
            
                  <div class="l-main-content">
        <div class="container">
          <?php 

$carid=$_GET['carid'];
$query=mysqli_query($con,"select * from tblaccessories where ID='$carid'");
$num=mysqli_num_rows($query);
while ($row=mysqli_fetch_array($query)) {
?>
          <section class="b-goods-f">
              
              
              <div class="row">

              <div class="col-lg-8">
                <h1 class="ui-title text-uppercase"><?php echo $row['accname'];?></h1>
               
              </div>
              <div class="col-lg-4" style="font-weight:bold">
             <div><span class="b-goods-f__price-group"><span class="b-goods-f__price"><span class="b-goods-f__price_col">msrp:&nbsp;</span><span class="b-goods-f__price-numb">Rs.<?php echo $row['accprice'];?></span></span></span>
                     
                      </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8">
                
                <div class="b-goods-f__slider">
                  <div class="ui-slider-main js-slider-for">

                    <img class="img-scale" src="admin/images/<?php echo $row['CarImage'];?>"  />
                    <p style="margin-top:1%">
                    <img src="admin/images/<?php echo $row['CarImage1'];?>" width="360" style="border:solid #000 1px"/> &nbsp;&nbsp;
                    <img  src="admin/images/<?php echo $row['CarImage2'];?>" width="360"  style="border:solid #000 1px"/>  </p>
                    <p>
                    <img  src="admin/images/<?php echo $row['CarImage3'];?>" width="360" style="border:solid #000 1px" />&nbsp;&nbsp;
                    <img  src="admin/images/<?php echo $row['CarImage4'];?>"  width="360" style="border:solid #000 1px" /> </p>

			
                  </div>
         
                </div> 

		


                
                
             
               
                 
               
             
              
       
                </div>
              </div>
              <div class="col-lg-4">
                <aside class="l-sidebar">
                    
                    
   
                    <?php

                    
$ret=mysqli_query($con,"select * from tblpages where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>               
                  <?php }} ?>
                
                  
                  <div class="widget section-sidebar bg-gray widget-selecr-contact" style="margin-top:3%">
                      <h3 class="widget-title bg-dark"><i class="ic icon_mail_alt"></i>Buy Accessories</h3>
                    <div class="widget-content">
                      <div class="widget-inner">
                   <form  method="post">
                          <div class="form-group">
                            <input class="form-control" type="text" name="fullname" required="true" placeholder="Name"/>
                          </div>
                            <div class="form-group">
                            <input class="form-control" type="email" name="email" required="true" placeholder="Email"/>
                          </div>
                            <div class="form-group">
                            <input class="form-control" type="text" name="mobnum" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number" required="true"/>
                          </div>
			  <div class="form-group">
                            <input class="form-control" type="text" name="aadhar" maxlength="12" pattern="[0-9]+" placeholder="Aadhar Number" required="true"/>
                          </div>
                          <button class="btn btn-primary btn-lg w-100" name="send" type="submit">Send now</button>
			  </div>
                        </form>
                      </div>
                    </div>
                  </div>
             
                </aside>
              </div>
            </div>
          </section>
          <!-- end .b-goods-f-->
      
        </div>
      </div>
        
       
            
            
        
    <!-- end layout-theme-->
    
    
    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Select customization & Color scheme-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
  
    <!-- Pop-up window-->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Headers scripts-->
    <script src="assets/plugins/headers/slidebar.js"></script>
    <script src="assets/plugins/headers/header.js"></script>
    <!-- Mail scripts-->
    <script src="assets/plugins/jqBootstrapValidation.js"></script>

    <!-- Video player-->
    <script src="assets/plugins/flowplayer/flowplayer.min.js"></script>
    <!-- Filter and sorting images-->
    <script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.waypoints.min.js"></script>
    <!-- Animations-->
    <script src="assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Scale images-->
    <script src="assets/plugins/ofi.min.js"></script>
    <!-- Video player-->
    <script src="assets/plugins/flowplayer/flowplayer.min.js"></script>
    <!--Sliders-->
    <script src="assets/plugins/slick/slick.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>

  </body>

<!-- Mirrored from templines.rocks/html/revus/vehicle-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jun 2019 06:18:44 GMT -->
</html>