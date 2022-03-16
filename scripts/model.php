<?php
class HelpDesk  {
    private $id_user;
    private $email;
    private $password;
    private $id_chamado;
    private $title;
    private $category;
    private $description;

    public function __get ($atribute) {
        return $this->$atribute;
    }
    
    public function __set ($atribute, $value) {
        $this->$atribute = $value;
        return $this;
    }
}