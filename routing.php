<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');

Utils::addRoute('showCar', 'CarCtrl');
Utils::addRoute('showSpecelem', 'SpecelemCtrl');
Utils::addRoute('showUser', 'UserCtrl');

Utils::addRoute('showCompany', 'CompanyCtrl');
Utils::addRoute('showCoustomer', 'CoustomerCtrl');
Utils::addRoute('showPhoto', 'PhotoCtrl');
Utils::addRoute('showSpec', 'SpecCtrl');

//Utils::addRoute('action_name', 'controller_class_name');