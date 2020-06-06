<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('companyList'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('nopermission', 'HelloCtrl');

Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');

Utils::addRoute('showCar',    'CarCtrl');
Utils::addRoute('carNew',     'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carEdit',    'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carSave',    'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carDelete',  'CarEditCtrl',["admin", "user"]);

Utils::addRoute('companyList', 'CompanyListCtrl');
Utils::addRoute('companyNew',     'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companyEdit',    'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companySave',    'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companyDelete',  'CompanyEditCtrl',["admin", "user"]);


Utils::addRoute('showSpecelem', 'SpecelemCtrl');
Utils::addRoute('showUser', 'UserCtrl');
Utils::addRoute('showCoustomer', 'CoustomerCtrl');
Utils::addRoute('showPhoto', 'PhotoCtrl');// NAPRAWIĆ
Utils::addRoute('showSpec', 'SpecCtrl');

//Utils::addRoute('action_name', 'controller_class_name');