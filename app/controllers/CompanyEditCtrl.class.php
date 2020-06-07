<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CompanyEditForm;

class CompanyEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new CompanyEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->form->miejscowosc = ParamUtils::getFromRequest('miejscowosc', true, 'Błędne wywołanie aplikacji');
        $this->form->adres = ParamUtils::getFromRequest('adres', true, 'Błędne wywołanie aplikacji');
        $this->form->arch = ParamUtils::getFromRequest('arch', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwe');
        }
        if (empty(trim($this->form->miejscowosc))) {
            Utils::addErrorMessage('Wprowadź miejscowosc');
        }
        if (empty(trim($this->form->adres))) {
            Utils::addErrorMessage('Wprowadź adres');
        }
        if (empty(trim($this->form->arch))) {
            Utils::addErrorMessage('Czy obiekt archiwalny?');
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

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_companyNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_companyEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("firma", "*", [
                    "idfirma" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
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

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_companyDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
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

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('companyList');
    }

    public function action_companySave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {              
                        App::getDB()->insert("firma", [
                            "nazwa" => $this->form->nazwa,
                            "miejscowosc" => $this->form->miejscowosc,
                            "adres" => $this->form->adres,
                            "arch" => $this->form->arch
                        ]);                 
                } else {
                    //2.2 Edycja rekordu o danym ID
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

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('companyList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('CompanyEdit.tpl');
    }

}
