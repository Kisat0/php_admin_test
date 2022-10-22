<?php 

require_once __DIR__ . '/../init/db.php';

// id de l'utilisateur a mettre a jour
$id_to_update = $_GET['id'];

if(isset($_POST['username']) && isset($_POST['mail']) ){
    $mdp = hash('sha256',$_POST['password']);
    $req = "INSERT INTO users (username,password,email) VALUES (" . "'" . $_POST['username'] . "','" .  $mdp . "','" .  $_POST['mail'] . "')" ;
    $res = $db->prepare($req);
    $res->execute();
    header("Location: /../users.php");
}
else{
    var_dump("Erreur dans le formulaire !!");
}

// verifier les champs recu avec $_POST
// Mettre a jour en BDD

?>
