<?php
/**
 * The template for displaying the blog page
 */
?>
home.php
<?php get_header() ?>
<header>
	<div class="container">
		<div class="row">
			<div class="twelve columns text-center">
				<h1><?php wp_title(' '); ?></h1>
				<h5><?php echo date('l, F jS'); ?></h5>
				<hr>
			</div>
		</div>
	</div>
</header>
<section class="main-blog">
	<div class="container">
		<?php if ( have_posts() ) : ?> <?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<article>
					<div class="two columns">
						<p>
							<small>Posted on:
								<b><?php the_time(' F j, Y') ?> </b>  |  <b><?php the_category(', ') ?></b>
							</small>
						</p>
					</div>
					<div class="seven columns">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail('post');
							}
							?>
						</a>
						<?php the_excerpt(); ?>
						<hr>
					</article>
					<p class="pagination">
						<span class="u-pull-right"><?php next_posts_link( 'Older posts <span>&#8594;</span>' ); ?></span>
						<span class="u-pull-left"><?php previous_posts_link( '<span>&#8592;</span> Newer posts' ); ?></span>
					</p>
				</div>
			<?php endwhile; endif; ?>
		</div><!--row-->
	</div>
</section>
<?php get_footer() ?>

