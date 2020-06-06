<?php

namespace app\controllers;

use core\App;
//use core\Message; ///?
use core\Utils;
use core\ParamUtils;
use app\forms\CarSearchForm; ///////////zrobix

class CarCtrl {
    
    private $form;
    private $records;
    
    public function _construct() {
        $this->form = new CarSearchForm();
    }
    
    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
     //   $this->form->marka = ParamUtils::getFromRequest('sf_marka');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }
 
    public function action_showCar() {
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
                "opis",
                "bezwypadkowy"
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('Cars', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('Car.tpl');
    
    }
    
}
