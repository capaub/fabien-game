<?php

require 'config.php';
require 'functions.php';

echo PHP_EOL;
echo '== Start =='.PHP_EOL;
echo PHP_EOL;

echo ' '.NEW_GAME.' => Creat game'.PHP_EOL;
echo ' '.LOAD_GAME.' => Load game'.PHP_EOL;
echo PHP_EOL;

$aPlayers=[];
$sDate=date('Ymd_gi');

//echo $sDate;

switch (readline('What do you want to do ? ')) {
    case 1:
        echo PHP_EOL;
        do {
            $iNbPlayers = readline('Numbers of players ('.MIN_PLAYERS.' - '.MAX_PLAYERS.') ? ');
            echo PHP_EOL;
            $bIsValid = ctype_digit($iNbPlayers) && ($iNbPlayers <= MAX_PLAYERS) && ($iNbPlayers >= MIN_PLAYERS);
            if (!$bIsValid) {
                echo PHP_EOL;
                echo 'Incorrect value !'.PHP_EOL;
                echo PHP_EOL;
            }
        } while (!$bIsValid);

        // Creation et stockage des joueurs



        for ($i = 0; $i < $iNbPlayers; $i++) {
            $sUsername = readline('PLAYER '.($i + 1).' What is your name ? ');
            echo PHP_EOL;
            echo 'Class available :'.PHP_EOL;
            echo PHP_EOL;
                foreach (TYPE_CONF as $iKey => $aConf) {
                    echo ' '.$iKey.' => '.$aConf['name'].PHP_EOL;
                }

            do {
                echo PHP_EOL;
                $iTypeOfPlayer = readline($sUsername.', what is your class ? ');
                $bIsValid = array_key_exists($iTypeOfPlayer, TYPE_CONF);
                if (!$bIsValid) {
                    echo PHP_EOL;
                    echo ' Incorrect value !'.PHP_EOL;
                    echo PHP_EOL;
                }
            } while (!$bIsValid);
            $aPlayers[] = createPlayer($sUsername, $iTypeOfPlayer);
        }
        displayPlayers($aPlayers);
    break;
    case 2:
        $LoadGame = file_get_contents('Player.txt');
		$aPlayers = json_decode($LoadGame, true);
        displayPlayers($aPlayers);
        break;
    default:
        echo ' Incorrect value !'. PHP_EOL;
        die;
}

//print_r($aPlayers);

echo PHP_EOL;
echo 'And now... Option : '.PHP_EOL;
echo PHP_EOL;
echo ' '.(LOAD_GAME-1).' => CLear & load game'.PHP_EOL.
    ' '.(SAVE_GAME-1).' => Save game & exit'.PHP_EOL.
    ' '.(SAVE_LOAD_GAME-1).' => Save & load other'.PHP_EOL.
    ' '.(EXIT_GAME-1).' => Exit game without saving'.PHP_EOL;
echo PHP_EOL;

switch (readline('What do you want to do ? ')) {
    case (LOAD_GAME-1):
        echo PHP_EOL;
        echo PHP_EOL;
        echo 'Loading ... ';
        break;
    case (SAVE_GAME-1):
        echo PHP_EOL;
        do{
        $sName=readline('Save Name : ');
        $bIsValid=preg_match(VALID_CARAC_SAVE_NAME, $sName);
            if(!$bIsValid){
                echo PHP_EOL;
                echo 'Caractère invalide'.PHP_EOL;
                echo PHP_EOL;
            }
        }while (!$bIsValid);
        saveGame($aPlayers, $sName);
        echo PHP_EOL;
        echo '== End ==';
        break;
    case (SAVE_LOAD_GAME-1):
        echo PHP_EOL;
        echo PHP_EOL;
        echo 'Loading ... ';
        break;
    case (EXIT_GAME-1):
        echo PHP_EOL;
        echo PHP_EOL;
        echo '== End ==';
        break;
    default:
        echo ' Incorrect value !'. PHP_EOL;
        die;
}
