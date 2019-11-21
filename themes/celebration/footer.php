<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Celebration
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

    <div class="container footerContainer wow fadeInUp">
			<!-- <div class="signUpSection">
				<a class="login" href="<?php// echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php// echo __('Sign In', 'Celebration'); ?></a>
				<a class="register" href=""><?php// echo __('Sign Up', 'Celebration'); ?></a>
			</div> -->
      <div class="row">

        <div class="column logo">
          <span class="title">
						<?php // echo get_bloginfo('name'); ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/CELEBRATION_LOGO.svg" alt="<?php echo get_bloginfo('name'); ?>">
					</span>
			<!--  <span class="description"><?php echo get_bloginfo('description'); ?></span> -->
        </div>
        <div class="column footerMenu">
          <div class="title"><?php the_field('menu_title', 'options'); ?></div>
          <?php wp_nav_menu( [
        		'container_class' => 'menu-footer',
            'menu'            => 'Footer menu'
        	] ); ?>
        </div>
        <div class="column infos">
          <div class="title"><?php the_field('menu_title', 'options'); ?></div>
          <div class="infosContent">
            <div class="infoLine">
              <div class="imageWrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pickup.svg" alt=""></div>
              <div class="infosTexts">
                <div class="infosTitle"><?php echo __('Address:', 'Celebration'); ?></div>
                <div class="infosText"><?php the_field('adress', 'options') ?></div>
              </div>
            </div>
            <div class="infoLine">
              <div class="imageWrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/footerPhone.svg" alt=""></div>
              <div class="infosTexts">
                <div class="infosTitle"><?php echo __('Phone number:', 'Celebration'); ?></div>
                <div class="infosText"><?php the_field('phone_number', 'options') ?></div>
              </div>
            </div>
            <div class="infoLine">
              <div class="imageWrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/footerMail.svg" alt=""></div>
              <div class="infosTexts">
                <div class="infosTitle"><?php echo __('Email:', 'Celebration'); ?></div>
                <div class="infosText"><?php the_field('email', 'options') ?></div>
              </div>
            </div>
            <div class="infoLine">
              <div class="imageWrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/footerClocks.svg" alt=""></div>
              <div class="infosTexts">
                <div class="infosTitle"><?php echo __('Customer service:', 'Celebration'); ?></div>
                <div class="infosText"><?php the_field('customer_service', 'options') ?></div>
              </div>
            </div>
          </div>
        </div>
        <div class="column newsLetter">
          <div class="title"><?php the_field('newsletter_title', 'options'); ?></div>
          <p class="newsletterContent">
            <?php the_field('newsletter_text', 'options'); ?>
          </p>
          <div class="newsLetterSection">
						<div class="tnp tnp-subscription">
						<form method="post" action="https://celebrationbyorel.com/?na=s" onsubmit="return newsletter_check(this)">

						<input type="hidden" name="nlang" value="he">
						<div class="newsletterFooter">
						<div class="tnp-field tnp-field-email"><input class="tnp-email" type="email" name="ne" placeholder="מייל" required></div><div class="tnp-field tnp-field-button"><input class="tnp-submit subsBtn" type="submit" value=""></div>
						</div>
						</form>
						</div>
					</div>
        </div>
      </div>
    </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
