<?php
/**
* Template Name: Check In
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

?>
<div class="template_wrapper CheckInTemplate" style="background-image: url(<?php echo get_bloginfo('url'); ?>/wp-content/themes/celebration/assets/images/checkinBG.png")>


    <div class="container">
      <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
      <div class="title">הגדרות חשבון</div>
      <div class="formSection">
        <form class="register-form" >
          <span class="Name">שם מלא</span>
          <input type="text" placeholder="שם מלא">
          <span class="Name"> טלפון נייד </span>
          <input type="tel" placeholder=" טלפםון נייד">
          <span class="Name">מייל</span>
          <input type="email" placeholder="מייל">
          <span class="Name">סיסמה נוכחית</span>
          <input type="password" placeholder=" סיסמה נוכחית">
          <span class="Name">סיסמה חדשה</span>
          <input type="password" placeholder="סיסמה חדשה">
          <a href="#" class="register">שמור</a>
        </form> <!-- register-form -->
      </div> <!-- formSection -->
    </div> <!-- container -->



</div> <!-- template_wrapper CheckInTemplate -->

<?php

get_footer();
