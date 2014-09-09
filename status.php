<?php

  include_once('php/config.php');
  include_once(APP_INTERFACE_PATH.'IPageBuilder.php');
  include_once(APP_CLASS_PATH.'AbstractPageDirector.php');
  include_once(APP_CLASS_PATH.'HTMLPage.php');
  include_once(APP_CLASS_PATH.'HTMLPageBuilder.php');
  include_once(APP_CLASS_PATH.'HTMLPageDirector.php');

  class scPage extends HTMLPageDirector {
    private $reports = array();
    private $number = NULL;
    
    public function __construct(IPageBuilder $builder) {
      parent::__construct($builder);
      
      if(isset($_GET['number']) && !empty($_GET['number'])) {
        $this->number = $_GET['number'];
      }
      $this->set('number', $this->number);

      $this->getResults($this->number);
    }
    
    private function getResults($number) {
      global $connect;
      
      if (empty($number)) {
        $this->set('reports', $this->reports);
        return;
      }
      $sql = "SELECT * FROM report WHERE number LIKE '%".mysql_escape_string($number)."%'";
      $result = mysql_query($sql, $connect);
      $this->reports = array();
      if($result) {
        while($row = mysql_fetch_assoc($result)){
          $this->reports[$row['report_id']] = $row;
        }
      }
      $this->set('reports', $this->reports);
    }
    
    public function build() {

      $this->builder->setTitle('Център за асистирана репродукция - Статус');
      $this->builder->setView('status/index'); 
    }
  }
  
  $pageDirector = new scPage(new HTMLPageBuilder());
  $pageDirector->buildPage();
  $page = $pageDirector->GetPage();
  echo $page->showPage();
  
?>