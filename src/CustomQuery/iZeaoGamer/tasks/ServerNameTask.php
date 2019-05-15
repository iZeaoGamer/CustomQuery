<?php
namespace CustomQuery\iZeaoGamer\tasks;

use pocketmine\scheduler\Task;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

use CustomQuery\iZeaoGamer\Main;

class ServerNameTask extends Task{ //A task class

    public $plugin;
    public $player;

    public function __construct(Main $plugin, Player $player){ //A construct. Main, and Player are included so it recognizes the outcome of a player, and main class so we can use $this->plugin, as shown below.
    $this->plugin = $plugin; //Registering variables.
    $this->player = $player;  //Registering variables.
    }
    public function onRun(int $currentTick): void{ //A function, where you can run the task, and use the example functions below.
    $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, array());
    if($config->get("default-servername") === false){
        if($config->get("enable-player-motd") === true){
    $serverName = $config->get("new-player-motd");
    $serverNameOld = $config->get("old-player-motd");
    if(!$this->player instanceof Player){ //This shouldn't instance a player if they're not online.
    if(!$this->player->hasPlayedBefore()){ //This shows the MOTD message if they've never played before.
    $this->plugin->getServer()->getNetwork()->setName(TextFormat::colorize(str_replace(["{online}", "{maxplayers}", "{newbie}"], [count($this->plugin->getServer()->getOnlinePlayers()), $this->plugin->getServer()->getMaxPlayers(), $this->player->getName()], $serverName))); //to-do not sure if this'll work.
    } else {
        //Now, the below message will be if the player has played before, as } else { will give the latest and lowest if statement.
     $this->plugin->getServer()->getNetwork()->setName(TextFormat::colorize(str_replace(["{online}", "{maxplayers}", "{player}"], [count($this->plugin->getServer()->getOnlinePlayers()), $this->plugin->getServer()->getMaxPlayers(), $this->player->getName()], $serverNameOld)));
      }
     }   
    }
   }
 }
}