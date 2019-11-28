<?php

class greenfresh_Widget_Mini_Search extends greenfresh_Widget {

    function __construct(){
        parent::__construct(
            'bt_widget_mini_search', // Base ID
            esc_html__('Mini Search', 'greenfresh'), // Name
            array('description' => esc_html__('Display the mini search in the menu right sidebar.', 'greenfresh'),) // Args
        );

        $this->settings = array(
            'type'     => array(
                'type'    => 'select',
                'std'     => 'mini',
                'label'   => esc_html__('Type', 'greenfresh'),
                'options' => array(
                    'mini'   => esc_html__('Mini', 'greenfresh'),
                    'inline' => esc_html__('Inline', 'greenfresh'),
                    'popup'  => esc_html__('Popup', 'greenfresh')
                )
            ),
            'el_class' => array(
                'type'  => 'text',
                'std'   => '',
                'label' => esc_html__('Extra Class', 'greenfresh')
            )
        );
    }

    function widget($args, $instance){
        extract($args);
        $type = sanitize_title($instance['type']);
        $el_class = sanitize_title($instance['el_class']);

        $wg_class = 'widget bt-mini-search ' . $type;

        if (!empty($instance['el_class'])) {
            $wg_class .= ' ' . $instance['el_class'];
        }

        ob_start();
        ?>
        <div class="<?php echo esc_attr($wg_class); ?>">
            <?php if ($type == 'inline') {
                echo '<div class="bt-search-form-inline">' . get_search_form(false) . '</div>';
            } else {
                echo '<a class="bt-toggle-btn" href="#"><i class="fa fa-search"></i></a>';
                if ($type == 'mini') echo '<div class="bt-search-form">' . get_search_form(false) . '</div>';
            } ?>
        </div>

        <?php
        echo ob_get_clean();
    }
}

/**
 * Class greenfresh_Widget_Mini_Search
 */
function register_greenfresh_widget_mini_search(){
    register_widget('greenfresh_Widget_Mini_Search');
}

add_action('widgets_init', 'register_greenfresh_widget_mini_search');
