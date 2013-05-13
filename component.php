<?php defined( '_JEXEC' ) or die; 

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
$doc->addStyleSheet($tpath.'/css/bootstrap-responsive.min.css');
$doc->addStyleSheet($tpath.'/css/print.css?v=1'); 
//$doc->addScript($tpath.'/js/modernizr-2.6.2.js');

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- mobile viewport optimized -->
  
</head>

<body id="print">
  <div id="overall">
    <jdoc:include type="message" />
    <jdoc:include type="component" />
  </div>
  <?php if ($_GET['print'] == '1') echo '<script type="text/javascript">window.print();</script>'; ?>
</body>

</html>
