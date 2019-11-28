<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'post_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'post_general' => array(
				'title' => esc_html__('General', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'titlebar_background' => array(
						'label' => esc_html__( 'Title Bar Background', 'greenfresh' ),
						'desc'  => esc_html__( 'Upload title bar background image.', 'greenfresh' ),
						'type'  => 'upload',
					),
				),
			),
			'post_gallery' => array(
				'title' => esc_html__('Gallery', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'gallery_images' => array(
						'label' => esc_html__( 'Add Images', 'greenfresh' ),
						'desc'  => esc_html__( 'Upload gallery images.', 'greenfresh' ),
						'type'  => 'multi-upload',
					),
				),
			),
			'post_video' => array(
				'title' => esc_html__('Video', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'video_url' => array(
						'label' => esc_html__( 'Video Url', 'greenfresh' ),
						'desc'  => esc_html__( 'Please video url(vimeo/youtube/mp4). Ex: https://www.youtube.com/embed/YE7VzlLtp-4?rel=0', 'greenfresh' ),
						'type'  => 'text',
					),
					'video_poster' => array(
						'label' => esc_html__( 'Add Image', 'greenfresh' ),
						'desc'  => esc_html__( 'Upload video poster image.', 'greenfresh' ),
						'type'  => 'upload',
					),
					'video_caption' => array(
						'label' => esc_html__( 'Video Caption', 'greenfresh' ),
						'desc'  => esc_html__( 'Please video caption.', 'greenfresh' ),
						'type'  => 'text',
					),
				),
			),
			'post_audio' => array(
				'title' => esc_html__('Audio', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'audio_type' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'type' => array(
								'type' => 'short-select',
								'label' => esc_html__('Audio Types', 'greenfresh'),
								'desc' => esc_html__('Choose the audio type.', 'greenfresh'),
								'value' => 'html5',
								'choices' => array(
									'html5' => esc_html__('HTML5', 'greenfresh'),
									'embed' => esc_html__('Embed', 'greenfresh')
								),
							),
						),
						'choices' => array(
							'html5' => array(
								'format' => array(
									'type'  => 'short-select',
									'value' => 'mp3',
									'label' => esc_html__('Format', 'greenfresh'),
									'desc'  => esc_html__('Choose the audio format.', 'greenfresh'),
									'choices' => array(
										'audio/mpeg' => esc_html__('MP3', 'greenfresh'),
										'audio/ogg' => esc_html__('Ogg', 'greenfresh'),
										'audio/wav' => esc_html__('Wav', 'greenfresh')
									)
								),
								'src' => array(
									'label' => esc_html__('Src', 'greenfresh'),
									'desc' => esc_html__('Enter url audio (Ex: http://yourdomain.com/audio.mp3)', 'greenfresh'),
									'type' => 'text',
									'value' => ''
								),
							),
							'embed' => array(
								'iframe' => array(
									'label' => esc_html__('Embed', 'greenfresh'),
									'desc' => esc_html__('Please enter embed code(SoundCloud, ...)', 'greenfresh'),
									'type' => 'textarea',
									'value' => '',
								),
							),
							
						),
					),
				),
			) ,
			'post_quote' => array(
				'title' => esc_html__('Quote', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'quote_text' => array(
						'label' => esc_html__( 'Quote Text', 'greenfresh' ),
						'desc'  => esc_html__( 'Please enter quote.', 'greenfresh' ),
						'type'  => 'textarea',
					),
				),
			),
			'post_link' => array(
				'title' => esc_html__('Link', 'greenfresh'),
				'type' => 'tab',
				'options' => array(
					'url' => array(
						'label' => esc_html__( 'Url', 'greenfresh' ),
						'desc'  => esc_html__( 'Please enter url.', 'greenfresh' ),
						'type'  => 'text',
					),
				),
			),
			
		),
	),
	
);
