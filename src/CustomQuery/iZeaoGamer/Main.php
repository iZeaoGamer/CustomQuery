<?php
namespace CustomQuery\iZeaoGamer;

use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\event\Listener;

use JackMD\ConfigUpdater\ConfigUpdater;
use JackMD\UpdateNotifier\UpdateNotifier;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use pocketmine\plugin\PluginBase;

use CustomQuery\iZeaoGamer\tasks\ServerNameTask;
use CustomQuery\iZeaoGamer\commands\CustomQueryCommand;


class Main extends PluginBase implements Listener{
    /** @var int */
	private const CONFIG_VERSION = 0.1;
	
    public function onEnable(): void{
        if(!is_file($this->getDataFolder() . "config.yml")){
            $this->saveDefaultConfig();
		 $this->checkConfig();
            UpdateNotifier::checkUpdate($this, $this->getDescription()->getName(), $this->getDescription()->getVersion());
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!is_dir($this->getDataFolder())) { @mkdir($this->getDataFolder()); }
        }
        if($config->get("enable-commands") === true){
        $this->getServer()->getCommandMap()->register("customquery", new CustomQueryCommand($this));
    if($config->get("default-server-name" === false)){
        if(($player = count($this->getServer()->getOnlinePlayers() < 1))){
            $this->getScheduler()->scheduleRepeatingTask(new ServerNameTask($this, $player), 20);
       }
      }
     }
    }
    /**
	 * Checks if the config is up-to-date.
	 */
	private function checkConfig(): void{
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
		ConfigUpdater::checkUpdate($this, $config, "config-version", self::CONFIG_VERSION);
	}
    public function onQuery(QueryRegenerateEvent $event){
        if($config->get("list-plugins") === true){
            $this->plugins = $config->get("set-plugins");
            foreach($this->plugins as $plugins){
            $event->setPlugins([$plugins]);
    }
    if($config->get("infinity-slots") === true){
        $event->setMaxPlayerCount($event->getPlayerCount() + 1);
}
if($config->get("enable-serverlist-motd") === true){
    $serverList = $config->get("motd-serverlist-message");
    $event->setServerName(TextFormat::colorize($serverList)); //To-Do implement some variables for this option.
        }
        if($config->get("fake-slots") === true){
        $minPlayerCount = $config->get("min-slots");
$maxPlayerCount = $config->get("max-slots");
$event->setPlayerCount(mt_rand($minPlayerCount, $maxPlayerCount));
        }
     }
   }
}
