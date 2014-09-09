<?php
  class HTMLPageBuilder implements IPageBuilder {
  
    private $page = NULL;
    
    public function __construct() {
      $this->page = new HTMLPage();
    }

    public function setView($view){
      $this->page->setView($view);
    }

    public function setAjax($enabled = FALSE){
      $this->page->setAjax($enabled);
    }
    
    public function setTitle($title) {
      $this->page->setTitle($title);
    }
    
    
    public function setMeta($name, $content) {
      $this->page->setMeta($name, $content);
    }

    public function setLink($href, $type = 'text/css', $rel = 'stylesheet') {
      $this->page->setLink($href, $type, $rel);
    }

    public function setScript($src, $type = 'text/javascript', $language = 'JavaScript') {
      $this->page->setScript($src, $type, $language);
    }
    
    public function setJavaScript($page_script) {
      $this->page->setJavaScript($page_script);
    }
    
    public function setStyle($style) {
      $this->page->setStyle($style);
    }
    
    
    public function formatPage($data) {
      $this->page->formatPage($data);
    }
    
    
    public function getPage() {
      return $this->page;
    }
  }
  

