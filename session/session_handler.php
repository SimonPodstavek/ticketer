<?php

if(!defined('APP_USER')) {
    http_response_code(404);
    die();
}

class User{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $mail;
    public $addr_street;
    public $addr_ZIP;
    public $addr_state;

}


define("DB_ACCESS", 'USER_REQ');
$INCLUDES_PATH =  '../';
require_once($INCLUDES_PATH.'/database/database.php');




function verify_login($username, $password){
    operations->login_user($username, $password);
}

function verify_address():boolval{
    if ($_SESSION["REMOTE_ADDR"] === $_SERVER["REMOTE_ADDR"]){
        return TRUE;
    }
    return FALSE;
}


?>