<?php
class WPBakeryShortCode_bt_team_grid extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'columns' =>  '',
			'space' =>  30,
			'show_pagination' => 0,
			'css_animation' => '',
			'el_id' => '',
			'el_class' => '',
			
			'category' => '',
			'ids' => '',
			'post_ids' => '',
			'posts_per_page' => 10,
			'orderby' => 'none',
			'order' => 'none',
			
			'layout' => 'default',
			'img_size' => '',
			
			'columns_md' => '',
			'columns_sm' => '',
			'columns_xs' => '',
			
			
			'css' => ''
			
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element',
			'bt-team-grid-element',
			$layout,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrapper_attributes = array();
		if ( ! empty( $el_id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		/* Space */
		$item_style = array();
		$item_style[] = 'padding-left: '.($space/2).'px;';
		$item_style[] = 'padding-right: '.($space/2).'px;';
		$item_style[] = 'margin-bottom: '.$space.'px;';
		
		$item_attributes = array();
		if ( ! empty( $item_style ) ) {
			$item_attributes[] = 'style="' . esc_attr( implode(' ', $item_style) ) . '"';
		}
		
		/* Columns */
		$column_class = array();
		$column_class[] = (!empty($columns)) ? $columns: 'col-lg-3';
		if($columns != 'col-lg-12'){
			$column_class[] = (!empty($columns_md)) ? $columns_md : 'col-md-4';
			$column_class[] = (!empty($columns_sm)) ? $columns_sm : 'col-sm-6';
			$column_class[] = (!empty($columns_xs)) ? $columns_xs : 'col-xs-12';
		}
		
		if ( ! empty( $column_class ) ) {
			$item_attributes[] = 'class="' . esc_attr( implode(' ', $column_class) ) . '"';
		}
		
		/* Query */
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'bt_team',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$taxonomy = array();
			foreach ((array) $cats as $cat){
				$taxonomy[] = trim($cat);
			}
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'bt_team_category',
					'field' => 'slug',
					'terms' => $taxonomy
				)
			);
		}
		if (isset($post_ids) && $post_ids != '') {
			$ids = explode(',', $post_ids);
			$p_ids = array();
			foreach ((array) $ids as $id){
				$p_ids[] = trim($id);
			}
			$args['post__in'] = $p_ids;
		}
		$wp_query = new WP_Query($args);
		
		ob_start();
		if ( $wp_query->have_posts() ) {
		?>
			<div class="<?php echo esc_attr(implode(' ', $css_class)); ?>">
				<div class="row">
					<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
						<div <?php echo implode(' ', $item_attributes); ?>>
							<?php require get_template_directory().'/framework/elements/team_layouts/'.$layout.'.php'; ?>
						</div>
					<?php } ?>
				</div>
				<?php if ($show_pagination) greenfresh_paginate_links($wp_query); ?>
			</div>
		<?php
		} else {
			esc_html_e('Post not found!', 'greenfresh');
		}
		wp_reset_query();
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Team Grid', 'greenfresh'),
	'base' => 'bt_team_grid',
	'category' => esc_html__('BT Elements', 'greenfresh'),
	'icon' => 'bt-icon',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns', 'greenfresh'),
			'param_name' => 'columns',
			'value' => array(
				esc_html__('4 Columns', 'greenfresh') => 'col-lg-3',
				esc_html__('3 Columns', 'greenfresh') => 'col-lg-4',
				esc_html__('2 Columns', 'greenfresh') => 'col-lg-6',
				esc_html__('1 Column', 'greenfresh') => 'col-lg-12'
			),
			'description' => esc_html__('Select columns display in this element.', 'greenfresh')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Item Space', 'greenfresh'),
			'param_name' => 'space',
			'value' => 30,
			'description' => esc_html__('Please, enter number space in this element.', 'greenfresh')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Show Pagination', 'greenfresh'),
			'param_name' => 'show_pagination',
			'value' => '',
			'description' => esc_html__('Show or not pagination in this element.', 'greenfresh')
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'greenfresh'),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__('Enter element ID (Note: make sure it is unique and valid).', 'greenfresh')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra Class', 'greenfresh'),
			'param_name' => 'el_class',
			'value' => '',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'greenfresh')
		),
		array (
			'type' => 'bt_taxonomy',
			'taxonomy' => 'bt_team_category',
			'heading' => esc_html__('Categories', 'greenfresh'),
			'param_name' => 'category',
			'group' => esc_html__('Data Setting', 'greenfresh'),
			'description' => esc_html__('Note: By default, all your members will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.', 'greenfresh')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Post IDs', 'greenfresh'),
			'param_name' => 'post_ids',
			'group' => esc_html__('Data Setting', 'greenfresh'),
			'description' => esc_html__('Enter post IDs to be excluded (Note: separate values by commas (,)).', 'greenfresh'),
		),
		array (
			'type' => 'textfield',
			'heading' => esc_html__('Count', 'greenfresh'),
			'param_name' => 'posts_per_page',
			'value' => '10',
			'group' => esc_html__('Data Setting', 'greenfresh'),
			'description' => esc_html__('The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'greenfresh')
		),
		array (
			'type' => 'dropdown',
			'heading' => esc_html__('Order by', 'greenfresh'),
			'param_name' => 'orderby',
			'value' => array (
					esc_html__('None', 'greenfresh') => 'none',
					esc_html__('Title', 'greenfresh') => 'title',
					esc_html__('Date', 'greenfresh') => 'date',
					esc_html__('ID', 'greenfresh') => 'ID'
			),
			'group' => esc_html__('Data Setting', 'greenfresh'),
			'description' => esc_html__('Select order type.', 'greenfresh')
		),
		array (
			'type' => 'dropdown',
			'heading' => esc_html__( 'Order', 'greenfresh' ),
			'param_name' => 'order',
			'value' => Array (
					esc_html__('None', 'greenfresh') => 'none',
					esc_html__('ASC', 'greenfresh') => 'ASC',
					esc_html__('DESC', 'greenfresh') => 'DESC'
			),
			'group' => esc_html__('Data Setting', 'greenfresh'),
			'description' => esc_html__('Select sorting order.', 'greenfresh')
		),
		array(
			'type' => 'bt_layout',
			'folder' => 'team',
			'heading' => esc_html__('Layout', 'greenfresh'),
			'param_name' => 'layout',
			'value' => array(
				esc_html__('Default', 'greenfresh') => 'default',
				esc_html__('Layout 1', 'greenfresh') => 'layout1',
				esc_html__('Layout 2', 'greenfresh') => 'layout2',
				esc_html__('Layout 3', 'greenfresh') => 'layout3',
				esc_html__('Layout 4', 'greenfresh') => 'layout4',
				esc_html__('Layout 5', 'greenfresh') => 'layout5',
                esc_html__('Layout 6', 'greenfresh') => 'layout6',
                esc_html__('Layout 7', 'greenfresh') => 'layout7',
                esc_html__('Layout 8', 'greenfresh') => 'layout8',
			),
			'admin_label' => true,
			'group' => esc_html__('Item Setting', 'greenfresh'),
			'description' => esc_html__('Select layout of items display in this element.', 'greenfresh')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Image size', 'greenfresh'),
			'param_name' => 'img_size',
			'value' => 'thumbnail',
			'group' => esc_html__('Item Setting', 'greenfresh'),
			'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'greenfresh'),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Medium Screen', 'greenfresh'),
			'param_name' => 'columns_md',
			'value' => array(
				esc_html__('Auto', 'greenfresh') => '',
				esc_html__('4 Columns', 'greenfresh') => 'col-md-3',
				esc_html__('3 Columns', 'greenfresh') => 'col-md-4',
				esc_html__('2 Columns', 'greenfresh') => 'col-md-6',
				esc_html__('1 Column', 'greenfresh') => 'col-md-12'
			),
			'group' => esc_html__('Responsive', 'greenfresh'),
			'description' => esc_html__('Select columns display in this element (Screen width >=992px and <1199px).', 'greenfresh')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Small Screen', 'greenfresh'),
			'param_name' => 'columns_sm',
			'value' => array(
				esc_html__('Auto', 'greenfresh') => '',
				esc_html__('4 Columns', 'greenfresh') => 'col-sm-3',
				esc_html__('3 Columns', 'greenfresh') => 'col-sm-4',
				esc_html__('2 Columns', 'greenfresh') => 'col-sm-6',
				esc_html__('1 Column', 'greenfresh') => 'col-sm-12'
			),
			'group' => esc_html__('Responsive', 'greenfresh'),
			'description' => esc_html__('Select columns display in this element (Screen width >=768px and <992px).', 'greenfresh')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Extra Screen', 'greenfresh'),
			'param_name' => 'columns_xs',
			'value' => array(
				esc_html__('Auto', 'greenfresh') => '',
				esc_html__('4 Columns', 'greenfresh') => 'col-xs-3',
				esc_html__('3 Columns', 'greenfresh') => 'col-xs-4',
				esc_html__('2 Columns', 'greenfresh') => 'col-xs-6',
				esc_html__('1 Column', 'greenfresh') => 'col-xs-12'
			),
			'group' => esc_html__('Responsive', 'greenfresh'),
			'description' => esc_html__('Select columns display in this element (Screen <768px).', 'greenfresh')
		),
		
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS box', 'greenfresh'),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'greenfresh'),
		)
	)
));
