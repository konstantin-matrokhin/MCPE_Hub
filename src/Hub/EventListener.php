<?php


namespace Hub;


use Hub\GUI\Button;
use Hub\GUI\Form;
use Hub\GUI\ModalForm;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
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
        $form = new Form("Test 22", 1);
        $form->setText("Прив че дел?)");
        $form->addButton(new Button("Да ниче, хех)"));
        $form->send($player);
    }

}