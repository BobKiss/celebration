<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celebration
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main blogpage">
			<div class="container">
				<div class="blog_name_section">
	        <span class="hebrew_name"><?php single_post_title(); ?></span>
	        <div class="line headerLine">
	          <div class="pinkline"></div>
	        </div>
	      </div>
				<div class="wrapper">
					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content-single_archive_post' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
