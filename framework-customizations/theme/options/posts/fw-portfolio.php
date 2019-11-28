<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'portfolio-layout' => array(
				'title' => esc_html__('Layout Settings', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'titlebar_background' => array(
						'label' => esc_html__( 'Title Bar Background', 'greenfresh' ),
						'desc'  => esc_html__( 'Upload title bar background image.', 'greenfresh' ),
						'type'  => 'upload',
					),
					'layout' => array(
						'type'  => 'select',
						'value' => 'default',
						'label' => esc_html__('Layout', 'greenfresh'),
						'desc'  => esc_html__('Select a layout of project', 'greenfresh'),
						'choices' => array(
							'default' => esc_html__('Default(Image Left)', 'greenfresh'),
							'layout1' => esc_html__('Layout 1(Image Top)', 'greenfresh'),
							'layout2' => esc_html__('Layout 2(Image Bottom)', 'greenfresh')
						)
					),
					'gallery-column' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Select Gallery Columns', 'greenfresh'),
						'desc'  => esc_html__('Select gallery columns of project', 'greenfresh'),
						'choices' => array(
							'col-md-12' => esc_html__('1 Column', 'greenfresh'),
							'col-md-6' => esc_html__('2 Columns', 'greenfresh'),
							'col-md-4' => esc_html__('3 Columns', 'greenfresh'),
							'col-md-3' => esc_html__('4 Columns', 'greenfresh')
						)
					),
					'gallery-space' => array(
						'type'  => 'short-text',
						'value' => '30',
						'label' => esc_html__('Gallery Space', 'greenfresh'),
						'desc'  => esc_html__('Please, enter gallery space of project.', 'greenfresh'),
					),
				),
			),
			'portfolio-meta' => array(
				'title' => esc_html__('Meta Fields', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'infor-title' =>  array( 
						'type' => 'text',
						'value' => 'Infomation',
						'label' => esc_html__('Info Title', 'greenfresh'),
						'desc'  => esc_html__('Please, enter info title of project.', 'greenfresh'),
					),
					'info-option' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'title' => 'Client:',
								'value' => 'Bearsthemes'
							),
							array(
								'title' => 'Date:',
								'value' => 'May 14, 2018'
							),
							array(
								'title' => 'Tags:',
								'value' => 'photography, agency, creative'
							),
							array(
								'title' => 'Project Type:',
								'value' => 'Multipurpose Template'
							)
						),
						'label' => esc_html__('Info Option', 'greenfresh'),
						'desc'  => esc_html__('Please configs info option of project', 'greenfresh'),
						'popup-options' => array(
							'title' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Title', 'greenfresh'),
								'desc'  => esc_html__('Please, enter title of project item.', 'greenfresh'),
							),
							'value' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Value', 'greenfresh'),
								'desc'  => esc_html__('Please, enter value of project item.', 'greenfresh'),
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