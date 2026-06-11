<?php
 session_start();
 //vider les sessions
 session_unset();
 //supprimer les session
 session_destroy();

 header('Location:authentifier.php');




?>