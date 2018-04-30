<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$date_requested = $_POST['date'];
$time_requested = $_POST['time'];
$classwork_1yes2no = $_POST['gridradios'];
$message = $_POST['description'];

//Validate first
if(empty($name)||empty($visitor_email))
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'doakes@my.dom.edu';//<== update the email address
$email_subject = "New Appointment Request";
$email_body = "You have received a new request from the user $name.\n"
"Requester name: $name \n"
"Requester email: $visitor_email \n"
"Requested date: $date_requested \n"
"Requested time: $time_requested \n"
"Classwork 1 yes 2 no: $classwork_1yes2no \n"
"Description of requested print:\n $message".

$to = "doakes@my.dom.edu";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
