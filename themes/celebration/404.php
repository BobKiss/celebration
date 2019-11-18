<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Celebration
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
					<h1>האתר יעלה בקרוב לאוויר!</h1>
					<div class="presentBlock">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/UpperPresent.webp" alt="">
						<h1>OOPS!</h1>
						<h2>גם אתם מתרגשים? עוד מספר ימים אנחנו באוויר!</h2>
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/LowerPresent.webp" alt="">
					</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
