<?php get_header(); ?>

	<div class="topborder"></div>
  
  <div class="spacer"></div>

	<div id="content"> <!-- main section content -->

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
	
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="time month"><?php the_time('m') ?></div><div class="time day"><?php the_time('d') ?></div><div class="time year"><?php the_time('y') ?></div>
					
					<h1><a class="posttitle" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					
					<small><!-- by <?php the_author() ?> --></small>
					
					<div class="entry">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</div>
	
					<p class="postmetadata">Posted in <?php the_category(', ') ?>
					<?php 
						// show disclaimer asterisk if necessary
						if (in_category(13) || in_category(15)) {
							echo '<a href="/ade/index.php/fiction-and-satire/">';
							echo '<img src="';
							echo bloginfo('stylesheet_directory');
							echo '/img/asterisk.png" class="disclaim" />';
							echo '</a>';
						}
					?>	
					| <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				</div>
			
			<?php endwhile; ?>
	
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('<div class="nav">&laquo;</div> Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries <div class="nav">&raquo;</div>') ?></div>
			</div>
	
		<?php else : ?>
	
			<div class="posttitle">Not Found</div>
			<div class="entry">
				<p>Sorry, but you are looking for something that isn't here.</p>
				<p>Try your search again: </p><br />
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				<p>
					<a href="http://www.google.com/search?as_q=<?php echo wp_specialchars($s); ?>&num=10&hl=en&btnG=Google+Search&as_epq=&as_oq=&as_eq=&lr=&as_ft=i&as_filetype=&as_qdr=all&as_nlo=&as_nhi=&as_occt=any&as_dt=i&as_sitesearch=socialtech.ca%2Fade">
					You might have better luck with Google.
					</a>
				</p>
			</div>
	
		<?php endif; ?>
	
		</div> <!-- end main section content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
