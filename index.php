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
     echo "<br><br><br> ------------------------------------------------------------------<br><br><br>";

    //  **
    //  *      Definire classe Computer:
    //  *          ATTRIBUTI:
    //  *          - codice univoco
    //  *          - modello
    //  *          - prezzo
    //  *          - marca
    //  * 
    //  *          METODI:
    //  *          - costruttore che accetta codice univoco e prezzo
    //  *          - proprieta' getter/setter per tutte le variabili d'istanza
    //  *          - printMe: che stampa se stesso (come quella vista a lezione)
    //  *          - toString: "marca modello: prezzo [codice univoco]"
    //  * 
    //  *          ECCEZIONI:
    //  *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
    //  *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
    //  *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
    //  * 
    //  *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
    //  *      il corretto funzionamento dell'algoritmo

    class computer{
        private $idComputer;
        private $modello;
        private $prezzo;
        private $marca;

        public function __construct($idComputer,$prezzo){
            $this -> setIdComputer($idComputer);
            $this -> setPrezzo($prezzo);
        }

        public function setIdComputer($idComputer){

            if(strlen($idComputer) === 6 ){
                $this -> idComputer = $idComputer;
            } else {
                throw new Exception("L' id deve essere di 6 caratteri");
            }
        }

        public function getIdComputer(){
           return $this -> idComputer;
        }

        public function setPrezzo($prezzo){
            if ( $prezzo < 0 || $prezzo > 2000 ){
                throw new Exception("Prezzo da inserire tra 0 e 2000");
            } else {
                $this -> prezzo = $prezzo;
            }
        }

        public function getPrezzo(){
           return $this -> prezzo;
        }

        public function setModello($modello){
            if ( strlen($modello) >= 3 && strlen($modello) <= 20){
                $this -> modello = $modello;
            } else {
                throw new Exception("Il modello deve essere tra i 3 e i 20 caratteri");
            }
        }

        public function getModello(){
          return  $this -> modello;
        }

        public function setMarca($marca){
            if ( strlen($marca) >= 3 && strlen($marca) <= 20){
                $this -> marca = $marca;
            } else {
                throw new Exception("La marca deve essere tra i 3 e i 20 caratteri");
            }
        }

        public function getMarca(){
            return $this -> marca;
        }

        public function __toString(){
            return $this -> getMarca() . " " . $this -> getModello() . ": " . $this -> getPrezzo() . "  [ ". $this -> getIdComputer() . " ]" ;
        }

        public function printMe(){
            echo $this;
        }

    }


    try{
        $Computer1 = new computer("103001","2000€");
        $Computer1 -> setModello("Mac");
        $Computer1 -> setMarca("Apple");
    
        $Computer1 -> printMe();
    } catch (Exception $e){
        echo $e -> getMessage();
    }
    
;
    
?>
</body>
</html>