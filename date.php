<?php 
/*$d=new DateTime();
echo $d->format("Y/m/d H:i:s");
//ajouter 10 jours
echo "<br/> apres 10 jours <br/> ";
$d->add(new DateInterval("P10D"));
echo $d->format("Y/m/d H:i:s");
//il y a trois mois
echo "<br/>Il y a 3 mois <br/> ";
$d->sub(new DateInterval("P3M"));
echo $d->format("Y/m/d H:i:s");
//
echo "<br/>Calculer age <br/> ";
$today=new DateTime();
$bd=new DateTime("2006-10-12");
echo $bd->format("Y-m-d");
$diff=$bd->diff($today);//age en 
echo "<br/> age en days $diff->days";
echo "<br/> age est $diff->y ans $diff->m mois $diff->d jours";
//echo "age en days est : $age";
*/

$d=new DateTimeImmutable();
$newD=$d->add(new DateInterval("P3D"));
echo $newD->format("Y-m-d");


?>