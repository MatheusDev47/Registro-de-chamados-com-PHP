<?php
session_start();

if (!isset($_SESSION['autenticated']) || $_SESSION['autenticated'] === 'NO') {
  header('Location: index.php?login=error2');
}

?>