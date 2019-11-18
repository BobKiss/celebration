<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="shopPageWrapper">
  <div class="shopPage container">
    <div class="shopContent">
    	<header class="woocommerce-products-header">
    		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
    			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    		<?php endif; ?>

        <?php

        $term = get_queried_object();
        $children = get_terms( $term->taxonomy, array(
          'parent'    => $term->term_id,
          'hide_empty' => false
        ) );
        // print_r($children); // uncomment to examine for debugging
        if($children) { // get_terms will return false if tax does not exist or term wasn't found.

        }

        ?>
        <div class="line headerLine">
          <div class="pinkline"></div>
        </div>
    		<?php
    		/**
    		 * Hook: woocommerce_archive_description.
    		 *
    		 * @hooked woocommerce_taxonomy_archive_description - 10
    		 * @hooked woocommerce_product_archive_description - 10
    		 */
    		do_action( 'woocommerce_archive_description' );
    		?>
    	</header>
    	<?php
    	if ( (woocommerce_product_loop() && !$children) || is_shop() || is_search()) {

    		/**
    		 * Hook: woocommerce_before_shop_loop.
    		 *
    		 * @hooked woocommerce_output_all_notices - 10
    		 * @hooked woocommerce_result_count - 20
    		 * @hooked woocommerce_catalog_ordering - 30
    		 */
    		do_action( 'woocommerce_before_shop_loop' );

    		woocommerce_product_loop_start();

    		if ( wc_get_loop_prop( 'total' ) ) {
    			while ( have_posts() ) {
    				the_post();

    				/**
    				 * Hook: woocommerce_shop_loop.
    				 *
    				 * @hooked WC_Structured_Data::generate_product_data() - 10
    				 */
    				do_action( 'woocommerce_shop_loop' );

    				wc_get_template_part( 'content', 'product' );
    			}
    		}

    		woocommerce_product_loop_end();

    		/**
    		 * Hook: woocommerce_after_shop_loop.
    		 *
    		 * @hooked woocommerce_pagination - 10
    		 */
    		do_action( 'woocommerce_after_shop_loop' );
    	} else if( $children ) {
        ?>
        <ul class="products shop productsList categoryList columns-8">
        <?php
        foreach ($children as $key => $cat) {
          $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	        $image = wp_get_attachment_url( $thumbnail_id );
          if (!$image) {
            $image = get_bloginfo('url').'/wp-content/uploads/woocommerce-placeholder-300x300.png';
          }
        ?>
        <li class="productItem product type-product post-1817 status-publish instock product_cat-134 shipping-taxable purchasable product-type-simple">
          <a href="<?php echo get_term_link($cat->term_id); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
            <img src="<?php echo $image; ?>" alt="">
          </a>
          <a href="<?php echo get_term_link($cat->term_id); ?>" class="button"><?php echo $cat->name ?></a>
        </li>
        <?php
        }
        ?>
        </ul>
        <?php
    	} else {
        /**
        * Hook: woocommerce_no_products_found.
        *
        * @hooked wc_no_products_found - 10
        */
        do_action( 'woocommerce_no_products_found' );
      }

    	/**
    	 * Hook: woocommerce_after_main_content.
    	 *
    	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
    	 */
    	?>
    </div> <!-- .shopContent -->
    <div class="shopSidebar">
          <?php theCelebrationSidebar(); ?>
    </div> <!-- .shopSidebar -->
  </div> <!-- .shopPage -->
</div> <!-- .shopPageWrapper -->
<?php
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
