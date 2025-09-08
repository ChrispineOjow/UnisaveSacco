<?php

    $sql="";

    class db{

        private $servername;
        private $databasename;
        private $username;
        private $password;
        private $charset;


        function connect(){

            $this->servername = "localhost";
            $this->databasename = "unisavesacco";
            $this->username = "root";
            $this->password = "";
            $this->charset= "utf8mb4";

            try{

                $dsn="mysql:host=".$this->servername.
                    ";dbname=".$this->databasename.
                    ";charset=".$this->charset;
                $pdo= new PDO($dsn, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;

            }
            //PDO PHP DATABASE Object
            catch(PDOException $e){

                echo "Connection failed".$e->getMessage();

            }
 

        }

        function getData($sql){

            return $this->connect()->query($sql);

        }

        function getJSON($sql){

            $rst=$this->getData($sql);
            return json_encode($rst->fetchAll(PDO::FETCH_ASSOC));
        }


    }


?>