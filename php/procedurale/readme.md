structure sont des tableaux associatifs
  $date=[
    'jour'=>15,
    'mois'=>8,
    'annee'=>2024
  ];
  count($date); //3 
  $heure=[
    'heure'=>14,
    'minute'=>30
  ];
  $patient=[
    'nomComplet'=>'Doe John',
    'dateNaiss'=>$date,
    "numero"=>'PAT12345',
    "antecedents"=>[
    ]
  ];

  //Enumération des rendez-vous
  enum Antecedents:string {
    case Diabete="Diabète";  //0
    case Asthme="Asthme";   //1
    case HyperTension="Hypertension";//2
  }
  Antecedents.Diabete; //0.     Antecedents.Diabete->value //"Diabète"
  Antecedents.Asthme;  //1.     Antecedents.Asthme->value  //"Asthme"
  Antecedents.HyperTension;//2  Antecedents.HyperTension->value //"Hypertension"

$medecin=[
    'nom'=>'Smith',
    'prenom'=>'Alice',
    'telephone'=>'01 23 45 67 89',
  ];

  $rendezVous=[
    'patient'=>$patient,
    'medecin'=>$medecin,
    'dateRv'=>$date,
    'heureRv'=>$heure
  ];
