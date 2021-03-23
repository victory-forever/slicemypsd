<?php
header("Content-Type: text/html; charset=utf-8");
$email = htmlspecialchars($_POST["email"]);
$Name = htmlspecialchars($_POST["name"]);
$Message = htmlspecialchars($_POST["message"]);

$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y");  
$time=date("H:i");
$myemail = "xxx@gmail.com";

$tema = "New message";
$message_to_myemail = "
Hello!
<br>
You`ve got new message. 
<br>
Message details:<br>
Name: $Name<br>
E-mail: $email<br>
Message: $Message

From: $refferer
";
mail($myemail, $tema, $message_to_myemail, "From: SliceMyPsd <info@xxx.com> \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );
$tema = "We`ve received your message.";
$message_to_myemail = "

Hello, $Name!
<br>
Our manager will be in touch soonest.
<br>
Usually waiting time is 1 business day.
<br>
Thank you for using our service.
<br>
<br>
$refferer
";
$myemail = $email;
mail($myemail, $tema, $message_to_myemail, "From: SliceMyPsd <info@xxx.com> \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$email</td> <td>$Name</td> <td>$Message</td> <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>
