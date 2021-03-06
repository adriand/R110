<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="geo.position" CONTENT="43.25764000; -79.88263800" />
<meta name="geo.placename" CONTENT="Hamilton, ON" />
<meta name="geo.region" CONTENT="CA-ON" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/dynhead.js"></script>
<script type="text/javascript">

$(document).ready(function() {
  last_update = "";
  
  if (window.location.toString().match(/localhost/)) {
    var home = 'http://localhost:8888/wordpress';
    var dback = "http://localhost:8888/dynhead_local_test";
  } else {
    var home = 'http://socialtech.ca/ade';
    var dback = "http://socialtech.ca/dynhead";    
  }
  
  grid_view = new GridView({
    xlimit: 120,
    ylimit: 16,
    dback: dback,
    table: "#grid",
    container: "#dynhead",
    unit_width: 12,
    home: home,
    image_path: '<?php bloginfo('template_directory'); ?>/img'
  });
  
  grid_view.render();
  grid_view.load_points();
  // for vanity's sake
  load_signature();
});

</script>
<?php wp_head(); ?>
<title>Ade <? single_post_title(" :: ") ?></title>
</head>

<body>

<div id="doc"> 

	<div id="hd">
	
		<div id="dynhead">
      <table id="grid"></table>		  
		</div>
	
	</div>
	
	<div id="main">