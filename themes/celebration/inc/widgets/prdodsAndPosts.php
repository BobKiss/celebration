<div class="celebrationWidget funnyBGWrapper">
  <div class="prodsByType">

    <div class="container wow fadeIn">

        <span class="homepage_title">מוצרים לפי קטגוריה</span>

        <div class="categorySlider">
        <?php

          $taxonomy     = 'product_cat';
          $orderby      = 'name';
          $show_count   = 0;      // 1 for yes, 0 for no
          $pad_counts   = 0;      // 1 for yes, 0 for no
          $hierarchical = 1;      // 1 for yes, 0 for no
          $title        = '';
          $empty        = 0;
          $showChild    = 0;

          $args = array(
                 'taxonomy'     => $taxonomy,
                 'orderby'      => $orderby,
                 'show_count'   => $show_count,
                 'pad_counts'   => $pad_counts,
                 'hierarchical' => $hierarchical,
                 'title_li'     => $title,
                 'hide_empty'   => $empty
          );
           $all_categories = get_categories( $args );
           foreach ($all_categories as $cat) {
              if($cat->category_parent == 0) {
                  $category_id = $cat->term_id;
                  $thumbnail_id = get_woocommerce_term_meta( $category_id, 'thumbnail_id', true );
                  $image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
                  if (!$image) {
                    $image[0] = wc_placeholder_img_src('medium');
                  }
                  // $cat->name
                  // get_term_link($cat->slug, 'product_cat')
                  ?>
                  <div>
                    <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>" class="categorySliderItem">
                      <div class="image">
                        <img src="<?php echo $image[0]; ?>" alt="">
                      </div>
                      <span class="title"><?php echo $cat->name; ?></span>
                    </a>
                  </div>
                  <?php

                  if ($showChild) {
                    $args2 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $category_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories( $args2 );
                    if($sub_cats) {
                        foreach($sub_cats as $sub_category) {
                            echo  $sub_category->name ;
                        }
                    }
                  }
              }
          }
        ?>

        </div>
    </div> <!-- .container -->
  </div> <!-- .prodsByType -->


  <div class="partySection wow fadeIn">
     <div class="title">
       <span class="hebrew">בלוג</span>
     </div> <!-- .title -->
     <div class="container ">
       <div class="row">
         <?php

          // check if the repeater field has rows of data
          if( have_rows('posts_show', 'options') ):

           	// loop through the rows of data
              while ( have_rows('posts_show', 'options') ) : the_row();

                  // display a sub field value
                  $post = get_post(get_sub_field('post_id')->ID);
                  ?>
                  <a href="<?php echo get_post_permalink($post); ?>" class="column">
                    <div class="imageSection">
                      <?php echo get_the_post_thumbnail( $post, 'full' ); ?>
                    </div> <!-- .imageSection -->

                    <div class="contentSection">
                      <div class="infosname">
                        <span class="name"><?php echo get_the_title($post); ?></span>
                      </div>
                      <div class="info">
                        <span class="by"><span><?php echo __('By:'); ?></span><span><?php echo get_the_author(); ?></span></span>
                        <span class="data"><?php echo get_the_date('d.m.Y', $post); ?></span>
                      </div>
                      <div class="text">
                        <span class="infot"><?php echo get_the_excerpt($post); ?></span>
                      </div>
                    </div> <!-- .contentSection -->
                  </a> <!-- .column -->
                  <?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>


       </div> <!-- .row -->
    </div> <!-- .container -->
   </div> <!-- .partySection -->


</div> <!-- .funnyBGWrapper -->
