<div id="sidebar"> <!-- sidebar content -->
	
	<br />
			
	<div class="date_large">
		<?php echo date('d'); ?>/
	</div>
	
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h2>Browse category</h2>
	<p>You are currently browsing the archives for the <strong><?php single_cat_title(''); ?></strong> category.</p>

	<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
	<h2>Browse archives</h2>
	<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
	for the day <?php the_time('l, F jS, Y'); ?>.</p>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2>Browse archives</h2>
	<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
	for <?php the_time('F, Y'); ?>.</p>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2>Browse archives</h2>	
	<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
	for the year <?php the_time('Y'); ?>.</p>

	<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
	<h2>Search</h2>	
	<p>You have searched the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
	for <strong>'<?php echo wp_specialchars($s); ?>'</strong>.</p>

	<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2>Browse archives</h2>	
	<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives.</p>

	<?php } else { ?>
	
	<?php // get_links_list(); ?>
	
	<h2><?php _e('Categories'); ?></h2>
	<ul>
	<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 1, 1, 1, 1, 0,'','','','','') ?>
	</ul>	
	
	<h2><?php _e('Archives'); ?></h2>
	<ul>
	<?php wp_get_archives('type=monthly'); ?>
	</ul>
	
	<?php } // end if ?>
	
</div> <!-- sidebar -->
		
<div id="sidebar2">	

	<br />

	<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div><input size="15" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" />
		</div>
	</form>

	<hr />
	<small>
		<p>Life, politics and current events from a Canadian perspective.</p>
		<p>Adrian Duyzer<br />
		<a href="mailto:adrianduyzer@gmail.com">Email me</a>
		</p>
	</small>
	<br />
	
	<p>
		<span class="rth">Ade is proud to contribute to</span>
		<br />
		<a href="http://raisethehammer.org" target="_blank">
		  <img src="<?php bloginfo('template_directory'); ?>/img/raise_the_hammer.jpg" />
		</a>
	</p>
	
	<h2>Feeds</h2>
	<ul>
		<li><a class="feed" href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml">Entries (RSS)</a></li>
		<li><a class="feed" href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" type="application/rss+xml">Comments (RSS)</a></li>
	</ul>
	
	<h2><?php _e('Meta'); ?></h2>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<?php wp_meta(); ?>
	</ul>	
	
	<div id="curly"></div>

</div> <!-- sidebar2 -->