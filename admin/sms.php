<?php
// Be sure to include the file you've just downloaded
include('dbcontroller.php');
require_once('AfricasTalkingGateway.php');
// Specify your authentication credentials
//$phone=$_POST['phone'];
//$mykey=$_POST['mykey'];
$username   = "mypcea";
$apikey     = "cd946feaee5d1e1da03c0e58bd3d9682227f93799007dbcbacad4dd0b9929fb8";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$id = $_POST["ID"];
$email=$_POST['email'];
$recipients = $_POST['phone'];
// And of course we want our recipients to know what we really do
$message    = "To activate your account, go to https://greensoftkenya.com/portal, Your activation key is  " .$_POST['mykey'];

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
/*************************************************************************************
  NOTE: If connecting to the sandbox:
  1. Use "sandbox" as the username
  2. Use the apiKey generated from your sandbox application
     https://account.africastalking.com/apps/sandbox/settings/key
  3. Add the "sandbox" flag to the constructor
  $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
**************************************************************************************/
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    //echo " Number: " .$result->number;
    //echo " Status: " .$result->status;
    //echo " MessageId: " .$result->messageId;
    //echo " Cost: "   .$result->cost."\n";
    $activation_success = "To activate your account, go to https://greensoftkenya.com/portal, Your activation key is  " .$_POST['mykey'];
    include('members.php');
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

