<?php if (!defined('FW')) die('Forbidden');

$menu_slug_opt = array();
$menus_obj = get_terms('nav_menu', array('hide_empty' => true));
$menu_slug_opt['auto'] = 'Auto';
foreach ($menus_obj as $menu_obj) {
    $menu_slug_opt[$menu_obj->slug] = $menu_obj->name;
}

$options = array(
    'page_options' => array(
        'type'          => 'multi',
        'label'         => false,
        'inner-options' => array(
            'page_general_setting'  => array(
                'title'   => esc_html__('General', 'greenfresh'),
                'type'    => 'tab',
                'options' => array(
                    'page_titlebar' => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Title Bar', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable title bar in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),

                    'custom_sidebar' => array(
                        'type'    => 'multi-picker',
                        'label'   => false,
                        'desc'    => false,
                        'picker'  => array(
                            'gadget' => array(
                                'type'         => 'switch',
                                'value'        => 'off',
                                'label'        => __('Custom Sidebar', 'greenfresh'),
                                'desc'         => __('Enable custom sidebar setting.
                                                    This option will override options widget sidebar.', 'greenfresh'),
                                'left-choice'  => array(
                                    'value' => 'off',
                                    'label' => __('Off', 'greenfresh'),
                                ),
                                'right-choice' => array(
                                    'value' => 'on',
                                    'label' => __('On', 'greenfresh'),
                                ),
                            )
                        ),
                        'choices' => array(
                            'on' => array(
                                'sidebar-position-picker' => array(
                                    'type'    => 'multi-picker',
                                    'label'   => false,
                                    'desc'    => false,
                                    'value'   => array(
                                        'gadget' => 'right',
                                    ),
                                    'picker'  => array(
                                        'gadget' => array(
                                            'type'    => 'select',
                                            'value'   => 'right',
                                            'label'   => __('Sidebar Layout', 'greenfresh'),
                                            'choices' => array(
                                                'right'      => __('Right Sidebar', 'greenfresh'),
                                                'left'       => __('Left Sidebar', 'greenfresh'),
                                                'left_right' => __('Left & Right Sidebar', 'greenfresh'),
                                                'no-sidebar' => __('No Sidebar', 'greenfresh'),
                                            ),
                                        )
                                    ),
                                    'choices' => array(
                                        'right'      => array(
                                            'right_sidebar' => array(
                                                'type'    => 'select',
                                                'label'   => __('Sidebar Right Show', 'greenfresh'),
                                                'choices' => greenfresh_get_all_sidebars(),
                                            )
                                        ),
                                        'left'       => array(
                                            'left_sidebar' => array(
                                                'type'    => 'select',
                                                'label'   => __('Sidebar Left Show', 'greenfresh'),
                                                'choices' => greenfresh_get_all_sidebars(),
                                            ),
                                        ),
                                        'left_right' => array(
                                            'two_sidebar' => array(
                                                'type'    => 'group',
                                                'options' => array(
                                                    'left_sidebar'  => array(
                                                        'type'    => 'select',
                                                        'label'   => __('Sidebar Left Show', 'greenfresh'),
                                                        'choices' => greenfresh_get_all_sidebars(),
                                                    ),
                                                    'right_sidebar' => array(
                                                        'type'    => 'select',
                                                        'label'   => __('Sidebar Right Show', 'greenfresh'),
                                                        'choices' => greenfresh_get_all_sidebars(),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                                'sidebar-sticky'          => array(
                                    'type'         => 'switch',
                                    'label'        => __('Sidebar Sticky', 'greenfresh'),
                                    'value'        => 'off',
                                    'left-choice'  => array(
                                        'value' => 'off',
                                        'label' => __('Off', 'greenfresh'),
                                    ),
                                    'right-choice' => array(
                                        'value' => 'on',
                                        'label' => __('On', 'greenfresh'),
                                    ),
                                )
                            ),
                        ),
                    ),

                    'custom_page_class' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__('Custom Page Class', 'greenfresh'),
                    ),
                ),
            ),
            'page_header_setting'   => array(
                'title'   => esc_html__('Header', 'greenfresh'),
                'type'    => 'tab',
                'options' => array(
                    'header_layout'            => array(
                        'type'    => 'short-select',
                        'value'   => 'default',
                        'label'   => esc_html__('Header Layout', 'greenfresh'),
                        'desc'    => esc_html__('Select a header layout in current page', 'greenfresh'),
                        'choices' => array(
                            'default'       => esc_html__('Default', 'greenfresh'),
                            '1'             => esc_html__('Header 1', 'greenfresh'),
                            'extra_1'       => esc_html__('Header 1 extra 1', 'greenfresh'),
                            'extra_2'       => esc_html__('Header 1 extra 2', 'greenfresh'),
                            'extra_3'       => esc_html__('Header 1 extra 3', 'greenfresh'),
                            '2'             => esc_html__('Header 2', 'greenfresh'),
                            '3'             => esc_html__('Header 3', 'greenfresh'),
                            '4'             => esc_html__('Header 4', 'greenfresh'),
                            'onepage'       => esc_html__('Header One Page', 'greenfresh'),
                            'onepagescroll' => esc_html__('Header One Page Scroll', 'greenfresh'),
                            'vertical'      => esc_html__('Header Vertical', 'greenfresh'),
                            'minivertical'  => esc_html__('Header Mini Vertical', 'greenfresh')
                        )
                    ),
                    'header_fullwidth'         => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Full Width (100%)', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable header full width (100%) in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'header_absolute'          => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Header Absolute', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable header absolute in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'header_top'               => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Header Top', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable header top in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'header_logo'              => array(
                        'type'  => 'upload',
                        'value' => array(
                            'url' => ''
                        ),
                        'label' => esc_html__('Logo', 'greenfresh'),
                        'desc'  => esc_html__('Select image to change the logo in current page.', 'greenfresh'),
                    ),
                    'header_logo_height'       => array(
                        'type'  => 'short-text',
                        'value' => '',
                        'label' => esc_html__('Logo Height', 'greenfresh'),
                        'desc'  => esc_html__('Controls the height of the logo in current page. EX: 50', 'greenfresh')
                    ),
                    'header_menu_assign'       => array(
                        'type'    => 'select',
                        'value'   => 'default',
                        'label'   => esc_html__('Menu Assign', 'greenfresh'),
                        'desc'    => esc_html__('Select a menu assign of header layout in current page', 'greenfresh'),
                        'choices' => $menu_slug_opt
                    ),
                    'header_stick'             => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Header Sticky', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable header stick in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'header_logo_stick'        => array(
                        'type'  => 'upload',
                        'value' => array(
                            'url' => ''
                        ),
                        'label' => esc_html__('Logo Stick', 'greenfresh'),
                        'desc'  => esc_html__('Select image to change the logo stick in current page.', 'greenfresh'),
                    ),
                    'header_logo_stick_height' => array(
                        'type'  => 'short-text',
                        'value' => '',
                        'label' => esc_html__('Logo Height', 'greenfresh'),
                        'desc'  => esc_html__('Controls the height of the logo stick in current page. EX: 40', 'greenfresh')
                    ),
                    'mobile_header_top'        => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Header Top Mobile', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable header top mobile in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'logo_mobile'              => array(
                        'type'  => 'upload',
                        'value' => array(
                            'url' => ''
                        ),
                        'label' => esc_html__('Logo Mobile', 'greenfresh'),
                        'desc'  => esc_html__('Select image to change the logo mobile in current page.', 'greenfresh'),
                    ),
                    'logo_mobile_height'       => array(
                        'type'  => 'short-text',
                        'value' => '',
                        'label' => esc_html__('Logo Height', 'greenfresh'),
                        'desc'  => esc_html__('Controls the height of the logo mobile in current page. EX: 30', 'greenfresh')
                    ),

                ),
            ),
            'page_titlebar_setting' => array(
                'title'   => esc_html__('Title Bar', 'greenfresh'),
                'type'    => 'tab',
                'options' => array(
                    'titlebar_layout'          => array(
                        'type'    => 'short-select',
                        'value'   => 'default',
                        'label'   => esc_html__('Title Bar Layout', 'greenfresh'),
                        'desc'    => esc_html__('Select a title bar layout in current page', 'greenfresh'),
                        'choices' => array(
                            'default' => esc_html__('Default', 'greenfresh'),
                            '1'       => esc_html__('Title Bar 1', 'greenfresh'),
                            '2'       => esc_html__('Title Bar 2', 'greenfresh')
                        )
                    ),
                    'page_titlebar_space'      => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Title Bar Space', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable space between title bar and content in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'page_titlebar_background' => array(
                        'type'  => 'upload',
                        'value' => array(
                            'url' => ''
                        ),
                        'label' => esc_html__('Title Bar Background', 'greenfresh'),
                        'desc'  => esc_html__('Select image to change the title bar background in current page.', 'greenfresh'),
                    ),
                ),
            ),
            'page_footer_setting'   => array(
                'title'   => esc_html__('Footer', 'greenfresh'),
                'type'    => 'tab',
                'options' => array(
                    'footer_layout'     => array(
                        'type'    => 'short-select',
                        'value'   => 'default',
                        'label'   => esc_html__('Footer Layout', 'greenfresh'),
                        'desc'    => esc_html__('Select a footer layout in current page', 'greenfresh'),
                        'choices' => array(
                            'default' => esc_html__('Default', 'greenfresh'),
                            '1'       => esc_html__('Footer 1', 'greenfresh'),
                            '2'       => esc_html__('Footer 2', 'greenfresh')
                        )
                    ),
                    'page_footer_space' => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Footer Space', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable space between footer and content in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'footer_fixed'      => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Fixed', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable footer fixed in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'footer_fullwidth'  => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Full Width (100%)', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable footer full width (100%) in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                    'footer_top'        => array(
                        'type'         => 'switch',
                        'label'        => esc_html__('Disable Footer Top', 'greenfresh'),
                        'desc'         => esc_html__('Turn on to disable footer top in current page.', 'greenfresh'),
                        'value'        => '',
                        'left-choice'  => array(
                            'value' => '',
                            'label' => esc_html__('Off', 'greenfresh'),
                        ),
                        'right-choice' => array(
                            'value' => '1',
                            'label' => esc_html__('On', 'greenfresh'),
                        ),
                    ),
                ),
            ),
        ),
    ),
);