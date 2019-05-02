<?php
namespace CustomQuery\iZeaoGamer;
use pocketmine\utils\Config;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

use CustomQuery\iZeaoGamer\tasks\ServerNameTask;

class Main extends PluginBase implements Listener{

    public function onEnable(): void{
        if(!is_file($this->getDataFolder() . "config.yml")){
            $this->saveDefaultConfig();
        $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!is_dir($this->getDataFolder())) { @mkdir($this->getDataFolder()); }
        }
    if($config->get("default-server-name" === false)){
        if(($player = count($this->getServer()->getOnlinePlayers() < 1))){
            $this->getScheduler()->scheduleRepeatingTask(new ServerNameTask($this, $player), 20);
        }
    }
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
public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
if($command->getName() === "customquery"){
    if(!$sender->hasPermission("customquery.settings")){ //to-do configure permission nodes for using /customquery.
        $sender->sendMessage(TextFormat::colorize("&cYou don't have permission to use this command."));
        return false;
    }
    if(!isset($args[0])){
        $sender->sendMessage(TextFormat::colorize("&aUsage incorrect. Please use: &b/$label <setting> <value>"));
        return true;
    }
}
if($args[0] === "help"){
    $sender->sendMessage(TextFormat::colorize("&aHelp page:"));
    $sender->sendMessage(TextFormat::colorize("&b/$label reload &7- Reload config."));
    $sender->sendMessage(TextFormat::colorize("&b/$label <settings> <value> &7- Setting the config options."));//to-do see if we should add all command arguments to /customquery help.
    return true;
}
    if($args[0] === "reload"){
        $this->reloadConfig();
        $sender->sendMessage(TextFormat::colorize("&aConfig reloaded successfully."));
        return true;
    }//To-Do make messages editable.
    if($args[0] === "list-plugins"){
        if(!isset($args[1])){
            $sender->sendMessage(TextFormat::colorize("&cOption must return a value. true/false."));
            return true;
        }
    }
        if($args[1] === "true"){
            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
            $config->set("list-plugins", true);
        } else {
            if($args[1] === "false"){
                $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                $config->set("list-plugins", false);
                return true;
        }
        }
        if($args[0] === "infinity-slots"){
            if(!isset($args[1])){
                $sender->sendMessage(TextFormat::colorize("&cOption must return a value. true/false."));
                return true;
            }
        }
            if($args[1] === "true"){
                $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                $config->set("infinity-slots", $args[1]);
            } else {
                if($args[1] === "false"){
                $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                $config->set("infinity-slots", $args[1]);
            }
            }
            if($args[0] === "enable-serverlist-motd"){
                if(!isset($args[1])){
                    $sender->sendMessage(TextFormat::colorize("&cOption must return a value. true/false."));
                    return true;
                }
            }
                if($args[1] === "true"){
                    $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                    $config->set("enable-serverlist-motd", $args[1]);
                } else {
                    if($args[1] === "false"){
                    $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                    $config->set("enable-serverlist-motd", $args[1]);
                }
                }
                if($args[0] === "fake-slots"){
                    if(!isset($args[1])){
                        $sender->sendMessage(TextFormat::colorize("&cOption must return a value. true/false."));
                        return true;
                    }
                }
                    if($args[1] === "true"){
                        $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                        $config->set("fake-slots", $args[1]);
                    } else {
                        if($args[1] === "false"){
                        $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                        $config->set("fake-slots", $args[1]);
                    }
                    }
                    if($args[0] === "default-server-name"){
                        if(!isset($args[1])){
                            $sender->sendMessage(TextFormat::colorize("&cOption must return a value. true/false."));
                            return true;
                        }
                    }
                        if($args[1] === "true"){
                            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                            $config->set("default-server-name", $args[1]);
                        } else {
                            if($args[1] === "false"){
                            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                            $config->set("default-server-name", $args[1]);
                        }
                        }
                        if($args[0] === "set-plugins"){
                            if(!isset($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cOption cannot be empty. Use: /$label $args[0] <plugins>"));
                                return true;
                            }
                        }
                                if(!in_array($sender->getName(), $config->get("set-plugins"))){
                                    $sender->sendMessage(TextFormat::colorize("&cPlease use arrays []."));
                                } else {
                                    $config->set("set-plugins", $args[1]);
                                        $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' to &5" . $args[1] . "&d."));
                                        return true;
                                    }
                        if($args[0] === "motd-serverlist-message"){
                            $config->set("motd-serverlist-message", $args[1]);
                            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] to&5 " . $args[1] . "&d."));
                            return true;
                        }
                        if($args[0] === "new-player-motd"){
                            $config->set("new-player-motd", $args[1]);
                            $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' message to " . $args[1]));
                            return true;
                        }
                        if($args[0] === "old-player-motd"){
                            $config->set("old-player-motd", $args[1]);
                            $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' message to " . $args[1]));
                            return true;
                        }
                        if($args[0] === "min-slots"){
                            if(!is_int($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cInvalid option - Option must be a numeric number, $args[1] given."));
                            } else {
                                $config->set("min-slots", $args[1]);
                                $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' option to &5" . $args[1]));
                                return true;
                            }
                        }
                            if($args[0] === "max-slots"){
                                if(!is_int($args[1])){
                                    $sender->sendMessage(TextFormat::colorize("&cInvalid option - Option must be a numeric number, $args[1] given."));
                                } else {
                                    $config->set("max-slots", $args[1]);
                                    $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' option to &5" . $args[1]));
                                    return true;
                                }
                            }
                            return true;
                        }
                    }

