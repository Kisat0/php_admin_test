<?php

require_once __DIR__ . '/init/db.php';

// if pour la story 4
if (isset($_GET['username'])) {
    $search_username = $_GET['username'];
}


$query = "SELECT name FROM users WHERE name = ? ";
$req = $myBdd->prepare($query);
$allUsers = $req->execute(array($search_username ));
echo $allUsers



// Story 0: request to find all username
/*
$stmt = ... 
$stmt->execute();
$users = $stmt->fetchAll();
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

<form action="./tb.php">

    <input type="submit" value="update">
    <input type="submit" value="delete">
    

</form>

</head>
<body>
    <!-- Input Search -->
    <div></div>

    <!-- Table des Utilisateurs -->
    <div></div>
</body>
</html>
