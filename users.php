<?php

require_once __DIR__ . '/init/db.php';

// if pour la story 4
if (isset($_GET['username'])) {
    $search_username = $_GET['username'];
    $stmt = $db->prepare("SELECT * FROM users WHERE username =" . "'" . $_GET['username'] . "'");
    $stmt->execute();
    $users = $stmt->fetchAll();
} else {
    $stmt = $db->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();
}

// Story 0: request to find all username


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>

<body>

<form action="actions/create_user.php" method="post">
    <input type="text" name="username" placeholder="pseudo">
    <input type="password" name="password" placeholder="mdp">
    <input type="mail" name="mail" placeholder="mail">
    <input type="submit" value="Créer">
</form>
    <!-- Input Search -->
    <div>
        <form action="users.php" method="get">
            <input type="search" name="username">
            <input type="submit" value="Search">
        </form>
    </div>

    <!-- Table des Utilisateurs -->
    <?php
    foreach ($users as $user) {
    ?>
        <div>
            <?= $user["username"]; ?>
            <a href=<?= "update_form.php?id=" . $user["id"] ?>><button>Update</button></a>
            <a href=<?= "actions/delete_user.php?id=" . $user["id"] ?>><button>Delete</button></a>

        </div>
    <?php
    }
    ?>
</body>

</html>