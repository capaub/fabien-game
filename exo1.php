<?php
echo '== Start ==' .PHP_EOL;

require 'config.php';
require 'functions.php';

echo 'Début du programme' . PHP_EOL;
echo '[ ' . NEW_GAME . ' ] Créer une partie' . PHP_EOL;
echo '[ ' . LOAD_GAME . ' ] Charger une partie' . PHP_EOL;

switch (readline('Que veux tu faire ? ')) {
    case 1:
        do {
            $iNbPlayers = readline('Combien de joureurs (' . MIN_PLAYERS . ' - ' . MAX_PLAYERS . ') ? ');
            $bIsValid = ctype_digit($iNbPlayers) && ($iNbPlayers <= MAX_PLAYERS) && ($iNbPlayers >= MIN_PLAYERS);
            if (!$bIsValid) {
                echo 'Valeurs incorrect' . PHP_EOL;
            }
        } while (!$bIsValid);

        // Creation et stockage des joueurs

        $aPlayers = [];

        for ($i = 0; $i < $iNbPlayers; $i++) {
            $sUsername = readline('[Joueur ' . ($i + 1) . '] Quel est votre pseudo ? ');
            echo 'Voici les classes disponible :' . PHP_EOL;
            foreach (TYPE_CONF as $iKey => $aConf) {
                echo '[ ' . $iKey . ' ] pour ' . $aConf['name'] . PHP_EOL;
            }

            do {
                $iTypeOfPlayer = readline('[ ' . $sUsername . ' ] Quel est ta classe ? ');
                $bIsValid = array_key_exists($iTypeOfPlayer, TYPE_CONF);
                if (!$bIsValid) {
                    echo "La saisie n'est pas valide" . PHP_EOL;
                }
            } while (!$bIsValid);
            $aPlayers[] = createPlayer($sUsername, $iTypeOfPlayer);
        }
    break;
    case 2:
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

//print_r($aPlayers);

displayPlayers($aPlayers);



echo '== End ==';

