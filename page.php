<?php
/**
 * The template for displaying pages
 */

get_header(); ?>
page.php

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();  ?>

			<?php the_title(); ?>
			<?php the_content(); ?>

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

<?php get_footer(); ?>
