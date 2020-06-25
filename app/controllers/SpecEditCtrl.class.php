<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\SpecEditForm;
use core\Message;

class SpecEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new SpecEditForm();
    }

    public function validateSave() {
        $this->form->carId = ParamUtils::getFromRequest('idsamochod', true, 'Błędne wywołanie aplikacji');
        $this->form->specElem = ParamUtils::getFromRequest('spec_elem', true, 'Błędne wywołanie aplikacji');
        
        foreach ($this->form->specElem as $specElemId=> $value){
            try {
                $dataType = App::getDB()->get("spec_elem", "typ",[
                    'idspec_elem'=>$specElemId
                ]);
                switch ($dataType){
                    case 'int':
                        if(!is_numeric($value)){
                            App::getMessages()->addMessage(new Message($value.' nie jest typu int', Message::ERROR));
                        }
                        break;
                        
                    case 'bool':
                        if(!in_array($value, ["0","1"])){
                            App::getMessages()->addMessage(new Message($value.' nie jest typu bool', Message::ERROR)); 
                        }
                        break;
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            } 
        }
        
        if (App::getMessages()->isError())
            return false;

        
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->carId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function validateDelete() {
        $this->form->carId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->form->specElem = ParamUtils::getFromCleanURL(2, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_specNew() {
        $this->validateEdit();
        $this->generateView();
    }
    public function action_specDelete() {

        if ($this->validateDelete()) {
            try {
                App::getDB()->delete("specyfikacja", [
                    "idspecyfikacja" => $this->form->specElem
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->redirectTo('specList/'.$this->form->carId);
    }
    
    public function action_specSave() {
        $this->form->carId = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        
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

}
