<?php
/**
 * Controller that handles 404 errors.
 */
class controller_404 {

	/**
	 * Default action for 404 controller.
	 */
	function action_index($params) {

		// Set a title to be displayed in browser bar
		$html_head_title = 'Pagina indisponibila';

		// Include view for this page
		@include_once APP_PATH . 'view/404_index.tpl.php';
	}

}
