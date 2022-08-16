<?php
//echo "Testing";
// include 'theme/header/index.php';
require 'theme/header/header_1.php';
require 'theme/content/content_1.php';
require 'theme/footer/footer_1.php';
require 'theme/head/head.php';
require 'theme/page/card.php';
// require '../../common/function.php';
// echo "<hr><br><h1><center>yes this's set--11..</center></h1><hr><br>";

$temp="
<head>
    $head
    <title>Best SEO Service</title>
    
  </head>
<body>
    <header>
    $header_4
    </header>
    <hr>
    

    $content_4
    $_card_page
    <footer>
    <center>
            <script async src='https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4118476003660792'
                 crossorigin='anonymous'></script>
            <!-- button-ads-square -->
            <ins class='adsbygoogle'
                 style='display:block'
                 data-ad-client='ca-pub-4118476003660792'
                 data-ad-slot='5529767858'
                 data-ad-format='auto'
                 data-full-width-responsive='true'></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </center>
            $footer_2
    </footer>
     </body>";



echo $temp;

?>