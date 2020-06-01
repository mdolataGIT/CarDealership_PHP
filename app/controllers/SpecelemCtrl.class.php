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
class SpecelemCtrl {
    
    public function action_showSpecelem() {
	
        $nazwa ="ABS";
        $typ = "bool";
        
        App::getDB()->insert("spec_elem", [
            "nazwa"=>$nazwa,
            "typ"=>$typ,
        ]);
        
        $specelementy= App::getDB()->select("spec_elem","*");
        
        echo '<table cellpadding = "10">';
        foreach ($specelementy as $wiersz){
            echo"<tr>";
            echo"<td>".$wiersz["nazwa"]."</td>";
            echo"<td>".$wiersz["typ"]."</td>";
            echo"</tr>";
        }
        echo"</table";
    }
    
}
