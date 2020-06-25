<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class PhotoListCtrl {

    private $records;

    public function action_photoList() {
        $carId = (int) ParamUtils::getFromCleanURL(1);

        $where["samochod.idsamochod"] = $carId;
        
        try {
        $this->records = App::getDB()->select("zdjecie", ["[>]samochod"=>"idsamochod"],[
                "idzdjecie",
                "url",
                "samochod.idsamochod"
                    ],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        App::getSmarty()->assign('carId',$carId);
        App::getSmarty()->assign('zdjecie', $this->records);
        App::getSmarty()->display('PhotoList.tpl');
    }

}


