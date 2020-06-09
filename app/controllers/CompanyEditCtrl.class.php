<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CompanyEditForm;

class CompanyEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new CompanyEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->form->miejscowosc = ParamUtils::getFromRequest('miejscowosc', true, 'Błędne wywołanie aplikacji');
        $this->form->adres = ParamUtils::getFromRequest('adres', true, 'Błędne wywołanie aplikacji');
        $this->form->arch = ParamUtils::getFromRequest('arch', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwe');
        }
        if (empty(trim($this->form->miejscowosc))) {
            Utils::addErrorMessage('Wprowadź miejscowosc');
        }
        if (empty(trim($this->form->adres))) {
            Utils::addErrorMessage('Wprowadź adres');
        }
        if (App::getMessages()->isError())
            return false;
        
        $v = new Validator();
        $a = $v->validateFromRequest("arch", [
        'int' => true,
        'min'=>0,
        'max'=>1,
        'validator_message' => 'Pole arch musi być z zakresu 0-1',
        ]);
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_companyNew() {
        $this->generateView();
    }
    
    public function action_companyEdit() {

        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("firma", "*", [
                    "idfirma" => $this->form->id
                ]);
                $this->form->id = $record['idfirma'];
                $this->form->nazwa = $record['nazwa'];
                $this->form->miejscowosc = $record['miejscowosc'];
                $this->form->adres = $record['adres'];
                $this->form->arch = $record['arch'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->generateView();
    }

    public function action_companyDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("firma", [
                    "idfirma" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('companyList');
    }

    public function action_companySave() {

        if ($this->validateSave()) {
            try {

                if ($this->form->id == '') {              
                        App::getDB()->insert("firma", [
                            "nazwa" => $this->form->nazwa,
                            "miejscowosc" => $this->form->miejscowosc,
                            "adres" => $this->form->adres,
                            "arch" => $this->form->arch
                        ]);                 
                } else {
                    App::getDB()->update("firma", [
                        "nazwa" => $this->form->nazwa,
                        "miejscowosc" => $this->form->miejscowosc,
                        "adres" => $this->form->adres,
                        "arch" => $this->form->arch
                            ], [
                        "idfirma" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->forwardTo('companyList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('CompanyEdit.tpl');
    }

}
