<?php
////class User{
////    /*** PROPERTIES ***/
////    public  $id;
////    public $username;
////    public $password;
////    public $firstname;
////    public $lastname;
////    /*** METHODS ***/
////    public static function find_this_query($sql){
////        global $database; // om een globale cariabele aan te roepen moet je global gebruiken, om de connectie tssn 2 classes te maken moet je global gebruiken
////        $result = $database->query($sql);
////        return $result;
////    }
////    public function find_all_users(){
//////            global $database; // om een globale cariabele aan te roepen moet je global gebruiken, om de connectie tssn 2 classes te maken moet je global gebruiken
//////            $result = $database->query("SELECT * FROM users");
//////            return $result;
////        return self::find_this_query("SELECT * FROM users");
////    }
////    /***
////    Functie find_user_id(id)
////     ***/
////    public static function find_user_by_id($user_id){
//////        global $database;
//////        $result = $database->query("SELECT * FROM users WHERE id = $user_id");
//////        return $result;
////        return self::find_this_query("SELECT * FROM users WHERE id=$user_id");
////        $user_found = mysqli_fetch_array($result);
////        return $user_found;
//////        // variabelen nodig om in de pagina te spelen.
////
//////        return self::find_this_query("SELECT * FROM users WHERE id=$user_id"); // return self gaat 1 waarde weergeven
////
////    }
////}
////
////?>
<!--<!---->-->
<?php
//class User{
//    /** Properties**/
//    public $id;
//    public $username;
//    public $password;
//    public $first_name;
//    public $last_name;
//    /** Methods **/
//    /** QUERY**/
//    public static function find_this_query($sql){
//        global $database;
//        $result =$database->query($sql);
//        $the_object_array = array();
//        while($row = mysqli_fetch_array($result)){
//           $the_object_array[] = self::instantie($row);// we willende user die al een object is, per user, dus die user pr user een object aaanmaken
//            // 0de element, gaat hij opvullen met 1e id en zo verder. instantie per instantie vullen, die is geschreven uit instantie
//            // er gaat volledige object array worden weergegevren
//        }
//        return $the_object_array;
//
//    }
//    public static function find_all_users(){
//        /*global $database;
//        $result =$database->query("SELECT * FROM users ");
//        return $result;*/
//        return self::find_this_query("SELECT * FROM users ");
//    }
//    public static function find_user_by_id ($user_id){
//
//         $result = $database->query("SELECT * FROM `users` WHERE id=$user_id");
//        return !empty($result) ? array_shift($result):false;
//
//        $result = self::find_this_query("SELECT * FROM `users` WHERE id=$user_id");
//        $user_found =mysqli_fetch_array($result);
//        return $user_found;
//    }
//    /** METHODS CLASS **/
//        private function has_the_attribute($the_attribute){
//        $object_properties = get_object_vars($this);
//        return array_key_exists($the_attribute, $object_properties);
//    }
//    public static function instantie($result){// opvevulde objecten kunnen opvangen dit wordt opgevuld in manier 4, object van de class te vullen om zelf een te maken.
//        $the_object = new self();// vullen van een CLASS!
//        foreach ($result as $the_attribute =>$value) {
//            if ($the_object-> has_the_attribute($$the_attribute)){
//                $the_object->$the_attribute =$value;
//            }
//        }
////        $the_object-> id = $result['id'];
////        $the_object-> username= $result['username'];
////        $the_object-> password= $result['password'];
////        $the_object-> first_name= $result['first_name'];
////        $the_object-> last_name= $result['last_name'];
//        return $the_object;
//        // verschil tssn result en object,
//    }
//}
//?>
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
        $the_object_array = array(); // lege opbecjt variabele declareren?
        while($row = mysqli_fetch_array($result)){ // za rij per rij opgevuld worden, de fecth zal de resultaat nemen. rij per rij in var $row
            $the_object_array[] = self::instantie($row); // dit is belangerijk, van array naar object niveua door de instaniering , wordt rij per rij opgevuld
        }
        return $the_object_array; // het opvullen van die opbet
    }
    public static function find_all_users(){
        return self::find_this_query("SELECT * FROM USERS");
    }
    public static function find_user_by_id($user_id){ // deze ID Komt binnen, met die IS komt in user id hieronder
        $result = self::find_this_query("SELECT * FROM users WHERE id=$user_id"); // user ID komt binnen , als dit gevuld is, komt tdit in re result
        return !empty($result) ? array_shift($result) : false; // in result, array van objecten.
        // als verschillend is van leeg, zal het resultaat array shift: om 1 item per keer te tonen aan de hand van array shift. zorgt ervoor dat er pogeschoven wordt. gaat schiften
        // uiteindelijk gaat hij een return geven van find this query, $sql komt binnen, daarin staat je select statement.
        // dan wordt de connecti met de database gemaakt.

        /* return self::find_this_query("SELECT * FROM users WHERE id=$user_id");*/
    }
    /**CLASS**/
    private function has_the_attribute($the_attribute){  // atribuut scheiden, als atrivuut wordt aangesproken, ier wordt id binnen gekomen.
        $object_properties = get_object_vars($this); // deze combo, deze classe, kijk wat er alles alspublix is gedeclareers, bovenaan, uesernames en alles van verlden zal met get object vars, uit de klas worden gelezen
        return array_key_exists($the_attribute, $object_properties); // array key exsit, bestaan deze wle alle 2 als extra controle
    }
    public static function instantie($result){ //resultaat komt binnen je makt heir een object van
        $the_object = new self();
        foreach($result as $the_attribute => $value){ // om de resultaat in te lzen met een foreach loop
            if($the_object->has_the_attribute($the_attribute)){ // als het object een atrreibutt heeft, ja of nee, ja dan has the attribute, private functie van de class zelf, the attribute, value wordt weergegeven.
                $the_object->$the_attribute = $value; // elk apart attribuutn, en worrdt de id gevuld met 1, username met Marianna, properties worden dynamisch
            }
        }
        return $the_object;
    }

}
?>
