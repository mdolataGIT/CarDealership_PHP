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
class CompanyCtrl {
    
    public function action_showCompany() {
		        
       $nazwa = "AutPOl";
       $miejscowosc = "Wroclaw";
       $adres = "Cicha 12";
       $arch = 0;
      
       App::getDB()->insert("firma", [
           "nazwa" =>$nazwa,
           "miejscowosc" => $miejscowosc,
           "adres"=>$adres,
           "arch"=>$arch
        ]);
        
       $firmy= App::getDB()->select("firma","*");
       
       echo '<table cellpadding = "10">';
        foreach ($firmy as $wiersz){
            echo"<tr>";
            echo"<td>".$wiersz["nazwa"]."</td>";
            echo"<td>".$wiersz["miejscowosc"]."</td>";
            echo"<td>".$wiersz["adres"]."</td>";
            echo"<td>".$wiersz["arch"]."</td>";
            echo"</tr>";
        }
        echo"</table";
    }
    
}
