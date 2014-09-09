<?php
  abstract class HTMLPageDirector extends AbstractPageDirector {
    protected $builder = NULL;
    protected $data = array();
    
    public function __construct(IPageBuilder $builder) {
      $this->builder = $builder;
    }
    
    public function set($name, $value) {
      $this->data[$name] = $value;
    }
    
    abstract public function build();
    
    public function buildPage() {
      $this->build();
      $this->builder->formatPage($this->data);
    }
    
    public function getPage() {
      return $this->builder->getPage();
    }
    
  }
