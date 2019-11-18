<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if(wp_is_mobile()){
																																	// Mobile Version
	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked wc_print_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form(); // WPCS: XSS ok.
		return;
	}
	?>
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
		<div class="container">

			<!-- <a class="backToShop" href="<?php// echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"> <img src="<?php// echo get_template_directory_uri(); ?>/assets/images/icons/backArrowInProduct.png" alt=""> <?php// echo __('Back to shop', 'Celebration'); ?> </a> -->
			<div class="productContent">
				<div class="title">
					<div class="name"><?php woocommerce_template_single_title(); ?></div>
					<?php
					$quantityAttr = $product->get_attribute( 'pa_quantity' );
					 if(!empty($quantityAttr)){?>
						<div class="productAttr"><span class="descAttr">יחידות במארז:</span><span class="contentAttr"><?= $product->get_attribute( 'pa_quantity' ); ?></span></div>
				<?php } ?>
				</div> <!-- .title -->

				<div class="priceAndQuantity">
					<div class="priceSection">
						<div class="priceBlock"><span class="text"><?php echo __('Price:', 'Celebration'); ?></span><span class="priceNum"><?php woocommerce_template_single_price(); ?></span></div>
						<?php if ($product->get_sale_price()): ?>
							<div class="sale"><?php echo __('Sale', 'Celebration'); echo " "; echo getPercentDiscount($product); echo "%";?> </div>
						<?php endif; ?>
					</div>
					<div class="qantitySection">
						<span class="text"><?php echo __('Quantity:', 'Celebration'); ?></span>
						<div class="quantityDraw">
							<div class="plus">+</div>
							<div class="label">1</div>
							<div class="minus">—</div>
						</div>
						<?php woocommerce_simple_add_to_cart(); ?>
					</div> <!-- .qantitySection -->
				</div> <!-- .priceAndQuantity -->

				<div class="galleryPart">
					<div class="bigImage">
						<div class="currentImage">
							<?php
							if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
								return;
							}
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								foreach ( $attachment_ids as $attachment_id ) {
									echo wp_get_attachment_image($attachment_id, 'full');
									// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
								}
							}
							else{
								echo get_the_post_thumbnail($post->ID);
							}
							 ?>
						</div> <!-- .currentImage -->
					</div> <!-- .bigImage -->
					<div class="imageSliderWrapper">
						<div class="imageSliderMobile">
							<?php woocommerce_show_product_thumbnails(); ?>
						</div> <!-- .imageSlider -->
					</div> <!-- .imageSliderWrapper -->
				</div> <!-- .galleryPart -->
				<div class="tableProductSection">
					<div class="tableAttributes">
						<div class="tableAttrRow">
							<div class="tableAttrCol first"><span>מק"ט</span></div>
							<div class="tableAttrCol"><span><?= $product->get_sku() ?></span></div>
						</div>
						<div class="tableAttrRow">
							<div class="tableAttrCol first"><span>יחידות במארז</span></div>
							<div class="tableAttrCol"><span><?= $product->get_attribute( 'pa_quantity' ); ?></span></div>
						</div>
						<div class="tableAttrRow">
							<div class="tableAttrCol first"><span>גודל</span></div>
							<div class="tableAttrCol"><span><?= $product->get_attribute( 'pa_size' ); ?></span></div>
						</div>
					</div>
				</div>
				<div class="productInfoPart">
					<div class="productInfoHeading">
						<div class="txtLine"></div><span class="text"><?php echo __('Description', 'Celebration'); ?></span>
					</div>
					<div class="description">

	          <?php the_content(); ?>
					</div> <!-- .description -->
					<div class="buyAndWishlist">

						<a href="#" class="addToCart">
							<?php echo __('Add to cart', 'Celebration');?>
							<span class="icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
									<path d="M28.0927 6.81104H25.9051C26.1937 6.3547 26.3841 5.84247 26.4384 5.30074C26.6118 3.56943 25.6994 2.01742 24.146 1.32935C22.7181 0.696874 21.1135 0.955424 19.9581 2.00264L17.1958 4.50427C16.6579 3.91631 15.8846 3.54679 15.0263 3.54679C14.1665 3.54679 13.392 3.91748 12.8539 4.50726L10.0881 2.00235C8.93079 0.955131 7.32685 0.697578 5.89965 1.3297C4.34665 2.01784 3.43404 3.57037 3.60802 5.30162C3.66243 5.84294 3.85272 6.35494 4.14122 6.81104H1.95994C0.877454 6.81104 0 7.68792 0 8.76957V11.7074C0 12.2482 0.438756 12.6867 0.979997 12.6867H29.0727C29.6139 12.6867 30.0527 12.2483 30.0527 11.7074V8.76957C30.0526 7.68792 29.1752 6.81104 28.0927 6.81104ZM12.0864 6.48462V6.81104H7.47618C6.25811 6.81104 5.29947 5.6763 5.6037 4.40901C5.7377 3.85091 6.14083 3.37516 6.66223 3.13433C7.37821 2.80363 8.17132 2.9098 8.77266 3.4537L12.0872 6.45576C12.087 6.46544 12.0864 6.47494 12.0864 6.48462ZM24.4937 5.04072C24.4207 6.05855 23.5006 6.81115 22.4795 6.81115H17.9662V6.48474C17.9662 6.47318 17.9655 6.46175 17.9654 6.45019C18.7163 5.77003 20.3452 4.29475 21.2286 3.49453C21.7307 3.03978 22.4332 2.8275 23.0826 3.02106C24.0146 3.29885 24.5619 4.09081 24.4937 5.04072Z" fill="white"/>
									<path d="M1.95996 14.6452V29.008C1.95996 30.0897 2.83742 30.9666 3.9199 30.9666H13.0663V14.6452H1.95996Z" fill="white"/>
									<path d="M16.9863 14.6452V30.9666H26.1328C27.2153 30.9666 28.0927 30.0897 28.0927 29.008V14.6452H16.9863Z" fill="white"/>
								</svg>
							</span></a>
						<div class="addToWishlist">
	            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="41" height="37" viewBox="0 0 41 37" fill="none">
								<path class="fill" fill-rule="evenodd" clip-rule="evenodd" d="M29.9812 0.0707603C35.359 0.0707603 39.5338 3.85644 40.7014 9.72954C42.3996 18.4684 36.9865 30.1439 21.0654 36.6538C20.8885 36.7246 20.7116 36.76 20.5347 36.76C20.3578 36.76 20.1809 36.7246 20.004 36.6538C4.04754 30.2854 -1.401 18.5746 0.297245 9.76492C1.42941 3.82106 5.63965 0 11.0174 0C14.0601 0 17.3151 1.23831 20.5347 3.64416C23.7189 1.30907 26.9739 0.0707603 29.9812 0.0707603Z" fill="#EB5757" style="&#10;    fill: transparent;&#10;"/>
								<path d="M40.7014 9.72954C39.5338 3.85644 35.359 0.0707602 29.9812 0.0707602C26.9739 0.0707602 23.7189 1.30907 20.5347 3.64416C17.3151 1.23831 14.0601 0 11.0174 0C5.63965 0 1.42941 3.82106 0.297245 9.76492C-1.401 18.5746 4.04754 30.2854 20.004 36.6538C20.1809 36.7246 20.3578 36.76 20.5347 36.76C20.7116 36.76 20.8885 36.7246 21.0654 36.6538C36.9865 30.1439 42.3996 18.4684 40.7014 9.72954V9.72954ZM20.5347 33.7527C6.52415 27.9503 1.67707 17.8316 3.12766 10.2956C3.97678 5.80235 7.09024 2.86579 11.0174 2.86579C13.6709 2.86579 16.6429 4.13948 19.6148 6.58071C20.1455 7.00527 20.8885 7.00527 21.4192 6.58071C24.3911 4.21024 27.3277 2.97193 29.9812 2.97193C33.9084 2.97193 36.9865 5.83773 37.871 10.2956C39.3216 17.7608 34.5099 27.8442 20.5347 33.7527V33.7527Z" fill="#EB5757"/>
							</svg>
	          </div>

					</div> <!-- .buyAndWishlist -->


				</div> <!-- .productInfoPart -->
			</div> <!-- .productContent -->
		</div> <!-- .container -->

		<div class="featuredProductsSection">
			<div class="container">

				<div class="title"><?php echo __('Featured products', 'Celebration'); ?></div>

				<div class="line headerLine">
	        <div class="pinkline"></div>
	      </div>

				<div class="featuredMobileProductsWrapper">
					<div class="featuredProductsMobileContainer">
						<?php echo do_shortcode('[featured_products per_page=”20” columns=”1”]') ?>
					</div>
				</div> <!-- .featuredProductsWrapper -->

			</div>
		</div>

		<div class="shopSidebar">
					<?php theCelebrationSidebar(); ?>
		</div>

	</div>

	<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php
}
else{

												// Desktop Version

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="shopSidebar">
				<?php theCelebrationSidebar(); ?>
	</div>

	<div>
	<div class="container">
		<a class="backToShop" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/backArrowInProduct.png" alt=""> <?php echo __('Back to shop', 'Celebration'); ?> </a>
		<div class="productContent">
			<div class="galleryPart">
				<div class="bigImage">
					<div class="currentImage">
						<?php
						if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
							return;
						}
						$attachment_ids = $product->get_gallery_image_ids();
						if ( $attachment_ids ) {
							foreach ( $attachment_ids as $attachment_id ) {
								echo wp_get_attachment_image($attachment_id, 'full');
								// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
							}
						}
						else
						{
							echo get_the_post_thumbnail($post->ID);
						}
						 ?>
					</div> <!-- .currentImage -->
				</div> <!-- .bigImage -->
				<div class="imageSliderWrapper">
					<div class="imageSlider">
						<?php woocommerce_show_product_thumbnails(); ?>
					</div> <!-- .imageSlider -->
				</div> <!-- .imageSliderWrapper -->
			</div> <!-- .galleryPart -->
			<div class="productInfoPart">
				<div class="title">
					<div class="name"><?php woocommerce_template_single_title(); ?></div>
					<?php
					$quantityAttr = $product->get_attribute( 'pa_quantity' );
					 if(!empty($quantityAttr)){?>
						<div class="productAttr"><span class="descAttr">יחידות במארז:</span><span class="contentAttr"><?= $product->get_attribute( 'pa_quantity' ); ?></span></div>
					<?php } ?>
					<?php if ($product->get_sale_price()): ?>
            <div class="sale"><?php echo __('Sale', 'Celebration'); echo " "; echo getPercentDiscount($product); echo "%";?> </div>
          <?php endif; ?>
				</div> <!-- .title -->

				<div class="priceAndQuantity">
					<div class="qantitySection">
						<span class="text"><?php echo __('Quantity:', 'Celebration'); ?></span>
						<div class="quantityDraw">
							<div class="plus">+</div>
							<div class="label">1</div>
							<div class="minus">—</div>
						</div>
						<?php woocommerce_simple_add_to_cart(); ?>
					</div> <!-- .qantitySection -->
					<div class="priceSection">
						<span class="text"><?php echo __('Price:', 'Celebration'); ?></span><span class="priceNum"><?php woocommerce_template_single_price(); ?></span>
					</div>
				</div> <!-- .priceAndQuantity -->
				<div class="description">
          <?php the_content(); ?>
				</div> <!-- .description -->

				 <!-- .buyAndWishlist -->

				<div class="tableAttributes">
					<div class="tableAttrRow">
						<div class="tableAttrCol first"><span>מק"ט</span></div>
						<div class="tableAttrCol"><span><?= $product->get_sku() ?></span></div>
					</div>
					<div class="tableAttrRow">
						<div class="tableAttrCol first"><span>יחידות במארז</span></div>
						<div class="tableAttrCol"><span><?= $product->get_attribute( 'pa_quantity' ); ?></span></div>
					</div>
					<div class="tableAttrRow">
						<div class="tableAttrCol first"><span>גודל</span></div>
						<div class="tableAttrCol"><span><?= $product->get_attribute( 'pa_size' ); ?></span></div>
					</div>
				</div>
				<div class="buyAndWishlist">
				<a href="#" class="addToCart">
					<?php echo __('Add to cart', 'Celebration'); ?>
					<span class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
							<path d="M28.0927 6.81104H25.9051C26.1937 6.3547 26.3841 5.84247 26.4384 5.30074C26.6118 3.56943 25.6994 2.01742 24.146 1.32935C22.7181 0.696874 21.1135 0.955424 19.9581 2.00264L17.1958 4.50427C16.6579 3.91631 15.8846 3.54679 15.0263 3.54679C14.1665 3.54679 13.392 3.91748 12.8539 4.50726L10.0881 2.00235C8.93079 0.955131 7.32685 0.697578 5.89965 1.3297C4.34665 2.01784 3.43404 3.57037 3.60802 5.30162C3.66243 5.84294 3.85272 6.35494 4.14122 6.81104H1.95994C0.877454 6.81104 0 7.68792 0 8.76957V11.7074C0 12.2482 0.438756 12.6867 0.979997 12.6867H29.0727C29.6139 12.6867 30.0527 12.2483 30.0527 11.7074V8.76957C30.0526 7.68792 29.1752 6.81104 28.0927 6.81104ZM12.0864 6.48462V6.81104H7.47618C6.25811 6.81104 5.29947 5.6763 5.6037 4.40901C5.7377 3.85091 6.14083 3.37516 6.66223 3.13433C7.37821 2.80363 8.17132 2.9098 8.77266 3.4537L12.0872 6.45576C12.087 6.46544 12.0864 6.47494 12.0864 6.48462ZM24.4937 5.04072C24.4207 6.05855 23.5006 6.81115 22.4795 6.81115H17.9662V6.48474C17.9662 6.47318 17.9655 6.46175 17.9654 6.45019C18.7163 5.77003 20.3452 4.29475 21.2286 3.49453C21.7307 3.03978 22.4332 2.8275 23.0826 3.02106C24.0146 3.29885 24.5619 4.09081 24.4937 5.04072Z" fill="white"/>
							<path d="M1.95996 14.6452V29.008C1.95996 30.0897 2.83742 30.9666 3.9199 30.9666H13.0663V14.6452H1.95996Z" fill="white"/>
							<path d="M16.9863 14.6452V30.9666H26.1328C27.2153 30.9666 28.0927 30.0897 28.0927 29.008V14.6452H16.9863Z" fill="white"/>
						</svg>
					</span></a>
					<div class="addToWishlist">
						<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="41" height="37" viewBox="0 0 41 37" fill="none">
							<path class="fill" fill-rule="evenodd" clip-rule="evenodd" d="M29.9812 0.0707603C35.359 0.0707603 39.5338 3.85644 40.7014 9.72954C42.3996 18.4684 36.9865 30.1439 21.0654 36.6538C20.8885 36.7246 20.7116 36.76 20.5347 36.76C20.3578 36.76 20.1809 36.7246 20.004 36.6538C4.04754 30.2854 -1.401 18.5746 0.297245 9.76492C1.42941 3.82106 5.63965 0 11.0174 0C14.0601 0 17.3151 1.23831 20.5347 3.64416C23.7189 1.30907 26.9739 0.0707603 29.9812 0.0707603Z" fill="#EB5757" style="&#10;    fill: transparent;&#10;"/>
							<path d="M40.7014 9.72954C39.5338 3.85644 35.359 0.0707602 29.9812 0.0707602C26.9739 0.0707602 23.7189 1.30907 20.5347 3.64416C17.3151 1.23831 14.0601 0 11.0174 0C5.63965 0 1.42941 3.82106 0.297245 9.76492C-1.401 18.5746 4.04754 30.2854 20.004 36.6538C20.1809 36.7246 20.3578 36.76 20.5347 36.76C20.7116 36.76 20.8885 36.7246 21.0654 36.6538C36.9865 30.1439 42.3996 18.4684 40.7014 9.72954V9.72954ZM20.5347 33.7527C6.52415 27.9503 1.67707 17.8316 3.12766 10.2956C3.97678 5.80235 7.09024 2.86579 11.0174 2.86579C13.6709 2.86579 16.6429 4.13948 19.6148 6.58071C20.1455 7.00527 20.8885 7.00527 21.4192 6.58071C24.3911 4.21024 27.3277 2.97193 29.9812 2.97193C33.9084 2.97193 36.9865 5.83773 37.871 10.2956C39.3216 17.7608 34.5099 27.8442 20.5347 33.7527V33.7527Z" fill="#EB5757"/>
						</svg>
					</div>


				</div>
			</div> <!-- .productInfoPart -->




		</div> <!-- .productContent -->

	</div> <!-- .container -->
	<div class="featuredProductsSection">
		<div class="containerFeaturedProductsSection">
			<div class="topFeauturedHeader container">
				<div class="title"><?php echo __('Featured products', 'Celebration'); ?></div>
				<div class="line headerLine">
	        <div class="pinkline"></div>
	      </div>
			</div>
			<div class="featuredProductsWrapper dragscroll">
				<div class="featuredProductsContainer">
					<?php echo do_shortcode('[featured_products per_page=”20” columns=”1”]') ?>
				</div>
			</div> <!-- .featuredProductsWrapper -->
		</div>
	</div>
</div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php
}


?>
