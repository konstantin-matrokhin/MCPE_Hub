<?php


namespace Hub;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerPreLoginEvent;

class EventListener implements Listener {

    public function onJoin(PlayerLoginEvent $event) {
        $player = $event->getPlayer();
        $spawn = SpawnLocation::getSpawn();
        if ($spawn != null) {
            $player->setPosition($spawn);
        }
    }

    public function onPreLogin(PlayerPreLoginEvent $event) {
//        $event->getPlayer()->getServer()->getApiVersion()
    }

}