<?php
        $captcha;
        $field_name = $_POST['first_name'];
        $field_email = $_POST['email'];
        $field_message = $_POST['comment'];
        

        if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfC-wkUAAAAACxi4V0egVD1CG2xsx6CtLrHV7rS&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        { ?>
            <script language="javascript" type="text/javascript">
               alert('Verification failed. Please try again');
              window.location = 'index.html';
           </script>  
           <?php    
        }
        else
        {
          $mail_to = 'thokozani@thegrateapp.com';
          $subject = 'Message from a site visitor '.$field_name;

          $body_message = 'From: '.$field_name."\n";
              $body_message = 'From: '.$field_lname."\n";
            
          $body_message .= 'E-mail: '.$field_email."\n";
          $body_message .= 'Message: '.$field_message."\n";
          

          $headers = 'From: '.$field_email."\r\n";
          $headers .= 'Reply-To: '.$field_email."\r\n";

          $mail_status = mail($mail_to, $subject, $body_message, $headers);

          if ($mail_status['success'] == false) 
                { ?>
                      <script language="javascript" type="text/javascript">
                      alert('Thank you for contacting us, we shall revert back to you shortly');
                       window.location = 'index.html';
                       </script>
                    <?php
                }
          else
            { ?>
            <script language="javascript" type="text/javascript">
              alert('Message failed. Please try again');
              window.location = 'index.html';
            </script>
          <?php
          }
      }

?>