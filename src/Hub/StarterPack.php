<?php


namespace Hub;


use pocketmine\inventory\Inventory;
use pocketmine\item\Item;
use pocketmine\Player;

class StarterPack {

    private const NAVIGATION_TITLE = "Меню";

    public function __construct(Player $player) {
        $inv = $player->getInventory();

        $inv->clearAll();
        $this->addNavigation($inv);
    }

    public function addNavigation(Inventory $inv) {
        $inv->setItem(0, self::navigator());
    }

    public static function navigator(): Item {
        $nav = new Item(Item::COMPASS, 0, self::NAVIGATION_TITLE);
        $nav->setLore([
            "Меню сервера. Игры и всё такое.",
            "Чтобы открыть, держите это в руке и ткните в блок."
        ]);

        return $nav;
    }

}