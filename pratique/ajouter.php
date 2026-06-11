<?php 
require("config.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $nom=$_POST["nom"]??"";
  $dateNaissance=$_POST["dateNaissance"]??"";
  $filiere=$_POST["filiere"]??"";
  $path="";
  $err="";
  //QD2
  $validExtentions=["png",'jpeg','gif','jpg'];
  if(isset($_FILES["photo"])){
    $ext=pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
    if(in_array($ext,$validExtentions)){
    $temp=$_FILES["photo"]["tmp_name"];
    $path=move_uploaded_file($temp,"/images/".time().$ext);
    }else{
        $err="image n existe pas";
    }

  //insérer les données  QD.3
  $sql="insert into stagiaire values(null,?,?,?,?)";
    $stm=$cnx->prepare($sql);
    $stm->execute([$nom,$dateNaissance,$photo,$filiere]);
   //Question D4
  header("Location:espaceprive.php");




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
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr><td>Nom</td><td><input type="text" name="nom"/></td></tr>
            <tr><td>Date Naissance</td><td><input type="date" name="dateNaissance"/></td></tr>
       <tr><td>Image</td><td><input type="file" name="photo"/>
    <span><?php echo $err??"" ?></span></td></tr>
        <tr><td>Filiere</td><td>
        <select name="filiere" >
          <?php  
            //QD.1
            $sql="select * from filiere";
           /* $stm=$cnx->prepare($sql);
            $stm->execute();
            $filieres=$stm->fetchAll(PDO::FETCH_OBJ);*/
            $filieres=$cnx->query($sql)->fetchAll(PDO::FETCH_OBJ);
            foreach($filieres as $f){
                echo "<option value='".$f->code."'>".$f->nom."</option>";
            }
         ?>

        </select>




        </td></tr>
   <tr><td colspan="2"><button name="send" type="submit">Envoyer</button></td></tr>

    
    </table>
    </form>
</body>
</html>