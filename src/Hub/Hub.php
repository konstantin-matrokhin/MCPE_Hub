<?php


namespace Hub;


use pocketmine\plugin\PluginBase;

class Hub extends PluginBase {

    private static $instance;

    public function onEnable() {
        self::$instance = $this;

        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getCommandMap()->register("hub", new HubCommand());
    }

    public function onDisable() {

    }

    public static function get(): PluginBase {
        return self::$instance;
    }

}