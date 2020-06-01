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
class SpecCtrl {
    
    public function action_showSpec() {
		        
        $wartosc=1;
        
        App::getDB()->insert("specyfikacja", [
            "wartosc"=>$wartosc
        ]);
        
        $specyfikacje= App::getDB()->select("specyfikacja","*");
        
        echo '<table cellpadding = "10">';
        foreach ($specyfikacje as $wiersz){
            echo"<tr>";
            echo"<td>".$wiersz["wartosc"]."</td>";
            echo"</tr>";
        }
        echo"</table";
    
        
    }
    
}
