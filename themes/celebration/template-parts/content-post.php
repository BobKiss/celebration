<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celebration
 */
$mainPostId = $post->ID;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="singlePostWrapper">
    <div class="container">
      <div class="postContent">
        <div class="title"><?php the_title(); ?></div>
        <div class="description"><?php the_excerpt(); ?></div>
        <div class="update"><?php echo get_the_time(); ?><?php echo get_the_date(); ?></div>
        <div class="postThumbnail">
          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
        </div>
        <div class="thePostContent">
          <?php the_content(); ?>
        </div>
      </div> <!-- .postContent -->
      <div class="singlePostSidebar">
				<?php
					$recent_posts = wp_get_recent_posts();
				?>
				<?php
					foreach( $recent_posts as $recent ){
						$postId = $recent['ID'];
						if ($mainPostId == $postId) { continue; }
						?>
						<div class="singlePostSidebarItem">
		          <div class="postSidebarItem">
		            <a href="<?php the_permalink($postId); ?>" class="imageWrapper">
									<?php if (has_post_thumbnail($postId)):?>
						        <img src="<?php echo get_the_post_thumbnail_url($postId); ?>" alt="">
						      <?php else: ?>
						        <img src="http://celebrationbyorel.com/wp-content/uploads/2019/07/image-2.2.png" alt="">
						      <?php endif; ?>
		            </a>
		            <a href="" class="title"><?php the_title($postId); ?></a>
		            <div class="description"><?php the_excerpt($postId); ?></div>
		            <div class="date"><?php echo get_the_date('d.m.y', $postId); ?></div>
		          </div>
		          <a href="<?php the_permalink($postId); ?>" class="viewPost"><?php echo __('View post', 'Celebration'); ?></a>
		        </div> <!-- singlePostSidebarItem -->
						<?php
					}
				?>
      </div>
    </div>
  </div>
	<div class="dragscroll">
		<div class="bottomRecentWrapper" style="display:none; width: 9999px;">
			<?php
				$recent_posts = wp_get_recent_posts();
			?>
			<?php
			foreach( $recent_posts as $recent ){
				$postId = $recent['ID'];
				if ($mainPostId == $postId) { continue; }
				?>
				<div class="singleBottomRecent">
					<div class="image">
						<?php if (has_post_thumbnail($postId)):?>
							<a href="<?php the_permalink($postId); ?>" class="viewPost">
								<img src="<?php echo get_the_post_thumbnail_url($postId); ?>" alt="<?php the_title($postId); ?>">
							</a>
						<?php else: ?>
							<a href="<?php the_permalink($postId); ?>" class="viewPost">
								<img src="http://celebrationbyorel.com/wp-content/uploads/2019/07/image-2.2.png" alt="<?php the_title($postId); ?>">
							</a>
						<?php endif; ?>
					</div>
					<div class="singleBottomRecentContent">
						<div class="title"><?php the_title($postId); ?></div>
						<div class="description"><?php the_excerpt($postId); ?></div>
						<div class="date"><?php echo get_the_date('d.m.y', $postId); ?></div>
						<a href="<?php the_permalink($postId); ?>" class="viewPost"><?php echo __('View post', 'Celebration'); ?></a>
					</div>
				</div> <!-- singlePostSidebarItem -->
				<?php
			}
			?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
