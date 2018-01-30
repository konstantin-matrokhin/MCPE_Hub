<?php


namespace Hub;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;

class EventListener implements Listener {

    public function onJoin(PlayerLoginEvent $event) {
        $player = $event->getPlayer();
        $spawn = SpawnLocation::getSpawn();
        if ($spawn != null) {
            $player->teleport($spawn);
        }
    }

}