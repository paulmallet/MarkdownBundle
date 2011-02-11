<?php
require_once __DIR__.'/../Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

require_once __DIR__.'/../MarkdownBundle/Converter/Markdown.php';
require_once __DIR__.'/../MarkdownBundle/Extension/MarkdownExtension.php';

$loader = new Twig_Loader_String();

$twig = new Twig_Environment($loader, array('debug' => true));
$twig->addExtension(new \MarkdownBundle\Extension\Markdown_Extension());

$tpl = <<<EOF
<html>
  <head>
    <title>Markdown Test</title>
  </head>
  <body>
    {{ text | markdown }}
  </body>
</html>
EOF;

$template = $twig->loadTemplate($tpl);

$template->display(array('text' => file_get_contents('example.markdown')));