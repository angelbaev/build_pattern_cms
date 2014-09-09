<?php if ($mode == 'read'){ ?>
<div id="news-wrapp">
<div class="back-link">
    <a href="<?php echo HTTP_SERVER."news.php"; ?>" >&laquo; Назад</a>
</div>
<h1><?php echo $article['title'];?></h1>
  <div style="clear: both;"></div>
  <div id="news-box">
  <div class="date">Дата: <?php echo date('d.m.Y', strtotime($article['date_add'])); ?></div>
  <div class="share">
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="float:right;">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xx"></script>              
  
  </div>
  <div style="clear: both;"></div>
  <?php echo $article['content'];?>
    <div style="clear: both;"></div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/bg_BG/sdk.js#xfbml=1&appId=251544861524881&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-comments" data-href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" data-width="700" data-numposts="5" data-colorscheme="light"></div>

    
    <div style="clear: both;"></div>
  </div>
</div>
<style type="text/css">
  .date {
    float: left;
    margin-top: 10px;
  }
  .share {
    float: right;
  }
  .back-link {
    float: right;
  }

  #header {
    height: 1200px!important;
  }

</style>

<?php } else { ?>
<h1>Новини</h1>
<table>
 

<tr>
						<td width="388" valign="top" height="225">
						<p style="line-height: 1.2; margin-top: 0; margin-bottom: 0">
						<font size="5" face="Tahoma" color="#3C3929">Съобщение<br>
						</font><font size="2" face="Tahoma" color="#3C3929"><br>
						Уважаеми пациенти,<br>
						Министерския съвет прие ПОСТАНОВЛЕНИЕ № 20 ОТ 10 
						ФЕВРУАРИ 2014 Г. за изменение и допълнение на 
						Постановление на МС № 25 от 2009 г. за създаване на „Център 
						за асистирана репродукция“ (Обн., ДВ, бр. 13 от 2009; 
						изм. и доп. бр. 5 и 42 от 2011 г., бр. 47 и 103 от 2012 
						г.) с тези изменения финансирането на дейностите по 
						асистирана репродукция за 2014 г. ще се осъществява от 
						Републиканския бюджет (Министерство на здравеопазването) 
						.<br>
						<br>
						Актуалните документи касаещи дейността на Център за 
						асистирана репродукция ще откриете в раздел Нормативни 
						документи или тук!<br>
						<br>
						Центърът продължава своята ежедневна работа по приемане 
						на заявителни документи. Общественият съвет провежда 
						своите редовни заседания за одобрение на подалите 
						заявления пациенти.<br>
						<br>
						В кратък срок ще продължи и дейността по раздаване на 
						заповеди за одобрение за извършване на асистирана 
						репродукция.<br>
						<br>
						Измененията не пречат на клиниките да осъществяват 
						дейности по асистирана репродукция на пациенти получили 
						заповед за одобрение от Ц „ФАР“ през 2013 г.</font></p>
						</td>
						<td width="21" valign="top" height="225" align="center">
						<p style="line-height: 1.2; margin-top: 0; margin-bottom: 0">
						<img width="1" height="467" border="0" src="images/template/vertical.png"></p></td>
						<td width="460" valign="top" height="225">

<ul class="news">
<?php foreach($news as $item){?>

	<li>
		<img alt="alt" src="<?php echo HTTP_SERVER.'image/'.$item['thumb']; ?>">
		<span>[<a href="#"><?php echo $item['title']; ?></a>]</span>
		<?php 
    $content = strip_tags($item['content']);
    echo mb_substr($content, 0, 200, 'UTF-8'); 
    ?>
		 <a href="<?php echo HTTP_SERVER."news.php?name=".$item['seo_title']."-".$item['news_id']."";?>">...</a>
		<div><a href="<?php echo HTTP_SERVER."news.php?name=".$item['seo_title']."-".$item['news_id']."";?>">Още</a> &nbsp; | &nbsp; Date: [<?php echo date('d.m.Y H:i:s', strtotime($item['date_add'])); ?>]</div>
	</li>
<?php } ?>
</ul>

						</td>
						</tr>
</table>

<style type="text/css">
  
  #header {
    height: 1120px!important;
  }

</style>
						
<?php } ?>


