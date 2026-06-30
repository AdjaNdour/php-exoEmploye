<?php

//initialisation des categories et produits

$categories = [
    0 =>[
        "code" => "cat0",
        "nom" => "categorie0",
        "produits" => [
                0 => [
                    "nom" => "prod1",
                    "reference" => "ref1",
                    "prix" => 3000,
                    "quantite" => 5 
                    ],
                1 => [
                    "nom" => "prod2",
                    "reference" => "ref2",
                    "prix" => 2000,
                    "quantite" => 3 
                    ]
        ]
    ],
    1 =>  [
        "code" => "cat1",
        "nom" => "categorie1",
        "produits" => []
    ]
];

//2 afficher les categories qui n'ont pas de produits

foreach ($categories as  $categorie ) {
    if (empty($categorie["produits"])) {
         echo $categorie["nom"]."\n";
    }
}

//3 ajouter une nouvelle catégorie sans produits code et le nom sont obligatoire et unique

$codeIsValid = true;
    
do {    
    $code = readline("saisir le code :");
    if (empty($code)) {
        echo "le code est obligatoire \n";
        $codeIsValid = false;
    }else{
        foreach ($categories as  $categorie ) {
            if (($categorie["code"]) === $code) {
                $codeIsValid = false;
                echo "le code existe deja ...\n"; 
            }
        }  
    }
} while (!$codeIsValid);

$nomIsValid = true;
do { 
    $nom = readline("saisir le nom : ");
    if (empty($nom)) {
        echo "le nom est obligatoire";
        $nomIsValid= false;
    }else{
        foreach ($categories as  $categorie ) {
            if (($categorie["nom"]) === $nom) {
                $nomIsValid = false;
                echo "le nom existe deja ..."; 
            }
        }  
    }
} while (!$nomIsValid);

$categorie  =   [
                "code" => $code,
                "nom" => $nom,
                "produits" => []
];

$categories[] = $categorie;


?>