<?php 
/*
    __DIR__ : renvoie le chemin absolu du dossier courant
    exemple: index.php est dans /var/www/html/gesrv/index.php
           __DIR__ renvoie /var/www/html/gesrv
*/
require_once __DIR__.'/view.php';
require_once __DIR__.'/service.php';
function main() {
    do {
           $choix=menu();
              switch ($choix) {
                case 1:
                        global $antecedents;
                        global $medecins;
                        global $patients;
                        $numPatient=saisieChaine("Numéro du patient: ");
                        $indexPatient=rechercherPatientParNum($numPatient);
                        if($indexPatient == -1){
                            echo "Patient non trouvé. Veuillez saisir les informations du patient.\n";
                            $patient=saisirPatient($numPatient,$antecedents);
                            addPatient($patient);
                        } else {
                            $patient=$patients[$indexPatient];
                        }

                        $rv=saisieRV($medecins);
                        $rv['patient']=$patient;
                        addRV($rv);
                     break;
                case 2:
                     global $rdvs;
                     afficheRVS($rdvs);
                     break;
                     break;
                case 3:
                     echo "Au revoir\n";
                     exit(0);
                     break;
                default:
                     echo "Choix invalide\n";
                     break;
              }
    } while ($choix != 3);

   
}


main();