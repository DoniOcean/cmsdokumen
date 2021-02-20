<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2020-10-21 12:39:47 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-21 12:40:03 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
ERROR - 2020-10-21 12:40:15 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\master\views\admin\index.php 16
ERROR - 2020-10-21 12:45:09 --> Will go ahead and create the following tables: kasirs, kasirs_applied
ERROR - 2020-10-21 12:45:09 --> -- Creating table: kasirs
ERROR - 2020-10-21 12:45:09 --> -- Creating table: kasirs_applied
ERROR - 2020-10-21 12:45:10 --> All done perfectly!
ERROR - 2020-10-21 12:45:54 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 16
ERROR - 2020-10-21 12:45:54 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 19
ERROR - 2020-10-21 12:45:54 --> Severity: Notice  --> Undefined index: Kasir D:\xampp7\htdocs\pos\system\cms\themes\admin\views\admin\partials\navigation.php 26
ERROR - 2020-10-21 12:45:54 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:45:54 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:45:54 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:45:54 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:45:54 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:46:40 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 16
ERROR - 2020-10-21 12:46:40 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 19
ERROR - 2020-10-21 12:46:40 --> Severity: Notice  --> Undefined index: Kasir D:\xampp7\htdocs\pos\system\cms\themes\admin\views\admin\partials\navigation.php 27
ERROR - 2020-10-21 12:46:40 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:46:40 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:46:40 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:46:40 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:46:40 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-21 12:46:51 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 16
ERROR - 2020-10-21 12:46:51 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 19
ERROR - 2020-10-21 12:47:40 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 16
ERROR - 2020-10-21 12:47:40 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 19
ERROR - 2020-10-21 12:48:09 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 16
ERROR - 2020-10-21 12:48:09 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 19
ERROR - 2020-10-21 12:49:14 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\pembelian_barang\views\admin\index.php 16
ERROR - 2020-10-21 12:49:14 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\pembelian_barang\views\admin\index.php 19
ERROR - 2020-10-21 12:49:31 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\index.php 16
ERROR - 2020-10-21 12:49:31 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\index.php 19
ERROR - 2020-10-21 13:13:45 --> Query error: Unknown column 'default_bahan_bakus.id_barang' in 'on clause' - Invalid query: SELECT `default_bahan_bakus`.*, `default_master_barangs`.`name` as `namabarang`, `default_master_satuans`.`name` as `namasatuan`
FROM `default_bahan_bakus`
JOIN `default_master_barangs` ON `default_master_barangs`.`id` = `default_bahan_bakus`.`id_barang`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_bahan_bakus`.`id_satuan`
WHERE `status_konek` =  'Permohonan Baru'
 LIMIT 20
ERROR - 2020-10-21 13:27:40 --> Will go ahead and create the following tables: produk_retails, produk_retails_applied
ERROR - 2020-10-21 13:27:40 --> -- Creating table: produk_retails
ERROR - 2020-10-21 13:27:40 --> -- Creating table: produk_retails_applied
ERROR - 2020-10-21 13:27:40 --> All done perfectly!
ERROR - 2020-10-21 13:30:51 --> Will go ahead and create the following tables: kategori_produks, kategori_produks_applied
ERROR - 2020-10-21 13:30:51 --> -- Creating table: kategori_produks
ERROR - 2020-10-21 13:30:51 --> -- Creating table: kategori_produks_applied
ERROR - 2020-10-21 13:30:52 --> All done perfectly!
ERROR - 2020-10-21 13:33:00 --> Will go ahead and create the following tables: kategori_produks, kategori_produks_applied
ERROR - 2020-10-21 13:33:00 --> -- Creating table: kategori_produks
ERROR - 2020-10-21 13:33:00 --> -- Creating table: kategori_produks_applied
ERROR - 2020-10-21 13:33:00 --> All done perfectly!
ERROR - 2020-10-21 13:42:46 --> Query error: Unknown column 'default_bahan_bakus.id_barang' in 'on clause' - Invalid query: SELECT `default_bahan_bakus`.*, `default_master_barangs`.`name` as `namabarang`, `default_master_satuans`.`name` as `namasatuan`
FROM `default_bahan_bakus`
JOIN `default_master_barangs` ON `default_master_barangs`.`id` = `default_bahan_bakus`.`id_barang`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_bahan_bakus`.`id_satuan`
WHERE `status_konek` =  'Permohonan Baru'
 LIMIT 20
ERROR - 2020-10-21 13:43:26 --> Query error: Unknown column 'default_bahan_bakus.id_barang' in 'on clause' - Invalid query: SELECT `default_bahan_bakus`.*, `default_master_barangs`.`name` as `namabarang`, `default_master_satuans`.`name` as `namasatuan`
FROM `default_bahan_bakus`
JOIN `default_master_barangs` ON `default_master_barangs`.`id` = `default_bahan_bakus`.`id_barang`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_bahan_bakus`.`id_satuan`
WHERE `status_konek` =  'Permohonan Baru'
 LIMIT 20
ERROR - 2020-10-21 14:13:06 --> Severity: Notice  --> Undefined variable: permintaan_bahanbakus D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 28
ERROR - 2020-10-21 23:48:31 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-21 23:52:39 --> Severity: Warning  --> mktime() expects parameter 6 to be integer, string given D:\xampp7\htdocs\pos\system\codeigniter\helpers\date_helper.php 383
ERROR - 2020-10-21 23:52:59 --> Severity: Warning  --> mktime() expects parameter 5 to be integer, string given D:\xampp7\htdocs\pos\system\codeigniter\helpers\date_helper.php 383
ERROR - 2020-10-21 23:53:08 --> Severity: Warning  --> mktime() expects parameter 5 to be integer, string given D:\xampp7\htdocs\pos\system\codeigniter\helpers\date_helper.php 383
ERROR - 2020-10-21 23:53:28 --> Severity: Warning  --> mktime() expects parameter 5 to be integer, string given D:\xampp7\htdocs\pos\system\codeigniter\helpers\date_helper.php 383
ERROR - 2020-10-21 23:53:44 --> Severity: Warning  --> mktime() expects parameter 5 to be integer, string given D:\xampp7\htdocs\pos\system\codeigniter\helpers\date_helper.php 383
ERROR - 2020-10-21 23:54:31 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 16
ERROR - 2020-10-21 23:54:31 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 19
ERROR - 2020-10-21 23:54:49 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 16
ERROR - 2020-10-21 23:54:49 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 19
ERROR - 2020-10-21 23:55:46 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 16
ERROR - 2020-10-21 23:55:46 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 19
ERROR - 2020-10-21 23:58:03 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 16
ERROR - 2020-10-21 23:58:03 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 19
