<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\SpecelemEditForm;

class SpecelemEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new SpecelemEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->form->typ = ParamUtils::getFromRequest('typ', true, 'Błędne wywołanie aplikacji');
        
        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwe');
        }
        if (empty(trim($this->form->typ))) {
            Utils::addErrorMessage('Wprowadź typ');
        }
        
        if (App::getMessages()->isError())
            return false;

        

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_specelemNew() {
        $this->generateView();
    }

    public function action_specelemEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("spec_elem", "*", [
                    "idspec_elem" => $this->form->id
                ]);
                $this->form->id = $record['idspec_elem'];
                $this->form->nazwa = $record['nazwa'];
                $this->form->typ = $record['typ'];
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->generateView();
    }

    public function action_specelemDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("spec_elem", [
                    "idspec_elem" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('specelemList');
    }

    public function action_specelemSave() {
        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {              
                        App::getDB()->insert("spec_elem", [
                            "nazwa" => $this->form->nazwa,
                            "typ" => $this->form->typ,
                        ]);                 
                } else {
                    App::getDB()->update("spec_elem", [
                            "nazwa" => $this->form->nazwa,
                            "typ" => $this->form->typ
                            ], [
                        "idspec_elem" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('specelemList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('SpecelemEdit.tpl');
    }

}
