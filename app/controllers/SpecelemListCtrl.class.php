<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\SpecelemSearchForm;

class SpecelemListCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new SpecelemSearchForm();
    }

    public function validate() {

        $this->form->nazwa = ParamUtils::getFromRequest('sf_nazwa');
        return !App::getMessages()->isError();
    }

    public function action_specelemList() {
        $this->validate();

        $search_params = []; 
        if (isset($this->form->nazwa) && strlen($this->form->nazwa) > 0) {
            $search_params['nazwa[~]'] = $this->form->nazwa . '%';
        }


        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where ["ORDER"] = "nazwa";

        try {
        $this->records = App::getDB()->select("spec_elem", [
                "idspec_elem",
                "nazwa",
                "typ"
                    ],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('spec_elem', $this->records);
        App::getSmarty()->display('SpecelemList.tpl');
    }

}


