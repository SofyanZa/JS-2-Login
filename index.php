<?php

session_start();

// Si un cookie existe et s'appelle user, on a affaire à un utilisateur connecté
if (isset($_SESSION['user'])) {

    include 'inc/users.php';

    // On va préparer une variable $curentUser qui contient toutes les informations de notre utilisateur
    $currentUser = $users[$_SESSION['user']]['data'];

    // On rajoute également à $currentUser le username
    $currentUser['username'] = $_SESSION['user'];
   
} else {
    // L'utilisateur n'est pas connecté, on le redirige vers le formulaire de connexion
    header('Location: login.php');
}

include 'templates/header.php';
include 'templates/userpage.php';
include 'templates/footer.php';