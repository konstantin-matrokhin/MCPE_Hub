<?php


namespace Hub;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\utils\TextFormat;

class EventListener implements Listener {

    private static $navigationItem;

    public function __construct() {
        self::$navigationItem = StarterPack::navigator();
    }


    public function onJoin(PlayerLoginEvent $event) {
        $player = $event->getPlayer();
        $spawn = SpawnLocation::getSpawn();

        new StarterPack($player);

        if ($spawn != null) {
            $player->setPosition($spawn);
        }
    }

    public function onClick(PlayerInteractEvent $event) {
        $player = $event->getPlayer();

        if ($player->getInventory()
            ->getItemInHand()
            ->equals(self::$navigationItem)) {
            $player->sendMessage(TextFormat::AQUA . "Меню открыто!");
        }
    }

}