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
class CoustomerCtrl {
    
    public function action_showCoustomer() {
        $imie="Bartek";
        $nazwisko="Rabczak";
        $datazakupu="2020-05-01";
		    
     App::getDB()->insert("klient", [
            "imie"=>$imie,
            "nazwisko"=>$nazwisko,
            "datazakupu"=>$datazakupu, 
        ]);
     $klienci= App::getDB()->select("klient","*");
     
     echo '<table cellpadding = "10">';
        foreach ($klienci as $wiersz){
            echo"<tr>";
            echo"<td>".$wiersz["imie"]."</td>";
            echo"<td>".$wiersz["nazwisko"]."</td>";
            echo"<td>".$wiersz["datazakupu"]."</td>";
            echo"</tr>";
        }
        echo"</table";
    }
    
}
