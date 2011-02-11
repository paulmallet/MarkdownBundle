<?php

namespace MarkdownBundle\Extension;

use MarkdownBundle\Converter\Markdown;

class Markdown_Extension extends \Twig_Extension 
{
  protected $handler;
  
  public function __construct()
  {
    $this->handler = new Markdown();
  }

  public function getName()
  {
      return 'markdown';
  }
  
  public function getFilters()
  {
    return array('markdown' => new \Twig_Filter_Method($this, 'convertMarkdown', array('is_safe' => array('all'))));
  }
  
  public function convertMarkdown($string)
  {
    return $this->handler->convert($string);
  }
}
