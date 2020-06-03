<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('hello'); #default action
App::getRouter()->setLoginRoute('nopermission'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('nopermission', 'HelloCtrl');
Utils::addRoute('showCar', 'CarCtrl', ["admin", "user"]);
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('showSpecelem', 'SpecelemCtrl');
Utils::addRoute('showUser', 'UserCtrl');
Utils::addRoute('showCompany', 'CompanyCtrl');
Utils::addRoute('showCoustomer', 'CoustomerCtrl');
Utils::addRoute('showPhoto', 'PhotoCtrl');// NAPRAWIĆ
Utils::addRoute('showSpec', 'SpecCtrl');

//Utils::addRoute('action_name', 'controller_class_name');