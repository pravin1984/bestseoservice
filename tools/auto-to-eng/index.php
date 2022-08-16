<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
// include 'theme/header/index.php';
// include 'tools/contentcreator/script.js';
include '../../common/function.php';
require '../../theme/header/header_1.php';
require '../../theme/content/content_1.php';
require '../../theme/footer/footer_1.php';
require '../../theme/head/head.php';

// Google reCAPTCHA API keys settings 
$secretKey  = '6LdMsVsgAAAAAJlkO-h5ktYevLiEWuAL2_c3Vw89'; 
// If the form is submitted 
$statusMsg = ''; 
$status = ''; 
$keyword = $_POST['keyword'];
if (isset($_POST['submit']) && $_POST['keyword'] == '') {
           $statusMsg = "Please enter keyword!!";
} else {
    
    if(isset($_POST['submit'])){ 
         // Validate reCAPTCHA checkbox 
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
 
            // Verify the reCAPTCHA API response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode JSON data of API response 
            $responseData = json_decode($verifyResponse); 
             
            // If the reCAPTCHA API response is valid 
            if($responseData->success){ 
                
                $status = 'success'; 
                //$statusMsg = 'Congralutions!You are not a Robot.'; 
            }
        } else { 
            $status = 'error';
            $statusMsg = 'Please check the CAPTCHA again to prove that you are not Robot!!';
        } 

}
    
}
if(!empty($statusMsg)){ ?>
 <center> <div class="alert alert-success <?php echo $status; ?>"><?php echo $statusMsg; ?></div></center>
<?php }

?>

<head>
    
    <?php echo $head;?>
    <title>Multilingual to English Translator</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    
  </head>
<body>
    <header>
   <?php echo $header_4; ?>
    </header>
    <hr>
    
    <center>
<h2 class="display-2">Multilingual to English Translator </h2>
<?php
    
    // print_r($_POST['keyword']);
    if (isset($_POST['submit']) && $status == 'success' )
    {
      $keyword = $_POST['keyword'];
    
      if (!empty($keyword))
      {
       // $apikey = 'AIzaSyBcnLQu3HZVbWMoKY21AzXbUJncCTXQ2bQ'; 
        
        $googleApiUrl = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=en&dt=t&q='.urlencode( $keyword) .'&format=html&dj=1&source=icon&tk=467103.467103';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    //curl_setopt($ch, CURLOPT_PROXYPORT,3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    $response = curl_exec($ch);
    $output = json_decode($response);

    $meaning = '';
    $auto_text_array = $output->sentences;
    
    if(count($auto_text_array)) {
        foreach($auto_text_array as $k=>$v ) {
            $meaning .= $v->orig."<br />";
            $meaning .= $v->trans."<br /><br />";
        }
    }
    echo ($v->trans);
       
        
        
    }
  }

?>

<div class="container-fluid">
    <form id="keywordForm" method="post" action="">
        <div class="input-row"><br><br>
             <!--<input class="form-control input-field" type="search" id="keyword" name="keyword" size="50" placeholder="Enter Your Keyword" >-->
             <textarea class="form-control " type="search" id="keyword" name="keyword" height="20px" placeholder="Enter Your Keyword"></textarea>
             
        </div>
        
        <br><div class="g-recaptcha" data-sitekey="6LdMsVsgAAAAAI6lz91yLXjYknU-wf5iw1iJAbvJ"></div><br>
        
        <input class="btn-info rounded submit" type="submit" name="submit"
            value="Translate">
            <button id="Refresh" class="btn-info rounded submit">Refresh</button>
    </form>
    <!--<span id="_spinner" style="display:none" class="w3-large">&nbsp;&nbsp;<i class="fa fa-spinner fa-spin text-dark"></i></span>-->
    <!--<a  class="chb p-1 h-f mb-1 float-center   pl-2 pr-2 " style='font-size:28px;'   title='Switch to English to Hindi Translator' href='https://bestseoservice.in/tools/english-to-hindi/index.php'>&#8645;</a>-->
  </div>
    
    <br>
    
        <script>
            function copyEvent(copy)
            {
                var str = document.getElementById(copy);
                window.getSelection().selectAllChildren(str);
                document.execCommand("Copy")
                 alert(" Content Copied !! " );
            }
            document.getElementById("Refresh").onclick = function (){
        location.reload();
        };
        </script>
        
    <div class='container'>
        <div class='row'>
        <div class='col'>
        <div class='card border-primary mb-3'>
          <div class='card-header text-primary'><h2>Multilingual To English Translator</h2></div>
          <div class='card-body text-primary' align ='left'>
            <p class='card-text'><li>Our free online translator offers quick and accurate translations right at your fingertips. </li> </p>
            <p class='card-text'><li>Simply type in the word or phrase that you want translated, and our Free Translation Tool will help you out.</li> </p>
            <p class='card-text'><li>Complimenting human translation services, this free tool is not only fast, but accurate.</li> </p>
            <p class='card-text'><li>This tool is based in your web browser, no software is installed on your device.</li> </p>
            <p class='card-text'><li>It's free, no registration is needed and there is no usage limit.</li> </p>
            <p class='card-text'><li>It is an online tool that works on any device that has a web browser including mobile phones, tablets and desktop computers.</li> </p>
            <p class='card-text'><li>The translation service uses the technology and dictionary of a high-quality translation supplier - "Google Translate".</li> </p>
          </div>
        </div>
        </div>
        </div>
    </div>
        
     <div class='container'>
        <div class='row'>
        <div class='col'>
        <div class='card border-primary mb-3'>
          <div class='card-header text-primary'><h2>How this Works ?</h2></div>
          <div class='card-body text-primary' align ='left'>  
          <p class='card-text'><li>Just open our website and click on the <b><u>"Multilingual To English Translator"</u></b> from <b>Tools</b> dropdown menu or from Home page. </li></p>
          <p class='card-text'><li>Now the translator webpage opens and you are ready to work with.</li></p>
          <p class='card-text'><li>Just type or paste your text in the box where<b><u>"Enter Your Keyword"</u></b> is written above and verify the <b>Captcha</b> and click on the <b><u>Translate</u></b> button given   below.</li></p>
          <p class='card-text'><li>The translator will immediately show your requested translation which you can then select, copy, and use for your needs.</li></p>
          <p class='card-text'><li>There are additional options of <b>Copy</b> and <b>Refresh</b> on the page.</li></p>
          <p class='card-text'><li>Use a Refresh button to clear the Text from translator box for Starting a new translator.</li></p>
          <p class='card-text'><li>To achieve the highest possible quality of translation, make sure that the text is grammatically correct.</li></p>
           </div>
        </div>
        </div>
        </div>
    </div>
    
    
        <footer>
        <?php echo $footer_2; ?>
    </footer>