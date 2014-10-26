<?php

class StorytellerTest extends WP_UnitTestCase {

	function testCPTs() {

		// Try and create a post of type 'Story'
		$new_story = wp_insert_post(
			array(
				'post_title' => __('Sample Story'),
				'post_content' => __('This is some sample content, which would usually form a lovely narrative, but as this is only a test there will be no storytelling here. Soz.'),
				'post_status' => 'publish',
				'post_type' => 'story', // Kind of important
			),
			true // return WP_Error on failure
		);

		// wp_insert_post() will return the post ID if successful, or WP_Error on failure
		$this->assertInternalType( 'int', $new_story );

	}
}

