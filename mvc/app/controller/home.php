<?php
/**
 * Controller for homepage and general pages.
 */
class controller_home {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {

		// Include view for this page
		@include_once APP_PATH . 'view/home_index.tpl.php';
	}
}