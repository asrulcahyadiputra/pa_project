<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*--------------------------------------------------
Master Jenis Proyek
/--------------------------------------------------*/
$route['Master/proyek']			= 'master/Jenis_proyek';
$route['Master/proyek/store']		= 'master/Jenis_proyek/store';
$route['Master/proyek/update']	= 'master/Jenis_proyek/update';
