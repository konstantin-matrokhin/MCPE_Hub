<?php


namespace Hub;


use Hub\GUI\Button;
use Hub\GUI\Form;
use Hub\GUI\GUI;

class NavigationGUI {

    public static function getForm(): Form {
        $form = new Form("Title", GUI::NAVIGATION_FORM_ID);
        $form->setText("§eМеню");
        $form->addButton(new Button("§cSkyWars"));
        $form->addButton(new Button("§1BedWars"));
        $form->addButton(new Button("§2SkyBlock"));
        return $form;
    }

}