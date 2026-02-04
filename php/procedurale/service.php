<?php
//Variables globales
  enum Antecedents:string {
    case Diabete="Diabète";  //0
    case Asthme="Asthme";   //1
    case HyperTension="Hypertension";//2
  }
$patients = [];
$medecins = [
    ['nom'=>'Wane', 'prenom'=>'Hawa','telephone'=>'771001010'],
    ['nom'=>'Diop', 'prenom'=>'Moussa','telephone'=>'771002020'],
    ['nom'=>'Sow', 'prenom'=>'Awa','telephone'=>'771003030']

];
$antecedents = [
    Antecedents::Diabete,
    Antecedents::Asthme,
    Antecedents::HyperTension
];
$rdvs = [];

function rechercherPatientParNum(string $num):int{
    global $patients;
    foreach ($patients as $key => $patient) {
        if($patient['num'] == $num){
            return $key;
        }
    }
    return -1;
}
function addPatient( array $patient):bool{
    global $patients;
    $patients[]=$patient;
    return true;
}
function addRV(array $rv):bool{
    global $rdvs;
    $rdvs[]=$rv;
    return true;
}   

