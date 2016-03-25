<?php
/**
 * The template for displaying Portfolio single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cmm_s
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_format() );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<div class="col-sm-12 col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();