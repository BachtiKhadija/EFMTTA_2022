<?php 

class Employe
{
    private $id;
    private $nom;
    private $poste;
    private $salaire;

    public function __construct($id, $nom, $poste, $salaire)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->poste = $poste;
        $this->salaire = $salaire;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPoste()
    {
        return $this->poste;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }
}

//******************** */


$employes = [];

$employes[] = new Employe(1, "Ahmed", "Développeur", 12000);
$employes[] = new Employe(2, "Sara", "Designer", 10000);
$employes[] = new Employe(3, "Youssef", "Chef de projet", 15000);
$employes[] = new Employe(4, "Imane", "Comptable", 9000);
//*******sauvegarder dans fichier text *** */
$fichier = fopen("employes.txt", "w");
foreach ($employes as $emp) {
    $ligne =$emp->getId() . ";" .$emp->getNom() . ";" .$emp->getPoste() . ";" .$emp->getSalaire() . "\n";
    fwrite($fichier, $ligne);
}

fclose($fichier);
//sauvegarder dans fichier json 
//On transforme les objets en tableaux associatifs.
$tabJson = [];

foreach ($employes as $emp) {
//transformer chaque emp en assoc array
    $tabJson[] = [
        "id" => $emp->getId(),
        "nom" => $emp->getNom(),
        "poste" => $emp->getPoste(),
        "salaire" => $emp->getSalaire()
    ];
}
//transformer la tableau en binary
$json = json_encode($tabJson);
//sauvegarder l objet binary dans le fichier employes.json
file_put_contents("employes.json", $json);

?>