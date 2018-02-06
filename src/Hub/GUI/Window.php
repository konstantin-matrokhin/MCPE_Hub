<?php


namespace Hub\GUI;


use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\Player;

abstract class Window {

    public const LABEL = "label";
    public const BUTTON = "button";

    private $id;
    private $title;
    public $template;

    public function __construct(string $title, int $id, string $type = "form") {
        $this->title = $title;
        $this->id = $id;
    }

    protected function setTemplate(array $template) {
        $this->template = $template;
    }

    protected function set(string $key, $element) {
        $this->template[$key] = $element;
    }

    public function addButton(Button $button) {
        $this->template["buttons"][] = $button->serialize();
    }

    public function add(GuiItem $element) {
        $this->template["content"][] = $element->serialize();
    }

    public function send(Player $player) {
        $packet = new ModalFormRequestPacket();
        $packet->formId = $this->id;
        $packet->formData = json_encode($this->template);
        $player->dataPacket($packet);
    }

}