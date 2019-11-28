<?php 
	global $greenfresh_options;
	
?>
<header id="bt_header" class="bt-header bt-header-minivertical">
	
	<div class="bt-header-desktop">
		
		<div class="bt-mini-bar">
			<div class="bt-mini-logo">
				<?php
					$mini_logo = isset($greenfresh_options['hminivertical_mini_logo']['url'])?$greenfresh_options['hminivertical_mini_logo']['url']:'';
					
					$mini_logo_height = (isset($greenfresh_options['hminivertical_mini_logo_height'])&&$greenfresh_options['hminivertical_mini_logo_height'])?$greenfresh_options['hminivertical_mini_logo_height']:'24';
					
					greenfresh_logo($mini_logo, $mini_logo_height); 
				?>
			</div>
			<div class="bt-toggle-wrap">
				<div class="bt-menu-toggle">
					<div class="bt-menu-toggle-content"></div>
				</div>
			</div>
			<div class="bt-mini-sidebar">
				<?php
					if(isset($greenfresh_options['hminivertical_content_mini_element'])&&$greenfresh_options['hminivertical_content_mini_element']){
						echo '<div class="bt-menu-content-mini">';
							foreach($greenfresh_options['hminivertical_content_mini_element'] as $sidebar_id){
								dynamic_sidebar( $sidebar_id );
							}
						echo '</div>'; 
					}
				?>
			</div>
		</div>
		
		<div class="bt-header-inner">
			<div class="bt-logo">
				<?php
					$logo = isset($greenfresh_options['hminivertical_logo']['url'])?$greenfresh_options['hminivertical_logo']['url']:'';
					
					$logo_height = (isset($greenfresh_options['hminivertical_logo_height'])&&$greenfresh_options['hminivertical_logo_height'])?$greenfresh_options['hminivertical_logo_height']:'24';
					
					greenfresh_logo($logo, $logo_height); 
				?>
			</div>
			
			<div class="bt-vertical-menu-wrap">
				<?php
					$menu_assign = isset($greenfresh_options['hminivertical_menu_assign'])&&($greenfresh_options['hminivertical_menu_assign'] != 'auto')?$greenfresh_options['hminivertical_menu_assign']:'';
					greenfresh_nav_menu($menu_assign, 'main_navigation', 'bt-menu-list');
				?>
			</div>
			
			<div class="bt-sidebar">
				<?php
					if(isset($greenfresh_options['hminivertical_content_bottom_element'])&&$greenfresh_options['hminivertical_content_bottom_element']){
						echo '<div class="bt-menu-content-bottom">';
							foreach($greenfresh_options['hminivertical_content_bottom_element'] as $sidebar_id){
								dynamic_sidebar( $sidebar_id );
							}
						echo '</div>'; 
					}
				?>
			</div>
			
		</div>
	</div>
	
	<div class="bt-header-mobile">
		<div class="bt-subheader bt-bottom">
			<div class="bt-subheader-inner container">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							$logo_mobile = isset($greenfresh_options['hminivertical_logo_mobile']['url'])?$greenfresh_options['hminivertical_logo_mobile']['url']:'';
							if(isset($page_options['logo_mobile']['url'])&&$page_options['logo_mobile']['url']){
								$logo_mobile = $page_options['logo_mobile']['url'];
							}
							
							$logo_mobile_height = isset($greenfresh_options['hminivertical_logo_mobile_height'])?$greenfresh_options['hminivertical_logo_mobile_height']:'24';
							if(isset($page_options['logo_mobile_height'])&&$page_options['logo_mobile_height']){
								$logo_mobile_height = $page_options['logo_mobile_height'];
							}
							
							greenfresh_logo($logo_mobile, $logo_mobile_height); 
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($greenfresh_options['hminivertical_content_mini_element'])&&$greenfresh_options['hminivertical_content_mini_element']){
								echo '<div class="bt-menu-content-right">';
									foreach($greenfresh_options['hminivertical_content_mini_element'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								echo '</div>';
							}
						?>
						<div class="bt-menu-toggle">
							<div class="bt-menu-toggle-content"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="bt-menu-mobile-wrap">
			<div class="container">
				<?php greenfresh_nav_menu($menu_assign, 'mobile_navigation', 'bt-menu-mobile'); ?>
			</div>
		</div>
	</div>
	
</header>