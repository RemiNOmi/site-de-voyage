<?php
    session_start();
    unset($_SESSION['id_user']);
    unset($_SESSION['prenom']);
    session_destroy();
    header("location: front.html");
?>