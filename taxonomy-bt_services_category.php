<?php get_header(); ?>
<?php
global $greenfresh_options;
$fullwidth = isset($greenfresh_options['services_fullwidth'])&&$greenfresh_options['services_fullwidth'] ? 'fullwidth': 'container';
$sidebar_width = (int) isset($greenfresh_options['services_sidebar_width']) ?  $greenfresh_options['services_sidebar_width']: 3;

$sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';

$sidebar_class = 'col-md-'.$sidebar_width;
if($sidebar_position == 'left' || $sidebar_position == 'right'){
		$content_width = 12 - $sidebar_width;
		$content_class = 'col-md-'.$content_width;
	
}elseif($sidebar_position == 'left_right'){
	$content_width = 12 - 2*$sidebar_width;
	$content_class = 'col-md-'.$content_width;
}else{
	$content_class = 'col-md-12';
}

$services_titlebar = isset($greenfresh_options['services_titlebar']) ? $greenfresh_options['services_titlebar']: true;
if($services_titlebar) greenfresh_titlebar();
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
					if( have_posts() ) {
						while ( have_posts() ) : the_post();
							get_template_part( 'framework/templates/services/entry');
						endwhile;
						
						greenfresh_paging_nav();
					}else{
						get_template_part( 'framework/templates/entry', 'none');
					}
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