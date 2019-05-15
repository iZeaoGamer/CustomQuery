<?php
namespace CustomQuery\iZeaoGamer;

use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\event\Listener;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use pocketmine\plugin\PluginBase;

use CustomQuery\iZeaoGamer\tasks\ServerNameTask;
use CustomQuery\iZeaoGamer\commands\CustomQueryCommand;
use CustomQuery\iZeaoGamer\utils\Utils;


class Main extends PluginBase implements Listener{
    
    /** @var int */
    private const CONFIG_VERSION = 0.2;
    
    public function onLoad(): void{
        Utils::UpdateNotifier();
    }
    public function onEnable(): void{
        if(!is_file($this->getDataFolder() . "config.yml")){
            $this->saveDefaultConfig();
         Utils::ConfigUpdater();
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!is_dir($this->getDataFolder())) { @mkdir($this->getDataFolder()); }
        }
	    $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        if($config->get("enable-commands") === true){
        $this->getServer()->getCommandMap()->register("customquery", new CustomQueryCommand($this));
    if($config->get("default-server-name" === false)){
        if(count($player = $this->getServer()->getOnlinePlayers()) < 1){
            $this->getScheduler()->scheduleRepeatingTask(new ServerNameTask($this, $player), 20);
       }
      }
     }
    }
    public function onQuery(QueryRegenerateEvent $event){
	    $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        if($config->get("list-plugins") === true){
            $this->plugins = $config->get("set-plugins");
            foreach($this->plugins as $plugins){
            $event->setPlugins([$plugins]);
    }
		$config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
    if($config->get("infinity-slots") === true){
        $event->setMaxPlayerCount($event->getPlayerCount() + 1);
}
		$config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
if($config->get("enable-serverlist-motd") === true){
    $serverList = $config->get("motd-serverlist-message");
    $event->setServerName(TextFormat::colorize($serverList)); //To-Do implement some variables for this option.
        }
		$config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        if($config->get("fake-slots") === true){
        $minPlayerCount = $config->get("min-slots");
$maxPlayerCount = $config->get("max-slots");
$event->setPlayerCount(mt_rand($minPlayerCount, $maxPlayerCount));
        }
     }
   }
}
