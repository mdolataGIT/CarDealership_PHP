<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * HelloWorld built in Amelia - sample controller
 *
 * @author Przemysław Kudłacik
 */
class UserCtrl {
    
    public function action_showUser() {
		        
        $nazwa="Michal212";
        $haslo="admin1";
        $email="michalek@fr.com";
        $rola="admin";
        
         App::getDB()->insert("uzytkownik", [
            "nazwa"=>$nazwa,
            "haslo"=>$haslo,
            "email"=>$email,
            "rola"=>$rola,       
        ]);
        
       $uzytkownicy= App::getDB()->select("uzytkownik","*");  
       
       echo '<table cellpadding = "10">';
        foreach ($uzytkownicy as $wiersz){
            echo"<tr>";
            echo"<td>".$wiersz["nazwa"]."</td>";
            echo"<td>".$wiersz["haslo"]."</td>";
            echo"<td>".$wiersz["email"]."</td>";
            echo"<td>".$wiersz["rola"]."</td>";
            echo"</tr>";
        }
        echo"</table";
    }
    
}
