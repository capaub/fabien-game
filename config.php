<?php
// constantes du programme

const MIN_PLAYERS = 1;
const MAX_PLAYERS = 3;

// les classes jouable
const WARRIOR = 1;
const WIZARD = 2;
const PRIEST = 3;
const THIEF = 4;

const TYPE_CONF = [
    WARRIOR => [
        'name' => 'Geurrier',
        'hp' => [150, 200],
    ],
    WIZARD => [
        'name' => 'Magicien',
        'hp' => [25, 75],
    ],
    PRIEST => [
        'name' => 'Prêtre',
        'hp' => [25, 75],
    ],
    THIEF => [
        'name' => 'Voleur',
        'hp' => [25, 50],
    ],
];

const NEW_GAME = 1;
const LOAD_GAME = 2;
