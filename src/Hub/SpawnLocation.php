<?php


namespace Hub;


use pocketmine\level\Location;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\Server;

class SpawnLocation {

    private static $_location;

    public static function load() {
        $cfg = Hub::get()->getConfig();

        if ($cfg->exists("spawn")) {
            $x = $cfg->getNested("spawn.xx");
            $y = $cfg->getNested("spawn.yy");
            $z = $cfg->getNested("spawn.zz");
            $yaw = $cfg->getNested("spawn.yaw");
            $pitch = $cfg->getNested("spawn.pitch");
            $levelName = $cfg->getNested("spawn.level");
            $level = Hub::get()->getServer()->getLevelByName($levelName);

            self::$_location = new Location($x, $y, $z);
        } else {
            self::$_location = Server::getInstance()
                ->getDefaultLevel()
                ->getSpawnLocation()
                ->asVector3();
            Server::getInstance()->getLogger()->alert("Место спауна не назначено!");
        }
    }

    public static function setSpawn(Location $newSpawn) {
        $coordinates = [
            "spawn" => [
                "x" => $newSpawn->getX(),
                "yy" => $newSpawn->getY(),
                "z" => $newSpawn->getZ(),
                "level" => $newSpawn->getLevel()->getName()
            ]
        ];

        $cfg = Hub::get()->getConfig();
        $cfg->setAll($coordinates);
        $cfg->save();
        $cfg->reload();

        self::$_location = $newSpawn;
    }

    public static function getSpawn(): Vector3 {
        return self::$_location;
    }

    public static function teleport(Player $player) {
        $player->teleport(self::getSpawn());
    }

}