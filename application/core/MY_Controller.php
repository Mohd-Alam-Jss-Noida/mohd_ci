<?php
	Class MY_Controller extends CI_Controller {

		

		public function userProfile() {
			echo "This is MY Controller<br>";
			echo "This is CORE Controller To use Every Where in The Project.";
		}
	}


	Class adminPanel extends MY_Controller {

		//public functio for Admin()

	}

	Class userPanel extends MY_Controller {

		//public function for user()

	}
?>