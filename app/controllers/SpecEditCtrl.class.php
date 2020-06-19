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
        $this->form->carId = ParamUtils::getFromRequest('idsamochod', true, 'Błędne wywołanie aplikacji');
        $this->form->specElem = ParamUtils::getFromRequest('spec_elem', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->carId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_specNew() {
        $this->validateEdit();
        try {
            $records = App::getDB()->select("spec_elem", "*");
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('records', $records);
        App::getSmarty()->display('SpecEdit.tpl');
    }

    public function action_specSave() {
        if ($this->validateSave()) {
            try {
                App::getDB()->delete('specyfikacja',[
                    "idsamochod"=>$this->form->carId
                ]);
                foreach($this->form->specElem as $specElemId=> $value){
                    App::getDB()->insert('specyfikacja',[
                        "wartosc"=>$value,
                        "idsamochod"=>$this->form->carId,
                        "idspec_elem"=>$specElemId
                    ]);   
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->redirectTo('specList/'.$this->form->carId);
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('SpecEdit.tpl');
    }

}
