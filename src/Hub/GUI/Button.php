<?php


namespace Hub\GUI;


class Button implements GuiItem {

    private $title;

    public function __construct(string $title) {
        $this->title = $title;
    }

    function serialize(): array {
        return [
            "type" => "button",
            "text" => $this->title
        ];
    }

}