<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PhotoEditForm;

class PhotoEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new PhotoEditForm();
    }

    public function validateSave() {
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->url = ParamUtils::getFromRequest('url', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->url))) {
            Utils::addErrorMessage('Wprowadź wartosc');
        }
        
        if (App::getMessages()->isError())
            return false;

        
        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function validateDelete() {
        $this->form->id = ParamUtils::getFromCleanURL(2, true, 'Błędne wywołanie aplikacji');
        $this->form->idsamochod = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function action_photoNew() {
        $carId = (int) ParamUtils::getFromCleanURL(1);
        $this->generateView($carId);
        
    }

    public function action_photoEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("zdjecie", "*", [
                    "idzdjecie" => $this->form->id
                ]);
                $this->form->id = $record['idzdjecie'];
                $this->form->url = $record['url'];
                $this->form->idsamochod = $record['idsamochod'];
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->generateView($record['idsamochod']);
    }

    public function action_photoDelete() {
        $carId = (int) ParamUtils::getFromCleanURL(2);
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("zdjecie", [
                    "idzdjecie" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->redirectTo('photoList/'.$carId);
    }

    public function action_photoSave() {
         $carId = (int) ParamUtils::getFromCleanURL(1);
        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {              
                        App::getDB()->insert("zdjecie", [
                            "url" => $this->form->url,
                            "idsamochod"=>$carId
                        ]);                 
                } else {
                    App::getDB()->update("zdjecie", [
                            "url" => $this->form->url,
                            ], [
                        "idzdjecie" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('photoList');
        } else {
            $this->generateView($carId);
        }
    }

    public function generateView($carId) {
        App::getSmarty()->assign("carId",$carId);
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('PhotoEdit.tpl');
    }

}
