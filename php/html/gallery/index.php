<?php if ($mode == 'album'){ ?>
<div class="back-link">
    <a href="<?php echo HTTP_SERVER."galery.php"; ?>" >&laquo; Назад</a>
</div>
<h1><?php echo $gallery['title'];?></h1>
<?php } else { ?>
<h1>Галерии</h1>
<?php } ?>
<br>
<div id="gallery-wrapp">
<?php if ($mode == 'album'){ ?>

<ul id="gallery">
<?php foreach($album as $image){?>
  <li>
    <div class="box">
      <div class="image">
        <a href="<?php echo HTTP_SERVER."image/".$image['image'];?>" data-lightbox="lightbox-set"><img src="<?php echo  HTTP_SERVER.'image/'.$image['thumb'];?>" border="0"></a>
      </div>
    </div>
  </li>
<?php } ?>
</ul>

<?php } else { ?>
<ul id="gallery">
<?php foreach($galleries as $gallery){?>
  <li>
    <div class="box">
      <div class="image">
        <a href="<?php echo HTTP_SERVER."galery.php?name=".$gallery['seo_title']."-".$gallery['gallery_id']."";?>"><img src="<?php echo  HTTP_SERVER.'image/'.$gallery['thumb'];?>" border="0"></a>
      </div>
      <div class="title">
        <a href="<?php echo HTTP_SERVER."galery.php?name=".$gallery['seo_title']."-".$gallery['gallery_id']."";?>"><?php echo $gallery['title'];?></a>
      </div>
    </div>
  </li>
<?php } ?>
</ul>
<?php }?>
<div style="clear: both;"></div>
</div>
<style type="text/css">
  .back-link {
    float: right;
  }
  ul#gallery li {
    float: left;
    margin-right: 6px;
    margin-bottom: 10px;
  }
  ul#gallery li div.box {
   border: 1px #ddd solid;
   padding: 3px 3px 3px 3px; 
  }
  ul#gallery li div.box div.title {
    text-align: center;
  }
  /*
  #header {
    height: 1200px!important;
  }
  */
</style>
<script type="text/javascript">
$( document ).ready(function() {
    if ($('div#gallery-wrapp').height() > 240) {
      var h_height = $('#header').height();
      var g_height = ($('div#gallery-wrapp').height() - 240);
      $('#header').height(h_height+g_height);
    }
});

</script>
