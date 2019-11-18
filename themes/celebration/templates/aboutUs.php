<?php
/**
* Template Name: About Us
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

?>

<div class="template_wrapper aboutUsTemplate">

  <div class="About_Container">
    <div class="content_section" style="background-size:cover; background-image:url(<?= get_bloginfo('template_url') ?>/assets/images/AboutUsBack.png);">
      <div class="info_first_row">
        <div class="content">
          <div class="title">
            <span class="name"><?php the_field('first_title_name'); ?></span>
          </div> <!-- title -->
          <div class="text">
            <p><?php the_field('first_text_area'); ?></p>
          </div> <!-- text-->
        </div> <!-- content -->
        <div class="imag_Section">
          <div class="wrap">
            <img src="<?php echo get_field('first_image')['url']; ?>" />
          </div>
        </div> <!-- imag_Section -->
      </div> <!-- info_first_row -->

    


    </div> <!-- content_section -->
  </div> <!-- About_Container -->


</div>

<?php

get_footer();
