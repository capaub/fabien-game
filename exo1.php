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
<<<<<<< HEAD
//$sDate=date('Ymd_gi');
=======
$sDate=date('Ymd_gi');

//echo $sDate;
>>>>>>> f2c63e0e0f382bdab0454e1fee16f2cdf9f2858f

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
        $aGames=listGames();
        foreach ($aGames as $iIdx => $sFiles)
            {
                echo ' '.$iIdx.' => '.$sFiles.PHP_EOL;
            }
        $sFileIdx=readline();
        $sFilepath=$aGames[$sFileIdx];
        $sFilename=$sFilepath;
        $aPlayers=loadGame($sFilename);
        displayPlayers($aPlayers);
        break;
    default:
        echo '[ERROR] Incorrect value';
        die;
}

//print_r($aPlayers);

echo PHP_EOL;
echo 'Now ? '.PHP_EOL;
echo PHP_EOL;
echo ' '.(DISPLAY_PLAYERS-2).' => Display players'.PHP_EOL.
    ' '.(HEALING-2).' => Win health for all'.PHP_EOL.
    ' '.(SAVE-2).' => Save game and exit'.PHP_EOL.
    ' '.(EXIT_GAME-2).' => Exit game'.PHP_EOL;
echo PHP_EOL;
echo 'What do you want to do ? ';

<<<<<<< HEAD

//do {
    switch (readline()) {
        case (DISPLAY_PLAYERS - 2):
            echo PHP_EOL;
            displayPlayers($aPlayers);
            echo PHP_EOL;
            break;
        case (HEALING - 2):
            echo PHP_EOL;
            $iHealing = readline('How much is the healing spell worth ? ') . PHP_EOL;;
            healing($aPlayers, $iHealing);
            displayPlayers($aPlayers);
            echo PHP_EOL;
            break;
        case (SAVE - 2):
            echo PHP_EOL;
            do {
                $sName = readline('Save Name : ').'.json';
                $bIsValid = preg_match(VALID_CARAC, $sName);
                if (!$bIsValid) {
                    echo PHP_EOL;
                    echo 'Caractère invalide' . PHP_EOL;
                    echo PHP_EOL;
                }
            } while (!$bIsValid);
            saveGame($aPlayers, $sName);
            echo PHP_EOL;

            break;
        //case (EXIT_GAME - 2):
          //  echo PHP_EOL;
            //echo '== End ==';
         //   break;
        //default:
        //  echo ' Incorrect value !'. PHP_EOL;
        //die;
    }
//} while (EXIT_GAME - 2);

//echo '== End =='.PHP_EOL;
=======
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
>>>>>>> f2c63e0e0f382bdab0454e1fee16f2cdf9f2858f
