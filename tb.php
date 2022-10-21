<?php

public class{

////////////////// stroy 2

function getallusers($valeurduinput){

$query = "SELECT name FROM Users WHERE name =" . $valeurduinput  ;
$req = $myBdd->prepare($query);
$allUsers = $req->execute();
return $allUsers;

}

////////////////// story 1

function insertuser(name, mdp){
$query = " INSERT INTO users (username, password) VALUE (name, mdp) ";
$req = $myBdd->prepare($query);
$user = $req->execute();
return $user;
    
    }
/////////////////////// story 2

function updateuser(name, mdp){

$hachemdp = hash('sha256',mdp)

$query = " UPDATE users SET username = ? AND password = ? ";
$req = $myBdd->prepare($query);
$updateuser = $req->execute(array(name, hachemdp));
return $updateuser;


///////////////////// story 3

function getallusers($username, mdp){

$hachemdp = hash('sha256',mdp)

$query = " DELETE FROM users WHERE usename = $username AND password = $hachemdp ";
$req = $myBdd->prepare($query);
$deleteuser = $req->execute();
return $deleteuser;

}

}

?>