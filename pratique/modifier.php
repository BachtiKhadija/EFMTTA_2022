<?php 
require("config.php");
$code=$_GET['code']??"";

if(isset($code)){
    $sql="select * from stagiaire where code=?";
    $stm=$cnx->prepare($sql);
    $stm->execute([$code]);
    $stag=$stm->fetch(PDO::FETCH_ASSOC);
    print_r($stag);


    //clic sur submit 

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
  $sql="update stagiaire set nom=?,dateNaissance=?,photo=?,codeF=? where code=?";
    $stm=$cnx->prepare($sql);
    $stm->execute([$nom,$dateNaissance,$photo,$filiere,$code]);
   //Question D4
  header("Location:espaceprive.php");




  }




}






















    //clic sur submit

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
    <p><a href="espaceprive.php">Retour</a></p>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr><td>Nom</td><td><input type="text" value="<?= $stag["nom"]??"";?>" name="nom"/></td></tr>
            <tr><td>Date Naissance</td><td><input type="date" value="<?= $stag["dateNaissance"]??"";?>" name="dateNaissance"/></td></tr>
       <tr><td>Image</td><td><input type="file" name="photo"/>
       <img src='<?= $stag["photo"]??"";?>' alt="">
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
                $selected=($stag["codeF"]==$f->code)?"selected":"";
                echo "<option value='".$f->code."' $selected >".$f->nom."</option>";
            }
         ?>

        </select>




        </td></tr>
   <tr><td colspan="2"><button name="send" type="submit">Update</button></td></tr>

    
    </table>
    </form>
</body>
</html>