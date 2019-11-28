<?php
// General
Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'greenfresh'),
    'id'     => 'bt_general',
    'icon'   => 'el el-adjust-alt',
    'fields' => array(
        array(
            'id'       => 'less_design',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Less Design', 'greenfresh'),
            'subtitle' => esc_html__('Enable less design to generate css over time...', 'greenfresh'),
            'default'  => true,
        ),
        array(
            'id'       => 'site_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Site Layout', 'greenfresh'),
            'subtitle' => esc_html__('Control the site layout.', 'greenfresh'),
            'options'  => array(
                'wide'  => esc_html__('Wide', 'greenfresh'),
                'boxed' => esc_html__('Boxed', 'greenfresh'),
            ),
            'default'  => 'wide'
        ),
        array(
            'id'            => 'site_width',
            'type'          => 'slider',
            'title'         => esc_html__('Site Width', 'greenfresh'),
            'subtitle'      => esc_html__('Control the overall site width.', 'greenfresh'),
            'default'       => 1200,
            'min'           => 1200,
            'step'          => 1,
            'max'           => 1600,
            'display_value' => 'text',
            'required'      => array('site_layout', '=', 'boxed')
        ),
        array(
            'id'                    => 'boxed_bg',
            'type'                  => 'background',
            'title'                 => esc_html__('Boxed Background', 'greenfresh'),
            'subtitle'              => esc_html__('Control the background color of the boxed.', 'greenfresh'),
            'background-repeat'     => false,
            'background-attachment' => false,
            'background-position'   => false,
            'background-image'      => false,
            'background-size'       => false,
            'preview'               => false,
            'default'               => array(
                'background-color' => '#FFFFFF',
            ),
            'required'              => array('site_layout', '=', 'boxed'),
            'output'                => array('.boxed #bt-main')
        ),
        array(
            'id'       => 'boxed_space',
            'type'     => 'spacing',
            'units'    => array('em', 'px', '%'),
            'mode'     => 'margin',
            'right'    => false,
            'left'     => false,
            'title'    => esc_html__('Boxed Space', 'greenfresh'),
            'subtitle' => esc_html__('Control the space top and bottom of boxed.', 'greenfresh'),
            'default'  => array(
                'margin-top'    => '10px',
                'margin-bottom' => '10px'
            ),
            'required' => array('site_layout', '=', 'boxed'),
            'output'   => array('.boxed #bt-main')
        ),
        array(
            'id'       => 'body_bg',
            'type'     => 'background',
            'title'    => esc_html__('Body Background', 'greenfresh'),
            'subtitle' => esc_html__('Control the background of the body.', 'greenfresh'),
            'default'  => array(
                'background-color' => '#F8F8F8',
            ),
            'output'   => array('body'),
        ),
        array(
            'id'            => 'mobile_width',
            'type'          => 'slider',
            'title'         => esc_html__('Mobile Width', 'greenfresh'),
            'subtitle'      => esc_html__('Controls the width to enable mobile.', 'greenfresh'),
            'default'       => 991,
            'min'           => 540,
            'step'          => 1,
            'max'           => 1199,
            'display_value' => 'text'
        ),
        array(
            'id'       => 'particles_effect',
            'type'     => 'switch',
            'title'    => esc_html__('Particles Effect', 'greenfresh'),
            'subtitle' => esc_html__('Use particles effect.', 'greenfresh'),
            'default'  => false,
        ),
        array(
            'id'       => 'sticky_sidebar',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Sidebar', 'greenfresh'),
            'subtitle' => esc_html__('Use sticky sidebar.', 'greenfresh'),
            'default'  => false,
        ),
        array(
            'id'       => 'nice_scroll_bar',
            'type'     => 'switch',
            'title'    => esc_html__('Nice Scroll Bar', 'greenfresh'),
            'subtitle' => esc_html__('Use nice scroll bar.', 'greenfresh'),
            'default'  => false,
        ),
        array(
            'id'       => 'nice_scroll_bar_element',
            'type'     => 'textarea',
            'title'    => esc_html__('Nice Scroll Bar Elements', 'greenfresh'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,...', 'greenfresh'),
            'default'  => 'html, .bt-header-vertical .bt-vertical-menu-wrap',
            'required' => array('nice_scroll_bar', '=', '1')
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => esc_html__('Back To Top', 'greenfresh'),
            'subtitle' => esc_html__('Control button back to top.', 'greenfresh'),
            'default'  => false,
        ),
        array(
            'id'       => 'back_to_top_style',
            'type'     => 'select',
            'title'    => esc_html__('Back To Top Style', 'greenfresh'),
            'subtitle' => esc_html__('Select style button back to top.', 'greenfresh'),
            'options'  => array(
                'square'  => esc_html__('Square', 'greenfresh'),
                'rounded' => esc_html__('Rounded', 'greenfresh'),
                'circle'  => esc_html__('Circle', 'greenfresh')
            ),
            'default'  => 'square',
            'required' => array('back_to_top', '=', '1')
        ),
        array(
            'id'       => 'site_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Site Loading', 'greenfresh'),
            'subtitle' => esc_html__('Control animation before site load complete.', 'greenfresh'),
            'default'  => false,
        ),
        array(
            'id'       => 'site_loading_spinner',
            'type'     => 'select',
            'title'    => esc_html__('Spinner Style', 'greenfresh'),
            'subtitle' => esc_html__('Select style spinner.', 'greenfresh'),
            'options'  => array(
                'spinner0'     => esc_html__('Default', 'greenfresh'),
                'spinner1'     => esc_html__('Style 1', 'greenfresh'),
                'spinner2'     => esc_html__('Style 2', 'greenfresh'),
                'spinner3'     => esc_html__('Style 3', 'greenfresh'),
                'spinner4'     => esc_html__('Style 4', 'greenfresh'),
                'spinner5'     => esc_html__('Style 5', 'greenfresh'),
                'spinner-text' => esc_html__('Style text', 'greenfresh')
            ),
            'default'  => 'spinner0',
            'required' => array('site_loading', '=', '1')
        ),

        array(
            'id'       => 'site_loading_text_welcome',
            'type'     => 'text',
            'title'    => esc_html__('Text welcome', 'greenfresh'),
            'subtitle' => esc_html__('Enter text of site loading.', 'greenfresh'),
            'default'  => 'woohooo!',
            'required' => array('site_loading_spinner', '=', 'spinner-text')
        ),
        array(
            'id'       => 'site_loading_bg',
            'type'     => 'background',
            'title'    => esc_html__('Site Loading Background', 'greenfresh'),
            'subtitle' => esc_html__('Control the background of site loading.', 'greenfresh'),
            'default'  => array(
                'background-color' => '#0ec17f',
            ),
            'required' => array('site_loading', '=', '1'),
            'output'   => array('#site_loading')
        ),
        array(
            'id'       => 'nav_dots_style',
            'type'     => 'image_select',
            'title'    => esc_html__('Nav & Dots Style', 'greenfresh'),
            'subtitle' => esc_html__('Select a navigaiton & dots style for carousel.', 'greenfresh'),
            'options'  => array(
                '0' => array(
                    'alt' => 'Nav & Dots Default',
                    'img' => get_template_directory_uri() . '/assets/images/button/nav-dots-default.jpg'
                ),
                '1' => array(
                    'alt' => 'Nav & Dots Style 1',
                    'img' => get_template_directory_uri() . '/assets/images/button/nav-dots-style1.jpg'
                ),
                '2' => array(
                    'alt' => 'Nav & Dots Style 2',
                    'img' => get_template_directory_uri() . '/assets/images/button/nav-dots-style2.jpg'
                )
            ),
            'default'  => '0'
        ),
        array(
            'id'       => 'pagination_style',
            'type'     => 'image_select',
            'title'    => esc_html__('Pagination Style', 'greenfresh'),
            'subtitle' => esc_html__('Select a pagination style.', 'greenfresh'),
            'options'  => array(
                '0' => array(
                    'alt' => 'Pagination Style default',
                    'img' => get_template_directory_uri() . '/assets/images/button/pagination-default.jpg'
                ),
                '1' => array(
                    'alt' => 'Pagination Style 1',
                    'img' => get_template_directory_uri() . '/assets/images/button/pagination-style1.jpg'
                )
            ),
            'default'  => '0'
        ),
        array(
            'id'       => 'pagination_prev_text',
            'type'     => 'text',
            'title'    => esc_html__('Previous Text', 'greenfresh'),
            'subtitle' => esc_html__('Enter previous text of pagination.', 'greenfresh'),
            'default'  => 'Previous'
        ),
        array(
            'id'       => 'pagination_next_text',
            'type'     => 'text',
            'title'    => esc_html__('Next Text', 'greenfresh'),
            'subtitle' => esc_html__('Enter next text of pagination.', 'greenfresh'),
            'default'  => 'Next'
        ),
    )
));
