<?php 

require_once __DIR__ . '/../init/db.php';

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mail']) ){
    $mdp = hash('sha256',$_POST['password']);
    $ver = "SELECT username FROM users WHERE username =" . "'" . $_POST['username'] . "'";
    $pse = $db->prepare($ver);
    $pse->execute();
    $exist = $pse->fetch();
    if($exist["username"] != $_POST['username']){
        $req = "INSERT INTO users (username,password,email) VALUES (" . "'" . $_POST['username'] . "','" .  $mdp . "','" .  $_POST['mail'] . "')" ;
        $res = $db->prepare($req);
        $res->execute();
        header("Location: /../users.php");
    }
    else{
        echo("Cet utilisateur existe déjà !!");
    }
}
else{
    echo("Erreur dans le formulaire !!");
}

// verifier les champs recu avec $_POST
// Creer en BDD
?>
