<?php 
function menu():int{
    echo "1-Enregister un Rv\n";
    echo "2-Afficher les Rv\n";
    echo "3-Quitter\n";
   // $choix=(int)readline("Entrer Votre choix: ")   
    $choix=intval(readline("Entrer Votre choix: ") ) ;
    return $choix;
} 

function saisieRV(array $medecins):array{
    //On devra saisir le patient,le medecin,la date et l'heure
    $rv=[];
    echo "Saisie du medecin:\n";
    do {
        $medecinIndex=selectionnerMedecin($medecins);
    } while ($medecinIndex == -1);
    $rv['medecin']=$medecins[$medecinIndex];
    echo "Saisie de la date:\n";
    $rv['dateRv']=saisirDate();
    echo "Saisie de l'heure:\n";
    $rv['heureRv']=saisirHeure();
    return $rv;
}
function  afficheRV(array $rv):void{
    affichePatient($rv['patient']);
    afficheMedecin($rv['medecin']);
    afficheDate($rv['dateRv'],"Date RV: ");
    afficheHeure($rv['heureRv']);
}
function afficheRVS(array $rvs):void{
    if(count($rvs) == 0){
        echo "Aucun Rv trouvé\n";
        return;
    }
    foreach($rvs as $rv){
        afficheRV($rv);
    }
}
function afficheDate(array $date ,string $message):void{
    echo $message." ".$date['jour']."/".$date['mois']."/".$date['annee']."\n";
}
function afficheHeure(array $heure):void{
    echo "Heure: ".$heure['heure'].":".$heure['minute']."\n";
}
function saisieChaine(string $sms):string{
    do {
        $chaine = readline($sms);
        if(empty($chaine)){
            echo "La saisie ne peut pas être vide. Veuillez réessayer.\n";
        }
    } while(empty($chaine));
    return $chaine;
}
function saisirPatient(string $numero, array $antecedents):array{ //On devra saisir les antécédents
    $patient=[];
    $patient['num']=$numero;
    $patient['nomComplet']=saisieChaine("Nom complet du patient: ");
    $patient['antecedents']=saisirAntecedent($antecedents);
    
    return $patient;
}
function saisirAntecedent(array $antecedents):array{
    $antecedentsSelect=[];
   do{ 
        if(count($antecedentsSelect)>= 3){
            echo "Vous avez atteint le nombre maximum d'antécédents (3).\n";
            break;
        }
        echo "Voulez ajouter un les antécédent du patient (tapez o/n):\n";
        $rep = readline();
        if($rep == "n"){
            break;
        }
        foreach ($antecedents as $key => $antecedent) {
            echo ($key+1)."-".$antecedent->value."\n";
        }
        $antecedentIndex=intval(readline("Sélectionner l'antécédent (numéro): "));
        if($antecedentIndex > 0 && $antecedentIndex <= count($antecedents)){
            $antecedentsSelect[]=$antecedents[$antecedentIndex-1]->value;
        }else{
            echo "Index invalide\n";   
        }
       
   } while ($rep == "o" );
    return $antecedentsSelect;
}
function saisirDate():array{
        $date=[];
        $date['jour']=intval(readline("Jour: "));
        $date['mois']=intval(readline("Mois: "));
        $date['annee']=intval(readline("Annee: "));
       return $date;
}

function saisirHeure():array{
    $heure=[];
    $heure['heure']=intval(readline("Heure: "));
    $heure['minute']=intval(readline("Minute: "));
    return $heure;
}

function selectionnerMedecin(array $medecins):int{
    if(count($medecins) == 0){
        echo "Aucun medecin trouvé\n";
        return -1;
    }
    foreach ($medecins as $key => $medecin) {
        echo ($key+1)."-".$medecin['nom']." ".$medecin['prenom']."\n";
    }
    $medecinIndex=intval(readline("Sélectionner le medecin (numéro): "));
    if($medecinIndex > 0 && $medecinIndex <= count($medecins)){
        return $medecinIndex-1;
    }else{
        echo "Index invalide\n";   
        return -1;
    }
}
function afficheMedecin(array $medecin):void{
    echo "Medecin: ".$medecin['nom']." ".$medecin['prenom']."\n";
}
function affichePatient(array $patient):void{
    echo "Patient: ".$patient['nomComplet']."\n";
    echo "Antecedents: \n";
    if(count($patient['antecedents']) == 0){
        echo "Aucun antecedent trouvé\n";
        return;
    }
    foreach($patient['antecedents'] as $ant){
        echo "- ".$ant."\n";
    }
}
