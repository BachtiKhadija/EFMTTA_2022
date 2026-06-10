<?php
 class student{
  private $code;
  private $nom;
  public function __construct($code,$nom){
    $this->code=$code;
    $this->nom=$nom;

  }
 
  public function __toString(){
    return sprintf("code : %d - nom : %s",$this->code,$this->nom);
  }
  public function __call($method,$params){
    echo "la methode $method n est pas definie";
  }
public function __get($attr){
    echo "l'attribut $attr est non defini ou innaccessible";
  }
  
   public function __set($attr,$val){
    echo "l'attribut à modifier $attr est non defini ou innaccessible";
  }
 }
  $s=new student(123,"student123");
  //$s->afficher();
  //echo $s->code;
  //echo $s;
  //$s->code=12;
 //$s->affiche();

  $s->nom="RADI";







?>