<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\SpecSearchForm;

class SpecListCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new SpecSearchForm();
    }

    public function validate() {

        $this->form->wartosc = ParamUtils::getFromRequest('sf_wartosc');
        return !App::getMessages()->isError();
    }

    public function action_specList() {
        $carId = (int) ParamUtils::getFromCleanURL(1);
        //var_dump($carId);die();
        $this->validate();

        $search_params = []; 
        if (isset($this->form->wartosc) && strlen($this->form->wartosc) > 0) {
            $search_params['wartosc[~]'] = $this->form->wartosc . '%';
        }
        
        $search_params['idsamochod']=$carId;

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where ["ORDER"] = "wartosc";

        try {
        $this->records = App::getDB()->select("specyfikacja",[
            "[>]spec_elem"=>"idspec_elem"
                ], [
                "idspecyfikacja",
                "wartosc",
                "spec_elem.nazwa"
                    ],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('carId', $carId);
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('specyfikacja', $this->records);
        App::getSmarty()->display('SpecList.tpl');
    }

}


