<?php
global $greenfresh_options;
$post_title = isset($greenfresh_options['single_services_title']) ? $greenfresh_options['single_services_title']: true;
$post_featured = isset($greenfresh_options['single_services_featured']) ? $greenfresh_options['single_services_featured']: true;
$post_image_size = isset($greenfresh_options['single_services_image_size']) ? $greenfresh_options['single_services_image_size']: '';
$post_meta = isset($greenfresh_options['single_services_meta']) ? $greenfresh_options['single_services_meta']: true;
$post_content = isset($greenfresh_options['single_services_content']) ? $greenfresh_options['single_services_content']: true;

$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'services_options'):array();

$icon_font = isset($post_options['icon_font'])?$post_options['icon_font']:'';
$icon_image = isset($post_options['icon_image'])?$post_options['icon_image']:'';

?>
<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<?php if($post_featured && has_post_thumbnail()){ ?>
			<div class="bt-media">
				<?php echo greenfresh_post_featured_render($post_image_size); ?>
			</div>
		<?php } ?>
		<?php if($post_meta || $post_title){ ?>
			<div class="bt-header">
				<div class="bt-icon">
					<?php
						if(isset($icon_image['url']) && $icon_image['url']){
							echo '<img src="'.esc_url($icon_image['url']).'" alt="'.esc_attr__('Icon', 'greenfresh').'"/>';
						}else{
							echo '<i class="'.esc_attr($icon_font).'"></i>';
						}
					?>
				</div>
				<div class="bt-content">
					<?php if($post_meta) the_terms( get_the_ID(), 'bt_services_category', '<div class="bt-term">', ', ', '</div>' ); ?>
					<?php if($post_title){ ?>
						<h3 class="bt-title"><?php the_title(); ?></h3>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php if($post_content){ ?>
			<div class="bt-content"><?php the_content(); ?></div>
		<?php } ?>
	</div>
</article>