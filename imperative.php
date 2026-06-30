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

//4 ajouter un produit dans une categorie existant 

$categorieExiste =  false;
$code = readline("saisir le code :");

foreach ($categories as $index => $categorie ) {
    if (($categorie["code"]) === $code) {
        $categorieExiste = true;
        break;
    }
} 

if ($categorieExiste) {

    $refIsValid = true;
    do {    
        $ref = readline("saisir le reference :");
        if (empty($ref)) {
            echo "le reference est obligatoire \n";
            $refIsValid = false;
        }else{
            foreach ($categories as  $categorie ) {
                if (($categorie["reference"]) === $ref) {
                    $refIsValid = false;
                    echo "le ref existe deja ...\n"; 
                }
            }  
        }
    } while (!$refIsValid);

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

    do {
        $price = (int)readline("saisir le prix :");
    } while ($price <= 0);

    do {
        $quant = (int)readline("saisir la quantite :");
    } while ($price < 0);

    $produit =[
        "nom" => $nom,
        "reference" => $ref,
        "prix" => $price,
        "quantite" => $quant
    ] ;
    $categories[$index]["produits"][] = $produit;
}else {
    echo " désolé , la categorie n'existe pas...";
}

// 5 Ajouter plusieurs produits a une categorie existante meme regle de validite que la question preccedente ;

$categorieExiste =  false;
$code = readline("saisir le code :");
foreach ($categories as $index => $categorie ) {
    if (($categorie["code"]) === $code) {
        $categorieExiste = true;
        break;
    }
} 

if ($categorieExiste) {
    
    $produits = [];

    do {
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

        do {
            $price = (int)readline("saisir le prix :");
        } while ($price <= 0);

        do {
            $quant = (int)readline("saisir la quantite :");
        } while ($price < 0);

        $produit =[
            "nom" => $nom,
            "reference" => $ref,
            "prix" => $price,
            "quantite" => $quant
        ] ;

        $produits[]= $produit;
        $choix = strtolower(readline(" voulez vous continuer  oui/non "));

    } while ($choix === "oui");

    $categorie= [
                    "code" => $code,
                    "nom" => $nom,
                    "produits" =>  $produits 
                ];

    $categories[] = $categorie;
}
?>