<?php

if(!defined('APP_USER')) {
    http_response_code(404);
    die();
}

define("DB_ACCESS", 'USER_REQ');
$INCLUDES_PATH =  '../';
require_once($INCLUDES_PATH.'/database/database.php');

// Utilizing singleton design pattern
class User{


    private static $instances = [];

    public $first_name;
    public $last_name;
    public $phone_number;
    public $mail;
    public $addr_street;
    public $addr_city;
    public $addr_ZIP;
    public $addr_state;
    
    
    
    public static function getInstance()
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        
        return self::$instances[$cls];
    }
    
    public function verify_login($username, $password)
    {
        $status = Database::getInstance()->login_user($username, $password);
        return $status;
    }


    public function verify_address():boolval
    {
        if ($_SESSION["REMOTE_ADDR"] === $_SERVER["REMOTE_ADDR"]){
            return TRUE;
        }
        return FALSE;
    }
}    






?>