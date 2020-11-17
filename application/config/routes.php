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

/*--------------------------------------------------
Master Kelompok Pekerjaan
/--------------------------------------------------*/
$route['Master/kelompok']		= 'master/Kelompok_pekerjaan';
$route['Master/kelompok/store']	= 'master/Kelompok_pekerjaan/store';
$route['Master/kelompok/update']	= 'master/Kelompok_pekerjaan/update';

/*--------------------------------------------------
Master Jenis Pekerjaan
/--------------------------------------------------*/
$route['Master/pekerjaan']		= 'master/Pekerjaan';
$route['Master/pekerjaan/store']	= 'master/Pekerjaan/store';
$route['Master/pekerjaan/update']	= 'master/Pekerjaan/update';

/*--------------------------------------------------
Master  Pelanggan
/--------------------------------------------------*/
$route['Master/pelanggan']		= 'master/Pelanggan';
$route['Master/pelanggan/store']	= 'master/Pelanggan/store';
$route['Master/pelanggan/update']	= 'master/Pelanggan/update';

/*--------------------------------------------------
Master Cara Bayar
/--------------------------------------------------*/
$route['Master/bayar']			= 'master/Cara_bayar';
$route['Master/bayar/store']		= 'master/Cara_bayar/store';
$route['Master/bayar/update']		= 'master/Cara_bayar/update';

/*--------------------------------------------------
Master Chart Of Account
/--------------------------------------------------*/
$route['Master/coa']			= 'master/Coa';
$route['Master/coa/store']		= 'master/Coa/store';
$route['Master/coa/update']		= 'master/Coa/update';
