<?php
  include_once('php/config.php');
  include_once(APP_INTERFACE_PATH.'IPageBuilder.php');
  include_once(APP_CLASS_PATH.'AbstractPageDirector.php');
  include_once(APP_CLASS_PATH.'HTMLPage.php');
  include_once(APP_CLASS_PATH.'HTMLPageBuilder.php');
  include_once(APP_CLASS_PATH.'HTMLPageDirector.php');

  class scPage extends HTMLPageDirector {
    private $galleries = array();
    private $gallery = array();
    private $album = array();
    private $mode = 'gallery';
    private $gallery_id = '';
    
    public function __construct(IPageBuilder $builder) {
      parent::__construct($builder);
      
      if(isset($_GET['name']) && !empty($_GET['name'])) {
        $this->mode = 'album';
        $this->gallery_id = end(explode('-', $_GET['name']));
      }
      $this->set('mode', $this->mode);
      $this->set('gallery_id', $this->gallery_id);
      $this->getGalleries();
      if ($this->gallery_id) {
        $this->getGallery($this->gallery_id);
        $this->getAlbum($this->gallery_id);
      }
    }
    
    private function getGalleries() {
      global $connect;
      
      $sql = "SELECT * FROM gallery WHERE status = '1'";
      $result = mysql_query($sql, $connect);
      $this->galleries = array();
      if($result) {
        while($row = mysql_fetch_assoc($result)){
          $this->galleries[$row['gallery_id']] = $row;
        }
      }
      $this->set('galleries', $this->galleries);
    }
    
    private function getGallery($gallery_id) {
      global $connect;
      
      $sql = "SELECT * FROM gallery WHERE gallery_id = '".(int) $gallery_id."'";
      $result = mysql_query($sql, $connect);
      $this->gallery = array();
      if($result) {
        $this->gallery = mysql_fetch_assoc($result);
      }
      $this->set('gallery', $this->gallery);
    }
    
    private function getAlbum($gallery_id) {
      global $connect;
      
      $sql = "SELECT * FROM images WHERE gallery_id = '".(int) $gallery_id."'";
      $result = mysql_query($sql, $connect);
      $this->album = array();
      if($result) {
        while($row = mysql_fetch_assoc($result)){
          $this->album[$row['image_id']] = $row;
        }
      }
      $this->set('album', $this->album);
    }
    
    public function build() {
      if($this->gallery_id) {
        $this->builder->setLink(HTTP_SERVER.'lib/css/lightbox.css');
        $this->builder->setScript(HTTP_SERVER.'lib/js/jquery-1.11.0.min.js');
        $this->builder->setScript(HTTP_SERVER.'lib/js/lightbox.js');
      }
      $this->builder->setTitle('Център за асистирана репродукция - Галерия');
      $this->builder->setView('gallery/index'); 
    }
  }
  
  $pageDirector = new scPage(new HTMLPageBuilder());
  $pageDirector->buildPage();
  $page = $pageDirector->GetPage();
  echo $page->showPage();
  
?>