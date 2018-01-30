<?php


namespace Hub;


use pocketmine\level\Location;
use pocketmine\Player;

class SpawnLocation {

    private static $_location;

    public static function getSpawn(): Location {
        if (self::$_location == null) {
            $cfg = Hub::get()->getConfig();
            if ($cfg->exists("spawn")) {
                $x = $cfg->get("spawn.x");
                $y = $cfg->get("spawn.y");
                $z = $cfg->get("spawn.z");
                $yaw = $cfg->get("spawn.yaw");
                $pitch = $cfg->get("spawn.pitch");
                $level = Hub::get()->getServer()->getLevelByName("spawn.level");

                self::$_location = new Location($x, $y, $z, $yaw, $pitch, $level);
            } else {
                throw new \InvalidArgumentException("spawn not defined in config!");
            }
        }
        return self::$_location;
    }

    public static function teleport(Player $player) {

        $player->teleport(self::getSpawn());
    }

    public static function setSpawn(Location $loc) {
        $newSpawn = [
            "x" => $loc->getX(),
            "y" => $loc->getY(),
            "z" => $loc->getZ(),
            "yaw" => $loc->getYaw(),
            "pitch" => $loc->getPitch(),
            "level" => $loc->getLevel()->getName(),
        ];

        Hub::get()->getConfig()->setAll($newSpawn);
        Hub::get()->saveConfig();
    }

}