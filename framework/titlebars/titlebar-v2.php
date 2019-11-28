<?php
	global $greenfresh_options;
	$fullwidth = isset($greenfresh_options['titlebar_fullwidth'])&&$greenfresh_options['titlebar_fullwidth'] ? 'fullwidth': 'container';
?>
<div class="bt-titlebar bt-titlebar-v2">
	<div class="bt-titlebar-inner">
		<div class="bt-overlay"></div>
		<div class="bt-subheader">
			<div class="bt-subheader-inner <?php echo esc_attr($fullwidth); ?>">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<div class="bt-page-title">
							<?php
								if(isset($greenfresh_options['titlebar_page_title_before'])&&$greenfresh_options['titlebar_page_title_before']&&isset($greenfresh_options['titlebar_page_title_before_content'])&&$greenfresh_options['titlebar_page_title_before_content']){
									echo '<div class="bt-before">'.$greenfresh_options['titlebar_page_title_before_content'].'</div>';
								}
							?>
							<h2><?php echo greenfresh_page_title(); ?></h2>
							<?php
								if(isset($greenfresh_options['titlebar_page_title_after'])&&$greenfresh_options['titlebar_page_title_after']&&isset($greenfresh_options['titlebar_page_title_after_content'])&&$greenfresh_options['titlebar_page_title_after_content']){
									echo '<div class="bt-after">'.$greenfresh_options['titlebar_page_title_after_content'].'</div>';
								}
							?>
						</div>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<div class="bt-breadcrumb">
							<?php
								if(isset($greenfresh_options['titlebar_breadcrumb_before'])&&$greenfresh_options['titlebar_breadcrumb_before']&&isset($greenfresh_options['titlebar_breadcrumb_before_content'])&&$greenfresh_options['titlebar_breadcrumb_before_content']){
									echo '<div class="bt-before">'.$greenfresh_options['titlebar_breadcrumb_before_content'].'</div>';
								}
							?>
							<div class="bt-path">
								<?php
									$home_text = (isset($greenfresh_options['titlebar_breadcrumb_home_text'])&&$greenfresh_options['titlebar_breadcrumb_home_text'])?$greenfresh_options['titlebar_breadcrumb_home_text']: 'Home';
									$delimiter = (isset($greenfresh_options['titlebar_breadcrumb_delimiter'])&&$greenfresh_options['titlebar_breadcrumb_delimiter'])?$greenfresh_options['titlebar_breadcrumb_delimiter']: '-';
									
									echo greenfresh_page_breadcrumb($home_text, $delimiter);
								?>
							</div>
							<?php
								if(isset($greenfresh_options['titlebar_breadcrumb_after'])&&$greenfresh_options['titlebar_breadcrumb_after']&&isset($greenfresh_options['titlebar_breadcrumb_after_content'])&&$greenfresh_options['titlebar_breadcrumb_after_content']){
									echo '<div class="bt-after">'.$greenfresh_options['titlebar_breadcrumb_after_content'].'</div>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>