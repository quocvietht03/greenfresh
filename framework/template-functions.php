<?php
if (!isset($content_width)) $content_width = 900;
if (is_singular()) wp_enqueue_script("comment-reply");

if (!function_exists('greenfresh_setup')) {
    function greenfresh_setup(){
        /* Load textdomain */
        load_theme_textdomain('greenfresh', get_template_directory() . '/languages');

        /* Add custom header */
        add_theme_support('custom-header');

        /* Add RSS feed links to <head> for posts and comments. */
        add_theme_support('automatic-feed-links');

        /* Enable support for Post Thumbnails, and declare sizes. */
        add_theme_support('post-thumbnails');

        /* Enable support for Title Tag */
        add_theme_support("title-tag");

        /* This theme uses wp_nav_menu() in locations. */
        register_nav_menus(array(
            'main_navigation'   => esc_html__('Main Navigation', 'greenfresh'),
            'mobile_navigation' => esc_html__('Mobile Navigation', 'greenfresh'),
        ));

        /* This theme styles the visual editor to resemble the theme style, specifically font, colors, icons, and column width. */
        add_editor_style('editor-style.css');

        /* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /* Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats */
        add_theme_support('post-formats', array(
            'video', 'audio', 'quote', 'link', 'gallery',
        ));

        /* This theme allows users to set a custom background. */
        add_theme_support('custom-background', apply_filters('greenfresh_custom_background_args', array(
            'default-color' => 'f5f5f5',
        )));

        /* Add support for featured content. */
        add_theme_support('featured-content', array(
            'featured_content_filter' => 'greenfresh_get_featured_posts',
            'max_posts'               => 6,
        ));

        /* This theme uses its own gallery styles. */
        add_filter('use_default_gallery_style', '__return_false');

        /* Add support for portfolio. */
        add_post_type_support('fw-portfolio', array('excerpt'));

        /* Add support woocommerce */
        add_theme_support('woocommerce');
    }
}
add_action('after_setup_theme', 'greenfresh_setup');

/* Custom Site Title */
if (!function_exists('greenfresh_wp_title')) {
    function greenfresh_wp_title($title, $sep){
        global $paged, $page;
        if (is_feed()) {
            return $title;
        }
        // Add the site name.
        $title .= get_bloginfo('name');
        // Add the site description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title = "$title $sep $site_description";
        }
        // Add a page number if necessary.
        if ($paged >= 2 || $page >= 2) {
            $title = sprintf(esc_html__('Page %s', 'greenfresh'), max($paged, $page)) . " $sep $title";
        }
        return $title;
    }

    add_filter('wp_title', 'greenfresh_wp_title', 10, 2);
}

/* Filter body class */
if (!function_exists('greenfresh_body_classes')) {
    function greenfresh_body_classes($classes){
        global $greenfresh_options;
        $page_options = function_exists("fw_get_db_post_option") ? fw_get_db_post_option(get_the_ID(), 'page_options') : array();
        $sticky_option = (isset($greenfresh_options["sticky_sidebar"]) && $greenfresh_options["sticky_sidebar"]);
        $custom_sidebar = (isset($page_options['custom_sidebar']) && $page_options['custom_sidebar']) ? $page_options['custom_sidebar'] : array();

        $custom_sidebar_value = function_exists("fw_akg") ? fw_akg('gadget', $custom_sidebar): array();
		$p_sidebar_sticky = function_exists("fw_akg") ? fw_akg($custom_sidebar_value . '/sidebar-sticky', $custom_sidebar): 'off';
		
        if ($p_sidebar_sticky == "on") {
            $classes[] = 'is-sticky-sidebar';
        } elseif (($p_sidebar_sticky == "off" && $sticky_option) || ($p_sidebar_sticky == "off" && !$sticky_option)) {
        } elseif ($p_sidebar_sticky == null) {
            $classes[] = $sticky_option ? 'is-sticky-sidebar' : '';
        }

        $classes[] = (isset($greenfresh_options["site_layout"]) && $greenfresh_options["site_layout"]) ? $greenfresh_options["site_layout"] : 'wide';

        $header_layout = (isset($greenfresh_options["header_layout"]) && $greenfresh_options["header_layout"]) ? $greenfresh_options["header_layout"] : '1';
        $page_header_layout = (isset($page_options['header_layout']) && $page_options['header_layout']) ? $page_options['header_layout'] : 'default';

        $page_custom_class = (isset($page_options["custom_page_class"]) && $page_options["custom_page_class"]) ? $page_options["custom_page_class"] : '';
        $classes[] = $page_custom_class;
        $classes[] = $page_header_layout == 'default' ? 'header-' . $header_layout : 'header-' . $page_header_layout;

        return $classes;
    }

    add_filter('body_class', 'greenfresh_body_classes');
}

/* Header */
function greenfresh_header(){
    global $greenfresh_options;
    $page_options = function_exists("fw_get_db_post_option") ? fw_get_db_post_option(get_the_ID(), 'page_options') : array();

    $header_layout = isset($greenfresh_options["header_layout"]) ? $greenfresh_options["header_layout"] : '-1';
    $page_header_layout = (isset($page_options['header_layout']) && $page_options['header_layout']) ? $page_options['header_layout'] : 'default';
    if (is_search() || is_404()) {
        $page_header_layout = 'default';
    }
    $header_layout = $page_header_layout == 'default' ? $header_layout : $page_header_layout;

    switch ($header_layout) {
        case '1':
            get_template_part('framework/headers/header', 'v1');
            break;
        case 'extra_1':
            get_template_part('framework/headers/header', 'v1-extra-1');
            break;
        case 'extra_2':
            get_template_part('framework/headers/header', 'v1-extra-2');
            break;
        case 'extra_3':
            get_template_part('framework/headers/header', 'v1-extra-3');
            break;
        case '2':
            get_template_part('framework/headers/header', 'v2');
            break;
        case '3':
            get_template_part('framework/headers/header', 'v3');
            break;
        case '4':
            get_template_part('framework/headers/header', 'v4');
            break;
        case 'onepage':
            get_template_part('framework/headers/header', 'onepage');
            break;
        case 'onepagescroll':
            get_template_part('framework/headers/header', 'onepagescroll');
            break;
        case 'vertical':
            get_template_part('framework/headers/header', 'vertical');
            break;
        case 'minivertical':
            get_template_part('framework/headers/header', 'minivertical');
            break;
        default :
            get_template_part('framework/headers/header', 'default');
            break;
    }
}

/* Title Bar */
if (!function_exists('greenfresh_titlebar')) {
    function greenfresh_titlebar(){
        global $greenfresh_options;
        $page_options = function_exists("fw_get_db_post_option") ? fw_get_db_post_option(get_the_ID(), 'page_options') : array();

        $titlebar_layout = isset($greenfresh_options["titlebar_layout"]) ? $greenfresh_options["titlebar_layout"] : '1';
        $page_titlebar_layout = isset($page_options['titlebar_layout']) ? $page_options['titlebar_layout'] : 'default';
        $titlebar_layout = ($page_titlebar_layout == 'default') ? $titlebar_layout : $page_titlebar_layout;
        switch ($titlebar_layout) {
            case '1':
                get_template_part('framework/titlebars/titlebar', 'v1');
                break;
            case '2':
                get_template_part('framework/titlebars/titlebar', 'v2');
                break;
            default :
                get_template_part('framework/titlebars/titlebar', 'v1');
                break;
        }
    }
}

/* Footer */
function greenfresh_footer(){
    global $greenfresh_options;
    $page_options = function_exists("fw_get_db_post_option") ? fw_get_db_post_option(get_the_ID(), 'page_options') : array();

    $footer_layout = isset($greenfresh_options["footer_layout"]) ? $greenfresh_options["footer_layout"] : '-1';
    $page_footer_layout = isset($page_options['footer_layout']) ? $page_options['footer_layout'] : 'default';
    $footer_layout = $page_footer_layout == 'default' ? $footer_layout : $page_footer_layout;
    switch ($footer_layout) {
        case '1':
            get_template_part('framework/footers/footer', 'v1');
            break;
        case '2':
            get_template_part('framework/footers/footer', 'v2');
            break;
        default :
            get_template_part('framework/footers/footer', 'default');
            break;
    }
}

/* Logo */
if (!function_exists('greenfresh_logo')) {
    function greenfresh_logo($url = '', $height = 30){
        if (!$url) {
            $url = get_template_directory_uri() . '/assets/images/logo.png';
        }
        echo '<a href="' . home_url('/') . '"><img class="logo" style="height: ' . esc_attr($height) . 'px; width: auto;" src="' . esc_url($url) . '" alt="' . esc_attr__('Logo', 'greenfresh') . '"/></a>';
    }
}

/* Nav Menu */
if (!function_exists('greenfresh_nav_menu')) {
    function greenfresh_nav_menu($menu_slug = '', $theme_location = '', $container_class = ''){
        if (has_nav_menu($theme_location) || $menu_slug) {
            wp_nav_menu(array(
                'menu'            => $menu_slug,
                'container_class' => $container_class,
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'theme_location'  => $theme_location
            ));
        } else {
            wp_page_menu(array(
                'menu_class' => $container_class
            ));
        }
    }
}

/* Page title */
if (!function_exists('greenfresh_page_title')) {
    function greenfresh_page_title(){
        ob_start();
        if (is_front_page()) {
            esc_html_e('Home', 'greenfresh');
        } elseif (is_home()) {
            esc_html_e('Blog', 'greenfresh');
        } elseif (is_search()) {
            esc_html_e('Search', 'greenfresh');
        } elseif (is_404()) {
            esc_html_e('Page Not Found ', 'greenfresh');
        } elseif (is_archive()) {
            if (is_category()) {
                single_cat_title();
            } elseif (get_post_type() == 'fw-portfolio' || get_post_type() == 'bt_team' || get_post_type() == 'bt_services' || get_post_type() == 'bt_story') {
                single_term_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                printf(__('Author: %s', 'greenfresh'), '<span class="vcard">' . get_the_author() . '</span>');
            } elseif (is_day()) {
                printf(__('Day: %s', 'greenfresh'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
            } elseif (is_month()) {
                printf(__('Month: %s', 'greenfresh'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
            } elseif (is_year()) {
                printf(__('Year: %s', 'greenfresh'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
            } elseif (is_tax('post_format', 'post-format-aside')) {
                esc_html_e('Aside', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-gallery')) {
                esc_html_e('Gallery', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-image')) {
                esc_html_e('Image', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-video')) {
                esc_html_e('Video', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-quote')) {
                esc_html_e('Quote', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-link')) {
                esc_html_e('Link', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-status')) {
                esc_html_e('Status', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-audio')) {
                esc_html_e('Audio', 'greenfresh');
            } elseif (is_tax('post_format', 'post-format-chat')) {
                esc_html_e('Chat', 'greenfresh');
            } else {
                esc_html_e('Archive', 'greenfresh');
            }
        } else {
            the_title();
        }

        return ob_get_clean();
    }
}

/* Page breadcrumb */
if (!function_exists('greenfresh_page_breadcrumb')) {
    function greenfresh_page_breadcrumb($home_text = 'Home', $delimiter = '-'){
        global $post;

        if (is_front_page()) {
            echo esc_html('Front Page', 'greenfresh');
        } elseif (is_home()) {
            echo esc_html('Blog', 'greenfresh');
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '">' . $home_text . '</a> ' . $delimiter . ' ';
        }

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo '<span class="current">' . single_cat_title(esc_html__('Archive by category: ', 'greenfresh'), false) . '</span>';
        } elseif (is_tag()) {
            echo '<span class="current">' . single_tag_title(esc_html__('Posts tagged: ', 'greenfresh'), false) . '</span>';
        } elseif (is_tax()) {
            echo '<span class="current">' . single_term_title(esc_html__('Archive by taxonomy: ', 'greenfresh'), false) . '</span>';
        } elseif (is_search()) {
            echo '<span class="current">' . esc_html__('Search results for: ', 'greenfresh') . get_search_query() . '</span>';
        } elseif (is_day()) {
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . ' ' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<span class="current">' . get_the_time('d') . '</span>';
        } elseif (is_month()) {
            echo '<span class="current">' . get_the_time('F') . ' ' . get_the_time('Y') . '</span>';
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                if (get_post_type() == 'fw-portfolio') {
                    $terms = get_the_terms(get_the_ID(), 'fw-portfolio-category', '', '');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        the_terms(get_the_ID(), 'fw-portfolio-category', '', ', ');
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    } else {
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                } elseif (get_post_type() == 'bt_team') {
                    $terms = get_the_terms(get_the_ID(), 'bt_team_category', '', '');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        the_terms(get_the_ID(), 'bt_team_category', '', ', ');
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    } else {
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                } elseif (get_post_type() == 'bt_testimonial') {
                    $terms = get_the_terms(get_the_ID(), 'bt_testimonial_category', '', '');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        the_terms(get_the_ID(), 'bt_testimonial_category', '', ', ');
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    } else {
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                } elseif (get_post_type() == 'bt_services') {
                    $terms = get_the_terms(get_the_ID(), 'bt_services_category', '', '');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        the_terms(get_the_ID(), 'bt_services_category', '', ', ');
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    } else {
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                } elseif (get_post_type() == 'bt_story') {
                    $terms = get_the_terms(get_the_ID(), 'bt_story_category', '', '');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        the_terms(get_the_ID(), 'bt_story_category', '', ', ');
                        echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                    } else {
                        echo '<span class="current">' . get_the_title() . '</span>';
                    }
                } else {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . esc_url(home_url('/')) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                    echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo '' . $cats;
                echo '<span class="current">' . get_the_title() . '</span>';
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if ($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_page() && !is_front_page() && !$post->post_parent) {
            echo '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_page() && !is_front_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo '' . $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . $delimiter . ' ';
            }
            echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<span class="current">' . esc_html__('Articles posted by ', 'greenfresh') . $userdata->display_name . '</span>';
        } elseif (is_404()) {
            echo '<span class="current">' . esc_html__('Error 404', 'greenfresh') . '</span>';
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo ' ' . $delimiter . ' ' . esc_html__('Page', 'greenfresh') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
    }
}

/* Display navigation to next/previous post */
if (!function_exists('greenfresh_post_nav')) {
    function greenfresh_post_nav(){
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);
        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="bt-blog-article-nav clearfix">
            <?php
            previous_post_link('<div class="bt-prev">' . esc_html__('Previous Post', 'greenfresh') . '%link</div>');
            next_post_link('<div class="bt-next">' . esc_html__('Next Post', 'greenfresh') . '%link</div>');
            ?>
        </nav>
        <?php
    }
}

/* Display paginate links */
if (!function_exists('greenfresh_paginate_links')) {
    function greenfresh_paginate_links($wp_query){
        global $greenfresh_options;
        $pagination_style = (isset($greenfresh_options['pagination_style']) && $greenfresh_options['pagination_style']) ? 'bt-style' . $greenfresh_options['nav_dots_style'] : 'bt-style0';
        $prev_text = (isset($greenfresh_options['pagination_prev_text']) && $greenfresh_options['pagination_prev_text']) ? '<span>' . $greenfresh_options['pagination_prev_text'] . '</span>' : '';
        $next_text = (isset($greenfresh_options['pagination_next_text']) && $greenfresh_options['pagination_next_text']) ? '<span>' . $greenfresh_options['pagination_next_text'] . '</span>' : '';

        ?>
        <nav class="bt-pagination <?php echo esc_attr($pagination_style); ?>" role="navigation">
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'prev_text' => '<i class="fa fa-angle-left"></i>' . $prev_text,
                'next_text' => $next_text . '<i class="fa fa-angle-right"></i>',
            ));
            ?>
        </nav>
        <?php
    }
}

/* Display navigation to next/previous set of posts */
if (!function_exists('greenfresh_paging_nav')) {
    function greenfresh_paging_nav(){
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }

        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';

        $format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

        ?>
        <nav class="bt-pagination" role="navigation">
            <?php
            echo paginate_links(array(
                'base'      => $pagenum_link,
                'format'    => $format,
                'total'     => $GLOBALS['wp_query']->max_num_pages,
                'current'   => $paged,
                'mid_size'  => 1,
                'add_args'  => array_map('urlencode', $query_args),
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>',
            ));
            ?>
        </nav>
        <?php
    }
}

/* Add content before header */
if (!function_exists('greenfresh_add_content_before_header_func')) {
    function greenfresh_add_content_before_header_func(){
        global $greenfresh_options;

        /* Page loading */
        $site_loading = (isset($greenfresh_options['site_loading']) && $greenfresh_options['site_loading']) ? $greenfresh_options['site_loading'] : false;
        $site_loading_spinner = (isset($greenfresh_options['site_loading_spinner']) && $greenfresh_options['site_loading_spinner']) ? $greenfresh_options['site_loading_spinner'] : 'spinner0';
        $site_loading_text_welcome = (isset($greenfresh_options['site_loading_text_welcome']) && $greenfresh_options['site_loading_text_welcome']) ? $greenfresh_options['site_loading_text_welcome'] : '';

        if ($site_loading) {
            switch ($site_loading_spinner):
                case 'spinner-text':
                    echo '<div id="site_loading">
                            <div class="loader ' . esc_attr($site_loading_spinner) . '">
                            <span>' . implode("</span><span>", str_split($site_loading_text_welcome)) . '</span>
                            </div>
                        </div>';
                    break;
                default:
                    echo '<div id="site_loading">
                            <div class="loader ' . esc_attr($site_loading_spinner) . '">
                                <div class="dot1"></div>
                                <div class="dot2"></div>
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>';
            endswitch;
        }
    }

    add_action('greenfresh_add_content_before_header', 'greenfresh_add_content_before_header_func');
}

/* Add content before header */
if (!function_exists('greenfresh_add_style_spinner_loading')) {
    function greenfresh_add_style_spinner_loading(){
        global $greenfresh_options;
        $site_loading_text_welcome = (isset($greenfresh_options['site_loading_text_welcome']) && $greenfresh_options['site_loading_text_welcome']) ? $greenfresh_options['site_loading_text_welcome'] : '';
        $text_welcome_length = strlen(trim(esc_html($site_loading_text_welcome)));
        $style = '';
        for ($str = 1; $str <= $text_welcome_length; $str++) {
            $style .= '#site_loading .loader.spinner-text span:nth-child(' . $str . ') { animation-delay: ' . ($str / 10 - 0.1) . 's; }';
        }
        wp_add_inline_style('greenfresh-main_style', $style);
    }

    add_action('wp_enqueue_scripts', 'greenfresh_add_style_spinner_loading');
}

/* Add menu canvas, back to top, ... */
if (!function_exists('greenfresh_add_extra_code_wp_footer')) {
    function greenfresh_add_extra_code_wp_footer(){
        global $greenfresh_options;

        /*Search Popup*/
        echo '<div id="bt_search_popup"><div class="bt-search-form">' . get_search_form(false) . '</div><a href="#" class="bt-close"></a></div>';

        /*Menu Canvas*/
        if (isset($greenfresh_options['menu_canvas_element']) && $greenfresh_options['menu_canvas_element']) {
            echo '<div id="bt_menu_canvas"><div class="bt-menu-canvas">';
            foreach ($greenfresh_options['menu_canvas_element'] as $sidebar_id) {
                dynamic_sidebar($sidebar_id);
            }
            echo '</div></div>';
        }

        /* Back to top */
        $back_to_top = (isset($greenfresh_options['back_to_top']) && $greenfresh_options['back_to_top']) ? $greenfresh_options['back_to_top'] : false;
        $back_to_top_style = (isset($greenfresh_options['back_to_top_style']) && $greenfresh_options['back_to_top_style']) ? $greenfresh_options['back_to_top_style'] : 'style_1';
        if ($back_to_top) {
            wp_enqueue_style('greenfresh-backtop', get_template_directory_uri() . '/assets/vendors/backtop/style.css', false);
            wp_enqueue_script('greenfresh-backtop', get_template_directory_uri() . '/assets/vendors/backtop/backtop.min.js', array('jquery'), '', true);
            echo '<div id="site_backtop" class="' . esc_attr($back_to_top_style) . '"><i class="fa fa-arrow-up"></i></div>';
        }
    }

    add_action('wp_footer', 'greenfresh_add_extra_code_wp_footer');
}
// Custom get sidebar function
if (!function_exists('greenfresh_get_sidebars')) {
    function greenfresh_get_sidebars(){
        $sidebars = wp_get_sidebars_widgets(true);
        $result = array();
        foreach ($sidebars as $sidebar_id => $sidebar) {
            if ($sidebar_id != 'wp_inactive_widgets' && $sidebar_id != 'main-sidebar') {
                $result[$sidebar_id] = str_replace('-', ' ', $sidebar_id);
            }
        }
        return $result;
    }
}

if (!function_exists('greenfresh_get_all_sidebars')) {
    function greenfresh_get_all_sidebars(){
        $sidebars = array('' => esc_html__('---Extend Default---', 'greenfresh'));
        foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
            $sidebars[$sidebar['id']] = ucwords($sidebar['name']);
        }
        return $sidebars;
    }
}