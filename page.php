<?php get_header(); ?>

<div class="topborder"></div>
		
<div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post">
			<h1>
			  <a id="post-<?php the_ID(); ?>" class="posttitle" href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			
			<div class="entry">
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>

				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				<div id="curly"></div>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</div> <!-- end content -->
		
<div id="sidebar2" class="yui-u">		
	
	<br />
	
	<p class="postmetadata alt">
		<small>
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
	<!-- 
	<div id="curly"></div>
	-->
	
</div> <!-- sidebar2 -->

<?php get_footer(); ?>