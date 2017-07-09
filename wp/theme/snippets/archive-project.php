<?php
/**
 * Poejects page.
 * @package BootstrapFast
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<header class="page-header">
			<?php
				echo '<h1 class="page-title">Projects</h1>';
			?>
		</header><!-- .page-header -->
		<?php
			echo apply_filters('the_content', get_post_field('post_content', 13 ));
		?>
		<main id="main" class="site-main row" role="main">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) : the_post(); ?>
				<div class="entry-content col-md-4 col-xs-12">
					<a href="<?php the_permalink(); ?>"><?php the_title($post->ID); ?></a>

					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
					?>
				</div><!-- .entry-content --> <?
			endwhile;
		} ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
\
