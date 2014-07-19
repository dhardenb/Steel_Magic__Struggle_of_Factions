<?php
session_start(); // this MUST be called prior to any output including whitespaces and line breaks!

$GLOBALS['ct_msg_subject'] = 'Securimage Test Contact Form';



?>

<html>
<body>

<?php
process_si_contact_form(); ?>


<table>
<tr>
<td>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']) ?>" id="contact_form">
  <input type="hidden" name="do" value="registerattempt" />
  
    <p>
    <?php
      // show captcha HTML using Securimage::getCaptchaHtml()
      require_once '/securimage.php';
      $securimage = new Securimage();

      $options = array();
      $options['input_name'] = 'ct_captcha'; // change name of input element for form post

      echo Securimage::getCaptchaHtml($options);
    ?>
  </p>

  <p>
    <br />
    <input type="submit" value="Submit" />
  </p>

</form>
</td>
<td valign=bottom>
<a href="/main_login.php">Return to Login Screen</a>
</td>
</tr>
</table



<?php

// The form processor PHP code
function process_si_contact_form()
{


  if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['do'] == 'registerattempt') {
  	// if the form has been submitted

   
    
    $captcha = @$_POST['ct_captcha']; // the user's entry for the captcha code
    
      require_once '/securimage.php';
      //require_once dirname(__FILE__) . '/securimage.php';
      $securimage = new Securimage();

      if ($securimage->check($captcha) == false) {
      echo "<br<br>Incorrect Value Entered";
        
      }
      else
      {
         header("location:/Register/register.php");
      }

    
  } // POST
} ?>

</body>
</html>
