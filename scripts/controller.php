<?php
    include "connection.php";
    include "model.php";
    include "service.php";

    session_start();
    $auth_user = false;
    $email_register = false;

    if (!isset($_SESSION['autenticated']) || $_SESSION['autenticated'] === 'NO') {
        header('Location: index.php?login=error2');
      }

    function formatCategory ($category) {
        $array_category = array('Impressora', 'Hardware', 'Software', 'Rede');
        return $array_category[$category];
    }

    if (isset($_GET['action']) && $_GET['action'] === 'login') {
        $help_desk = new HelpDesk();

        $help_desk->__set('email', htmlspecialchars($_POST['email']));
        $help_desk->__set('password', htmlspecialchars($_POST['password']));

        $connection = new Connection();
        $connection->connect();

        $service = new Service($connection, $help_desk);
        $users = $service->authUser();
        foreach ($users as $user) {
            if ($user->email === $help_desk->__get('email') && password_verify($help_desk->__get('password'), $user->pass)) {
                $auth_user = true;
            }else {
                $_SESSION['autenticated'] = 'NO';
                header("location: ../index.php?login=error");
            }
        }

        $id_user = $service->searchIdUsers();
        foreach ($id_user as $id) {
            if ($auth_user) {
                $_SESSION['autenticated'] = 'YES';
                $_SESSION['id_user'] = $id->id; 
                header("location: ../home.php"); 
            } 
        }

    }

    if (isset($_GET['action']) && $_GET['action'] === 'register') {
        $help_desk = new HelpDesk();
        $help_desk->__set('email', htmlspecialchars($_POST['email_register']));
        $help_desk->__set('password', password_hash(htmlspecialchars($_POST['password_register']), PASSWORD_DEFAULT));
        
        $connection = new Connection();
        $connection->connect();

        $service = new Service($connection, $help_desk);
        $users = $service->searchUsers();
        foreach ($users as $email_user) {
            if ($email_user->email === $help_desk->__get('email')) {
                $email_register = true;
            }
        }

        if ($email_register === false) {
            $service->registerUser();
            header('Location: ../index.php?register=success');

        } else {
            header('Location: ../register.php?register=error');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] === 'call') {
        $help_desk = new HelpDesk();

        $help_desk->__set('id_user', $_SESSION['id_user']);
        $help_desk->__set('title', htmlspecialchars($_POST['title']));
        $help_desk->__set('category', formatCategory($_POST['category']));
        $help_desk->__set('description', htmlspecialchars($_POST['description']));

        $connection = new Connection();
        $connection->connect();

        $service = new Service($connection, $help_desk);
        $service->registerCall();
        header('Location: ../open_call.php?success');
    }
    
    if (isset($action) && $action === 'list_calls') {
        $help_desk = new HelpDesk();
        $help_desk->__set('id_user', $_SESSION['id_user']);

        $connection = new Connection();
        $connection->connect();

        $service = new Service($connection, $help_desk);
        $calls = $service->readCalls();
    }

    if (isset($_GET['action']) && $_GET['action'] === 'delete_call') {
        $help_desk = new HelpDesk();
        $help_desk->__set('id_chamado', $_GET['id']);

        $connection = new Connection();
        $connection->connect();

        $service = new Service($connection, $help_desk);
        $service->deleteCall();
        header('Location: ../consult.php?deleted');
    }

    if (isset($_GET['action']) && $_GET['action'] === 'edit_call') {
        $help_desk = new HelpDesk();
        $help_desk->__set('id_chamado', $_POST['id_chamado']);
        $help_desk->__set('title', htmlspecialchars($_POST['title']));
        $help_desk->__set('category', formatCategory($_POST['category']));
        $help_desk->__set('description', htmlspecialchars($_POST['description']));

        $connection = new Connection();
        $connection->connect();

        $service = new Service($connection, $help_desk);
        $service->editCall();
        header('Location: ../consult.php?edited');
    }

        

    
    
