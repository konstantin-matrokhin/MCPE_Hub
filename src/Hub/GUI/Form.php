<?php


namespace Hub\GUI;

class Form extends Window {

    public function __construct(string $title, int $id) {
        parent::__construct($title, $id);
        $this->setTemplate([
            "type" => "form",
            "title" => $title,
            "content" => null,
            "buttons" => []
        ]);
    }

    public function setText(string $text) {
        $this->set("content", $text);
    }

}