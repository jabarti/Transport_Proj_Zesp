<?php

/**
 * common.inc.php
 *
 * Includes all necessary files for the project.
 *
 * @author Bartosz Lewiński <jabarti@wp.pl>
 *
 */

header('Content-Type: text/html; charset=utf-8'); 
 // LOAD CUSTOM SETTINGS
/*if (file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config.inc.php')) {
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config.inc.php');
}/**/

//$tempPath = getenv('PATH');
//$res = putenv('PATH=/opt/local/bin/:'.$tempPath);


if (!defined('MAX_MAIL_BATCH')) {
	define('MAX_MAIL_BATCH', 1); // Maximum number of emails to send while running the newsletter mailer job.
}

session_start();

// DEFINE DIRECTORIES
define('BASE_PATH', dirname(__FILE__));
define('UPRODUCE_UPLOAD_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'uProduceUploads');
define('INCLUDE_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'Includes');
define('CLASSES_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'Classes');
define('LOCALE_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'locale');
define('FILES_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'files');
define('PICTURES_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'pictures');
define('STYLES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'Styles');
define('INFO_IMG_FILE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'infoImages');
define('XML_RESOURCES_DIR', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'xmlResources');
define('PAGE_THUMBS_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'page_thumbs');


// DEFAULT LANGUAGE
//define("DEFAULT_LANGUAGE", "no");


// INCLUDE FILES - DO NOT TOUCH SEQUENCE
//die("a");
/*require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'classes.inc.php');
require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'pear.inc.php');

require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'db.inc.php');

require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'localization.inc.php');

if (!AUTO_LOGIN) { 
	require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'auth.inc.php');
}/**/
mysql_query('SET NAMES utf8');

mb_internal_encoding('UTF-8');

/*** Ed stuff: ***/
define('DATA_DIR', BASE_PATH);

function db_query($sql)
{
	$ret = @mysql_query($sql);
	
	if (!$ret)
		die('MySQL query failed: '.$sql.' Error message: '.mysql_error());//,$sql,mysql_error());
	return $ret;
}


//initPage();

//require_once(INCLUDE_PATH . DIRECTORY_SEPARATOR . 'identifyImage.php');

if (!defined('DO_NOT_CLOSE_SESSION')) {
	session_write_close();
}
?>
