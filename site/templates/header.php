<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>East West Carpentry</title>

<!--  Icon setting Start-->
 <link rel="apple-touch-icon" sizes="180x180" href="<?= $config->urls->templates ?>img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"href="<?= $config->urls->templates ?>img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $config->urls->templates ?>img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $config->urls->templates ?>img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= $config->urls->templates ?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
   <!-- Icon Settings End-->


	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/foundation.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/text.css" />
  <script src="https://use.fontawesome.com/20b29f8003.js"></script>
 


  

</head>


<body class="navi">
	<!--Html From index included -->

  <!-- Navigation Bar-->
  <nav class="top-bar topbar-responsive">
      
        <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
          <a class="topbar-responsive-logo" href="#">
          <svg width="60" height="60">       
     <image xlink:href="<?php echo $config->urls->templates?>styles/logo.svg" src="yourfallback.png" width="60" height="60"/>    
</svg>
        </a>    
        </span>

     
        <div class="top-bar-right">
          <ul class="menu simple vertical medium-horizontal">
            <li><a href="<?php echo $pages->get('/')->url;?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo $pages->get('/About')->url;?>"><i class="fa fa-user "></i> About</a></li>
            <li><a href="<?php echo $pages->get('/Services')->url;?>"><i class="fa fa-cogs"></i> Services</a></li>
   
            <li>
              <a href="<?php echo $pages->get('/Contact-Us')->url;?>"><button type="button" class="button hollow topbar-responsive-button"><i class="fa fa-commenting"></i> Contact Us</button></a>
            </li>
          </ul>
        </div>
    
    </nav>

</body>






	<main id='main'>

  
