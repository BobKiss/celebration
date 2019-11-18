<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celebration
 */

// the_post();
?>

<div class="singlePostSidebarItem" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="postSidebarItem">
    <a href="<?php the_permalink(); ?>" class="imageWrapper">
      <?php if (has_post_thumbnail()): ?>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
      <?php else: ?>
        <img src="http://celebrationbyorel.com/wp-content/uploads/2019/07/image-2.2.png" alt="">
      <?php endif; ?>
    </a>
    <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
    <div class="date"><?php echo get_the_date('d.m.y'); ?></div>
  </div>
  <a href="<?php the_permalink(); ?>" class="viewPost"> הוסף לסל </a>

  <?php wp_reset_postdata(); ?>
</div> <!-- #post-<?php the_ID(); ?> -->

<?php
