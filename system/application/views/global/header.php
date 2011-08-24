 <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?=$title?></title>
  <meta name="description" content="Manage leasing with a unique software solution for technology companies who use leasing programs to drive sales">
  <meta name="author" content="Leasing, leasing solutions, consultancy">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
  <link rel="apple-touch-icon" href="<?=base_url()?>apple-touch-icon.png">

<!-- Load google fonts-->
<link href='http://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css'>

  <!-- CSS : implied media="all" -->
   <link rel="stylesheet" href="<?=base_url()?>css/custom-theme/jquery-ui-1.8.2.custom.css">
   <link rel="stylesheet" href="<?=base_url()?>css/prettyPhoto.css">
   
   <link rel="stylesheet" href="<?=base_url()?>css/960.css">
   <link rel="stylesheet" href="<?=base_url()?>css/style.css?v=2">
   <link rel="stylesheet" href="<?=base_url()?>css/template.css">
   
   <link rel="stylesheet" media="handheld" href="<?=base_url()?>css/handheld.css?v=2">  
   
   
<!--[if IE 6]>
<link rel="stylesheet" href="<?=base_url()?>css/ie6.css" /> 
<![endif]-->

<!--[if IE 7]>
<link rel="stylesheet" href="<?=base_url()?>css/ie7.css" /> 
<![endif]-->

<!--[if IE 8]>
<link rel="stylesheet" href="<?=base_url()?>css/ie8.css" /> 
<![endif]-->

 <?php 
 echo $this->agent->platform();
 if ($this->agent->platform() == "Windows") {  ?>
 }
 }

<link rel="stylesheet" href="<?=base_url()?>css/windows.css" />

 <?php }  ?>
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="<?=base_url()?>js/libs/modernizr-1.6.min.js"></script>
  
   <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19623681-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
   
