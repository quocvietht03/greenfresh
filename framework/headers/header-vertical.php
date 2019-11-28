<?php 
	global $greenfresh_options;
	
?>
<div class="bt-menu-toggle"></div>
<header id="bt_header" class="bt-header bt-header-vertical">
	
	<div class="bt-header-inner">
		<div class="bt-logo">
			<?php
				$logo = isset($greenfresh_options['hvertical_logo']['url'])?$greenfresh_options['hvertical_logo']['url']:'';
				
				$logo_height = (isset($greenfresh_options['hvertical_logo_height'])&&$greenfresh_options['hvertical_logo_height'])?$greenfresh_options['hvertical_logo_height']:'24';
				
				greenfresh_logo($logo, $logo_height); 
			?>
		</div>
		
		<div class="bt-vertical-menu-wrap">
			<?php
				$menu_assign = isset($greenfresh_options['hvertical_menu_assign'])&&($greenfresh_options['hvertical_menu_assign'] != 'auto')?$greenfresh_options['hvertical_menu_assign']:'';
				greenfresh_nav_menu($menu_assign, 'main_navigation', 'bt-menu-list');
			?>
		</div>
		
		<div class="bt-sidebar">
			<?php
				if(isset($greenfresh_options['hvertical_content_bottom_element'])&&$greenfresh_options['hvertical_content_bottom_element']&&isset($greenfresh_options['hvertical_content_bottom_element'])&&$greenfresh_options['hvertical_content_bottom_element']){
					echo '<div class="bt-menu-content-right">';
						foreach($greenfresh_options['hvertical_content_bottom_element'] as $sidebar_id){
							dynamic_sidebar( $sidebar_id );
						}
					echo '</div>'; 
				}
			?>
		</div>
		
	</div>
		
</header>