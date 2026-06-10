<?php  
class personne{
    //pour calculer le personne crées dans une instant t
  public static $counter=0;
  private $nom;
  private $adresse;
  public function __construct($n,$adr){
    $this->nom=$n;
    $this->adresse=$adr;
   self::$counter=self::$counter+1;
  }
  public static function GetCurrentDate(){
    $currentDate=new DateTime();
    return $currentDate->format("d-m-Y");
  }


}

$p1=new personne('p1',"adr1");
$p2=new personne('p2',"adr1");
echo sprintf("le nombre d objet crées est : %d",personne::$counter);
echo "<br/>";
echo personne::GetCurrentDate();









?>