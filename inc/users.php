<?php

$users = [
  "Arthur" => [               // $users['Arthur']
      "pass" => 'kaamelott',      // $users['Arthur']['pass']
      "data" => [                   // $users['Arthur']['data']
        "role" => 'Roi de Bretagne',  // $users['Arthur']['data']['role']
        "age" => 37,                  // $users['Arthur']['data']['age']
        "gimmick" => 'à la volette'   // $users['Arthur']['data']['gimmick']
      ]
  ],
  "Perceval" => [
      "pass" => 'pas faux',
      "data" => [
        "role" => 'Chevalier',
        "age" => 39,
        "gimmick" => 'Provencal le Gaulois'
      ]
  ],
  "Lancelot" => [
      "pass" => 'Guenièvre',
      "data" => [
        "role" => 'Bras droit',
        "age" => 35,
        "gimmick" => 'Je me réserve pour le grand amour'
      ]
  ],
];