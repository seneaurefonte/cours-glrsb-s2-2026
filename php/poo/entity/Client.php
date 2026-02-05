<?php 
class Client {
    private string $nomComplet;
    private int $anneeNaiss;
   
    public function __construct() {
    
    }

    public function getNomComplet():string {
        return $this->nomComplet;
    }
    public function setNomComplet(string $nomComplet):void {
        $this->nomComplet = $nomComplet;
    }
    public function getAnneeNaiss():int {
        return $this->anneeNaiss;
    }
    public function setAnneeNaiss(int $anneeNaiss):void {
        $this->anneeNaiss = $anneeNaiss;
    }

    public function calculAge():int {
        return 2026 - $this->anneeNaiss;
    }
}

$client = new Client();
$client->setNomComplet("Alice Martin");
$client->setAnneeNaiss(1995);
echo "Nom complet: " . $client->getNomComplet() . "\n";
echo "Age: " . $client->calculAge() . " ans\n"; 