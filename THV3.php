<?php 
$line="\nnouvelle ligne";
/*$f=fopen("statistique.txt","a");
fwrite($f,$line);

fclose($f);*/
file_put_contents("devices.txt","\nanother new line",FILE_APPEND);







?>