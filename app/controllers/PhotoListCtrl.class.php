<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\PhotoSearchForm;

class PhotoListCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new PhotoSearchForm();
    }

    public function validate() {

        $this->form->url = ParamUtils::getFromRequest('sf_url');
        return !App::getMessages()->isError();
    }

    public function action_photoList() {
        $this->validate();

        $search_params = []; 
        if (isset($this->form->url) && strlen($this->form->url) > 0) {
            $search_params['url[~]'] = $this->form->url . '%';
        }


        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where ["ORDER"] = "url";

        try {
        $this->records = App::getDB()->select("zdjecie", [
                "idzdjecie",
                "url",
                    ],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('zdjecie', $this->records);
        App::getSmarty()->display('PhotoList.tpl');
    }

}


