<?php
    require_once ("config.php");
    class Database{
        /** class Properties **/
        public $connection; // in php start een variabele altijd met $ , public zeer belangerijk, wz: de variabele connection overal gebruikt zal worden op elke pagina toegangbaar
        // private zal alleen in de Database.php gebruikt worden in eigen classen en children, mit overerving. alle files die onder de Database staan
        /** class Methods **/
        public function open_db_connection(){
            $this->connection = new  mysqli(DB_HOST,DB_USER, DB_PASSWORD,DB_NAME); // door => geeft hij zelf de declaratie en methode weer. mysqli geschreven door php zelf om connectie te maken met database
            // dit heeft de datyabase ndg om te connecteren , de tagd dei voor DB staat , ingebouwd in php
            if(mysqli_connect_errno()){
                printf("Connectie is mislukt: %s\n",mysqli_connect_errno());// %s wordt vervanger door een effectief nr, n nieuw lijn, en opnieuw de eroor
                    exit();// heel belangerijk, dit om eruit te geraken
                }
            }
            public function query($sql){
                $result = $this-> connection->query($sql); // gele query is een vaste parameter van php
                // uitleg public function:  de select* from users moet worden ingepompt in de $sql, de query moet worden geconnecteerd met users.
                // de users pagina, database->query, in die query staat de select als een string.
                // deze database, moet connecteren met de myysql hierboven en dn moet die ng eens die query uitvoeren, ditzal dan een object array worden weergegeven
                $this->confirm_query($result);
                return $result;
            }
            private function confirm_query($result){ // zal alleen in deze class worden gecontroleerd
                if(!$result){ // als het resultaat niet wordt weergegeven,
                    die("Query kan niet worden uitgevoerd" . $this->connection->error); // om alles weg te krijgen, dit is ook een functie van de mysqli
                }
            }
            function __construct(){
                $this->open_db_connection(); // de functie op db connectie uit te voeren
            }
    }
    $database = new Database(); // in 1 enkele variabele zit alles, alle properties en methodes
?>
