<?php

require_once __DIR__ . '/init/db.php';

// id de l'utilisateur a update
if (isset($_GET['id'])) {
    $id_to_update = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM users WHERE id =" . $id_to_update);
    $stmt->execute();
    $user = $stmt->fetchAll();
} else {
    // Redirection si pas d'ID dans l'url.. on ne peut pas mettre a jour RIEN.
    header('Location: users.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre a jour un utilisateur</title>
</head>

<body>
    <!-- Afficher un formulaire avec les data de l'utilisateur -->

    <form action="/actions/update_user.php" method="post">
        <input type="text" name="username" value="<?= $user[0]["username"] ?>">
        <input type="text" name="username" value="<?= $user[0]['email'] ?>">
        <input type="submit" value="Update">
    </form>

    <a href="users.php">Page précédente</a>
</body>

</html>