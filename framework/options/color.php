<?php
// Colors
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Colors', 'greenfresh' ),
	'id'               => 'bt_colors',
	'icon'             => 'el el-tint',
	'fields'           => array(
		array(
			'id'       => 'main_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Main Color', 'greenfresh' ),
			'subtitle' => esc_html__( 'Control the main highlight color throughout the theme. Class apply: bt-main-color', 'greenfresh' ),
			'default'  => '#0ec17f',
			'output'   => array('.bt-main-color')
		),
		array(
			'id'       => 'secondary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary Color', 'greenfresh' ),
			'subtitle' => esc_html__( 'Control the secondary highlight color throughout the theme. Class apply: bt-secondary-color', 'greenfresh' ),
			'default'  => '#1ab7ea',
			'output'   => array('.bt-secondary-color')
		),
		array(
			'id'       => 'body_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Body Color', 'greenfresh' ),
			'subtitle' => esc_html__( 'Controls the color of all text body.', 'greenfresh' ),
			'active'    => false,
			'default'  => '#555555',
			'output'   => array('body')
		),
		array(
			'id'       => 'heading_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Heading Color', 'greenfresh' ),
			'subtitle' => esc_html__( 'Controls the color of all heading.', 'greenfresh' ),
			'active'    => false,
			'default'  => '#333333',
			'output'   => array('h1, h2, h3, h4, h5, h6')
		),
		array(
			'id'       => 'link_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Link Color', 'greenfresh' ),
			'subtitle' => esc_html__( 'Controls the color of all text links.', 'greenfresh' ),
			'active'    => false,
			'default'  => '#555555',
			'output'   => array('a')
		),
		
	)
) );
