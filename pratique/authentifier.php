<?php 
require("config.php");
session_start();
//QB.1
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login=$_POST["login"]??"";
    $password=$_POST["password"]??"";
    if(empty($login) || empty($password)){
        echo "tous les champs sont obligatoires ";
       
    }else{
    //QB.2
     $sql="select * from admin where login=? and password=?";
     $stm=$cnx->prepare($sql);

     $stm->execute([$login,$password]);
     $admin=$stm->fetch(PDO::FETCH_ASSOC);
     if(!isset($admin)){
         echo "tous les champs sont obligatoires ";
     }
     else{
         //QB.3
         $_SESSION["login"]=$admin["login"];
         $_SESSION["nom"]=$admin["nom"];
         header("Location:espaceprive.php");
     }
    }
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST">
   <h2>Page d'authetification</h2>
  <table>
    <tr><td>Login</td><td><input type="text" name="login"></td></tr>
      <tr><td>Password</td><td><input type="password" name="password"></td></tr>
<tr><td colspan="2"><button type="submit" name="send">Se connecter</button></td></tr>
    </table>
</form>
</body>
</html>