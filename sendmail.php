<?php
   session_start();
   $_SESSION['id'];
   $_SESSION['username'];
   if(isset($_POST['send']))
   {
       $from = $_POST['mail_from'];
       $to=$_POST['mail_to'] ;
       $password=$_POST['pass'];
       $subject=$_POST['option'];
       $body = $_POST['body'];
       
   
       require 'PHPMailer/PHPMailerAutoload.php';
   
       $mail = new PHPMailer;
       
       $mail->SMTPDebug = 0;                               // Enable verbose debug output
       
       $mail->isSMTP();                                      // Set mailer to use SMTP
       $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
       $mail->SMTPAuth = true;                               // Enable SMTP authentication
       $mail->Username = $from;                 // SMTP username
       $mail->Password = $password;                           // SMTP password
       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
       $mail->Port = 587;                                    // TCP port to connect to
       
       $mail->setFrom($from, $_SESSION['username']);
       $mail->addAddress($to, 'Joe User');     // Add a recipient
   
       
      // Optional name
       $mail->isHTML(true);                                  // Set email format to HTML
       
       $mail->Subject = $subject;
       $mail->Body    = $body;
       $mail->AltBody = $body;
       
       if(!$mail->send()) {
           echo 'Something Went wrong';
          // echo 'Mailer Error: ' . $mail->ErrorInfo;
          
       } else {
           
       }
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="bootstrap/css/all.min.css" />
      <script type="text/javascript">
         function redirect(){
             window.location ="mail.php"
         }
      </script>
   </head>
   <body onLoad="setTimeout('redirect()',10000)">
      <div class="container">
         <h3><?php echo $_SESSION['id'] ?> </h3>
         <h3><?php echo $_SESSION['username'] ?> </h3>
      </div>
      <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/all.min.js"></script>
   </body>
</html>