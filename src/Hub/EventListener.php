<?php


namespace Hub;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\Player;
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
            $this->openModal($player);
        }
    }

    private function openModal(Player $player) {
        $arr = [
            "type" => "custom_form",
            "title" => "Test",
            "content" => [
                [
                    "type" => "label",
                    "text" => "Test Label"
                ]
            ]
        ];
        $formJson = json_encode($arr);

        $packet = new ModalFormRequestPacket();
        $packet->formId = 0;
        $packet->formData = $formJson;
        $player->dataPacket($packet);
    }

}