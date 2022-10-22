<?php 

require_once __DIR__ . '/../init/db.php';

// id de l'utilisateur a supprimer
$id_to_delete = $_GET['id'];
$stmt = $db->prepare("DELETE FROM users WHERE id ="  . $_GET['id']);
$stmt->execute();
header("Location: /../users.php");
?>
