<?php
header('Content-Type: text/html; charset=utf-8');
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
?>
<?php foreach($_page_meta_tags as $attr_name => $item){?>
<meta name="<?php echo $item['name']; ?>" content="<?php echo $item['content']; ?>">
<?php } ?>
<?php foreach($_page_link_tags as $item){?>
<link href="<?php echo $item['href']; ?>" rel="<?php echo $item['rel']; ?>" type="<?php echo $item['type']; ?>">
<?php } ?>
<?php foreach($_page_script_tags as $item){?>
<script src="<?php echo $item['src']; ?>" type="<?php echo $item['type']; ?>" language="<?php echo $item['language']; ?>"></script>
<?php } ?>
<?php echo $_page_style; ?>
<?php echo $page_script; ?>
