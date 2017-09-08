<?php

//Using Procedural PHP 
require_once 'header.php';

//require 'vendor/PHPMailer-master/PHPMailerAutoload.php';
?>
<?php
$name = $_POST['name'];
$radioVal = $_POST["creature_type"];

$gmdate = gmdate("l F jS, Y");
$messageInfo = 'We are searching all around the Universe, so be pacient!';

function sanitize($str, $unwanted_char){
	$sanitized_str = strip_tags($str);
	$sanitized_str = preg_replace($unwanted_char, '', $str);		
	$sanitized_str = htmlentities($sanitized_str);
	
	return $sanitized_str;
}

if ($name){
    $manipulated_name = strtolower($name);
	$manipulated_name = ucwords($manipulated_name);
    //ERROR shows 2:Error: Bad character ><~ after <. Probable cause: Unescaped <. Try escaping it as &lt;.
    //left this character for sanitizing purposes
	$manipulated_name = sanitize($manipulated_name, '/([&*#)%(1234567890$*@_;?><~])/' );
	//process the informsation
	//echo "<p>{$manipulated_name}</p>";
	
}

if($radioVal == "alien")
{
	$creatureName = $manipulated_name."-zilu ";	
}
else if ($radioVal == "robot")
{
	$creatureName = $manipulated_name."-bot ";
}
?>



<h4>Step Two: Are You Ready?</h4>


<p>Thanks: <?php echo "{$manipulated_name}";?></p>
<p>Today is  <?php echo $gmdate; ?> and it's been a busy day. But don't worry!</p>
<p><?php echo "{$messageInfo}";?></p>
<p>When you are ready to see the results, <button type="submit" class="btn btn-success" value="like" name="button" id="button">click here!</button></p>

<?php
	
	if ($radioVal == "alien"){
	$alienBio = array('alien with six arms and two legs, and a long, thick tail. When it comes to Scaring, You are a natural!', 'alien with four arms and four legs. The ultimate free spirit. You are a mysterious alien with a questionable background.', 'purple one-eyed alien with five snakes for hair.', 'five-eyed alien with crab-like legs.');
	$alienLength = count($alienBio);
	$randomBio = $alienBio[rand(0, $alienLength - 1)];
	$img ="<img src='images/alien.png' width='158' height='228' alt='Alien'/>";
	//echo ($randomBio);	
	}
	else if ($radioVal == "robot"){
	$robotBio = array('a painting bot complete with a multi-color fibrous pigment distribution system for all of painting needs.', 'a robotic hairdresser, programmed to make small-talk while styling hair with cutting edge styling technology.', 'a light-bot that requires a 120 watt dual-setting halogen bulb, and boasts an anti-gravity magnetic airframe.', 'an accordion-necked vacuum-bot aboard the axiom. Programmed to clean and scrub, but prone to sneezing fits.');
	$robotLength = count($robotBio);
	$randomBio = $robotBio[rand(0, $robotLength - 1)];
	$img ="<img src='images/robot.png' width='189' height='183' alt='Robot' />";
	//echo ($randomBio);
	}
	
//Sending the mail with Creature description to email address
// Using PHP mailer for sending mail

//$message_body = "Message sent from: {$manipulated_name} 
//                Creature Type: {$creatureName}
//                Description:  {$randomBio}";
//$mail = new PHPMailerOAuth;
//$mail->setFrom('sender@email.com', 'Sender email address');
//$mail->addAddress('receiver@email.com', 'Receiver email address');
//$mail->Subject  = "Creature Generator Results for: {$manipulated_name}";
//$mail->Body     = "{$message_body}";
//
//if(!$mail->send()) {
//} else {
//    //header('Location: process-form.php');
//}
//   
?>
	<div id="bio" style="display:none"><?php echo ($creatureName); echo ($randomBio); echo "<div>{$img} </div>";?></div>
	<!--ERROR:end tag for element "DIV" which is not open, but it is open, no idea why it is bringing this error-->
</div>

<script src="js/jquery-1_4_2_min.js"></script>
<!--<script src="js/jquery.uniform.min.js"></script>-->
<script>
jQuery("select, input:checkbox, input:radio, input:file, input:text, input:submit, textarea").uniform();
</script>
<script>
$(document).ready(function(){
	
	$('#button').click(function(event){
		event.preventDefault();
		
		$('#bio').fadeIn(3000);	
		
		
	});	

});
		
</script>
</body>
</html>
