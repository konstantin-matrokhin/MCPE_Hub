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

        Hub::log()->info("loading..");
        echo "........";
        if ($cfg->exists("spawn")) {
            $x = $cfg->getNested("spawn.x");
            $y = $cfg->getNested("spawn.yy");
            $z = $cfg->getNested("spawn.z");
//            $level = Hub::get()->getServer()->getLevelByName("spawn.level");

            self::$_location = new Vector3($x, $y, $z);
            Hub::log()->info("SPAWN LOADED: " . $x);
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