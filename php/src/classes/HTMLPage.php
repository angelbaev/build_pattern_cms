<?php

  class HTMLPage {
    private $page = NULL;
    private $page_title = NULL;
    private $page_meta_tags = array();
    private $page_link_tags = array();
    private $page_script_tags = array();
    private $views = array();
    private $page_style = NULL;
    private $page_script = NULL;
    private $ajax = FALSE;
    
    public function __construct() {
    }
    
    
    public function showPage() {
      return $this->page;
    }
    
    public function setView($view){
      $this->views[$view] = array('file' => $view);
    }

    public function setAjax($enabled = FALSE){
      $this->ajax = $enabled;
    }
    
    public function setTitle($title) {
      $this->page_title = $title;
    }

    public function setMeta($name, $content) {
      $this->page_meta_tags[$name] = array('name' => $name, 'content' => $content);
    }

    public function setLink($href, $type = 'text/css', $rel = 'stylesheet') {
      $this->page_link_tags[$href] = array('rel' => $rel, 'type' => $type, 'href' => $href);
    }

    public function setScript($src, $type = 'text/javascript', $language = 'JavaScript') {
      $this->page_script_tags[$src] = array('src' => $src, 'type' => $type, 'language' => $language);
    }
    
    public function setJavaScript($page_script) {
      $this->page_script .= $page_script;
    }
    
    public function setStyle($style) {
      $this->page_style .= $style;
    }
    
    
    public function formatPage($data = array()) {
      $data['_page_title'] = $this->page_title;
      $data['_page_meta_tags'] = $this->page_meta_tags;
      $data['_page_link_tags'] = $this->page_link_tags;
      $data['_page_script_tags'] = $this->page_script_tags;
      $data['_page_style'] = $this->page_style;
      $data['_page_script'] = $this->page_script;
      $data['_views'] = $this->views;
      ob_start();
      extract($data);
      if ($this->ajax) {
      include_once(APP_HTML_PATH.'common'.DS.'main_part.php');
      } else {
      include_once(APP_HTML_PATH.'common'.DS.'main.php');
      }
      $this->page = ob_get_contents();
      ob_end_clean(); 
    }
    
    
  }