<?php

    class Connection {
        // public $host;
        // public $dbname;
        // public $user;
        // public $password;

        public function connect () {
            try {

                $pdo = new PDO('mysql:host=localhost;dbname=help_desk', 'root', '');

                return $pdo;

            }catch(PDOException $e) {
                echo '<p>'.$e->getMessage().'</p>';
            }
        }
    }