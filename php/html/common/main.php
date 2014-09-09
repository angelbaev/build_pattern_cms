<?php
header('Content-Type: text/html; charset=utf-8');
include_once (APP_HTML_PATH.'common'.DS.'header.php');
if(isset($_views)) {
  foreach($_views as $view_path){
    $file = APP_HTML_PATH.$view_path['file'].'.php'; 
    if (file_exists($file) && is_file($file) && is_readable($file) ) {
      include_once ($file);
    } else {
      echo('Ivalid view!');
    }
  }

}
include_once (APP_HTML_PATH.'common'.DS.'footer.php');
?>