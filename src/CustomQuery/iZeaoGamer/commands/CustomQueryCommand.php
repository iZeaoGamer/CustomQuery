<?php 
namespace CustomQuery\iZeaoGamer\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

use CustomQuery\iZeaoGamer\Main;

class CustomQueryCommand extends Command {
    public function __construct(Main $plugin) {
        parent::__construct("query", "Set up your query settings.", "/query settings", ["cq"]);
        $this->plugin = $plugin;
    }
public function execute(CommandSender $sender, string $label, array $args): bool{
    $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, array());
if($command->getName() === "customquery"){
    if(!$sender->hasPermission($config->get("permission"))){
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
        $this->plugin->reloadConfig();
        $sender->sendMessage(TextFormat::colorize("&aConfig reloaded successfully."));
        return true;
    }//To-Do make messages editable.
    if($args[0] === "list-plugins"){
        if(!isset($args[1])){
            $sender->sendMessage(TextFormat::colorize("&cOption must return a value (true/false)"));
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

