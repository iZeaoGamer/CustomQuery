[![](https://poggit.pmmp.io/shield.state/CustomQuery)](https://poggit.pmmp.io/p/CustomQuery)

Custom Query, is one of the most customizable query plugins for MCPE that you'll ever find publicly and that is free for the MCPE Community.
Custom Query aims for servers to make themselves more better, and allow people to recognize the customisable server.
We at Custom Query, are a benefical to the MCPE Community, and dedicate our time to make this system work.
Here with Custom Query, you can do the following:
Fake player slots, set a list of plugins that can be displayable for your players, server name - Change your server name right from config! How great is that?, customize min-max fake player count/slots, infinity slots, enable/disable each option! Right from config.yml, so you can enable/disable the things you do or don't want.



### PLANNED / FINISHED UPDATES

- [x] Infinity slots.
- [x] Fake your player slots.
- [x] Set which plugins other players can see.
- [x] Enable/disable options to suit your needs.
- [x] set min-max player slots (fake query system)
- [x] Added color coding support for server names.
- [x] Set variables for server names.
- [x] Customizable server list MOTD (When posting your server) (Untested)
- [x] Add a task file. (Untested)
- [x] Add commands to edit the query settings.
- [x] Add /customquery reload to reload the configurations without the need of a server restart.
- [x] Add /customquery help for a list of main commands you can use.
- [x] Add an option to enable/disable query commands use in game to set your settings.
- [x] Configure permission nodes from config.yml.
- [x] Completely revamp the ideas of commands, and putting it onto a seperate file (CustomQueryCommand class).
- [x] Register the command without the need of using plugin.yml to do it for you.
- [x] Register the permission without the need of using plugin.yml to do it for you - We'll do more relating to this soon to support it even better.
- [x] Notify you on any releases with this plugin from poggit to console. 
- [x] Add config versioning.
- [x] Fix dependency issue.
- [x] Add virions section in plugin.yml, allowing the server to know what virions are in this plugin.
- [x] Add more requirements for virions in poggit.yml
- [x] Move all utils related to CustomQuery\iZeaoGamer\Utils.php. This is so we can keep the updaters seperated with the main class file. Things such as: Virions check, check for config updaters, and Update notifier will be in the Utils class.
- [x] Release out of the ALPHA stages.
- [x] Remove SpoonDetector due to its brokenness.
- [x] Allow spaces for each messages. At the moment, you can use: "" for spaces in the message/value section after the name of the option. We'll see if we can add such support soon.
- [x] Fix onEnable() state errors + Move isPhar() to Main class.
- [ ] Make messages configurable.
- [ ] Add formsapi support - not confirmed.
- [ ] Add an option whether to add support for formsapi or use command arguments instead.


### NOTE
## This plugin is currently in the BETA stages, If you find any errors or issues, please open a new issue with the error log.



### HOW TO INSTALL
1. Simply download this plugin either from https://poggit.pmmp.io/p/CustomQuery/ (More stable.) or from one of the dev builds (Bleeding edge builds), which you can get fom this link: https://poggit.pmmp.io/ci/iZeaoGamer/CustomQuery/CustomQuery
2. Once installed, drop the plugin into plugins folder.
3. Start/restart your server from console or terminal.
4. Done. If any errors display, please open a new issue containing the error log.
If you want to know about how to setup the plugin (IN GAME), then please go to HOW TO SETUP section.

### HOW TO SETUP
1. If the plugin is successfully installed, and working on your server, then go to plugin_data.
2. Then go to where it says CustomQuery folder, the config should be available to you.
3. Go to the config.yml file.
4. Now, here's where all of the config options should be available to you. Now, this tutorial is mainly discussing about setting up your settings in game.
5. So once you're on your config.yml file, copy one of the options (that you would like to add / setup) to in game. We'll use fake-slots as an example.
6. Then, use /customquery fake-slots true, which would set up the fake slots option to true. You can use the option as false as well if you prefer not to use such options.

Want to setup min-max player slots of your fake querying? Then great! Here's how:
1. Go to the config.yml file (as instructed above from before.)
2. Copy the option: min-slots and use /customquery min-slots 10, which will set up 10 as the minimum slots as lowest player slots you can go to.
3. Then copy the option: max-slots and use /customquery max-slots 1000, which will set up 1,000 as the maximum slots as highest player slots you can go up to.

These are just examples of how to setup your config options.
To know more about setting up as more examples, please head over to OPTIONS EXPLAINATION section.


### OPTIONS EXPLAINATION
The usages to the settings system, is: /customquery <settings> <value>
  <settings> is the setting specified and provided to you from config.yml, and value is the value of the option. It could be: true or false if it's enabling a option or feature.
    If you're setting a message such as server list motd message, then that'd be a string, leading to a message for that option.
    If you're setting a numeric option such as: min-slots - 10 or max-slots 1000, then that'd be a int, which is a number-type option.
    If you're setting a array option (Arrays, meaning [] which you'd have to enter such as: set-plugins, then that'd be an array, which allows you to set multiple plugins as to what the server will display/show.
    boolean is true/false or a return type. So if you're setting a option that allows you to enable/disable a option / feature, which would either be: true, or false, then that's a boolean. If you're still having issues with setting up, then please open an issue regarding so. I'll make it easier soon by displaying all command usages (including settings which are validable from the /customquery help command.
