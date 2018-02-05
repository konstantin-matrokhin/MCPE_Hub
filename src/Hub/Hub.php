<?php


namespace Hub;


use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLogger;

class Hub extends PluginBase {

    private static $logger;
    private static $configName = "config.yml";
    private static $instance;

    public function onEnable() {
        self::$instance = $this;
        self::$logger = $this->getLogger();

        @mkdir($this->getDataFolder());
        $this->saveResource(self::$configName);

        SpawnLocation::load();

        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getCommandMap()->register("hub", new HubCommand());
        $this->getServer()->getCommandMap()->register("sethub", new SetSpawnCommand());
    }

    public function onDisable() {

    }

    public static function log(): PluginLogger {
        return self::$logger;
    }


    public static function get(): PluginBase {
        return self::$instance;
    }

}