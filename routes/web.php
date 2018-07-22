<?php

$router->get('', 		'TaskController@index');
$router->get('add', 	'TaskController@create');
$router->post('add',    'TaskController@store');
$router->get('edit', 	'TaskController@edit');
$router->post('edit',   'TaskController@update');
$router->get('delete',  'TaskController@delete');
