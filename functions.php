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
    foreach ($players as $iKey => $player) {
        $iType = $player['type'];
        $aTypeConf = TYPE_CONF[$iType];
        $sType = $aTypeConf['name'];

        echo PHP_EOL;
        echo sprintf(
            '- Player ' . ($iKey+1) . ' - ' . PHP_EOL .
            'Name : %s ' . PHP_EOL .
            'Type : %s ' . PHP_EOL .
            'Heath : %s' . PHP_EOL,
            $player['username'],
            $sType,
            $player['health']
        );
    }
}

/**
 * @param array $player
 * @param int $value
 * @return void
 */
function healing(array &$players, int $value): void
{
    foreach ($players as &$player) {
        $player['health'] += $value;
    }
}

/**
 * @param array $players
 * @param string $sFilename
 * @return void
 */
function saveGame(array $players, string $sFilename = SAVE_DEFAULT_NAME.'.json'): void
{
    file_put_contents(SAVE_DIR.DIRECTORY_SEPARATOR.$sFilename, json_encode($players));
}

/**
 * @param string $sFilename
 * @return array
 */
<<<<<<< HEAD
function loadGame(string $sFilename): array
{
    $sFilepath=$sFilename;
//    if (!file_exists($sFilepath)) {
  //      return [];
   // }

    $sContent = file_get_contents($sFilepath);

    return json_decode($sContent, true);
    //return json_decode(file_get_contents($sFilename), true);
}

/**
 * @return array
 */
function listGames(): array
{
    return glob(SAVE_DIR . DIRECTORY_SEPARATOR . '*.json');
}
=======
function loadGame(string $sFilename = SAVE_DEFAULT_NAME.'json'): array
{
    $sJsonPlayer;
}
>>>>>>> f2c63e0e0f382bdab0454e1fee16f2cdf9f2858f
