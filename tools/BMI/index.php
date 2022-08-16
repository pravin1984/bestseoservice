<?php
// include 'theme/header/index.php';
require '../../theme/header/header_1.php';
require '../../theme/content/content_1.php';
require '../../theme/footer/footer_1.php';
?>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <!-- CSS only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>  
    <title>bestseoservice.in</title>
</head>
<style>
    #boxi{
        display: none;
    }
</style>
<body>
    <header>
   <?php echo $header_3; ?>
    </header>
<hr>
<center>
    <h2 class="display-1">BMI Calculator</h2>
    <div class="container-fluid">
         <!-- <textarea id="autofill"></textarea><br><br> -->
         <div class="form-floating">
             <div class="input-group">
              <span class="input-group-text" >height(cm)</span>
              <input type="text" id="height" class="form-control" required>
              <span class="input-group-text">weight(kg)</span>
              <input type="text" id="weight" class="form-control" required>
            </div>
        </div><br>
    <button id="Check"  class="btn btn-primary" type="button" onclick="javascript:calbmi();">Check</button>
    <br>
    <div class="container-fluid" id="boxi">
        <hr>
    <h4 class="display-4">Your BMI is :<span id=box></span> </h4>
         <hr>
    </div>
    </div>
    </center>
    <hr>

    <footer>
   <?php echo $footer_1; ?>        
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="BMI.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js' integrity='sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2' crossorigin='anonymous'></script>
</body>



</html>