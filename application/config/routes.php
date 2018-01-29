<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//routes for inventory
$route['account/order'] = 'account/create';
//routes for pages
$route['(:any)'] = 'pages/index/$1';
$route['default_controller'] = 'pages/index'; //the view method under the pages class will load first
