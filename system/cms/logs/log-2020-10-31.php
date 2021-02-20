<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2020-10-31 00:04:11 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-31 00:04:11 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-31 00:04:11 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 44
ERROR - 2020-10-31 00:12:41 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 62
ERROR - 2020-10-31 00:19:20 --> Severity: Notice  --> Undefined offset: 2 D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 261
ERROR - 2020-10-31 00:19:20 --> Severity: Notice  --> Undefined offset: 2 D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 261
ERROR - 2020-10-31 00:19:20 --> Query error: Column 'harga' cannot be null - Invalid query: INSERT INTO `default_reseps_applied` (`id_resep`, `harga`, `id_brg`, `jumlah`, `user_id`) VALUES ('9', NULL, '6', NULL, '1')
ERROR - 2020-10-31 00:29:52 --> Query error: Unknown column 'default_respes.name' in 'field list' - Invalid query: SELECT `default_respes`.`name`, sum(harga*jumlah) as hpp
FROM `default_reseps`
JOIN `default_reseps_applied` ON `default_reseps`.`id` = `default_reseps_applied`.`id_resep`
 LIMIT 20
ERROR - 2020-10-31 00:30:20 --> Query error: Unknown column 'default_respes.resep_name' in 'field list' - Invalid query: SELECT `default_respes`.`resep_name`, sum(harga*jumlah) as hpp
FROM `default_reseps`
JOIN `default_reseps_applied` ON `default_reseps`.`id` = `default_reseps_applied`.`id_resep`
 LIMIT 20
ERROR - 2020-10-31 00:30:49 --> Severity: Notice  --> Undefined property: stdClass::$id D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\index.php 45
ERROR - 2020-10-31 00:30:49 --> Severity: Notice  --> Undefined property: stdClass::$id D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\index.php 50
ERROR - 2020-10-31 02:43:02 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-31 02:44:13 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\produk\views\admin\index.php 14
ERROR - 2020-10-31 02:44:36 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\index.php 14
ERROR - 2020-10-31 02:44:40 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 69
ERROR - 2020-10-31 02:45:55 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 69
ERROR - 2020-10-31 02:48:16 --> Will go ahead and create the following tables: produk_retails, produk_retails_applied
ERROR - 2020-10-31 02:48:16 --> -- Creating table: produk_retails
ERROR - 2020-10-31 02:48:16 --> -- Creating table: produk_retails_applied
ERROR - 2020-10-31 02:48:16 --> All done perfectly!
ERROR - 2020-10-31 02:55:48 --> Severity: Notice  --> Undefined offset: 0 D:\xampp7\htdocs\pos\system\cms\themes\admin\views\admin\partials\navigation.php 28
ERROR - 2020-10-31 02:55:48 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-31 02:55:48 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-31 02:55:48 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-31 02:55:48 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-31 02:55:48 --> Severity: Warning  --> Cannot modify header information - headers already sent by (output started at D:\xampp7\htdocs\pos\system\cms\helpers\admin_theme_helper.php:29) D:\xampp7\htdocs\pos\system\codeigniter\core\Output.php 419
ERROR - 2020-10-31 02:58:11 --> Will go ahead and create the following tables: produk_reseps, produk_reseps_applied
ERROR - 2020-10-31 02:58:11 --> -- Creating table: produk_reseps
ERROR - 2020-10-31 02:58:11 --> -- Creating table: produk_reseps_applied
ERROR - 2020-10-31 02:58:11 --> All done perfectly!
ERROR - 2020-10-31 03:02:47 --> Page Missing: admin/produk_retail
ERROR - 2020-10-31 03:02:48 --> Page Missing: admin/system/cms/themes/default/css/framework7.ios.min.css
ERROR - 2020-10-31 03:02:48 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:02:48 --> Page Missing: admin/system/cms/themes/default/css/my-app.css
ERROR - 2020-10-31 03:02:48 --> Page Missing: admin/system/cms/themes/default/js/framework7.min.js
ERROR - 2020-10-31 03:02:48 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:03:10 --> Page Missing: admin/produk_retail
ERROR - 2020-10-31 03:03:10 --> Page Missing: admin/system/cms/themes/default/css/framework7.ios.min.css
ERROR - 2020-10-31 03:03:10 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:03:10 --> Page Missing: admin/system/cms/themes/default/css/my-app.css
ERROR - 2020-10-31 03:03:11 --> Page Missing: admin/system/cms/themes/default/js/framework7.min.js
ERROR - 2020-10-31 03:03:11 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:03:33 --> Page Missing: admin/produk_retail
ERROR - 2020-10-31 03:03:33 --> Page Missing: admin/system/cms/themes/default/css/framework7.ios.min.css
ERROR - 2020-10-31 03:03:33 --> Page Missing: admin/system/cms/themes/default/css/my-app.css
ERROR - 2020-10-31 03:03:33 --> Page Missing: admin/system/cms/themes/default/js/framework7.min.js
ERROR - 2020-10-31 03:03:33 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:03:54 --> Page Missing: admin/produk_retail
ERROR - 2020-10-31 03:03:54 --> Page Missing: admin/system/cms/themes/default/css/framework7.ios.min.css
ERROR - 2020-10-31 03:03:54 --> Page Missing: admin/system/cms/themes/default/css/my-app.css
ERROR - 2020-10-31 03:03:54 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:03:54 --> Page Missing: admin/system/cms/themes/default/js/framework7.min.js
ERROR - 2020-10-31 03:03:55 --> Page Missing: admin/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 03:09:13 --> Severity: Notice  --> Undefined variable: produk D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 11
ERROR - 2020-10-31 03:09:13 --> Severity: Notice  --> Trying to get property 'produk_name' of non-object D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 11
ERROR - 2020-10-31 03:09:13 --> Severity: Notice  --> Undefined variable: cat D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 16
ERROR - 2020-10-31 03:28:07 --> Severity: Notice  --> Undefined variable: cat D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 16
ERROR - 2020-10-31 03:29:22 --> Severity: Notice  --> Undefined variable: cab D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 20
ERROR - 2020-10-31 04:19:54 --> Severity: Notice  --> Undefined variable: produk D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 34
ERROR - 2020-10-31 04:19:54 --> Severity: Notice  --> Trying to get property 'produk_name' of non-object D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 34
ERROR - 2020-10-31 04:26:56 --> Severity: Notice  --> Undefined variable: produk D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 34
ERROR - 2020-10-31 04:26:56 --> Severity: Notice  --> Trying to get property 'produk_name' of non-object D:\xampp7\htdocs\pos\system\cms\modules\produk_resep\views\admin\form_o.php 34
ERROR - 2020-10-31 05:06:01 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 69
ERROR - 2020-10-31 05:10:13 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 79
ERROR - 2020-10-31 05:11:34 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 79
ERROR - 2020-10-31 05:12:40 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 79
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$id_brg D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 85
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$nama_barang D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 86
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$volume D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 86
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$namsat D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 86
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$kode D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 87
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$harga_dasar D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 88
ERROR - 2020-10-31 07:47:07 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 89
ERROR - 2020-10-31 10:21:54 --> Severity: Notice  --> Undefined variable: total D:\xampp7\htdocs\pos\system\cms\modules\resep\views\admin\form_o.php 79
ERROR - 2020-10-31 10:24:13 --> Severity: Notice  --> Undefined variable: base_where D:\xampp7\htdocs\pos\system\cms\modules\resep\controllers\admin.php 51
ERROR - 2020-10-31 10:47:35 --> Page Missing: admin/group/index_json
ERROR - 2020-10-31 10:47:36 --> Page Missing: admin/group/system/cms/themes/default/css/my-app.css
ERROR - 2020-10-31 10:47:36 --> Page Missing: admin/group/system/cms/themes/default/js/framework7.min.js
ERROR - 2020-10-31 10:47:36 --> Page Missing: admin/group/system/cms/themes/default/css/framework7.ios.min.css
ERROR - 2020-10-31 10:47:36 --> Page Missing: admin/group/system/cms/themes/default/js/my-app.js
ERROR - 2020-10-31 10:47:54 --> Severity: Notice  --> Undefined offset: 0 D:\xampp7\htdocs\pos\system\cms\core\MY_Model.php 654
ERROR - 2020-10-31 10:47:54 --> Severity: Notice  --> Undefined offset: 1 D:\xampp7\htdocs\pos\system\cms\core\MY_Model.php 654
ERROR - 2020-10-31 10:47:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'IS NULL' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `default_groups`
WHERE  IS NULL
ERROR - 2020-10-31 10:49:01 --> Severity: Notice  --> Undefined offset: 0 D:\xampp7\htdocs\pos\system\cms\core\MY_Model.php 654
ERROR - 2020-10-31 10:49:01 --> Severity: Notice  --> Undefined offset: 1 D:\xampp7\htdocs\pos\system\cms\core\MY_Model.php 654
ERROR - 2020-10-31 10:49:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'IS NULL' at line 3 - Invalid query: SELECT COUNT(*) AS `numrows`
FROM `default_groups`
WHERE  IS NULL
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 94
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$namasatuan D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 95
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$subname D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 96
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 97
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 98
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 94
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$namasatuan D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 95
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$subname D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 96
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$stok_max D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 97
ERROR - 2020-10-31 12:05:15 --> Severity: Notice  --> Undefined property: stdClass::$stok_min D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 98
ERROR - 2020-10-31 12:33:51 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 94
ERROR - 2020-10-31 12:33:51 --> Severity: Notice  --> Undefined property: stdClass::$namakategori D:\xampp7\htdocs\pos\system\cms\modules\jasa\controllers\admin.php 94
ERROR - 2020-10-31 12:49:58 --> Severity: Notice  --> Array to string conversion D:\xampp7\htdocs\pos\system\codeigniter\database\DB_driver.php 1059
ERROR - 2020-10-31 12:49:58 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `default_jasa_detail` (`name`, `satuan`, `user_id`, `id_jasa`, `kode`) VALUES ('Biaya Penyusutan galon', Array, '1', '5', 'BIY-000004')
ERROR - 2020-10-31 12:58:18 --> Severity: Notice  --> Undefined index: outlet D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index.php 22
ERROR - 2020-10-31 12:58:22 --> Severity: Notice  --> Undefined index: outlet D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index_detail.php 22
