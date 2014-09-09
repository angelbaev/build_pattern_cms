<?php
  abstract class AbstractPageDirector {
    abstract function __construct(IPageBuilder $builder);
    abstract function buildPage();
    abstract function getPage();
  }