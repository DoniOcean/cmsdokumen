<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 2020-10-09 12:29:19 --> Page Missing: apple-touch-icon.png
ERROR - 2020-10-09 12:29:31 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index.php 16
ERROR - 2020-10-09 12:29:31 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\inv_stok_barang\views\admin\index.php 19
ERROR - 2020-10-09 12:29:40 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 16
ERROR - 2020-10-09 12:29:40 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\permintaan_bahanbaku\views\admin\index.php 19
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 16
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 19
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 47
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 49
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 47
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 49
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 47
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 49
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 47
ERROR - 2020-10-09 13:00:33 --> Severity: Notice  --> Undefined property: stdClass::$bahan_baku_name D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 49
ERROR - 2020-10-09 13:02:50 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 16
ERROR - 2020-10-09 13:02:50 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 19
ERROR - 2020-10-09 13:03:53 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 16
ERROR - 2020-10-09 13:03:53 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 19
ERROR - 2020-10-09 13:04:30 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 16
ERROR - 2020-10-09 13:04:30 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 19
ERROR - 2020-10-09 13:05:08 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 16
ERROR - 2020-10-09 13:05:08 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\bahan_baku\views\admin\index.php 19
ERROR - 2020-10-09 13:15:41 --> Severity: Notice  --> Undefined index: keyword D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\index.php 16
ERROR - 2020-10-09 13:15:41 --> Severity: Notice  --> Undefined index: kategori D:\xampp7\htdocs\pos\system\cms\modules\purchase_order\views\admin\index.php 19
ERROR - 2020-10-09 13:22:08 --> Query error: Unknown column 'default_master_barangs.name' in 'where clause' - Invalid query: SELECT count(DISTINCT id_brg, selbrg ) as numrows
FROM `default_inv_stok_barangs`
WHERE  concat(default_master_barangs.name,' ')  LIKE '%1210200001%'
ERROR - 2020-10-09 13:23:01 --> Page Missing: admin/inv_stok_barang_barang/reset
ERROR - 2020-10-09 13:57:09 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
ERROR - 2020-10-09 13:57:23 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
ERROR - 2020-10-09 14:00:07 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
ERROR - 2020-10-09 14:01:07 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
ERROR - 2020-10-09 14:02:50 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
ERROR - 2020-10-09 14:13:26 --> Query error: Unknown column 'default_master_barangs.name' in 'where clause' - Invalid query: SELECT count(DISTINCT id_brg, selbrg ) as numrows
FROM `default_inv_stok_barangs`
WHERE  concat(default_master_barangs.name,' ')  LIKE '%000004%'
ERROR - 2020-10-09 14:30:05 --> Query error: Unknown column 'default_master_barangs.satuan' in 'on clause' - Invalid query: SELECT `default_master_barangs`.*, `default_master_kategori_barangs`.`name` as `namakategori`, `default_master_satuans`.`name` as `namasatuan`, `default_profiles`.`display_name` as `nama`, `default_master_raks`.`name` as `rakname`
FROM `default_master_barangs`
JOIN `default_master_kategori_barangs` ON `default_master_kategori_barangs`.`id` = `default_master_barangs`.`kategori`
JOIN `default_master_satuans` ON `default_master_satuans`.`id` = `default_master_barangs`.`satuan`
JOIN `default_profiles` ON `default_profiles`.`user_id` = `default_master_barangs`.`user_id`
LEFT JOIN `default_master_raks` ON `default_master_raks`.`id` = `default_master_barangs`.`rak`
WHERE `default_master_barangs`.`status` =  'active'
ORDER BY `default_master_barangs`.`name` ASC
 LIMIT 20
