<?php
// Icons
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Font Icons', 'greenfresh' ),
	'id'               => 'bt_fonticons',
	'icon'             => 'el el-info-circle',
	'fields'           => array(
		array(
			'id'       => 'font_awesome',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Awesome', 'greenfresh' ),
			'subtitle' => esc_html__( 'Use font awesome.', 'greenfresh' ),
			'default'  => true,
		),
		array(
			'id'       => 'font_pe_icon_7_stroke',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Pe Icon 7 Stroke', 'greenfresh' ),
			'subtitle' => esc_html__( 'Use font pe icon 7 stroke.', 'greenfresh' ),
			'default'  => false,
		),
		array(
			'id'       => 'flaticon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Flaticon', 'greenfresh' ),
			'subtitle' => esc_html__( 'Use font flaticon.', 'greenfresh' ),
			'default'  => false,
		),
		array(
			'id'       => 'elegant_icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Elegant', 'greenfresh' ),
			'subtitle' => esc_html__( 'Use font Elegant.', 'greenfresh' ),
			'default'  => false,
		),
		array(
			'id'       => 'themify_icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Themify ', 'greenfresh' ),
			'subtitle' => esc_html__( 'Use font themify.', 'greenfresh' ),
			'default'  => false,
		),
	)
) );
