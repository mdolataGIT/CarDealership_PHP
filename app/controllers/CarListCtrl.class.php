<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\CarSearchForm;

class CarListCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new CarSearchForm();
    }

    public function validate() {

        $this->form->nazwa = ParamUtils::getFromRequest('sf_marka');
        return !App::getMessages()->isError();
    }

    public function action_carList() {
        $this->validate();

        $search_params = []; 
        if (isset($this->form->marka) && strlen($this->form->marka) > 0) {
            $search_params['marka[~]'] = $this->form->marka . '%';
        }


        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where ["ORDER"] = "marka";

        try {
            $this->records = App::getDB()->select("samochod", [
                "idsamochod",
                "marka",
                "model",
                "rejstracja",
                "pojemnosc",
                "moc",
                "bezwypadkowy",
                "rodzajpaliwa",
                "opis"
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('samochod', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('CarList.tpl');
    }

}


