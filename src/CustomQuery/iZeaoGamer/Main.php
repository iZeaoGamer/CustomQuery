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
    /*
     * This function is when plugins are enabling.
     * @return void
     */
    public function onEnable(): void{
        
        if(!$this->isUsingSpoon()){
        if(!$this->isPhar()){
            $thisn->getLogger()->error("!== PHAR REQUIRED !==");
            $this->getLogger()->error("You need to run this plugin using a .phar file.");
            $this->getLogger()->error("You're currently running this plugin from source.");
            $this->getLogger()->error("You can get a packaged release at: https://poggit.pmmp.io/ci/iZeaoGamer/CustomQuery/CustomQuery");
            $this->getLogger()->error("Plugin disabling to prevent this plugin from using source code.");
       $this->getServer()->getPluginManager()->disablePlugin($this);
        }
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
        $this->getServer()->getCommandMap()->register("query", new CustomQueryCommand($this));
    if($config->get("default-server-name" === false)){
        if(count($player = $this->getServer()->getOnlinePlayers()) < 1){
            $this->getScheduler()->scheduleRepeatingTask(new ServerNameTask($this, $player), 20);
       }
    }
        }
    }
	 /**
     * Checks if server is using a spoon.
     *
     * @return bool
     */
    public function isUsingSpoon(): bool{ //todo move to Utils class.
        if ($this->getServer()->getName() !== "PocketMine-MP") {
            $this->getLogger()->error("You're using a spoon, therefore, the plugin will not function. Please use Pocketmine-MP server software, then try again. Disabling plugin..");
		$this->getServer()->getPluginManager()->disablePlugin($this);
            return true;
        }
        if ($this->getDescription()->getAuthors() !== ["iZeaoGamer"] || $this->getDescription()->getName() !== "CustomQuery") {
            $this->getLogger()->error("You are not using the original version of this plugin (CustomQuery) by iZeaoGamer. Please use the original version of this plugin. Plugin disabled.");
		$this->getServer()->getPluginManager()->disablePlugin($this);
            return true;
        }
        return false;
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
