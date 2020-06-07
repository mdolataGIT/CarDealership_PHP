<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('companyList');
App::getRouter()->setLoginRoute('login');


Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');

Utils::addRoute('carList',    'CarListCtrl');
Utils::addRoute('carNew',     'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carEdit',    'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carSave',    'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carDelete',  'CarEditCtrl',["admin"]);

Utils::addRoute('companyList',    'CompanyListCtrl');
Utils::addRoute('companyNew',     'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companyEdit',    'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companySave',    'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companyDelete',  'CompanyEditCtrl',["admin"]);


Utils::addRoute('showSpecelem', 'SpecelemCtrl');
Utils::addRoute('showUser', 'UserCtrl');
Utils::addRoute('showCoustomer', 'CoustomerCtrl');
Utils::addRoute('showPhoto', 'PhotoCtrl');// NAPRAWIĆ
Utils::addRoute('showSpec', 'SpecCtrl');
