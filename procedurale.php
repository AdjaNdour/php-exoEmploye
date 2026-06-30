<?php

//1 initialisation des categories et produits

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

function afficheCategorieSansProduit(array $categories): void{
    foreach ($categories as  $categorie ) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
    }
}
afficheCategorieSansProduit($categories);

//3 ajouter une nouvelle catégorie sans produits le code et le nom sont obligatoire et unique

function saisieChaine(string $message): string {
    return readline($message);  
}

function champObligatoire(string $value,string $message): bool{
    if (empty($value)) {
        echo $message."\n";
        return  false;
    }
    return true;
}

function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
    foreach ($categories as $index  => $categorie ) {
        if (($categorie[$key]) === $value) {
            return $index ;
        }
    } 
    return false;
}

function saisieChampObligatoireEtUnique(array $categories,string $smsSaisie, string $smsError,string $key): string{
        
    $valueIsValid = true;
    do {   
        $value = saisieChaine($smsSaisie);
        $valueIsValid = champObligatoire($value,$smsError);
        if($valueIsValid){     
            $valueIsValid =rechercheCategorieParCle($categories,$key,$value);
        }
    } while (!$valueIsValid);
    return $value;
}

function enregistrerCategorie(): void{
    global $categories;
    $code = saisieChampObligatoireEtUnique($categories,"Entrez le code :", "champs obligatoire : ", "code");
    $nom = saisieChampObligatoireEtUnique($categories,"Entrez le nom :", "champs obligatoire : ", "nom");

    $categorie  =   [
            "code" => $code,
            "nom" => $nom,
            "produits" => []
         ];

    $categories[] = $categorie;
 }


?>