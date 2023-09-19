<?php
define("APP_USER", 'USER_REQ');
$INCLUDES_PATH =  '../';


require_once($INCLUDES_PATH.'/session/session_handler.php');

// Initiate session if a user doesn't have session yet
if(session_status() !== PHP_SESSION_ACTIVE){ 
    session_start();
    $_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
}

if ($_SESSION["REMOTE_ADDR"] != $_SERVER["REMOTE_ADDR"]){
    session_destroy();
    session_start();
    $_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];   
}


// Sanitize user input
foreach($_POST as $field_key => $field){
    $_POST[$field_key] = htmlspecialchars($field);
}

if(isset($_POST["login"])){
    $user = User::getInstance();
    $response = $user->verify_login($_POST["mail"], $_POST["password"]);

    if($response == 200){
        echo "aqwerty";
    }elseif($response == 401){
        echo "Unauthorized";
    }elseif($response == 404){
        echo "Not found";
    }
    
}


?>