<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('companyList');
App::getRouter()->setLoginRoute('login');

Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');

Utils::addRoute('companyList',    'CompanyListCtrl');
Utils::addRoute('companyNew',     'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companyEdit',    'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companySave',    'CompanyEditCtrl',["admin", "user"]);
Utils::addRoute('companyDelete',  'CompanyEditCtrl',["admin"]);

Utils::addRoute('carList',    'CarListCtrl');
Utils::addRoute('carNew',     'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carEdit',    'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carSave',    'CarEditCtrl',["admin", "user"]);
Utils::addRoute('carDelete',  'CarEditCtrl',["admin"]);

Utils::addRoute('specList',    'SpecListCtrl');
Utils::addRoute('specNew',     'SpecEditCtrl',["admin", "user"]);
Utils::addRoute('specEdit',    'SpecEditCtrl',["admin", "user"]);
Utils::addRoute('specSave',    'SpecEditCtrl',["admin", "user"]);
Utils::addRoute('specDelete',  'SpecEditCtrl',["admin"]);

Utils::addRoute('specelemList',    'SpecelemListCtrl');
Utils::addRoute('specelemNew',     'SpecelemEditCtrl',["admin", "user"]);
Utils::addRoute('specelemEdit',    'SpecelemEditCtrl',["admin", "user"]);
Utils::addRoute('specelemSave',    'SpecelemEditCtrl',["admin", "user"]);
Utils::addRoute('specelemDelete',  'SpecelemEditCtrl',["admin"]);

Utils::addRoute('photoList',    'PhotoListCtrl');// jak wstawic zdjecia
Utils::addRoute('photoNew',     'PhotoEditCtrl',["admin", "user"]);
Utils::addRoute('photoEdit',    'PhotoEditCtrl',["admin", "user"]);
Utils::addRoute('photoSave',    'PhotoEditCtrl',["admin", "user"]);
Utils::addRoute('photoDelete',  'PhotoEditCtrl',["admin"]);

Utils::addRoute('coustomerList',    'CoustomerListCtrl');// Czy potrzebne
