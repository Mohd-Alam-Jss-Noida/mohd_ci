<?php
	Class MY_Model extends CI_Model {

		public function getUserProfileData() {
			echo "This is MY Model<br>";
			echo "This is CORE Model To use Every Where in The Project.";
		}
	}


	Class admin_Panel extends MY_Model {

		//public functio for Admin()

	}

	Class user_Panel extends MY_Model {

		//public function for user()

	}

?>