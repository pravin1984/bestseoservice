<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
// include 'theme/header/index.php';
// include 'tools/contentcreator/script.js';
require '../../theme/header/header_1.php';
require '../../theme/content/content_1.php';
require '../../theme/footer/footer_1.php';
require '../../theme/head/head.php';
require '../../common/function.php';

?>

<html>
<head>
    <link rel = 'shortcut icon' type ='image/jpg' href = '/../images/claw-hammer-for-repair-work-universal-tool-vector-30521742.jpg' >
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta charset="utf-8">
    <title>Contact BestSeoService</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header>
       <?php echo $header_4; ?>
    </header>

  <div class="container mt-5">
    
    <h1><center>Contact Us!</center></h1>
    <?php include('form.php'); ?>
    <!-- Error messages -->
    <?php if(!empty($response)) {?>
    <div class="form-group col-12 text-center">
      <div class="alert text-center <?php echo $response['status']; ?>">
        <?php echo $response['message']; ?>
      </div>
    </div>
    <?php }?>
    <!-- Contact form -->
    <form action="" name="contactForm" id="contactForm" method="post" enctype="multipart/form-data" novalidate>
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name here..." required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email here..." required>
      </div>
      <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter your Subject here..." required>
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" rows="4" name="message" id="message" placeholder="Enter your Message here..."required></textarea>
      </div>
      <div class="form-group">
        <!-- Google reCAPTCHA block -->
        <div class="g-recaptcha" data-sitekey="6LeI70YhAAAAAAqJwrZQIWqhMLmXgjVWNdD8CIH9"></div>
      </div>
      <div class="form-group">
        <input type="submit" name="send" value="Send Message" class="btn btn-danger btn-block">        
      </div>
    </form>
  </div>
  <!-- Google reCaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html><br><br>
<hr>
<footer class="footer" role="copyright-info">
	<div class="footer_info">
    	<div class="wrapper"> <center> Copyright &copy; 2022 <a href="https://www.bestseoservice.in/">BestSEOService</a>. All rights reserved.</center>
        	        </div>
  	</div> 
<footer>
        <?php echo $footer_2; ?>
    </footer>