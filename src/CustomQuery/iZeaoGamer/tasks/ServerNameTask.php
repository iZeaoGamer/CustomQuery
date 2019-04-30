<?php
namespace CustomQuery\iZeaoGamer\tasks;

use pocketmine\scheduler\Task;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

use CustomQuery\iZeaoGamer\Main;

class ServerNameTask extends Task{

    public $plugin;
    public $player;

    public function __construct(Main $plugin, Player $player){
    $this->plugin = $plugin;
    $this->player = $player; 
    }
    public function onRun(int $currentTick): void{
    $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, array());
    if($config->get("default-servername") === false){
        if($config->get("enable-player-motd") === true){
    $serverName = $config->get("new-player-motd");
    $serverNameOld = $config->get("old-player-motd");
    if(!$this->player instanceof Player){
    if(!$this->player->hasPlayedBefore()){
    $this->plugin->getServer()->getNetwork()->setName(TextFormat::colorize(str_replace(["{online}", "{maxplayers}", "{newbie}"], [count($this->plugin->getServer()->getOnlinePlayers()), $this->plugin->getServer()->getMaxPlayers(), $this->player->getName()], $serverName))); //to-do not sure if this'll work.
    } else {
     $this->plugin->getServer()->getNetwork()->setName(TextFormat::colorize(str_replace(["{online}", "{maxplayers}", "{player}"], [count($this->plugin->getServer()->getOnlinePlayers()), $this->plugin->getServer()->getMaxPlayers(), $this->player->getName()], $serverNameOld)));
      }
     }   
    }
   }
 }
}