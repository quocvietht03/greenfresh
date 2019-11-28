<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'team_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'team-meta' => array(
				'title' => esc_html__('Meta Fields', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'position' => array(
						'type'  => 'text',
						'value' => 'Ceo/Founder',
						'label' => esc_html__('Position', 'greenfresh'),
						'desc'  => esc_html__('Please, enter position of member.', 'greenfresh'),
					),
					'email' => array(
						'type'  => 'text',
						'value' => 'bearsthemes@gmail.com',
						'label' => esc_html__('Email', 'greenfresh'),
						'desc'  => esc_html__('Please, enter email of member.', 'greenfresh'),
					),
					'phone' => array(
						'type'  => 'text',
						'value' => '(1200)-0989-568-331',
						'label' => esc_html__('Phone', 'greenfresh'),
						'desc'  => esc_html__('Please, enter phone number of member.', 'greenfresh'),
					),
					
				),
			),
			'team-social' => array(
				'title' => esc_html__('Social', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'social' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'title' => 'Facebook',
								'icon' => 'fa fa-facebook',
								'link' => '#'
							),
							array(
								'title' => 'Twitter',
								'icon' => 'fa fa-twitter',
								'link' => '#'
							),
							array(
								'title' => 'Google Plus',
								'icon' => 'fa fa-google-plus',
								'link' => '#'
							)
						),
						'label' => esc_html__('Social', 'greenfresh'),
						'desc'  => esc_html__('Please configs social of member', 'greenfresh'),
						'popup-options' => array(
							'title' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Title', 'greenfresh'),
								'desc'  => esc_html__('Please, enter title of social item.', 'greenfresh'),
							),
							'icon' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Icon', 'greenfresh'),
								'desc'  => esc_html__('Please, enter icon of social item.', 'greenfresh'),
							),
							'link' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Url(Link)', 'greenfresh'),
								'desc'  => esc_html__('Please, enter link of social item.', 'greenfresh'),
							)
						),
						'template' => '{{- title }}',
						'add-button-text' => esc_html__('Add', 'greenfresh'),
						'sortable' => true,
					)
					
				),
			),
			
		)
	)
	
);