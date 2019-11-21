<?php
/**
* Template Name: FAQ
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

?>

<div class="template_wrapper FAQTemplate">
  <div class="faqSection">
    <div class="container_content">
      <?php function_exists('kama_breadcrumbs') && kama_breadcrumbs(); ?>
      <div class="faq_name_section">
        <span class="hebrew">איך זה עובד?</span>
        <div class="line headerLine">
        </div>
      </div> <!-- faq_name_section -->
      <div class="questionSection">
        <?php

        // проверяем есть ли в повторителе данные
        if( have_rows('faq_list') ):

         	// перебираем данные
            while ( have_rows('faq_list') ) : the_row();

                // отображаем вложенные поля
                ?>
                <div class="question">
                  <div class="title">
                    <span class="name"><?php the_sub_field('question'); ?></span>
                    <div class="wrap">
                      <svg xmlns="http://www.w3.org/2000/svg" width="29" height="16" viewBox="0 0 29 16" fill="none">
                      <path d="M0.299999 1.80354C0.0999984 1.59742 -5.85634e-08 1.33977 -4.6175e-08 1.05636C-3.37866e-08 0.772946 0.0999985 0.515297 0.299999 0.309177C0.699999 -0.103061 1.35 -0.103061 1.75 0.309178L14.5 13.4493L27.25 0.309179C27.65 -0.10306 28.3 -0.10306 28.7 0.309179C29.1 0.721417 29.1 1.3913 28.7 1.80354L15.225 15.6908C14.825 16.1031 14.175 16.1031 13.775 15.6908L0.299999 1.80354Z" fill="#333333"/>
                      </svg>
                    </div>
                  </div>
                  <div class="dropdown">
                    <span class="text"><?php the_sub_field('answer'); ?></span>
                  </div>
                </div> <!-- question -->

                <?php

            endwhile;

        else :

            // вложенных полей не найдено

        endif;

        ?>

      </div> <!-- questionSection -->
    </div>
  </div> <!-- faqSection -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.title').click(function(event) {
   $(this).parent().toggleClass('active');
  });
</script>

</div>

<?php

get_footer();
