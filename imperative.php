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


?>