<?php get_header(); ?>
<?php
global $greenfresh_options;
$fullwidth = isset($greenfresh_options['post_fullwidth'])&&$greenfresh_options['post_fullwidth'] ? 'fullwidth': 'container';
$sidebar_width = (int) isset($greenfresh_options['post_sidebar_width']) ?  $greenfresh_options['post_sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;
$post_navigation = isset($greenfresh_options['single_post_navigation']) ? $greenfresh_options['single_post_navigation']: true;
$author = isset($greenfresh_options['single_author']) ? $greenfresh_options['single_author']: true;
$comment = isset($greenfresh_options['single_comment']) ? $greenfresh_options['single_comment']: true;

$sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';

$sidebar_class = 'col-md-'.$sidebar_width_md.' col-lg-'.$sidebar_width;
if($sidebar_position == 'left' || $sidebar_position == 'right'){
	$content_class = 'col-md-'.(12 - $sidebar_width_md).' col-lg-'.(12 - $sidebar_width);
}elseif($sidebar_position == 'left_right'){
	$content_width = 12 - 2*$sidebar_width;
	$content_class = 'col-md-'.(12 - 2*$sidebar_width_md).' col-lg-'.(12 - 2*$sidebar_width);
}else{
	$content_class = 'col-md-12';
}

$post_titlebar = isset($greenfresh_options['post_titlebar']) ? $greenfresh_options['post_titlebar']: true;
if($post_titlebar) greenfresh_titlebar();

?>
	<div class="bt-main-content">
		<div class="<?php echo esc_attr($fullwidth); ?>">
			<div class="row">
				<!-- Start Left Sidebar -->
				<?php if($sidebar_position == 'left' || $sidebar_position == 'left_right'){ ?>

                    <div class="<?php echo esc_attr($sidebar_class); ?>">
                        <div class="bt-sidebar bt-left-sidebar">
                            <div class="bt-sidebar__inner">
                                <?php get_sidebar('left'); ?>
                            </div>
                        </div>
                    </div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="bt-content <?php echo esc_attr($content_class); ?>">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'framework/templates/blog/entry');
						
						if($post_navigation) greenfresh_post_nav();
						
						$author_desc = get_the_author_meta('description');
						if($author && $author_desc) echo greenfresh_author_render();
						
						// If comments are open or we have at least one comment, load up the comment template.
						if($comment){
							if ( comments_open() || get_comments_number() ) comments_template();
						}
					endwhile;
					?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if($sidebar_position == 'right' || $sidebar_position == 'left_right'){ ?>
                    <div class="<?php echo esc_attr($sidebar_class); ?>">
                        <div class="bt-sidebar bt-right-sidebar">
                            <div class="bt-sidebar__inner">
                                <?php get_sidebar('right'); ?>
                            </div>
                        </div>
                    </div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>
