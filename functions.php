<?php

/**
 * @param string $username
 * @param int $type
 * @return array
 */
function createPlayer(string $sUsername, int $iTypeOfPlayer): array
{
    $aTypeConf = TYPE_CONF[$iTypeOfPlayer];

    return [
        'username' => $sUsername,
        'type' => $iTypeOfPlayer,
        'health' => rand($aTypeConf['hp'][0], $aTypeConf['hp'][1]),
    ];
}

/**
 * @param array $players
 * @return void
 */
function displayPlayers(array $players): void
{
    foreach ($players as $aPlayer) {
        $iType = $aPlayer['type'];
        $aTypeConf = TYPE_CONF[$iType];
        $sType = $aTypeConf['name'];

        echo '[ Joueur ' . $aPlayer['username'] . ' ; Type : ' . $sType . ' ; Health : ' . $aPlayer['health'] . ' ]' . PHP_EOL;
        echo sprintf(
            '[ Joueur : %s ; Type : %s ; Heath : %s ]' . PHP_EOL,
            $aPlayer['username'],
            $sType,
            $aPlayer['health']
        );
    }
}

/**
 * @param array $players
 * @param string $sFilename
 * @return void
 */
function saveGame(array $players, string $sFilename): void
{
    $sJsonPlayers = json_encode($players);
    file_put_contents('saves/' . $sFilename, $sJsonPlayers);
}


function loadGame(string $sFilename = 'SAVE_DEFAULT_NAME'): array
{
    $sJsonPlayer;
}