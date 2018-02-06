<?php


namespace Hub;


use pocketmine\inventory\Inventory;
use pocketmine\item\Item;
use pocketmine\Player;

class StarterPack {

    private const NAVIGATION_TITLE = "Меню";
    private const INFO_ITEM_NAME = "Инфо";

    public function __construct(Player $player) {
        $inv = $player->getInventory();

        $inv->clearAll();
        $this->addControlPane($inv);
    }

    public function addControlPane(Inventory $inv) {
        $inv->setItem(0, self::navigator());
        $inv->setItem(2, self::info());
    }

    public static function info(): Item {
        $info = new Item(Item::PAPER, 0, self::INFO_ITEM_NAME);
        $info->setCustomName(self::INFO_ITEM_NAME);
        $info->setLore([
            "Личные данные и статистика"
        ]);

        return $info;
    }

    public static function navigator(): Item {
        $nav = new Item(Item::COMPASS, 0, self::NAVIGATION_TITLE);
        $nav->setCustomName(self::NAVIGATION_TITLE);
        $nav->setLore([
            "Меню сервера. Игры и всё такое.",
            "Чтобы открыть, держите это в руке и ткните в блок."
        ]);

        return $nav;
    }

}