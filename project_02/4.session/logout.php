<?php 
    require('init_session.php');

    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['counter']);

    header('Location: index.php');
?>