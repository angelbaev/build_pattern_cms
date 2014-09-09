<?php
define('HTTP_SERVER', 'http://www.car-bg.org/');
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(__FILE__).DS);
define('APP_CLASS_PATH', APP_PATH.'src'.DS.'classes'.DS);
define('APP_INTERFACE_PATH', APP_PATH.'src'.DS.'interface'.DS);
define('APP_HTML_PATH', APP_PATH.'html'.DS);

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'carbgo_site');
define('DB_DATABASE', 'carbgo_site');
define('DB_PASSWORD', '((UDwD:Xa|7C');

define('DB_CHAR_SET', 'utf8');
define('DB_COLLAT', 'utf8_general_ci');

$connect = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
$db_name = mysql_select_db(DB_DATABASE, $connect);
if ($connect) {
 // mysql_query(string query, $connect);
  mysql_query("SET character_set_results = '".DB_CHAR_SET."', character_set_client = '".DB_CHAR_SET."', character_set_connection = '".DB_CHAR_SET."', character_set_database = '".DB_CHAR_SET."', character_set_server = '".DB_CHAR_SET."'", $connect);  
}
?>