<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Celebration
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'celebration' ); ?></a> -->

	<header id="masthead" class="site-header">
		<div class="topLine">

		</div> <!-- .topLine -->


		<div class="mainHeader">

			<div class="container mainHeaderContainer">

				<div class="siteSearch">
					<form action="<?php echo get_bloginfo('url'); ?>" class="siteSearchForm">
						<input type="hidden" name="post_type" value="product">
						<input autocomplete="off" type="text" name="s" placeholder="<?php echo __('Enter text','Celebration'); ?>" value="<?php echo get_search_query(); ?>">
						<button type="submit"><span class="text"><?php echo __('Search','Celebration'); ?></span> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt=""></button>
						<div class="searchResult"></div>
					</form> <!-- .siteSearchForm -->
				</div> <!-- .siteSearch -->
				<a href="<?php echo get_bloginfo('url'); ?>" class="logo">
					<div class="title">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/CELEBRATION_LOGO.svg" alt="<?php echo get_bloginfo('name'); ?>">
					</div> <!-- .title -->
				</a> <!-- .logo -->

				<div class="userInfoBlock">
					<?php if ( is_user_logged_in() ): ?>
						<?php
						$userId = get_current_user_id();
						$user_info = get_userdata($userId); ?>
						<div class="userSection">
							<div class="userOptions">
								<div class="list">
									<div class="current">
										<div class="iconArrow">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrowDown.svg" alt="">
										</div>
										<span><?php echo __('Hey, ', 'Celebration'); ?><?php echo $user_info->user_login; ?></span>
										<div class="icon">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/profile.svg" alt="">
										</div>
									</div>
									<ul class="dropdown">
										<li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php echo __('Account', 	'Celebration'); ?></a></li>
										<li><a href="<?php echo get_bloginfo('url'); ?>/favourite/"><?php echo __('Favourite',	'Celebration'); ?></a></li>
										<li><a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php echo __('Exit', 			'Celebration'); ?></a></li>
									</ul>
								</div>
							</div>
							<div href="<?php // echo wc_get_cart_url(); ?>" class="cart">
								<div class="cartIconWrapper">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gift.svg" alt="">
								</div>
								<span class="cartCount"><?php  echo WC()->cart->get_cart_contents_count(); ?></span>
								<div class="popupCartBlock">
									<?php woocommerce_mini_cart(); ?>
								</div>
							</div>
						</div>
					<?php else: ?>


						<div class="userSection">
						<a href="<?= home_url('/favourite/?wishlist-action/'); ?>" class="wishlist">
							<div class="wishlistIconWrapper">
								<i class="fas fa-heart"></i>
							</div>
						</a>


						<a href="<?php// echo wc_get_cart_url(); ?>" class="cart">
							<div class="cartIconWrapper">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gift.svg" alt="">
							</div>
							<span class="cartCount"><?php  echo WC()->cart->get_cart_contents_count(); ?></span>
							<div class="popupCartBlock">
								<?php woocommerce_mini_cart(); ?>
							</div>
						</a>

					</div>
						<div id="registerPopup" class="overlay" style="display: none;">
						  <div class="popup" style="background-size:contain; background-image: url(<?php echo get_bloginfo('template_url'); ?>/assets/images/celebrationBg.png")>
						    <div class="popupcontent">
						      <div class="title"><?php echo __('Register', 'Celebration'); ?></div>
									<div class="messagesBlock" style="display: none;">

									</div>
						      <form id="usreReg" class="checkin" >
						        <span class="Name"><?php echo __('Username', 'Celebration'); ?></span>
						        <input name="Username" type="text" placeholder="<?php echo __('Username', 'Celebration'); ?>">
						        <!-- <span class="Name"><?php echo __('Phone', 'Celebration'); ?></span>
						        <input name="user_tel" type="tel" placeholder="<?php echo __('Phone', 'Celebration'); ?>"> -->
						        <span class="Name"><?php echo __('E-mail', 'Celebration'); ?></span>
						        <input name="user_email" type="email" placeholder="<?php echo __('E-mail', 'Celebration'); ?>">
						        <span class="Name"><?php echo __('Password', 'Celebration'); ?></span>
						        <input name="user_password" type="password" placeholder="<?php echo __('Password', 'Celebration'); ?>">
						        <span class="Name"><?php echo __('Confirm password', 'Celebration'); ?></span>
						        <input name="user_password_conf" type="password" placeholder="<?php echo __('Confirm password', 'Celebration'); ?>">
						        <button href="#" type="submit" class="Login"><?php echo __('Register', 'Celebration'); ?></button>
						      </form> <!-- checkin -->
						      <a href="https://celebrationbyorel.com/my-account/lost-password/"><span class="forgotpass"><?php echo __('Forgot password?', 'Celebration'); ?></span></a>
						    </div> <!-- popupcontent -->
						  </div> <!-- popup -->
						</div> <!-- overlay -->


						<div id="loginPopup" class="overlay" style="display: none;">
						  <div class="popup" style="background-size:contain; background-image: url(<?php echo get_bloginfo('template_url'); ?>/assets/images/celebrationBg.png")>
						    <div class="popupcontent">
						      <div class="title"><?php echo __('Login', 'Celebration'); ?></div>
									<div class="messagesBlock" style="display: none;">

									</div>
						      <form id="usreLogin" class="checkin" >
						        <span class="Name"><?php echo __('Username', 'Celebration'); ?></span>
						        <input name="Username" type="text" placeholder="<?php echo __('Username', 'Celebration'); ?>">
						        <span class="Name"><?php echo __('Password', 'Celebration'); ?></span>
						        <input name="user_password" type="password" placeholder="<?php echo __('Password', 'Celebration'); ?>">
						        <button href="#" type="submit" class="Login"><?php echo __('Login', 'Celebration'); ?></button>
						      </form> <!-- checkin -->
						      <a href="https://celebrationbyorel.com/my-account/lost-password/"><span class="forgotpass"><?php echo __('Forgot password?', 'Celebration'); ?></span></a>
						    </div> <!-- popupcontent -->
						  </div> <!-- popup -->
						</div> <!-- overlay -->

					<?php endif; ?>
				</div> <!-- .userInfoBlock -->
			</div> <!-- .mainHeaderContainer -->

		</div> <!-- .mainHeader -->



		<nav id="site-navigation" class="main-navigation">
			<div class="container mainNavigationContainer">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'our-menu',
					'menu' => 'Our Menu',
				) );
				?>
				<div class="activeLine"></div>
			</div>
		</nav><!-- #site-navigation -->

		<div class="mobileHeader">
			<div class="mobileHeaderTopLine">
				<div class="row">
					<div class="burgerButton">
						<div class="burgerIcon">
							<div class="burgerLine"></div>
						</div>
					</div>

					<div class="logo">
						<!-- <span class="title"><?php echo get_bloginfo('name'); ?></span> -->
						<a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CELEBRATION_LOGO.svg" alt="<?php echo get_bloginfo('name'); ?>"></a>
					</div>

					<div class="searchAndProfile">
						<div class="searchIcon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt=""></div>
						<?php
						if(is_user_logged_in()){ ?>
					<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/profile.svg" alt=""></a>
					<div class="userSection">
					<a href="<?php echo wc_get_cart_url(); ?>" class="cart">
						<div class="cartIconWrapper">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gift.svg" alt="">
						</div>
						<span class="cartCount"><?php  echo WC()->cart->get_cart_contents_count(); ?></span>
					</a>
				</div>
				<?php	}
				else{ ?>
					<div class="userSection">
					<a href="<?= home_url('/favourite/?wishlist-action/'); ?>" class="wishlist">
						<div class="wishlistIconWrapper">
							<i class="fas fa-heart"></i>
						</div>
					</a>

					<a href="<?php echo wc_get_cart_url(); ?>" class="cart">
						<div class="cartIconWrapper">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/gift.svg" alt="">
						</div>
						<span class="cartCount"><?php  echo WC()->cart->get_cart_contents_count(); ?></span>
					</a>
				</div>
			<?php	} ?>
					</div>
				</div>
				<div class="searchBar">
					<div class="searchWrap">
						<input type="text" name="" value="" placeholder="<?php echo __('Enter text','Celebration'); ?>">
						<button type="button" name="button"><?php echo __('Search','Celebration'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt=""></button>
					</div>
				</div> <!-- .searchBar -->
			</div>
			<div class="fullscreenMenu">
				<div class="mainMenu">
					<?php
					wp_nav_menu( array(
						'menu' => 'Main menu 2',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</div> <!-- .mainMenu -->
				<div class="slideLine">
					<ul>
						<?php
						if( have_rows('pages_list', 'options') ):
							while ( have_rows('pages_list', 'options') ) : the_row();
							?>
							<a href="<?php echo get_sub_field('custompage'); ?>"><?php echo get_sub_field('pagename'); ?></a>
							<?php
						endwhile;
						else :
							echo "go to admin panel and setting this section in Theme Options";
						endif;
						?>
					</ul>
				</div> <!-- .slideLine -->
			</div> <!-- .fullscreenMenu -->
		</div> <!-- .mobileHeader -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
