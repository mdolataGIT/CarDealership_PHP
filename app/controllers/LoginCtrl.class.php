<?php


namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;

class LoginCtrl {
    
    public function action_login(){
        // pobranie
        //walidacja
        $login="jacek";
        $rola="user";
        
        //zaloguj
        RoleUtils::addRole($rola);//zapisane w sesji
        // kolejna rola ("admin")
        
        //przekierowanie
        App::getRouter()->redirectTo("showCar");
    }
    
    public function action_logout(){
        session_destroy();
        App::getRouter()->redirectTo("showCar");

    }
}
