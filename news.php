<?php

  include_once('php/config.php');
  include_once(APP_INTERFACE_PATH.'IPageBuilder.php');
  include_once(APP_CLASS_PATH.'AbstractPageDirector.php');
  include_once(APP_CLASS_PATH.'HTMLPage.php');
  include_once(APP_CLASS_PATH.'HTMLPageBuilder.php');
  include_once(APP_CLASS_PATH.'HTMLPageDirector.php');

  class scPage extends HTMLPageDirector {
    private $news = array();
    private $article = array();
    private $mode = 'list';
    private $news_id = '';
    
    public function __construct(IPageBuilder $builder) {
      parent::__construct($builder);
      
      if(isset($_GET['name']) && !empty($_GET['name'])) {
        $this->mode = 'read';
        $this->news_id = end(explode('-', $_GET['name']));
      }
      $this->set('mode', $this->mode);
      $this->set('news_id', $this->news_id);
      $this->getNews();
      if ($this->news_id) {
        $this->getArticle($this->news_id);
      }
    }
    
    private function getNews() {
      global $connect;
      
      $sql = "SELECT * FROM news WHERE status = '1' ORDER BY news_id DESC LIMIT 5";
      $result = mysql_query($sql, $connect);
      $this->news = array();
      if($result) {
        while($row = mysql_fetch_assoc($result)){
          $this->news[$row['news_id']] = $row;
        }
      }
      $this->set('news', $this->news);
    }
    
    private function getArticle($news_id) {
      global $connect;
      
      $sql = "SELECT * FROM news WHERE news_id = '".(int) $news_id."'";
      $result = mysql_query($sql, $connect);
      $this->article = array();
      if($result) {
        $this->article = mysql_fetch_assoc($result);
      }
      $this->set('article', $this->article);
    }
    
    public function build() {

      $this->builder->setTitle('Център за асистирана репродукция - Новини');
      $this->builder->setView('news/index'); 
    }
  }
  
  $pageDirector = new scPage(new HTMLPageBuilder());
  $pageDirector->buildPage();
  $page = $pageDirector->GetPage();
  echo $page->showPage();
  
?>