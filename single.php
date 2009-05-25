<?php get_header(); ?>

<div class="topborder"></div>
		
<div id="content" class="single">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post">
			<div class="time month"><?php the_time('m') ?></div>
			<div class="time day"><?php the_time('d') ?></div>
			<div class="time year"><?php the_time('y') ?></div>
			<h1>
			  <a id="post-<?php the_ID(); ?>" class="posttitle" href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			
			<div class="entry">
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				<div id="curly2"></div>
			
			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</div> <!-- end content -->
		
<div id="sidebar2">		
	
	<br />
	
	<p class="postmetadata alt">
		<small>
			This entry was posted
			<?php /* This is commented, because it requires a little adjusting sometimes.
				You'll need to download this plugin, and follow the instructions:
				http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
				/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
			on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
			and is filed under <?php the_category(', ') ?>.
			You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.

			<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
				// Both Comments and Pings are open ?>
				You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(display); ?>">trackback</a> from your own site.

			<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
				// Only Pings are Open ?>
				Responses are currently closed, but you can <a href="<?php trackback_url(display); ?> ">trackback</a> from your own site.

			<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
				// Comments are open, Pings are not ?>
				You can skip to the end and leave a response. Pinging is currently not allowed.

			<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
				// Neither Comments, nor Pings are open ?>
				Both comments and pings are currently closed.

			<?php } edit_post_link('Edit this entry.','',''); ?>
		</small>
	</p>
	<br />
	<?php 
		// show disclaimer asterisk if necessary
		if (in_category(13) || in_category(15)) {
			echo '<a href="/ade/index.php/fiction-and-satire/">';
			echo '<img src="';
			echo bloginfo('stylesheet_directory');
			echo '/img/asterisk.png" class="disclaim" />';
			echo ' <small>This post is not necessarily true.</small>';
			echo '</a>';
		}
	?>	
	
</div> <!-- sidebar2 / unit -->	

<?php get_footer(); ?>