<?php 
namespace CustomQuery\iZeaoGamer\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

use CustomQuery\iZeaoGamer\Main;
use pocketmine\Player;

class CustomQueryCommand extends Command {
    public function __construct(Main $plugin) { //The construct to lead to the main class.
        parent::__construct("query", "Set up your query settings.", "/query <setting>", ["cq"]); //Command, description, usage, and aliases, each extendations can be different to others. This is from extending commands file for Pocketmine. 
        $this->plugin = $plugin; //Registering the variable so it can be used in functions. (Within this class file)
    }
public function execute(CommandSender $sender, string $label, array $args): bool{
    $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, array());
    if($config->get("allow-console") === false){
        if(!($sender instanceof Player)){
            $sender->sendMessage(TextFormat::colorize("&cPlease use this command in game."));
        } elseif($config->get("allow-console") === true && $sender instanceof Player or $config->get("allow-console") === false && $sender instanceof Player){
            if(!$sender->hasPermission($config->get("permission"))){
        $sender->sendMessage(TextFormat::colorize("&cYou don't have permission to use this command."));
        return false;
     }
    }
    if(!isset($args[0])){
        $sender->sendMessage(TextFormat::colorize("&aUsage incorrect. Please use: &b/$label <setting> <value>"));
        return true;
    }
}
if($args[0] === null){
$sender->sendMessage(TextFormat::colorize("&cInvalid setting &4" . $args[0] . "&c Type: /$label help for a list of helpful commands."));
return true;
}
if($args[0] === "help"){
    $sender->sendMessage(TextFormat::colorize("&aHelp page:"));
    $sender->sendMessage(TextFormat::colorize("&b/$label reload &7- Reload config."));
    $sender->sendMessage(TextFormat::colorize("&b/$label <settings> <value> &7- Setting the config options."));//to-do see if we should add all command arguments to /customquery help.
    return true;
}
    if($args[0] === "reload"){
        $this->plugin->reloadConfig();
        $sender->sendMessage(TextFormat::colorize("&aConfig reloaded successfully."));
        return true;
    }//To-Do make messages editable.
    if($args[0] === "fake-plugins"){
        if(!isset($args[1])){
            $sender->sendMessage(TextFormat::colorize("&cOption must return a value (true/false)"));
            return true;
        }
    }
        if($args[1] === "true"){
            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
            $config->set("fake-plugins", true);
        } else {
            if($args[1] === "false"){
                $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
                $config->set("fake-plugins", false);
                return true;
        } else {
if($args[1] != true and $args[1] != false){
$sender->sendMessage(TextFormat::colorize("&cInvalid value."));
return true;
        }
    }
}
if($args[0] === "show-plugins"){
    if(!isset($args[1])){
        $sender->sendMessgae(TextFormat::colorize("&cOption must return a value (true/false)"));
        return true;
    }
}
    if($args[1] === "true"){
        $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
        $config->set("show-plugins", true);
    } else {
        if($args[1] === "false"){
            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] option to $args[1]."));
            $config->set("show-plugins", false);
            return true;
    } else {
if($args[1] != true and $args[1] != false){
$sender->sendMessage(TextFormat::colorize("&cInvalid value."));
return true;
    }
}
}
        if($args[0] === "infinity-slots"){
            if(!isset($args[1])){
                $sender->sendMessage(TextFormat::colorize("&cOption must return a value (true/false)"));
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
            } else {
if($args[1] != true and $args[1] != false){
$sender->sendMessage(TextFormat::colorize("&cInvalid value."));
return true;
        }
            }
}
            if($args[0] === "enable-serverlist-motd"){
                if(!isset($args[1])){
                    $sender->sendMessage(TextFormat::colorize("&cOption must return a value (true/false)"));
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
                       } else {
if($args[1] != true and $args[1] != false){
$sender->sendMessage(TextFormat::colorize("&cInvalid value."));
return true;
}
                }
}
                if($args[0] === "fake-slots"){
                    if(!isset($args[1])){
                        $sender->sendMessage(TextFormat::colorize("&cOption must return a value (true/false)"));
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
                           } else {
if($args[1] != true and $args[1] != false){
$sender->sendMessage(TextFormat::colorize("&cInvalid value."));
return true;
}
                    }
}
                    if($args[0] === "default-server-name"){
                        if(!isset($args[1])){
                            $sender->sendMessage(TextFormat::colorize("&cOption must return a value (true/false)"));
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
                               } else {
if($args[1] != true and $args[1] != false){
$sender->sendMessage(TextFormat::colorize("&cInvalid value."));
return true;
}
}
}
                        
                        if($args[0] === "set-fake-plugins"){
                            if(!isset($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cOption cannot be empty. Use: /$label $args[0] <plugins>"));
                                return true;
                            }
                        }
                                if(!is_array($config->get("set-fake-plugins"))){
                                    $sender->sendMessage(TextFormat::colorize("&cPlease use arrays []."));
                                } else {
                                    $fakeplugins = implode(" ", $args);
                                    $config->set("set-fake-plugins", $fakeplugins);
                                        $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' to &5" . $fakeplugins . "&d."));
                                        return true;
                                    }
                        if($args[0] === "motd-serverlist-message"){
                            if(!isset($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cOption cannot be left empty."));
                                return true;
                            }
                        $mslm = implode(" ", $args);
                            $config->set("motd-serverlist-message", $mslm);
                            $sender->sendMessage(TextFormat::colorize("&dYou've set $args[0] to&5 " . $mslm . "&d."));
                            return true;
                        }
                        if($args[0] === "new-player-motd"){
                            if(!isset($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cOption cannot be left empty."));
                                return true;
                            }
                        $npm = implode(" ", $args);
                            $config->set("new-player-motd", $npm);
                            $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' message to " . $npm));
                            return true;
                        }
                        if($args[0] === "old-player-motd"){
                            if(!isset($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cOption cannot be left empty."));
                            }
                        }
                        $opm = implode(" ", $args);
                            $config->set("old-player-motd", $opm);
                            $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' message to " . $opm));
                            return true;
                        if($args[0] === "min-slots"){
                            if(!is_int($args[1])){
                                $ms = implode(" ", $args);
                                $sender->sendMessage(TextFormat::colorize("&cInvalid option - Option must be a numeric number,  $ms given."));
                                return true;
                            }
                            if(!isset($args[1])){
                                $sender->sendMessage(TextFormat::colorize("&cOption cannot be left empty."));
                            return true;
                            }
                        $ms = implode(" ", $args);
                                $config->set("min-slots", $ms);
                                $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' option to &5" . $ms));
                                return true;
                            }
                            if($args[0] === "max-slots"){
                                if(!is_int($args[1])){
                                    $ms = implode(" ", $args);
                                    $sender->sendMessage(TextFormat::colorize("&cInvalid option - Option must be a numeric number, $ms given."));
                                }
                                if(!isset($args[1])){
                                    $sender->sendMessage(TextFormat::colorize("&cOption cannot be left empty."));
                                return true;
                                }
                            $ms = implode(" ", $args);
                                    $config->set("max-slots", $ms);
                                    $sender->sendMessage(TextFormat::colorize("&dYou've set '$args[0]' option to &5" . $ms));
                                    return true;
                                }
                            }
}
