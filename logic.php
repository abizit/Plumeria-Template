<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$headdata = $doc->getHeadData();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// parameter
$modernizr = $this->params->get('modernizr');
$cssmethod = $this->params->get('cssmethod');
$jquery = $this->params->get('jquery');
$pie = $this->params->get('pie');

// advanced parameter
if ($app->isSite()) {
  // disable js
  if ( $this->params->get('disablejs') ) {
    $fnjs=$this->params->get('fnjs');
    if (trim($fnjs) != '') {
      $filesjs=explode(',', $fnjs);
      $head = (array) $headdata['scripts'];
      $newhead = array();         
      foreach($head as $key => $elm) {
        $add = true;
        foreach ($filesjs as $dis) {
          if (strpos($key,$dis) !== false) {
            $add=false;
            break;
          } 
        }
        if ($add) $newhead[$key] = $elm;
      }
      $headdata['scripts'] = $newhead;
    } 
  } 
  // disable css
  if ( $this->params->get('disablecss') ) {
    $fncss=$this->params->get('fncss');
    if (trim($fncss) != '') {
      $filescss=explode(',', $fncss);
      $head = (array) $headdata['styleSheets'];
      $newhead = array();         
      foreach($head as $key => $elm) {
        $add = true;
        foreach ($filescss as $dis) {
          if (strpos($key,$dis) !== false) {
            $add=false;
            break;
          } 
        }
        if ($add) $newhead[$key] = $elm;
      }
      $headdata['styleSheets'] = $newhead;
    } 
  }
  $doc->setHeadData($headdata); 
}

// generator tag
$this->setGenerator(null);

// force latest IE & chrome frame
$doc->setMetadata('x-ua-compatible', 'IE=edge,chrome=1');

// add javascripts
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js');

if ($jquery==1) :
  $doc->addScript($tpath.'/js/jquery-1.9.1.min.js'); 
  $doc->addScript($tpath.'/js/main.js');
endif;

// add template sheet
$doc->addStyleSheet($tpath.'/'.'css'.'/normalize.css');
// add template sheet
if ($cssmethod=="css") $doc->addStyleSheet($tpath.'/'.'css'.'/layout.css');
if ($cssmethod=="less") :
  $doc->addCustomTag('<link rel="stylesheet" type="text/css" href="'.$tpath.'/'.'css'.'/layout.php" />');
 endif;
?>

