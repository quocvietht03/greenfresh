<?php
/**
 * Created by NGUYEN TRONG CONG - PhpStorm.
 * User: NTC - 2DEV4U.COM
 * Date: 11/1/2018 - 10:47
 * Project Name: greenfreshtheme
 */

$testimonial_options = function_exists("fw_get_db_post_option") ? fw_get_db_post_option(get_the_ID(), 'testimonial_options') : array();

$positon = isset($testimonial_options['position']) ? $testimonial_options['position'] : '';

?>

<div class="bt-item">
    <div class="bt-content">
        <?php echo get_the_content(); ?>
        <div class="bt-star">
            <span aria-hidden="true" class="icon_star"></span>
            <span aria-hidden="true" class="icon_star"></span>
            <span aria-hidden="true" class="icon_star"></span>
            <span aria-hidden="true" class="icon_star"></span>
            <span aria-hidden="true" class="icon_star"></span>
        </div>
    </div>
    <div class="bt-info">
        <div class="bt-thumb">
            <?php
            $thumb_size = (!empty($img_size)) ? $img_size : 'thumbnail';
            $thumbnail = wpb_getImageBySize(array(
                'post_id'    => get_the_ID(),
                'attach_id'  => null,
                'thumb_size' => $thumb_size,
                'class'      => ''
            ));
            echo (!empty($thumbnail)) ? $thumbnail['thumbnail'] : '';
            ?>
        </div>
        <div class="bt-meta">
            <h3 class="bt-title"><?php the_title(); ?></h3>
            <?php if ($positon) {
                echo '<div class="bt-position">' . $positon . '</div>';
            } ?>
        </div>
    </div>
</div>
