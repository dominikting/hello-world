<?php

$EmailFrom = "dominikting@gmail.com";
$EmailTo = "dt101677@gmail.com";
$Subject = "Nice & Simple Contact Form by CSS-Tricks";

// Setup
$form_fields = [
  "First Name", "Last Name", "Tel", "Email", "Message"
];

// Iteration to intialize
foreach ($form_fields as $field) {
  $$field = Trim( stripslashes( $_POST[$field] ) )
}

$fields = [
  "Name"    => $Name,
  "Tel"     => $Tel,
  "Email"   => $Email,
  "Message" => $Message
];

$Body = "";
foreach ($fields as $label => $input) {
  $Body .= "{$label}: {$input}\n";
}

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
} else {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>