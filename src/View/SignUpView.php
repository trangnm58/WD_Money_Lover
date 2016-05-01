<?php
    /**
    * Class to render the sign up page
    */
	class SignUpView {
		/**
		* Get and return all page template
		*/
		public function render() {
			$html = file_get_contents('src/Template/sign-up.html');

			return $html;
		}
	}
