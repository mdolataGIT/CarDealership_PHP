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
class CarsCtrl {
    
    public function action_showCars() {
        // 1 Pobrac parametry
        
        $marka = "bmw";
        $model = "seria 3";
        $rejstracja = "2008-12-01";
        $pojemnosc = 3000;
        $moc = 250;
        $opis = "Dobre auto";
        $bezwypadkowy = 1;
        
                
        //2 walidacja
        //3 dzialanie
        
        //3.1 zapis do bd
        
        App::getDB()->insert("samochod", [
            "marka"=>$marka,
            "model"=>$model,
            "rejstracja"=>$rejstracja,
            "pojemnosc"=>$pojemnosc,
            "moc"=>$moc,
            "opis"=>$opis,
            "bezwypadkowy"=>$bezwypadkowy
        
        ]);
        
        // 3.2 odczyt z bd
        
        $samochody= App::getDB()->select("samochod","*");
        
        //4 wyglad widoku
  
        echo '<table cellpadding = "10">';
        foreach ($samochody as $wiersz){
            echo"<tr>";
            echo"<td>".$wiersz["marka"]."</td>";
            echo"<td>".$wiersz["model"]."</td>";
            echo"<td>".$wiersz["rejstracja"]."</td>";
            echo"<td>".$wiersz["pojemnosc"]."</td>";
            echo"<td>".$wiersz["moc"]."</td>";
            echo"<td>".$wiersz["bezwypadkowy"]."</td>";
            echo"<td>".$wiersz["opis"]."</td>";
            echo"</tr>";
        }
        echo"</table";
    }
    
}
