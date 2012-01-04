
<!-- Javascript at the bottom for fast page loading -->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">!window.jQuery && document.write(unescape('%3Cscript src="<?= base_url() ?>js/libs/jquery-1.5.0.js"%3E%3C/script%3E'))</script>


<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAo44bloMTDYnLwRZTm304PxRjIDG7MCN9w_oLo8JELtK6-fKljxTfDJFGXJ1XT65i7IURIHFAuRl7TA" type="text/javascript"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<?php if ($page == "contact_us") { ?>
    <script type="text/javascript" src="<?= base_url() ?>js/maps.js"></script>

<?php } ?>
<!-- scripts concatenated and minified via ant build script-->
<script type="text/javascript" src="<?= base_url() ?>js/libs/editor.js" type="text/javascript"></script>
<script type="text/javascript"  src="<?= base_url() ?>js/libs/easing.min.js"></script>
<script type="text/javascript"  src="<?= base_url() ?>js/libs/bxslider.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/libs/jquerytools.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/script.js"></script>

<script type="text/javascript" src="<?= base_url() ?>js/plugins.js"></script>
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>



<!-- end concatenated and minified scripts-->

<!--[if lt IE 7 ]>
  <script src="<?= base_url() ?>js/libs/dd_belatedpng.js"></script>
  <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
<![endif]-->


