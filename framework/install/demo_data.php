<?php
function greenfresh_fw_ext_backups_demos($demos) {
    $demos_array = array(
		'greenfresh' => array(
			'title' => esc_html__('Greenfresh', 'greenfresh'),
			'screenshot' => 'http://beplusthemes.com/install/demo/greenfresh/greenfresh/screenshot.jpg',
			'preview_link' => 'http://greenfresh.beplusthemes.com/',
		),
		
    );

    $download_url = 'http://beplusthemes.com/install/demo/greenfresh/';

    foreach ($demos_array as $id => $data) {
        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
            'url' => $download_url,
            'file_id' => $id,
        ));
        $demo->set_title($data['title']);
        $demo->set_screenshot($data['screenshot']);
        $demo->set_preview_link($data['preview_link']);

        $demos[ $demo->get_id() ] = $demo;

        unset($demo);
    }

    return $demos;
}
add_filter('fw:ext:backups-demo:demos', 'greenfresh_fw_ext_backups_demos');
