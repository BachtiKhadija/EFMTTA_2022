<?php 
require("config.php");
$code=$_GET['code']??"";

if(isset($code)){
    $sql="delete  from stagiaire where code=?";
    $stm=$cnx->prepare($sql);
    $stm->execute([$code]);
    header('Location:espaceprive.php');

}
    

    ?>