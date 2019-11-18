<?php
/**
* Template Name: Homepage
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

?>

<div class="template_wrapper homepageTemplate">

  <div class="firstScreenSlider wow fadeIn">
    <div class="slick_slider">
      <!-- homepage_slider -->
      <?php

      // check if the repeater field has rows of data
      if( have_rows('homepage_slider') ):

        // loop through the rows of data
          while ( have_rows('homepage_slider') ) : the_row();
            ?>
            <div>
              <div class="slider_screen" style="background-image: url('<?php echo get_sub_field('slider_img')['url']; ?>);">
                <span class="title"><?php the_sub_field('slider_title'); ?></span>
                <span class="content"><?php the_sub_field('slider_content'); ?></span>
                <a href="<?php echo get_sub_field('slider_link')['url']; ?>" class="button"> <span><?php echo get_sub_field('slider_link')['title']; ?></span> </a>
					</div>
            </div>
            <?php
          endwhile;

      else :

          // no rows found

      endif;

      ?>
    </div>
  </div> <!-- .firstScreenSlider -->

  <div class="celebrationPostsHomepage">
    <div class="container wow fadeIn">
      <div class="title">המוצרים שלנו</div>
      <div class="line">
        <div class="active">

        </div>
      </div>
      <div class="posts">
        <?php
        $a = 0;
        if( have_rows('our_products') ):

           	// loop through the rows of data
              while ( have_rows('our_products') ) : the_row();

                  // display a sub field value
                  ?>
                  <a class="postsItem" href="<?php the_sub_field('link'); ?>">
                    <div class="image">
                      <img src="<?php the_sub_field('image') ?>" alt="">
                    </div>
                    <div class="postTitle"><?php the_sub_field('title'); ?></div>
                  </a> <!-- .postsItem -->
                  <?php

              endwhile;

          else :

              // no rows found

          endif;
          ?>
      </div> <!-- .posts -->
    </div> <!-- .container -->
  </div> <!-- .celebrationPostsHomepage -->

  <div class="celebrationShopSection <?php if(wp_is_mobile()){echo 'mobile';} ?>">
    <div class="container wow fadeIn">
      <?php theCelebrationSidebar(); ?>


      <div class="shopContent">
        <div class="tabulator">
          <div class="topBar">
            <?php
            $tabs = get_field('categories_in_tabs');
            $firstCat = $tabs['first_tab_category'];
            $secondCat = $tabs['second_tab_category'];
            $thirdCat = $tabs['third_tab_category'];
            // var_dump($thirdCat);
             ?>
            <span class="title"><?php echo __('Interesting', 'Celebration'); ?></span>
            <ul class="tabs">
              <!-- <li><a href="#tab1" class="active"></a></li> -->
              <li><a href="#tab1" class="active"><?php echo $firstCat->name; ?></a></li>
              <li><a href="#tab2"><?php echo $secondCat->name; ?></a></li>
              <li><a href="#tab3"><?php echo $thirdCat->name; ?></a></li>
            </ul> <!-- .tabs -->
          </div> <!-- .topBar -->
          <div class="line">
            <div class="active"></div>
          </div> <!-- .line -->
          <?php if (wp_is_mobile()): ?>
            <div class="arrows arrowLeft">
              <img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/celebration/assets/images/icons/sliderArrow.svg" alt="">
            </div>
            <div class="arrows arrowRigth">
              <img src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/celebration/assets/images/icons/sliderArrow.svg" alt="">
            </div>
          <?php endif; ?>
          <div class="tabContentContainer">
            <div class="active" id="tab1">
              <ul class="productsList shop">
                <?php if (wp_is_mobile()): ?>
                  <div class="mobileSlidersWrapper">
                <?php endif; ?>
                  <?php
                      $args = array(
                          'post_type' => 'product',
                          'posts_per_page' => 10,
                          'product_cat' => $firstCat->name,
                          );
                      $loop = new WP_Query( $args );
                      if ( $loop->have_posts() ) {
                          while ( $loop->have_posts() ) : $loop->the_post();
                              wc_get_template_part( 'content', 'product' );
                          endwhile;
                      } else {
                          echo __( 'No products found' );
                      }
                      wp_reset_postdata();
                  ?>


                <?php if (wp_is_mobile()): ?>
                </div>
                <?php endif; ?>
              </ul> <!-- .productsList shop -->
            </div>
            <div id="tab2">
              <ul class="productsList shop">
                <?php if (wp_is_mobile()): ?>
                  <div class="mobileSlidersWrapper">
                <?php endif; ?>
                  <?php
                      $args = array(
                          'post_type' => 'product',
                          'posts_per_page' => 10,
                          'product_cat' => $secondCat->name,
                          );

                      $loop = new WP_Query( $args );
                      if ( $loop->have_posts() ) {
                          while ( $loop->have_posts() ) : $loop->the_post();
                              wc_get_template_part( 'content', 'product' );
                          endwhile;
                      } else {
                          echo __( 'No products found' );
                      }
                      wp_reset_postdata();
                  ?>


                <?php if (wp_is_mobile()): ?>
                </div>
                <?php endif; ?>
              </ul> <!-- .productsList shop -->
            </div>
            <div id="tab3">
              <ul class="productsList shop">
                <?php if (wp_is_mobile()) {echo '<div class="mobileSlidersWrapper">';} ?>
                  <?php
                      $args = array(
                          'post_type' => 'product',
                          'posts_per_page' => 10,
                          'product_cat' => $thirdCat->name,
                          );
                      $loop = new WP_Query( $args );
                      if ( $loop->have_posts() ) {
                          while ( $loop->have_posts() ) : $loop->the_post();
                              wc_get_template_part( 'content', 'product' );
                          endwhile;
                      } else {
                          echo __( 'No products found' );
                      }
                      wp_reset_postdata();
                  ?>


                <?php if (wp_is_mobile()) {echo "</div>";} ?>
              </ul> <!-- .productsList shop -->
            </div>
          </div> <!-- .tabContentContainer -->
        </div> <!-- .tabulator -->
      </div> <!-- .shopContent -->
    </div> <!-- .container -->
  </div> <!-- .celebrationShopSection -->

  <?php echo do_shortcode('[ProdsAndPostsSection]'); ?>

  <div class="advantagesSection">
    <div class="svgAnimation">
    </div>
    <div class="container wow fadeIn">
      <div class="title">
        <span class="titlename"> היתרונות שלנו </span>
      </div> <!-- .title -->
      <div class="row">
        <div class="singleAdv wow bounceIn">
          <div class="svgSection">
            <div class="content">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
              <path d="M59.8261 12.4659H55.1675C55.782 11.4934 56.1875 10.4018 56.3031 9.24728C56.6725 5.55766 54.7294 2.25016 51.4212 0.783785C48.3805 -0.56409 44.9634 -0.0130904 42.5028 2.21866L36.6203 7.54991C35.4746 6.29691 33.8278 5.50941 32 5.50941C30.169 5.50941 28.5195 6.29941 27.3736 7.55628L21.4836 2.21803C19.019 -0.0137153 15.6033 -0.56259 12.5639 0.784535C9.25663 2.25103 7.31313 5.55966 7.68363 9.24916C7.7995 10.4028 8.20475 11.4939 8.81913 12.4659H4.17387C1.86862 12.4659 0 14.3347 0 16.6398V22.9007C0 24.0532 0.934375 24.9877 2.087 24.9877H61.9131C63.0656 24.9877 64.0001 24.0533 64.0001 22.9007V16.6398C64 14.3347 62.1314 12.4659 59.8261 12.4659ZM25.7391 11.7703V12.4659H15.9213C13.3273 12.4659 11.2858 10.0477 11.9336 7.34691C12.219 6.15753 13.0775 5.14366 14.1879 4.63041C15.7126 3.92566 17.4016 4.15191 18.6822 5.31103L25.7409 11.7088C25.7405 11.7294 25.7391 11.7497 25.7391 11.7703ZM52.1618 8.69316C52.0063 10.8623 50.0469 12.4662 47.8722 12.4662H38.2609V11.7705C38.2609 11.7459 38.2594 11.7215 38.2591 11.6969C39.8581 10.2474 43.327 7.10341 45.2084 5.39803C46.2776 4.42891 47.7738 3.97653 49.1567 4.38903C51.1414 4.98103 52.3069 6.66878 52.1618 8.69316Z" fill="#333333"></path>
              <path d="M4.17383 29.1616V59.7704C4.17383 62.0756 6.04245 63.9442 8.3477 63.9442H27.826V29.1616H4.17383Z" fill="#333333"></path>
              <path d="M36.1738 29.1616V63.9442H55.6521C57.9573 63.9442 59.826 62.0756 59.826 59.7704V29.1616H36.1738Z" fill="#333333"></path>
              </svg>
            </div>
          </div> <!-- .svgSection -->

          <div class="conSection">
            <div class="name">
              <span class="eng">מתנות ייחודיות</span>
            </div>
            <div class="info">
              <span class="text">מוש היה נער צעיר בעל יכולות חגיגה מיוחדות בעולם הממתקים</span>
            </div>
          </div> <!-- .conSection -->
        </div>

        <div class="singleAdv wow bounceIn">
          <div class="svgSection">
            <div class="content">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
              <path d="M19.2 51.2C15.68 51.2 12.8 54.08 12.8 57.6C12.8 61.12 15.68 64 19.2 64C22.72 64 25.6 61.12 25.6 57.6C25.6 54.08 22.72 51.2 19.2 51.2ZM0 0V6.4H6.4L17.92 30.72L13.44 38.4C13.12 39.36 12.8 40.64 12.8 41.6C12.8 45.12 15.68 48 19.2 48H57.6V41.6H20.48C20.16 41.6 19.84 41.28 19.84 40.96V40.6399L22.72 35.1999H46.4C48.96 35.1999 50.88 33.9199 51.84 31.9999L63.36 11.2C64 10.56 64 10.24 64 9.6C64 7.68 62.72 6.4 60.8 6.4H13.44L10.56 0H0ZM51.2 51.2C47.68 51.2 44.8 54.08 44.8 57.6C44.8 61.12 47.68 64 51.2 64C54.72 64 57.6 61.12 57.6 57.6C57.6 54.08 54.72 51.2 51.2 51.2Z" fill="#333333"></path>
              </svg>
            </div>
          </div> <!-- .svgSection -->

          <div class="conSection">
            <div class="name">
              <span class="eng">מגוון מוצרים</span>
            </div>
            <div class="info">
              <span class="text">מוש היה נער צעיר בעל יכולות חגיגה מיוחדות בעולם הממתקים</span>
            </div>
          </div> <!-- .conSection -->
        </div>

        <div class="singleAdv wow bounceIn">
          <div class="svgSection">
            <div class="content">
              <svg xmlns="http://www.w3.org/2000/svg" width="92" height="64" viewBox="0 0 92 64" fill="none">
              <path d="M3.19522 42.642V3.89827C3.19522 1.74536 4.94043 0 7.09349 0H45.8173C47.9702 0 49.7154 1.74536 49.7154 3.89827V42.6422C49.7154 43.3598 49.1338 43.9416 48.416 43.9416H4.49464C3.77685 43.9416 3.19522 43.3598 3.19522 42.642ZM34.4659 55.9148C34.4659 60.3801 30.8459 64 26.3807 64C21.9155 64 18.2955 60.3801 18.2955 55.9148C18.2955 51.4493 21.9155 47.8296 26.3807 47.8296C30.8459 47.8296 34.4659 51.4493 34.4659 55.9148ZM30.4231 55.9148C30.4231 53.6821 28.6132 51.8722 26.3805 51.8722C24.1479 51.8722 22.3378 53.6821 22.3378 55.9148C22.3378 58.1475 24.1479 59.9575 26.3805 59.9575C28.6132 59.9575 30.4231 58.1475 30.4231 55.9148ZM19.417 47.8294H1.29942C0.581787 47.8294 0 48.4112 0 49.1289V53.0712C0 53.7888 0.581787 54.3706 1.29942 54.3706H15.8215C16.2006 51.7691 17.5137 49.4711 19.417 47.8294ZM76.7688 55.9148C76.7688 60.3801 73.1488 64 68.6836 64C64.2183 64 60.5984 60.3801 60.5984 55.9148C60.5984 51.4493 64.2183 47.8296 68.6836 47.8296C73.1488 47.8294 76.7688 51.4493 76.7688 55.9148ZM72.7263 55.9148C72.7263 53.6821 70.9163 51.8722 68.6836 51.8722C66.4508 51.8722 64.641 53.6821 64.641 55.9148C64.641 58.1475 66.4509 59.9575 68.6836 59.9575C70.9163 59.9575 72.7263 58.1475 72.7263 55.9148ZM91.0623 49.1289V53.0712C91.0623 53.7888 90.4805 54.3706 89.7629 54.3706H79.2425C78.4901 49.21 74.0487 45.2306 68.6839 45.2306C63.3181 45.2306 58.8765 49.2101 58.1241 54.3706H36.9399C36.5606 51.7692 35.2477 49.4711 33.3444 47.8294H53.4308V10.6619C53.4308 9.22661 54.5944 8.06303 56.0297 8.06303H68.297C71.7512 8.06303 74.9795 9.77878 76.9122 12.6414L84.8207 24.3547C85.9807 26.0728 86.6006 28.0985 86.6006 30.1717V47.8294H89.7629C90.4805 47.8294 91.0623 48.4112 91.0623 49.1289ZM77.8803 24.6547L71.5564 15.6685C71.313 15.3227 70.9166 15.1169 70.4937 15.1169H60.6293C59.9119 15.1169 59.3299 15.6987 59.3299 16.4164V25.4025C59.3299 26.1203 59.9117 26.7019 60.6293 26.7019H76.8179C77.8705 26.7019 78.4862 25.5156 77.8803 24.6547Z" fill="#333333"></path>
              </svg>
            </div> <!-- .content -->
          </div> <!-- .svgSection -->

          <div class="conSection">
            <div class="name">
              <span class="eng">משלוח חינם</span>
            </div> <!-- .name -->
            <div class="info">
              <span class="text">מוש היה נער צעיר בעל יכולות חגיגה מיוחדות בעולם הממתקים</span>
            </div> <!-- .info -->
          </div> <!-- .conSection -->
        </div> <!-- .singleAdv -->

      </div> <!-- .row -->
    </div> <!-- .container -->

  </div> <!-- .advantagesSection -->

</div> <!-- .template_wrapper .homepageTemplate -->

<?php

get_footer();
