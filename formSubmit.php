<?php

session_start();

print_r($_POST);

require("src/Townsend/Users/Contact.php");
require("src/Townsend/Security/CsrfGuard.php");
require("src/Townsend/Json/JsonMessage.php");
require("src/Townsend/Security/Validator.php");

use Townsend\Users\Contact;
use Townsend\Security\CsrfGuard;
use Townsend\Json\JsonMessage;
use Townsend\Security\Validator;

if (!CsrfGuard::isValidToken($_POST['CSRFGuard_name'],$_SESSION['token'])) die("Invalid token go away") ;


$failMessage= "";
$newsletter = 0;
if(isset($_POST['newsletter']) && $_POST['newsletter'] == 1) $newsletter = 1;

if (!Validator::isValidName($_POST['name'])) $failMessage = "Invalid name";
if (!Validator::isValidPhoneNumber($_POST['phone'])) $failMessage = "Invalid phone go away" ;
if (!Validator::isValidEmail($_POST['email'])) $failMessage = "Invalid email go away" ;
if (!Validator::isValidMessage($_POST['message'])) $failMessage = "Invalid message go away" ;

if($failMessage){
    die(JsonMessage::generateMessage(array("Success" => "false", "Message" => $failMessage)));
}

$contact = new Contact($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['message'], $newsletter, $_SERVER['REMOTE_ADDR']);

try {
    echo JsonMessage::generateMessage(array("Success" => "true", "Message" => $contact->save()));
    if($newsletter) $contact->notifyAdmin();
}catch(Exception $ex){
    echo JsonMessage::generateMessage(array("Success" => "false", "Message" => $ex->getMessage()));
}

