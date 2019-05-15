<?php 
namespace CustomQuery\iZeaoGamer\utils;
use JackMD\ConfigUpdater\ConfigUpdater;
use JackMD\UpdateNotifier\UpdateNotifier;
use pocketmine\utils\Config;
use CustomQuery\iZeaoGamer\Main;
use RuntimeException;

class Utils{

    public function construct__(Main $plugin){
        $this->plugin = $plugin;
    }
     /** @var int */
     private const CONFIG_VERSION = 0.2;

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
    public static function UpdateNotifer(): void{
        UpdateNotifier::checkUpdate($this->plugin, $this->plugin->getDescription()->getName(), $this->plugin->getDescription()->getVersion());
    }
    private static function ConfigUpdater(): void{
        $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, array());
		ConfigUpdater::checkUpdate($this->plugin, $config, "config-version", self::CONFIG_VERSION);
    }
}
