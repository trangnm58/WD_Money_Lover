<?php
    /**
    * Class to render the home page
    */
	class HomeView {
		/**
		* Get and return all page template
		*/
		public function render() {
			$html = file_get_contents('src/Template/home.html');

			return $html;
		}	
	}
