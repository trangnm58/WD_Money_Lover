<?php
    /**
    * Class to render the welcome page
    */
	class WelcomeView {
		/**
		* Get and return all page template
		*/
		public function render() {
			$html = file_get_contents('src/Template/welcome.html');

			return $html;
		}	
	}
