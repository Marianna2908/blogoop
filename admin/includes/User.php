<?php
class User{
    /*** PROPERTIES ****/
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    /*** METHODS ***/
    /**QUERY**/
    public static function find_this_query($sql){
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result)){
            $the_object_array[] = self::instantie($row);
        }
        return $the_object_array;
    }
    public static function find_all_users(){
        return self::find_this_query("SELECT * FROM USERS");
    }
    public static function find_user_by_id($user_id){
        $result = self::find_this_query("SELECT * FROM users WHERE id=$user_id");
        return !empty($result) ? array_shift($result) : false;

        /* return self::find_this_query("SELECT * FROM users WHERE id=$user_id");*/
    }
    /**CLASS**/
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }
    public static function instantie($result){
        $the_object = new self();
        foreach($result as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }
    public static function verify_user($username,$password){
        global $database;
        $username=$database->escape_string($username);
        $password=$database->escape_string($password);

        $sql = "SELECT * FROM users WHERE "; // SELECT * FROM users WHERE username = $username AND password = $password LIMIT 1
        $sql .= "username = '{$username}' ";
        $sql .= " AND password = '{$password}' ";
        $sql .= " LIMIT 1";
        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
     }
}
?>