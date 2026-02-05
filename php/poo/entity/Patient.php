<?php 
/*
  Conventions de nommage :
       - Les noms de classes commencent par une majuscule et utilisent le style PascalCase.
       Exemple : Patient, Medecin, RendezVous.
       -Un fichier de classe doit contenir une seule classe et porte le même nom que la classe.
         Exemple : Patient.php contient la classe Patient.
      - Les noms de fonctions et attributs utilisent le style camelCase.
         Exemple : 
         -Methodes :getNomComplet(), setAntecedents(),
         -nomAttribut:  $nomComplet, $antecedents.

*/
class Patient {
    public string $nomComplet;
    public string $numero;
    public string $dateNaiss;  
   
    public function __construct() {
    
    }
}

$pat=new Patient();
$pat->numero="P001";
$pat->nomComplet="John Doe";
$pat->dateNaiss="01/01/1990";
echo "Numero: ".$pat->numero."\n";
echo "Nom complet: ".$pat->nomComplet."\n";
echo "Date de naissance: ".$pat->dateNaiss."\n";
