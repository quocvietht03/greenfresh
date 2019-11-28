<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'services_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'services-meta' => array(
				'title' => esc_html__('Meta Fields', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'icon_font' => array( 
						'type' => 'text',
						'value' => 'fa fa-codepen',
						'label' => esc_html__('Icon Font', 'greenfresh'),
						'desc'  => esc_html__('Please, enter icon font of service post.', 'greenfresh'),
					),
					'icon_image' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Icon Image', 'greenfresh'),
						'desc'  => esc_html__('Select icon image of service post.', 'greenfresh'),
					),
					'info_option' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'option' => 'Your option description 1'
							),
							array(
								'option' => 'Your option description 2'
							),
							array(
								'option' => 'Your option description 3'
							),
							array(
								'option' => 'Your option description 4'
							)
						),
						'label' => esc_html__('Info Option', 'greenfresh'),
						'desc'  => esc_html__('Please configs info option of service post', 'greenfresh'),
						'popup-options' => array(
							'option' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Value', 'greenfresh'),
								'desc'  => esc_html__('Please, enter value of project item.', 'greenfresh'),
							)
						),
						'template' => '{{- option }}',
						'add-button-text' => esc_html__('Add', 'greenfresh'),
						'sortable' => true,
					),
				),
			),
			
		)
	)
	
);
