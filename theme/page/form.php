
<?php

    if(isset($_POST["send"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        
        
        
        // Form validation
        if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
            // reCAPTCHA validation
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                // Google secret API
                $secretAPIkey = '6LeI70YhAAAAAHBbjnvd9HwTyzoXFxmE_6cD1snS';
                // reCAPTCHA response verification
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);
                // Decode JSON data
                $response = json_decode($verifyResponse);
                
                    if($response->success){
                        $toMail = "pravin1984@gmail.com";
                        //echo $toMail;
            
                        $header = "From: " . $name . "<". $email .">\r\n";
                        
                        
                        mail($toMail, $subject, $message, $header );
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Hi $name , thank you for the message. We will get back to you shortly."
                        );
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Robot verification failed, please try again."
                        );
                    }       
            } else{ 
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Plese check on the reCAPTCHA box."
                );
            } 
        }  else{ 
            $response = array(
                "status" => "alert-danger",
                "message" => "All the fields are required."
            );
        }
    }  
?>