<?php
if(!defined('DB_ACCESS')) {
    http_response_code(404);
    die();
}
$INCLUDES_PATH =  '../';
require_once($INCLUDES_PATH.'/session/session_handler.php');

class database{
    public $conn;

    public function create_db_session(){
        $servername = 'localhost';
        $username = 'read';
        $dbname = 'ticketer';
        $password = getenv('ticketer_db_password');

        $connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($connection->connect_error) 
        {
            return 400;
        }

        $this->$conn = $conn;
        return 200;
    }
}

class operations{
    public function __construct() {
        $this->database = new database();
    }

    function login_user($username, $password){
        if ($database->create_db_session() !== 200) {
            return 400;
        }
        echo 'ssss';
        try{
            $query = $conn->prepare('SELECT `mail`, `user_verification` FROM `user` WHERE `mail` = :mail');
            $query->blind_param($username);
            $query->execute();
            if (strlen($query != 1)){
                if(verify_password($password, $query['user_verification']) === TRUE){
                    echo 'yay';
                }else return 401;


            }else return 404;

        }catch (Exception $e){
            return 400;
        }

    }
}



?>