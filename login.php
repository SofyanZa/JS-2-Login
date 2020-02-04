<?php

session_start();

// Gestion du message de déconnexion bien effectuée
if(isset($_GET['logout'])) {
    $logoutMsg = 'Vous avez été correctement déconnecté';
}

// variable $errors un tableau vide
// dans lequel on ajoutera des eventuels messages d'erreur
$errors = [];


// On vérifie donc ici qu'on a bien reçu des données dans $_POST
if (isset($_POST['username']) && isset($_POST['password'])) {
    // On inclut le fichier users.php où se trouve la variable contenant toutes les informations de nos utilisateurs
    include 'inc/users.php';
    // print_r($users['Lancelot']['pass']);

    $username = $_POST['username'];
    $password = $_POST['password'];

    // On teste si le nom d'utilisateur entré existe bien dans $users
    if (isset($users[$username])) {

        // Maintenant qu'on sait que l'utilisateur entré est le bon, on peut tester si le mot de passe est le bon !
        if ($users[$username]['pass'] == $password) {

            // si ça match on crée le cookie
            $_SESSION['user'] = $username;

            header('Location: index.php');
        } else {
            $errors[] = 'Mauvais mot de passe';
        }
    } else {
        $errors[] = 'Cet utilisateur n\'existe pas';
    }

}

include 'templates/header.php';
include 'templates/login-form.php';
include 'templates/footer.php';
