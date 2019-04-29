<?php
namespace CustomQuery\iZeaoGamer;

use pocketmine\utils\Config;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

    public function onEnable(): void{
        if(!is_file($this->getDataFolder() . "config.yml")){
            $this->saveDefaultConfig();
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!is_dir($this->getDataFolder())) { @mkdir($this->getDataFolder()); }
    }
    }
    public function onQuery(QueryRegenerateEvent $event){
        if($config->get("list-plugins") === true){
            $this->list = $config->get("set-plugins");
            foreach($this->list as $plugins){
            $event->setPlugins([$plugins]);
    }
    if($config->get("infinity-slots") === true){
        $event->setMaxPlayerCount($event->getPlayerCount() + 1);
}
$serverName = $config->get("server-name");
$event->setServerName($serverName);
}
        if($config->get("fake-slots") === true){
        $minPlayerCount = $config->get("min-slots");
$maxPlayerCount = $config->get("max-slots");
$event->setPlayerCount(mt_rand($minPlayerCount, $maxPlayerCount));
            }
         }
        }
