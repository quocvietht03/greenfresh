<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'menu_mega_column_width' => array(
		'label' => esc_html__('Column Width', 'greenfresh'),
		'desc' => esc_html__('Please enter number with px or % for column width (default: 210px)', 'greenfresh'),
		'type' => 'short-text',
		'value' => '250px'
	),
	'menu_mega_column_padding' => array(
		'label' => esc_html__('Padding', 'greenfresh'),
		'desc' => esc_html__('Please enter number with px or % for column padding (default: 0px 10px)', 'greenfresh'),
		'type' => 'short-text',
		'value' => '0px 10px'
	),
);