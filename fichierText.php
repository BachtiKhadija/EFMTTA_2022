<?php

class Employe {
    public $id;
    public $nom;
    public $poste;
    public $salaire;
    public function __construct($id, $nom, $poste, $salaire) {
        $this->id = $id;
        $this->nom = $nom;
        $this->poste = $poste;
        $this->salaire = $salaire;
    }
}

$employes = [];

// Lire toutes les lignes du fichier dans un tableau
$lignes = file("employes.txt");

foreach ($lignes as $ligne) {

    $ligne = trim($ligne);
     echo $ligne."<br/>";
    $donnees = explode(";", $ligne);

    $employe = new Employe(
        $donnees[0],
        $donnees[1],
        $donnees[2],
        $donnees[3]
    );

    $employes[] = $employe;

}
?>
