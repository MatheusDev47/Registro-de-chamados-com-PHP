<?php

    class Service {
        private $connection;
        private $help_desk;

        public function __construct(Connection $connection, HelpDesk $help_desk) {
            $this->connection = $connection->connect();
            $this->help_desk = $help_desk;
        }

        public function authUser () {
            $query = "SELECT * FROM users";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function registerUser () {
            $query = "INSERT INTO users(email, pass)VALUES(?, ?)";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('email'));
            $stmt->bindValue(2, $this->help_desk->__get('password'));
            $stmt->execute();
        }

        public function searchUsers () {
            $query = "SELECT email FROM users WHERE email = ?";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('email'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function searchIdUsers () {
            $query = "SELECT id FROM users WHERE email = ?";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('email'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function registerCall () {
            $query = "INSERT INTO tb_chamado(id_users, title, category, description)VALUES(?, ?, ?, ?)";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('id_user'));
            $stmt->bindValue(2, $this->help_desk->__get('title'));
            $stmt->bindValue(3, $this->help_desk->__get('category'));
            $stmt->bindValue(4, $this->help_desk->__get('description'));
            $stmt->execute();
        }

        public function readCalls () {
            $query = "SELECT id_chamado, title, category, description FROM tb_chamado AS calls LEFT JOIN users ON (calls.id_users = users.id) WHERE calls.id_users = ?";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('id_user'));
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function deleteCall () {
            $query = "DELETE FROM tb_chamado WHERE id_chamado = ?";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('id_chamado'));
            $stmt->execute();
        }

        public function editCall () {
            $query = "UPDATE tb_chamado SET title = ?, category = ?, description = ? WHERE id_chamado = ?";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $this->help_desk->__get('title'));
            $stmt->bindValue(2, $this->help_desk->__get('category'));
            $stmt->bindValue(3, $this->help_desk->__get('description'));
            $stmt->bindValue(4, $this->help_desk->__get('id_chamado'));
            $stmt->execute();
        }

    }