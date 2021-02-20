<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2020-10-30 01:33:45 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-30 01:34:31 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\barang\views\admin\index.php 16
ERROR - 2020-10-30 01:34:31 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\barang\views\admin\index.php 19
ERROR - 2020-10-30 01:37:56 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\master_supplier\views\admin\index.php 14
ERROR - 2020-10-30 01:40:04 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 01:40:04 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 01:40:34 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 01:40:34 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 01:41:48 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 16
ERROR - 2020-10-30 01:41:48 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\kasir\views\admin\index.php 19
ERROR - 2020-10-30 01:41:53 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\barang\views\admin\index.php 16
ERROR - 2020-10-30 01:41:53 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\barang\views\admin\index.php 19
ERROR - 2020-10-30 01:43:23 --> Query error: Table 'pos.default_master_kategori_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_kategori_jasas`
ORDER BY `name` ASC
ERROR - 2020-10-30 01:43:57 --> Query error: Unknown column 'name' in 'order clause' - Invalid query: SELECT *
FROM `default_jasa_detail`
ORDER BY `name` ASC
ERROR - 2020-10-30 01:45:23 --> Query error: Unknown column 'name' in 'order clause' - Invalid query: SELECT *
FROM `default_jasa_detail`
ORDER BY `name` ASC
ERROR - 2020-10-30 01:46:19 --> Query error: Unknown column 'name' in 'order clause' - Invalid query: SELECT *
FROM `default_jasa_detail`
ORDER BY `name` ASC
ERROR - 2020-10-30 01:47:36 --> Query error: Not unique table/alias: 'default_jasa_detail' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `default_jasa`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id_jasa`=`default_jasa`.`id`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id`=`default_jasa`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id`=`default_jasa_detail`.`satuan`
JOIN `default_master_raks` ON `default_master_raks`.`id`=`default_jasa_detail`.`rak`
WHERE `default_jasa`.`status` =  'active'
ERROR - 2020-10-30 01:49:07 --> Query error: Not unique table/alias: 'default_jasa_detail' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `default_jasa`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id_jasa`=`default_jasa`.`id`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id`=`default_jasa`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id`=`default_jasa_detail`.`satuan`
JOIN `default_master_raks` ON `default_master_raks`.`id`=`default_jasa_detail`.`rak`
WHERE `default_jasa`.`status` =  'active'
ERROR - 2020-10-30 01:51:43 --> Query error: Unknown column 'default_jasa.status' in 'where clause' - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `default_jasa`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id_jasa`=`default_jasa`.`id`
WHERE `default_jasa`.`status` =  'active'
ERROR - 2020-10-30 01:52:47 --> Query error: Not unique table/alias: 'default_jasa_detail' - Invalid query: SELECT `default_jasa`.`name` as `namabr`, `default_jasa`.`id` as `idbr`, `default_jasa_detail`.*, `default_jasa_detail`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_master_raks`.`name` as `namarak`
FROM `default_jasa`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id_jasa`=`default_jasa`.`id`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id`=`default_jasa`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id`=`default_jasa_detail`.`satuan`
JOIN `default_master_raks` ON `default_master_raks`.`id`=`default_jasa_detail`.`rak`
WHERE `default_jasa_detail`.`status` =  'active'
 LIMIT 20
ERROR - 2020-10-30 01:53:36 --> Query error: Unknown column 'default_jasa_detail.status' in 'where clause' - Invalid query: SELECT `default_jasa`.`name` as `namabr`, `default_jasa`.`id` as `idbr`, `default_jasa_detail`.*
FROM `default_jasa`
JOIN `default_jasa_detail` ON `default_jasa_detail`.`id_jasa`=`default_jasa`.`id`
WHERE `default_jasa_detail`.`status` =  'active'
 LIMIT 20
ERROR - 2020-10-30 01:54:38 --> Severity: Notice  --> Undefined variable: category D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 64
ERROR - 2020-10-30 01:54:38 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 02:43:56 --> Severity: Notice  --> Undefined variable: category D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 64
ERROR - 2020-10-30 02:43:56 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 02:44:25 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 02:44:25 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 03:05:59 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 03:05:59 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 03:06:17 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 03:06:17 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 03:06:20 --> Severity: Notice  --> Undefined variable: category D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 299
ERROR - 2020-10-30 03:06:20 --> Severity: Warning  --> Invalid argument supplied for foreach() D:\xampp7\htdocs\pos\system\codeigniter\helpers\form_helper.php 339
ERROR - 2020-10-30 03:09:12 --> Will go ahead and create the following tables: jasa_kategoris, jasa_kategoris_applied
ERROR - 2020-10-30 03:09:12 --> -- Creating table: jasa_kategoris
ERROR - 2020-10-30 03:09:12 --> -- Creating table: jasa_kategoris_applied
ERROR - 2020-10-30 03:09:13 --> All done perfectly!
ERROR - 2020-10-30 03:09:22 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 03:09:22 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 03:09:35 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 03:09:35 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 03:09:40 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 03:09:40 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 03:09:43 --> Query error: Table 'pos.default_jasa_ketagori' doesn't exist - Invalid query: SELECT *
FROM `default_jasa_ketagori`
ORDER BY `name` ASC
ERROR - 2020-10-30 03:09:54 --> Query error: Table 'pos.default_jasa_ketagoris' doesn't exist - Invalid query: SELECT *
FROM `default_jasa_ketagoris`
ORDER BY `name` ASC
ERROR - 2020-10-30 03:10:31 --> Query error: Unknown column 'name' in 'order clause' - Invalid query: SELECT *
FROM `default_jasa_kategoris`
ORDER BY `name` ASC
ERROR - 2020-10-30 03:10:56 --> Severity: Notice  --> Undefined property: stdClass::$kode D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 189
ERROR - 2020-10-30 03:10:56 --> Severity: Notice  --> Undefined property: stdClass::$kode D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 189
ERROR - 2020-10-30 03:11:47 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\master_kategori_barang\views\admin\index.php 14
ERROR - 2020-10-30 05:00:05 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-30 05:00:28 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:00:28 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:00:28 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 47
ERROR - 2020-10-30 05:00:28 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 49
ERROR - 2020-10-30 05:13:15 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\master_kategori_barang\views\admin\index.php 14
ERROR - 2020-10-30 05:17:32 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:17:32 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:17:32 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 47
ERROR - 2020-10-30 05:17:32 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 49
ERROR - 2020-10-30 05:19:54 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:19:54 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:19:54 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 47
ERROR - 2020-10-30 05:19:54 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 49
ERROR - 2020-10-30 05:20:29 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:20:29 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:21:23 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:21:23 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:21:30 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\controllers\admin.php 296
ERROR - 2020-10-30 05:21:30 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\form.php 10
ERROR - 2020-10-30 05:21:30 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\form_o.php 8
ERROR - 2020-10-30 05:21:58 --> Severity: Notice  --> Undefined property: stdClass::$jasa_kategori_name D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\controllers\admin.php 296
ERROR - 2020-10-30 05:22:06 --> Query error: Unknown column 'jasa_kategori_name' in 'where clause' - Invalid query: SELECT *
FROM `default_jasa_kategoris`
WHERE `jasa_kategori_name` =  'Gaji'
AND `id` <> '1'
ERROR - 2020-10-30 05:23:53 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:23:53 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:24:03 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 16
ERROR - 2020-10-30 05:24:03 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa_kategori\views\admin\index.php 19
ERROR - 2020-10-30 05:24:08 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 05:24:08 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 05:57:43 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:09:24 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:10:02 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:10:29 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:10:33 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:10:56 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:11:24 --> Query error: Table 'pos.default_master_jasas' doesn't exist - Invalid query: SELECT *
FROM `default_master_jasas`
WHERE `name` =  'asd'
ERROR - 2020-10-30 08:12:12 --> Query error: Unknown column 'kode' in 'field list' - Invalid query: SELECT MAX(kode) AS `kode`
FROM `default_jasa`
WHERE  `kode`  LIKE 'GHJ-%'
ERROR - 2020-10-30 08:12:45 --> Query error: Unknown column 'kategori' in 'field list' - Invalid query: INSERT INTO `default_jasa` (`name`, `user_id`, `kategori`, `kode`) VALUES ('asd', '1', '1', 'GHJ-000001')
ERROR - 2020-10-30 08:13:08 --> Severity: Notice  --> Undefined index: volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 229
ERROR - 2020-10-30 08:13:08 --> Severity: Warning  --> count(): Parameter must be an array or an object that implements Countable D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 229
ERROR - 2020-10-30 08:13:08 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:13:08 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:13:14 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:13:14 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:13:40 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:13:40 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:13:48 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:13:48 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:14:26 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:14:26 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:14:40 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:14:40 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:14:50 --> Query error: Unknown column 'default_jasa.ids' in 'on clause' - Invalid query: SELECT `default_jasa`.`name` as `namabr`, `default_jasa`.`id` as `idbr`, `default_jasa_detail`.*
FROM `default_jasa`
RIGHT JOIN `default_jasa_detail` ON `default_jasa_detail`.`id_jasa`=`default_jasa`.`ids`
WHERE `default_jasa_detail`.`status` =  'active'
 LIMIT 20
ERROR - 2020-10-30 08:15:52 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 16
ERROR - 2020-10-30 08:15:52 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 19
ERROR - 2020-10-30 08:19:43 --> Severity: Notice  --> Undefined index: volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 229
ERROR - 2020-10-30 08:19:43 --> Severity: Warning  --> count(): Parameter must be an array or an object that implements Countable D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 229
ERROR - 2020-10-30 08:21:00 --> Query error: Unknown column 'user_id' in 'field list' - Invalid query: INSERT INTO `default_jasa_detail` (`name`, `user_id`, `id_jasa`, `kode`) VALUES ('jkjhk', '1', 3, 'GHJ-000001')
ERROR - 2020-10-30 08:22:20 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 56
ERROR - 2020-10-30 08:22:20 --> Severity: Notice  --> Undefined property: stdClass::$namasatuan D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 57
ERROR - 2020-10-30 08:22:20 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 58
ERROR - 2020-10-30 08:22:20 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 59
ERROR - 2020-10-30 08:22:20 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 60
ERROR - 2020-10-30 08:22:20 --> Severity: Notice  --> Undefined property: stdClass::$namarak D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 61
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 56
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namasatuan D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 57
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 58
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 59
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 60
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namarak D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 61
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 56
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namasatuan D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 57
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 58
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 59
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 60
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namarak D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 61
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 56
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namasatuan D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 57
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 58
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 59
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 60
ERROR - 2020-10-30 08:22:35 --> Severity: Notice  --> Undefined property: stdClass::$namarak D:\xampp7\htdocs\pos\system\cms\modules\jasa\views\admin\index.php 61
ERROR - 2020-10-30 08:25:44 --> Severity: Notice  --> Undefined index: volume D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 409
ERROR - 2020-10-30 08:25:44 --> Severity: Warning  --> count(): Parameter must be an array or an object that implements Countable D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 409
ERROR - 2020-10-30 08:27:09 --> Severity: Notice  --> Array to string conversion D:\xampp7\htdocs\pos\system\codeigniter\database\DB_driver.php 1133
ERROR - 2020-10-30 08:27:09 --> Query error: Unknown column 'subname' in 'field list' - Invalid query: UPDATE `default_jasa_detail` SET `subname` = 'Gaji karyawn', `user_id` = '1', `rak` = Array WHERE `id` =  '1'
ERROR - 2020-10-30 08:27:27 --> Severity: Notice  --> Array to string conversion D:\xampp7\htdocs\pos\system\codeigniter\database\DB_driver.php 1133
ERROR - 2020-10-30 08:27:27 --> Query error: Unknown column 'rak' in 'field list' - Invalid query: UPDATE `default_jasa_detail` SET `name` = 'Gaji karyawn', `user_id` = '1', `rak` = Array WHERE `id` =  '1'
ERROR - 2020-10-30 10:31:20 --> Severity: Notice  --> Undefined index: outlet D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index.php 22
ERROR - 2020-10-30 10:31:25 --> Severity: Notice  --> Undefined index: outlet D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index_detail.php 22
ERROR - 2020-10-30 10:42:53 --> Severity: Notice  --> Undefined variable: produk D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 33
ERROR - 2020-10-30 10:42:53 --> Severity: Notice  --> Trying to get property 'produk_name' of non-object D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 33
ERROR - 2020-10-30 12:46:49 --> Severity: Notice  --> Undefined index: outlet D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index.php 22
ERROR - 2020-10-30 12:48:21 --> Severity: Notice  --> Undefined index: outlet D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index.php 22
ERROR - 2020-10-30 13:03:16 --> Severity: Notice  --> Undefined index: selbrg D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\controllers\admin.php 312
ERROR - 2020-10-30 13:03:26 --> Severity: Notice  --> Undefined variable: setting D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\form.php 331
ERROR - 2020-10-30 13:03:26 --> Severity: Notice  --> Trying to get property 'ppn' of non-object D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\form.php 331
ERROR - 2020-10-30 14:06:19 --> Severity: Notice  --> Undefined offset: 0 D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\view.php 201
ERROR - 2020-10-30 14:06:19 --> Severity: Notice  --> Undefined offset: 0 D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\view.php 201
ERROR - 2020-10-30 14:06:19 --> Severity: Notice  --> Undefined offset: 0 D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\view.php 201
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 134
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 135
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$jumlah D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 136
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 134
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 135
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$jumlah D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 136
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 134
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 135
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$jumlah D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 136
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 134
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 135
ERROR - 2020-10-30 14:21:02 --> Severity: Notice  --> Undefined property: stdClass::$jumlah D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 136
ERROR - 2020-10-30 14:21:31 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:31 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:31 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:31 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:38 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:38 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:38 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 14:21:38 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\controllers\admin.php 130
ERROR - 2020-10-30 22:37:00 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-30 22:37:05 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\index.php 14
ERROR - 2020-10-30 22:40:13 --> Severity: Notice  --> Undefined variable: count D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 113
ERROR - 2020-10-30 22:41:26 --> Severity: Notice  --> Undefined variable: count D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 114
ERROR - 2020-10-30 22:42:06 --> Severity: Notice  --> Undefined variable: count D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 114
ERROR - 2020-10-30 22:43:39 --> Severity: Notice  --> Undefined variable: count D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 114
ERROR - 2020-10-30 22:55:37 --> Severity: Notice  --> Undefined variable: _POS D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 127
ERROR - 2020-10-30 22:55:37 --> Query error: Table 'pos.default_resep_applied' doesn't exist - Invalid query: INSERT INTO `default_resep_applied` (`id_resep`, `id_barang`, `jumlah`, `id_user`) VALUES (3, '6', NULL, '1')
ERROR - 2020-10-30 22:56:54 --> Severity: Notice  --> Undefined variable: _POS D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 127
ERROR - 2020-10-30 22:56:54 --> Query error: Unknown column 'id_barang' in 'field list' - Invalid query: INSERT INTO `default_reseps_applied` (`id_resep`, `id_barang`, `jumlah`, `id_user`) VALUES (4, '6', NULL, '1')
ERROR - 2020-10-30 22:57:53 --> Severity: Notice  --> Undefined variable: _POS D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 127
ERROR - 2020-10-30 22:57:53 --> Query error: Unknown column 'id_user' in 'field list' - Invalid query: INSERT INTO `default_reseps_applied` (`id_resep`, `id_brg`, `jumlah`, `id_user`) VALUES (5, '6', NULL, '1')
ERROR - 2020-10-30 22:58:37 --> Severity: Notice  --> Undefined variable: _POS D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 127
ERROR - 2020-10-30 22:58:37 --> Query error: Column 'jumlah' cannot be null - Invalid query: INSERT INTO `default_reseps_applied` (`id_resep`, `id_brg`, `jumlah`, `user_id`) VALUES (6, '6', NULL, '1')
ERROR - 2020-10-30 22:59:56 --> Severity: Notice  --> Undefined variable: _POS D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 126
ERROR - 2020-10-30 22:59:56 --> Query error: Column 'jumlah' cannot be null - Invalid query: INSERT INTO `default_reseps_applied` (`id_resep`, `id_brg`, `jumlah`, `user_id`) VALUES (7, '6', NULL, '1')
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:22:00 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:23:38 --> Severity: Notice  --> Undefined property: stdClass::$name D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 50
ERROR - 2020-10-30 23:28:03 --> Query error: Unknown column 'default_inv_stok_barangs.id_barang' in 'on clause' - Invalid query: SELECT `default_master_barangs`.`name` as `nama`, `default_reseps_applied`.`id_brg`
FROM `default_reseps_applied`
JOIN `default_inv_stok_barangs` ON `default_inv_stok_barangs`.`id_brg` = `default_reseps_applied`.`id_brg`
JOIN `default_master_barangs_detail` ON `default_inv_stok_barangs`.`id_brg` = `default_master_barangs_detail`.`id`
JOIN `default_master_barangs` ON `default_master_barangs`.`id` = `default_inv_stok_barangs`.`id_barang`
ERROR - 2020-10-30 23:30:47 --> Query error: Unknown column 'default_inv_stok_barangs.id_brgs' in 'on clause' - Invalid query: SELECT `default_master_barangs`.`name` as `nama`, `default_reseps_applied`.`id_brg`
FROM `default_reseps_applied`
JOIN `default_inv_stok_barangs` ON `default_inv_stok_barangs`.`id_brg` = `default_reseps_applied`.`id_brg`
JOIN `default_master_barangs_detail` ON `default_inv_stok_barangs`.`id_brg` = `default_master_barangs_detail`.`id`
JOIN `default_master_barangs` ON `default_master_barangs`.`id` = `default_inv_stok_barangs`.`id_brgs`
ERROR - 2020-10-30 23:35:53 --> Query error: Unknown column 'default_resep_applied.id' in 'where clause' - Invalid query: SELECT `default_reseps_applied`.`id_brg`
FROM `default_reseps_applied`
JOIN `default_inv_stok_barangs` ON `default_inv_stok_barangs`.`id_brg` = `default_reseps_applied`.`id_brg`
WHERE `default_resep_applied`.`id` =  '8'
ERROR - 2020-10-30 23:52:45 --> Page Missing: admin/pembelian_barang/copy/5
