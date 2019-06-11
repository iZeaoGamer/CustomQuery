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

    /**
	 * Checks if the required virions/libraries are present before enabling the plugin.
	 */
	public static function checkVirions(): void{
		$virionsRequired = [
			UpdateNotifier::class,
			ConfigUpdater::class
		];
		foreach($virionsRequired as $class){
			if(!class_exists($class)){
				throw new RuntimeException("CustomQuery plugin will only work if you use the plugin phar from Poggit.");
			}
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
