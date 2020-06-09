<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\SpecEditForm;

class SpecEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new SpecEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->wartosc = ParamUtils::getFromRequest('wartosc', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_specNew() {
        $this->generateView();
    }

    public function action_specEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("specyfikacja", "*", [
                    "idspecyfikacja" => $this->form->id
                ]);
                $this->form->id = $record['idspecyfikacja'];
                $this->form->wartosc = $record['wartosc'];
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->generateView();
    }

    public function action_specDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("specyfikacja", [
                    "idspecyfikacja" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('specList');
    }

    public function action_specSave() {
        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {              
                        App::getDB()->insert("specyfikacja", [
                            "wartosc" => $this->form->wartosc,
                        ]);                 
                } else {
                    App::getDB()->update("specyfikacja", [
                            "wartosc" => $this->form->wartosc,
                            ], [
                        "idspecyfikacja" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('specList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('SpecEdit.tpl');
    }

}
