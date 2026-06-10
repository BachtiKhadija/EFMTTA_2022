<?php 
try{

$cnx=new PDO("mysql:host=localhost;dbname=gestionstg","root","");
echo"bien connecté";
}catch(PDOException $e){
    echo $e->getMessage();
}




?>