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

const NEW_GAME=1;
const LOAD_GAME=2;
const DISPLAY_PLAYERS=3;
const HEALING=4;
const SAVE=5;
const EXIT_GAME=6;

<<<<<<< HEAD
const SAVE_DIR='saves';
const SAVE_DEFAULT_NAME='game.json';
const VALID_CARAC='#^[a-zA-Z0-9._éàèùç]*$#';
=======
const SAVE_DEFAULT_NAME='game';

const VALID_CARAC_SAVE_NAME='#^[a-zA-Z0-9-_éàèùç]*$#';
>>>>>>> f2c63e0e0f382bdab0454e1fee16f2cdf9f2858f
