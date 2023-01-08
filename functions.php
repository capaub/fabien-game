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
    foreach ($players as $iKey => $aPlayer) {
        $iType = $aPlayer['type'];
        $aTypeConf = TYPE_CONF[$iType];
        $sType = $aTypeConf['name'];

        echo PHP_EOL;
        echo sprintf(
            '- Player ' . ($iKey+1) . ' - ' . PHP_EOL .
            'Name : %s ' . PHP_EOL .
            'Type : %s ' . PHP_EOL .
            'Heath : %s' . PHP_EOL,
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
function saveGame(array $players, string $sFilename = SAVE_DEFAULT_NAME): void
{
    file_put_contents($sFilename, json_encode($players));
}

/**
 * @param string $sFilename
 * @return array
 */
function loadGame(string $sFilename = 'SAVE_DEFAULT_NAME'): array
{
    $sJsonPlayer;
}