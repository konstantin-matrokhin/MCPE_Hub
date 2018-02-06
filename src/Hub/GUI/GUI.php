<?php


namespace Hub\GUI;


use pocketmine\Player;

class GUI {

    public const NAVIGATION_FORM_ID = 1;
    public const MODAL = "modal";
    public const FORM = "form";
    public const CUSTOM_FORM = "custom_form";

    public static function open(Player $player, Window $window) {
        $window->send($player);
    }

}