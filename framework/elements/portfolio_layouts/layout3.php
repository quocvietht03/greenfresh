<?php
/**
 * Created by NGUYEN TRONG CONG - PhpStorm.
 * User: NTC - 2DEV4U.COM
 * Date: 10/29/2018 - 13:48
 * Project Name: greenfreshtheme
 */
$portfolio_options = function_exists("fw_get_db_post_option") ? fw_get_db_post_option(get_the_ID(), 'portfolio_options') : array();

?>
<div class="bt-item">
    <div class="bt-thumb">
        <a href="<?php the_permalink(); ?>">
        <?php
        $thumb_size = (!empty($img_size)) ? $img_size : 'full';
        $thumbnail = wpb_getImageBySize(array(
            'post_id'    => get_the_ID(),
            'attach_id'  => null,
            'thumb_size' => $thumb_size,
            'class'      => ''
        ));
        echo (!empty($thumbnail)) ? $thumbnail['thumbnail'] : '';
        ?>
        </a>
    </div>
    <div class="bt-content">
        <div class="bt-term"><?php the_terms(get_the_ID(), 'fw-portfolio-category', '', ', '); ?></div>
        <h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
</div>