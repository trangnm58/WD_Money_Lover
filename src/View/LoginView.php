<?php
    /**
    * Class to render the login page
    */
	class LoginView {
		/**
		* Get and return all page template
		*/
		public function render() {
			$html = file_get_contents('src/Template/login.html');

			return $html;
		}

		/**
		* Get and return login page with error
		*/
		public function renderWithError($oldUsername) {
			$html = file_get_contents('src/Template/login.html');

			return $html;
		}	
	}
