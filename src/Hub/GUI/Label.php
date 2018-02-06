<?php


namespace Hub\GUI;


class Label implements GuiItem {

    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    function serialize(): array {
        return [
            "type" => "label",
            "text" => $this->text
        ];
    }

}