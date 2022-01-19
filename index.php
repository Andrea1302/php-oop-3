<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

/**
     * 
     *      Definire classe User:
     *          ATTRIBUTI (private):
     *          - username 
     *          - password
     *          - age
     *          
     *          METODI:
     *          - costruttore che accetta username, e password
     *          - proprieta' getter/setter
     *          - printMe: che stampa se stesso
     *          - toString: "username: age [password]"
     * 
     *          ECCEZIONI:
     *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
     *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
     *          - scatenare eccezione se age non e' un numero
     * 
     *          NOTE:
     *          - per testare il singolo carattere di una stringa
     * 
     *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
     *      try-catch e eventualmente informare l'utente del problema
     * 
     */

     class User{
        private $username;
        private $password;
        private $age;
    
        public function __construct($username,$password){
            $this -> setUsername($username);
            $this -> setPassword($password);
        }

        public function setUsername($username){
            if (strlen($username) < 3 || strlen($username) > 16){
                throw new Exception("La Username deve contenere dai 4 ai 15 caratteri");
            } else {
                $this -> username = $username;
            }
        }
        
        public function getUsername(){
           return $this -> username;
        }

        public function setPassword($password){

            if ( ctype_alnum($password) ){
                throw new Exception("La password deve contenere almeno un carattere speciale!");
            } else {
                $this -> password = $password;
            }

        }

        public function getPassword(){
            return $this -> password ;
        }
       
        public function setAge($age){
            if (is_numeric($age)){
                $this -> age = $age;
            } else {
               throw new Exception ("Inserisci un età valida!");
            }
        }

        public function getAge(){
           return $this -> age;
        }


        public function __toString(){
            return $this -> getUsername() . " " .$this -> getAge() . " [" . $this -> getPassword() . "] ";
        }

        public function printMe(){
            echo $this;
        }

     }
     try{
        echo "<h2> Primo User </h2>";
        
        $user1 = new User("Andrea","12345.6");
        $user1 -> setAge("23");
        $user1 -> printMe();
     } catch (Exception $e){
        echo $e -> getMessage();
     }

     echo "<br>";

     try{
        echo "<h2> Secondo User </h2>";
        $user2 = new User ("Mirk","ookk1234");
        $user2 -> setAge("43");
        $user2 -> printMe();

     } catch (Exception $e){
        echo $e -> getMessage();
     }


     echo "<br>";

     try{
        echo "<h2> Terzo User </h2>";
        $user2 = new User ("An","ookk1234.");
        $user2 -> setAge("43");
        $user2 -> printMe();

     } catch (Exception $e){
        echo $e -> getMessage();
     }

     echo "<br>";

     try{
        echo "<h2> Quarto User </h2>";
        $user2 = new User ("Alessio","123.234");
        $user2 -> setAge("Giov");
        $user2 -> printMe();

     } catch (Exception $e){
        echo $e -> getMessage();
     }

?>
</body>
</html>