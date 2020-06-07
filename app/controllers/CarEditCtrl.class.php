<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CarEditForm;

class CarEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new CarEditForm();
    }

    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->marka = ParamUtils::getFromRequest('marka', true, 'Błędne wywołanie aplikacji');
        $this->form->model = ParamUtils::getFromRequest('model', true, 'Błędne wywołanie aplikacji');
        $this->form->rejstracja = ParamUtils::getFromRequest('rejstracja', true, 'Błędne wywołanie aplikacji');
        $this->form->pojemnosc = ParamUtils::getFromRequest('pojemnosc', true, 'Błędne wywołanie aplikacji');
        $this->form->moc = ParamUtils::getFromRequest('moc', true, 'Błędne wywołanie aplikacji');
        $this->form->bezwypadkowy = ParamUtils::getFromRequest('bezwypadkowy', true, 'Błędne wywołanie aplikacji');
        $this->form->rodzajpaliwa = ParamUtils::getFromRequest('rodzajpaliwa', true, 'Błędne wywołanie aplikacji');
        $this->form->opis = ParamUtils::getFromRequest('opis', true, 'Błędne wywołanie aplikacji');
        
        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->marka))) {
            Utils::addErrorMessage('Wprowadź marke');
        }
        if (empty(trim($this->form->model))) {
            Utils::addErrorMessage('Wprowadź model');
        }
        if (empty(trim($this->form->rejstracja))) {
            Utils::addErrorMessage('Wprowadź date rejstracji');
        }
        if (empty(trim($this->form->pojemnosc))) {
            Utils::addErrorMessage('Wprowadz pojemnosc');
        }
        if (empty(trim($this->form->moc))) {
            Utils::addErrorMessage('Wprowadz moc');
        }
        if (empty(trim($this->form->bezwypadkowy))) {
            Utils::addErrorMessage('Czy bezwypadkowy?');
        }
        if (empty(trim($this->form->rodzajpaliwa))) {
            Utils::addErrorMessage('Wprowadz rodzaj paliwa');
        }
        if (empty(trim($this->form->opis))) {
            Utils::addErrorMessage('Wprowadz opis');
        }
        
        if (App::getMessages()->isError())
            return false;


        $d = \DateTime::createFromFormat('Y-m-d', $this->form->rejstracja);
        if ($d === false) {
            Utils::addErrorMessage('Zły format daty. Przykład: 2010-10-10');
        }

        return !App::getMessages()->isError();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_carNew() {
        $this->generateView();
    }

    public function action_carEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("samochod", "*", [
                    "idsamochod" => $this->form->id
                ]);
                $this->form->id = $record['idsamochod'];
                $this->form->marka = $record['marka'];
                $this->form->model = $record['model'];
                $this->form->rejstracja = $record['rejstracja'];
                $this->form->pojemnosc = $record['pojemnosc'];
                $this->form->moc = $record['moc'];
                $this->form->bezwypadkowy = $record['bezwypadkowy'];
                $this->form->rodzajpaliwa = $record['rodzajpaliwa'];
                $this->form->opis = $record['opis'];
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->generateView();
    }

    public function action_carDelete() {
        if ($this->validateEdit()) {

            try {
                App::getDB()->delete("samochod", [
                    "idsamochod" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getRouter()->forwardTo('carList');
    }

    public function action_carSave() {
        if ($this->validateSave()) {
            try {
                if ($this->form->id == '') {              
                        App::getDB()->insert("samochod", [
                            "marka" => $this->form->marka,
                            "model" => $this->form->model,
                            "rejstracja" => $this->form->rejstracja,
                            "pojemnosc" => $this->form->pojemnosc,
                            "moc" => $this->form->moc,
                            "bezwypadkowy" => $this->form->bezwypadkowy,
                            "rodzajpaliwa" => $this->form->rodzajpaliwa,
                            "opis" => $this->form->opis
                        ]);                 
                } else {
                    App::getDB()->update("samochod", [
                            "marka" => $this->form->marka,
                            "model" => $this->form->model,
                            "rejstracja" => $this->form->rejstracja,
                            "pojemnosc" => $this->form->pojemnosc,
                            "moc" => $this->form->moc,
                            "bezwypadkowy" => $this->form->bezwypadkowy,
                            "rodzajpaliwa" => $this->form->rodzajpaliwa,
                            "opis" => $this->form->opis
                            ], [
                        "idsamochod" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->forwardTo('carList');
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('CarEdit.tpl');
    }

}
