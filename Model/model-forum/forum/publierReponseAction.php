<?php
require('config.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){

        $user_answer=nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer=$bdd->prepare('INSERT INTO reponse(id_auteur,pseudo_auteur,id_question,contenu)VALUES(?,?,?,?) ');
        $insertAnswer->execute(array($_SESSION['id_user'],$_SESSION['prenom'],$_GET['id'], $user_answer));
    }


}