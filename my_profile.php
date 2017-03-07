<?php 
include 'main_controller.php';
/**
* 
*/
class My_Profile extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$user = $_SESSION['user'];
		$page = 'my_profile';
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			global $db;
			$errors = array();
			$data = array();
			//prevent injection-xss and SQL injection
			$displayname = $db->real_escape_string($this->clean_input($_POST['displayname']));
			$email = $db->real_escape_string($this->clean_input($_POST['email']));
			$gender = $db->real_escape_string($this->clean_input($_POST['gender']));
			$biography = $db->real_escape_string($this->clean_input($_POST['biography']));
			$birthday = $db->real_escape_string($this->clean_input($_POST['birthday']));
			$distance = $db->real_escape_string($this->clean_input($_POST['distance']));
			if ($_POST['password'] != '' || $_POST['retype_password'] != ''){
				$password = md5($_POST['password']);
				$retype_password = md5($_POST['retype_password']);
				if ($password !== $retype_password){
					$errors['retype_password'] = "Retype Password does not match!";
				}else{
					$data['password'] = $password;
				}
			}

			$avatar = $this->upload_avatar();
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Email is invalid.";
			}
			if (empty($errors)){
				$data['displayname'] = $displayname;
				$data['email'] = $email;
				$data['gender'] = $gender;
				$data['biography'] = $biography;
				$data['birthday'] = $birthday;
				$data['distance'] = $distance;
				if ($avatar) $data['avatar'] = $avatar;
				$db->update('kasparmetsa_user', $data, array('id' => $user['id']));
				$user = $db->select_row('kasparmetsa_user', '*', array('id' => $user['id']));
				$_SESSION['user'] = $user;
			}
		}
		include 'views/my_profile.php';
	}

	private function upload_avatar(){
		if (!isset($_FILES['avatar'])) return;
		$image = $_FILES['avatar'];
		if (!preg_match('/image/', $image['type'])) return;
		if ($image['error']) return;
		$target_file = 'uploads/'.time().preg_replace('/^[^\.]+/', '', $image['name']);
		if (file_exists($target_file)) return;
		move_uploaded_file($image["tmp_name"], $target_file);
		return $target_file;
	}
}
new My_Profile();

 ?>