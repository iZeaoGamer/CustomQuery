<?php

namespace CustomQuery\iZeaoGamer\utils;

use JackMD\ConfigUpdater\ConfigUpdater;
use JackMD\UpdateNotifier\UpdateNotifier;

use pocketmine\utils\Config;

use CustomQuery\iZeaoGamer\Main;

use RuntimeException;

class Utils { //Register class.

    private function __construct(Main $plugin) { //A construction function, registering the main class to this class.
        $this->plugin = $plugin; //Register variable
    }
     /** @var int */
     private const CONFIG_VERSION = 0.2; //Register config version file - Will get updated everytime a new config version is available.

	 public static function checkPhar(): void{		
        if(!$this->plugin->isPhar()){
            $this->plugin->getLogger()->error("!== PHAR REQUIRED !==");
            $this->plugin->getLogger()->error("You need to run this plugin using a .phar file.");
            $this->plugin->getLogger()->error("You're currently running this plugin from source.");
            $this->plugin->getLogger()->error("You can get a packaged release at: https://poggit.pmmp.io/ci/iZeaoGamer/CustomQuery/CustomQuery");
            $this->plugin->getLogger()->error("Plugin disabling to prevent this plugin from using source code.");
       $this->plugin->getServer()->getPluginManager()->disablePlugin($this->plugin);
        }
    }
	/**
	 * Checks if a new version of this plugin is released.
	 */
    public static function PluginUpdater(): void{
        UpdateNotifier::checkUpdate($this->plugin, $this->plugin->getDescription()->getName(), $this->plugin->getDescription()->getVersion());
    }
	
       /**
	* Checks if a new config update is available for this plugin.
	*/
    private static function ConfigUpdater(): void{
        $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, array());
		ConfigUpdater::checkUpdate($this->plugin, $config, "config-version", self::CONFIG_VERSION);
    }
}
