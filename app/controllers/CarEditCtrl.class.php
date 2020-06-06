<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CarEditForm;

class CarEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CarEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->idsamochod = ParamUtils::getFromRequest('idsamochod', true, 'Błędne wywołanie aplikacji');
        $this->form->marka = ParamUtils::getFromRequest('marka', true, 'Błędne wywołanie aplikacji');
        $this->form->model = ParamUtils::getFromRequest('model', true, 'Błędne wywołanie aplikacji');
        $this->form->rejstracja = ParamUtils::getFromRequest('rejstracja', true, 'Błędne wywołanie aplikacji');
        $this->form->pojemnosc = ParamUtils::getFromRequest('pojemnosc', true, 'Błędne wywołanie aplikacji');
        $this->form->moc = ParamUtils::getFromRequest('moc', true, 'Błędne wywołanie aplikacji');
        $this->form->opis = ParamUtils::getFromRequest('opis', true, 'Błędne wywołanie aplikacji');
        $this->form->bezwypadkowy = ParamUtils::getFromRequest('bezwypadkowy', true, 'Błędne wywołanie aplikacji');
        
        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->marka))) {
            Utils::addErrorMessage('Wprowadź marke');
        }
        if (empty(trim($this->form->model))) {
            Utils::addErrorMessage('Wprowadź model');
        }
        if (empty(trim($this->form->rejstracja))) {
            Utils::addErrorMessage('Wprowadź datę urodzenia');
        }
        if (empty(trim($this->form->pojemnosc))) {
            Utils::addErrorMessage('Wprowadź datę urodzenia');
        }
        if (empty(trim($this->form->moc))) {
            Utils::addErrorMessage('Wprowadź datę urodzenia');
        }
        if (empty(trim($this->form->opis))) {
            Utils::addErrorMessage('Wprowadź datę urodzenia');
        }
        if (empty(trim($this->form->bezwypadkowy))) {
            Utils::addErrorMessage('Wprowadź datę urodzenia');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów

        $d = \DateTime::createFromFormat('Y-m-d', $this->form->rejstracja);
        if ($d === false) {
            Utils::addErrorMessage('Zły format daty. Przykład: 2015-12-20');
        }

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_CarNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_CarEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("samochod", "*", [
                    "idsamochod" => $this->form->idsamochod
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->idsamochod = $record['idsamochod'];
                $this->form->marka = $record['marka'];
                $this->form->model = $record['model'];
                $this->form->rejstracja = $record['rejstracja'];
                $this->form->pojemnosc = $record['pojemnosc'];
                $this->form->moc = $record['moc'];
                $this->form->opis = $record['opis'];
                $this->form->bezwypadkowy = $record['bezwypadkowy'];
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_CarDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("samochod", [
                    "idsamochod" => $this->form->idsamochod
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('Car');
    }

    public function action_personSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->idsamochod == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("samochod");
                    if ($count <= 20) {
                        App::getDB()->insert("samochod", [
                            "marka" => $this->form->marka,
                            "model" => $this->form->model,
                            "rejstracja" => $this->form->rejstracja,
                            "pojemnosc" => $this->form->pojemnosc,
                            "moc" => $this->form->moc,
                            "opis" => $this->form->opis,
                            "bezwypadkowy" => $this->form->bezwypadkowy
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("samochod", [
                            "marka" => $this->form->marka,
                            "model" => $this->form->model,
                            "rejstracja" => $this->form->rejstracja,
                            "pojemnosc" => $this->form->pojemnosc,
                            "moc" => $this->form->moc,
                            "opis" => $this->form->opis,
                            "bezwypadkowy" => $this->form->bezwypadkowy
                            ], [
                        "idsamochod" => $this->form->idsamochod
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('Car');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('CarEdit.tpl');
    }

}
