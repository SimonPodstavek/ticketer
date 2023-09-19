<?php
if(!defined("DB_ACCESS")) {
    http_response_code(404);
    die();
}
$INCLUDES_PATH =  "../";
require_once($INCLUDES_PATH."/session/session_handler.php");

class Database{
    private $conn;


    private static $instances = [];

    public static function getInstance(){
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        
        return self::$instances[$cls];
    }

    private function create_db_session($require_write){
        $servername = "edudb-02.nameserver.sk";
        $username = "read";
        $dbname = "ticketer";
        $password = getenv("ticketer_read_password");

        if ($require_write){
            $username = "RWX";
            $password = getenv("ticketer_RWX_password");
        }

        $connection = new mysqli($servername, $username, $password, $dbname);

        // Verify connection
        if ($connection->connect_error) 
        {
            return 400;
        }

        $this->conn = $connection;
        return 200;
    }

    function login_user($username, $password){

        if ($this->create_db_session(FALSE) !== 200) {
            return 400;
        }

        
        try{
            $query = $this->conn->prepare("SELECT `first_name`, `last_name`, `mail`, `phone`, `verification_token`,
                                            `address_street`, `address_city`, `address_ZIP`, `address_state`
                                            FROM `user` WHERE `mail` = ?");

            $query->bind_param("s", $username);
            $query->execute();

            $result = $query->get_result(); // Get the result set
        if ($result->num_rows != 0) {
            $record = $result->fetch_assoc();

            if(password_verify($password, $record['verification_token'])){
                $user = User::getInstance();
                $user->first_name = $record['first_name'];
                $user->last_name = $record['last_name'];
                $user->phone_number = $record['phone'];
                $user->mail = $record['mail'];
                $user->addr_street = $record['address_street'];
                $user->addr_city = $record['address_city'];
                $user->addr_ZIP = $record['address_ZIP'];
                $user->addr_state = $record['address_state'];
                
                echo $user->addr_state;
                return 200;
            }else{
                return 401;
            }  
        }
            return 404;
        }catch (Exception $e){
            return 400;
        }
    
    }
}




?>