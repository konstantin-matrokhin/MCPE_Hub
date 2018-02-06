<?php


namespace Hub\GUI;


class ModalForm extends Window {

    private $id;

    public function __construct(string $title, int $id) {
        $this->id = $id;
        parent::__construct($title, $id, GUI::CUSTOM_FORM);
    }

}