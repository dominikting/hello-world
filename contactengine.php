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

/*
$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 
*/

// validation
/*
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}
*/

// prepare email body text
/*
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: "; 
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";
*/

// form_fields = [ { "Name": "Value" } ];
$fields = [
  "Name"    => $Name,
  "Tel"     => $Tel,
  "Email"   => $Email,
  "Message" => $Message
];

// form_fields.forEach(function(item) {
//   for ( var key in item ) {
//     console.log( key + ": " + item[key] + "\n" );
//   }
// });
$Body = "";
foreach ($fields as $label => $input) {
  $Body .= "{$label}: {$input}\n";
}

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>