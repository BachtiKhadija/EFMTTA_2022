<?php 
//QC.1
session_start();
require("config.php");
$nomAdmin=$_SESSION["nom"];
$ch=date("H");
$sal=($ch>18)?"bonsoir":"bonjour";
$msg=$sal." ".$nomAdmin;
//QC.2
$sql="select s.nom as nomStg,s.dateNaissance,s.photo,f.nom as nomF from stagiaire s inner join filiere f on s.codeF=f.code";
$stm=$cnx->prepare($sql);
$stm->execute();
$stagiaires=$stm->fetchAll(PDO::FETCH_ASSOC);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?=$msg?> </h2>
    <h2>Liste stagiaire</h2>
    <table><thead><tr>
        <th>nomSgt</th><th>dateNaissance</th><th>photo</th><th>nomF</th><th>Actions</th>
    </tr></thead>
  <tbody>
    <?php 
     foreach($stagiaires as $s){

echo"<tr><td>".$s["nomStg"]."</td><td>".$s["dateNaissance"]."</td><td><img src='".$s["photo"]."'/></td><td>".$s["nomF"]."</td><td>Actions</td></tr>";



     }


?>
  </tbody>

</table>
</body>
</html>