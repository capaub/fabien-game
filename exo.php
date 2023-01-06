<?php
echo '== Start ==' .PHP_EOL;

// constante du programme

const MIN_PLAYERS = 1;
const MAX_PLAYERS = 3;

// les classes jouable

const WARRIOR = 1;
const WIZARD = 2;
const PRIEST = 3;
const THIEF = 4;

// Tabeau des classes

const TYPES = [
	WARRIOR => [
		'name' => 'Geurrier',
		'hp' => [150, 200],
	],
	WIZARD => [
		'name' => 'Magicien',
		'hp' => [25, 75],
	],
	PRIEST => [
		'name' => 'Pretre',
		'hp' => [25, 75],
	],
	THIEF => [
		'name' => 'Voleur',
		'hp' => [25, 50],
	],
];

// Début d'une partie ; choix load ou new

echo '[1] Nouvelle partie' . PHP_EOL . '[2] Continuer' . PHP_EOL;
$iStart = readline('Choix de la partie : ');

// création d'une partie ou charement d'une partie existante

switch($iStart) {
	case 1 :
	
// Nombre de joueurs
	
		do {
		$iNbPlayers = readline('Combien de joureurs ('.MIN_PLAYERS.' - '.MAX_PLAYERS.') ? ');
		$bIsValid = ctype_digit($iNbPlayers) && ($iNbPlayers <= MAX_PLAYERS) && ($iNbPlayers >= MIN_PLAYERS);
		if (!$bIsValid) {
			echo 'Valeurs incorrect' . PHP_EOL;
		};
		} while (!$bIsValid);

// Creation et stockage des joueurs

		$aPlayers = [];

		for ($i = 0 ; $i < $iNbPlayers ; $i++) {
			$sUsername = readline('[Joueur '. ($i + 1) .'] Quel est votre pseudo ? ');
			
			foreach (TYPES as $ikey => $TYPE) {
				echo '[' . $ikey . ']' . ' ' . TYPES[$ikey]['name'] . PHP_EOL;
			}

// Choix de la classe	

			do {
				$iTypeOfPlayer = readline('[Joueur '. ($sUsername) .'] Choigissez votre classe en tapant son numero : ');
				$bIsValid = array_key_exists($iTypeOfPlayer, TYPES);
				if (!$bIsValid) {
					echo 'Valeur incorrect' . PHP_EOL;
				}
			} while (!$bIsValid);
			
// Création du personnage
			
			$iHealth = rand(TYPES[$iTypeOfPlayer]['hp'][0],TYPES[$iTypeOfPlayer]['hp'][1]);
			$aPlayers[] = [
				'username' => $sUsername,
				'type' => $iTypeOfPlayer,
				'health' => $iHealth,
			];
		}
		
// affichage (humain)
		
		foreach ($aPlayers as $i => $aPlayer){
			$iType = $aPlayer['type'];
			echo sprintf(
				'[Joureur : %s ; Health : %s ; Type : %s]'. PHP_EOL,
				$aPlayer['username'],
				$aPlayer['health'],
				TYPES[ $iType ]['name'],
			);
		}
	break;

// charement d'une partie existante
	
	case 2 :
		$LoadGame = file_get_contents('Player.txt');
		$aPlayers = json_decode($LoadGame, true);
		foreach ($aPlayers as $iKey => $aPlayer){
			$iType = $aPlayer['type'];
			echo sprintf(
				'[Joureur : %s ; Health : %s ; Type : %s]'. PHP_EOL,
				$aPlayer['username'],
				$aPlayer['health'],
				TYPES[ $iType ]['name'],
			);
		}
	break;
}

// affichage (debug)

print_r($aPlayers);

// Enregistrement d'une partie

$SaveGame = 'Player.txt';

file_put_contents($SaveGame, json_encode($aPlayers));