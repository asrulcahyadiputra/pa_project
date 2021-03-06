<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*--------------------------------------------------
AUTH
/--------------------------------------------------*/
$route['login']                         = 'Auth';
$route['login/verify']                  = 'Auth/verification';
$route['logout']                        = 'Auth/log_out';



/*--------------------------------------------------
Master Jenis Proyek
/--------------------------------------------------*/
$route['Master/proyek']                        = 'master/Jenis_proyek';
$route['Master/proyek/store']                    = 'master/Jenis_proyek/store';
$route['Master/proyek/update']                = 'master/Jenis_proyek/update';

/*--------------------------------------------------
Master Kelompok Pekerjaan
/--------------------------------------------------*/
$route['Master/kelompok']                    = 'master/Kelompok_pekerjaan';
$route['Master/kelompok/store']                = 'master/Kelompok_pekerjaan/store';
$route['Master/kelompok/update']                = 'master/Kelompok_pekerjaan/update';

/*--------------------------------------------------
Master Jenis Pekerjaan
/--------------------------------------------------*/
$route['Master/pekerjaan']                    = 'master/Pekerjaan';
$route['Master/pekerjaan/store']                = 'master/Pekerjaan/store';
$route['Master/pekerjaan/update']                = 'master/Pekerjaan/update';

/*--------------------------------------------------
Master  Pelanggan
/--------------------------------------------------*/
$route['Master/pelanggan']                    = 'master/Pelanggan';
$route['Master/pelanggan/store']                = 'master/Pelanggan/store';
$route['Master/pelanggan/update']                = 'master/Pelanggan/update';

/*--------------------------------------------------
Master Cara Bayar
/--------------------------------------------------*/
$route['Master/bayar']                        = 'master/Cara_bayar';
$route['Master/bayar/store']                    = 'master/Cara_bayar/store';
$route['Master/bayar/update']                    = 'master/Cara_bayar/update';

/*--------------------------------------------------
Master Chart Of Account
/--------------------------------------------------*/
$route['Master/coa']                        = 'master/Coa';
$route['Master/coa/store']                    = 'master/Coa/store';
$route['Master/coa/update']                    = 'master/Coa/update';

/*--------------------------------------------------
Master Raw Material
/--------------------------------------------------*/
$route['Master/material']                    = 'master/Material';
$route['Master/material/store']                = 'master/Material/store';
$route['Master/material/update']                = 'master/Material/update';

/*--------------------------------------------------
Transaction Project Mapping
/--------------------------------------------------*/
$route['transaksi/pemetaan']                    = 'transactions/project/Project_mapping';
$route['transaksi/pemetaan/baru']                = 'transactions/project/Project_mapping/create';
$route['transaksi/pemetaan/simpan']            = 'transactions/project/Project_mapping/store';
$route['transaksi/pemetaan/manual_entry']        = 'transactions/project/Project_mapping/manual_entry';
$route['transaksi/material/manual_entry']        = 'transactions/project/Project_mapping/material_manual_entry';
$route['transaksi/pemetaan/detail/(:any)']        = 'transactions/project/Project_mapping/show/$1';
$route['transaksi/pemetaan/hapus/(:any)/(:any)']    = 'transactions/project/Project_mapping/delete/$1/$2';
$route['transaksi/material/hapus/(:any)/(:any)']    = 'transactions/project/Project_mapping/material_delete/$1/$2';

/*--------------------------------------------------
Transaction Project Contract
/--------------------------------------------------*/
$route['transaksi/kontrak']                    = 'transactions/project/Contract';
$route['transaksi/kontrak/baru']                = 'transactions/project/Contract/create';
$route['transaksi/kontrak/simpan']                = 'transactions/project/Contract/store';
$route['transaksi/kontrak/add_timeline/(:any)']    = 'transactions/project/Contract/add_timeline/$1';
$route['transaksi/kontrak/find_project']        = 'transactions/project/Contract/find_type_project';
$route['transaksi/kontrak/detail/(:any)']        = 'transactions/project/Contract/show/$1';
$route['transaksi/kontrak/start/(:any)']        = 'transactions/project/Contract/start/$1';
$route['transaksi/kontrak/done/(:any)']        = 'transactions/project/Contract/final/$1';

/*--------------------------------------------------
Transaction Project Budgeting
/--------------------------------------------------*/
$route['transaksi/anggaran']                    = 'transactions/accounting/Budgeting';
$route['transaksi/anggaran/create/(:any)']        = 'transactions/accounting/Budgeting/create/$1';
$route['transaksi/anggaran/edit/(:any)']        = 'transactions/accounting/Budgeting/edit/$1';
$route['transaksi/anggaran/simpan']            = 'transactions/accounting/Budgeting/store';
$route['transaksi/anggaran/update']            = 'transactions/accounting/Budgeting/update';

/*--------------------------------------------------
Transaction Project Realization
/--------------------------------------------------*/
$route['transaksi/realisasi']               = 'transactions/accounting/Realization';
$route['transaksi/realisasi/baru']          = 'transactions/accounting/Realization/create';
$route['transaksi/realisasi/fetch']         = 'transactions/accounting/Realization/fetch';
$route['transaksi/realisasi/insert']        = 'transactions/accounting/Realization/store';
$route['transaksi/realisasi/prev']          = 'transactions/accounting/Realization/preview';

/*--------------------------------------------------
Transaction Payments
/--------------------------------------------------*/
$route['transaksi/pembayaran']                  = 'transactions/accounting/Payments';
$route['transaksi/pembayaran/baru']             = 'transactions/accounting/Payments/create';
$route['transaksi/pembayaran/find_angsuran']    = 'transactions/accounting/Payments/find_angsuran';
$route['transaksi/pembayaran/simpan']           = 'transactions/accounting/Payments/store';
$route['transaksi/pembayaran/hapus/(:any)']      = 'transactions/accounting/Payments/destroy/$1';



/*--------------------------------------------------
Report General Ledger
/--------------------------------------------------*/
$route['laporan/jurnal']                        = 'reports/accounting/Ledger';

/*--------------------------------------------------
Report Ledger
/--------------------------------------------------*/
$route['laporan/buku_besar']                    = 'reports/accounting/Ledger/ledger';

/*--------------------------------------------------
Report Budgeting
/--------------------------------------------------*/
$route['laporan/anggaran']                    = 'reports/project/Budget_report';

/*--------------------------------------------------
Report Payments
/--------------------------------------------------*/
$route['laporan/laporan_pembayaran']                   = 'reports/accounting/Payment';
$route['laporan/laporan_pembayaran/load']              = 'reports/accounting/Payment/fetch';

/*--------------------------------------------------
Report Realitation
/--------------------------------------------------*/
$route['laporan/laporan_realisasi']                     = 'reports/project/Realitation_report';
$route['laporan/laporan_realisasi/load']                = 'reports/project/Realitation_report/fetch';

/*--------------------------------------------------
SETTING
/--------------------------------------------------*/
$route['setting/pengguna']                              = 'setting/User';
$route['setting/pengguna/simpan']                       = 'setting/User/store';
