<?php
//question 1 => mot clé static
//question 2 =>convertir un objet en string
//question3
/*$f=fopen("statistique.txt","r");
while(!feof($f)){
    echo fgets($f)."<br/>";
}*/

/*$content=file("statistique.txt");

//print_r($content);
foreach($content as $line){

echo "$line<br/>";
}*/ 

$content=file_get_contents("statistique.txt");
//var_dump($content);//une seule chaine
//convertir la chaine en tableau sachant que chaque ligne se termne par ;

$tab=explode(";",$content);
//var_dump($tab);
foreach($content as $line){

echo "$line<br/>";
}

//ecrire ,modifier et ajouter 







?>