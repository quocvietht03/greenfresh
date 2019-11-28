<?php
//vc_section
vc_add_params( 'vc_section', array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Particles Effect', 'greenfresh'),
		'param_name' => 'particles_effect',
		'value' => array(
			esc_html__('None', 'greenfresh') => 'none',
			esc_html__('Default', 'greenfresh') => 'default',
			esc_html__('Nasa', 'greenfresh') => 'nasa',
			esc_html__('Bubble', 'greenfresh') => 'bubble',
			esc_html__('Snow', 'greenfresh') => 'snow',
			esc_html__('Nyan', 'greenfresh') => 'nyan',
			esc_html__('Custom', 'greenfresh') => 'custom'
		),
		'group' => esc_html__('Particles', 'greenfresh'),
		'description' => esc_html__('Select particles effect in this section.', 'greenfresh')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Particles Json', 'greenfresh'),
		'param_name' => 'particles_json',
		'value' => '',
		'group' => esc_html__('Particles', 'greenfresh'),
		'dependency' => array(
			'element'=>'particles_effect',
			'value'=> 'custom'
		),
		'description' => esc_html__('Enter text json config particles effect.', 'greenfresh')
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Disable Background Image', 'greenfresh'),
		'param_name' => 'disable_bg_image',
		'value' => array(
			esc_html__('None', 'greenfresh') => 'none',
			esc_html__('Screen less than 1200', 'greenfresh') => 'md',
			esc_html__('Screen less than 992', 'greenfresh') => 'sm',
			esc_html__('Screen less than 768', 'greenfresh') => 'xs'
		),
		'group' => esc_html__('Design Options', 'greenfresh'),
		'description' => esc_html__('Disable background image in this section.', 'greenfresh')
	),
) );

//vc_row
vc_add_params( 'vc_row', array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Row Style', 'greenfresh'),
		'param_name' => 'row_container',
		'value' => array(
			esc_html__('Full Width', 'greenfresh') => 'fullwidth',
			esc_html__('Container', 'greenfresh') => 'container'
		),
		'weight' => 1,
		'description' => esc_html__('Select row style.', 'greenfresh')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Content Max Width', 'greenfresh'),
		'param_name' => 'row_content_max_width',
		'value' => '',
		'weight' => 1,
		'dependency' => array(
			'element'=>'row_container',
			'value'=> 'fullwidth'
		),
		'description' => esc_html__('Enter number with px to set content max with. Ex: 1240px', 'greenfresh')
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_html__('Columns no gap', 'greenfresh'),
		'param_name' => 'columns_no_gap',
		'value' => '',
		'weight' => 1,
		'description' => esc_html__('Enable no gap between columns in row.', 'greenfresh')
	),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Delay', 'greenfresh'),
        'param_name' => 'animate_delay',
        'value' => '0.3',
		'group' => esc_html__('Animation', 'greenfresh'),
        'description' => esc_html__('Animate delay (s). Example: 0.5', 'greenfresh')
    ),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Duration', 'greenfresh'),
        'param_name' => 'animate_duration',
        'value' => '1.2',
		'group' => esc_html__('Animation', 'greenfresh'),
        'description' => esc_html__('Animate duration (s). Example: 0.6', 'greenfresh')
    ),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Particles Effect', 'greenfresh'),
		'param_name' => 'particles_effect',
		'value' => array(
			esc_html__('None', 'greenfresh') => 'none',
			esc_html__('Default', 'greenfresh') => 'default',
			esc_html__('Nasa', 'greenfresh') => 'nasa',
			esc_html__('Bubble', 'greenfresh') => 'bubble',
			esc_html__('Snow', 'greenfresh') => 'snow',
			esc_html__('Nyan', 'greenfresh') => 'nyan',
			esc_html__('Custom', 'greenfresh') => 'custom'
		),
		'group' => esc_html__('Particles', 'greenfresh'),
		'description' => esc_html__('Enable particles effect in this section.', 'greenfresh')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Particles Json', 'greenfresh'),
		'param_name' => 'particles_json',
		'value' => '',
		'group' => esc_html__('Particles', 'greenfresh'),
		'dependency' => array(
			'element'=>'particles_effect',
			'value'=> 'custom'
		),
		'description' => esc_html__('Enter text json config particles effect.', 'greenfresh')
	)
) );

vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "gap" );

//vc_column
vc_add_params( 'vc_column', array(
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Delay', 'greenfresh'),
        'param_name' => 'animate_delay',
        'value' => '0.3',
		'group' => esc_html__('Animation', 'greenfresh'),
        'description' => esc_html__('Animate delay (s). Example: 0.5', 'greenfresh')
    ),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Duration', 'greenfresh'),
        'param_name' => 'animate_duration',
        'value' => '1.2',
		'group' => esc_html__('Animation', 'greenfresh'),
        'description' => esc_html__('Animate duration (s). Example: 0.6', 'greenfresh')
    )
) );

//vc_custom_heading
vc_add_param( 'vc_custom_heading', array(
    'type' => 'textarea',
    'heading' => esc_html__('Custom Style', 'greenfresh'),
    'param_name' => 'custom_style',
    'value' => '',
    'description' => esc_html__('Enter custom style for heading element', 'greenfresh'),
	'group' => esc_html__('Extra Options', 'greenfresh')
) );

// vc_hoverbox
vc_add_param( 'vc_hoverbox', array(
    'type' => 'textfield',
    'heading' => esc_html__('Oder Number', 'greenfresh'),
    'param_name' => 'oder_number',
    'value' => '',
	'weight' => 1,
    'description' => esc_html__('Enter oder number.', 'greenfresh')
) );
