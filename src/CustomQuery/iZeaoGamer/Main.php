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
use spoondetector\SpoonDetector;
class Main extends PluginBase implements Listener{
    /*
     * This function is when plugins are enabling.
     * @return void
     */
    public function onEnable(): void{
       SpoonDetector::printSpoon($this, "spoon.txt");
        if(!$this->isPhar()){
            $this->getLogger()->error("!== PHAR REQUIRED !==");
            $this->getLogger()->error("You need to run this plugin using a .phar file.");
            $this->getLogger()->error("You're currently running this plugin from source.");
            $this->getLogger()->error("You can get a packaged release at: https://poggit.pmmp.io/ci/iZeaoGamer/CustomQuery/CustomQuery");
            $this->getLogger()->error("Plugin disabling to prevent this plugin from using source code.");
       $this->getServer()->getPluginManager()->disablePlugin($this);
        }
        if(!is_file($this->getDataFolder() . "config.yml")) {
            $this->saveDefaultConfig();
        }
	     $this->utils = new Utils($this);
            $this->utils->PluginUpdater();
	        $this->utils->ConfigUpdater();
   
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!is_dir($this->getDataFolder())) {
            @mkdir($this->getDataFolder());
        }
	    $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        if($config->get("enable-commands") === true){
        $this->getServer()->getCommandMap()->register("customquery", new CustomQueryCommand($this));
    if($config->get("default-server-name" === false)){
        if(count($offline = $this->getServer()->getOnlinePlayers()) < 1){
            $this->getScheduler()->scheduleRepeatingTask(new ServerNameTask($this, $offline), 20);
	}elseif(count($online = $this->getServer()->getOnlinePlayers()) >= 1){
		$this->getScheduler()->scheduleRepeatingTask(new ServerNameTask($this, $online), 20);
       }
    }
        }
    }
    /*
    * An event function, allowing you to edit parts of the Query system for your servers.
    */
    public function onQuery(QueryRegenerateEvent $event){
	    $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        if($config->get("show-plugins") === true){
            $event->setListPlugins(true);
        }
        if($config->get("fake-plugins") === true){
            $this->plugins = $config->get("set-fake-plugins");
            foreach($this->plugins as $plugins){
            $event->setPlugins([$plugins]);
    }
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
