<?php
/**
* 
*/
include 'main_controller.php';
class Register extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		global $db;
		if (isset($_SESSION['user'])){
			header('Location: index.php');
		}
		$success = false;
		if (isset($_POST['username'])){
			//prevent injection-XSS
			$username = $this->clean_input($_POST['username']);
			$displayname = $this->clean_input($_POST['displayname']);
			$email = $this->clean_input($_POST['email']);
			$gender = $this->clean_input($_POST['gender']);
			$password = md5($_POST['password']);

			//SQL injection
			$username = $db->real_escape_string($username);
			$displayname = $db->real_escape_string($displayname);
			$email = $db->real_escape_string($email);
			$gender = $db->real_escape_string($gender);

			$errors = array();
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Please enter a valid email.';
			}
			
			$query = $db->query("SELECT * FROM kasparmetsa_user WHERE username = '$username'");
			
			if ($query->num_rows){
				$errors['username'] = "This username already exists!";
			}
			
			$query = $db->query("SELECT * FROM kasparmetsa_user WHERE email = '$email'");
			if ($query->num_rows && !isset($errors['email'])){
				$errors['email'] = "This email already exists!";
			}
			$avatar = $this->upload_avatar();
			if (!$avatar){
				$errors['avatar'] = "You did not choose an image to upload or an unexpected error happened.";
			}
			if (empty($errors)){
				$sql = "INSERT INTO kasparmetsa_user (displayname, username, email, password, gender, avatar) VALUES ('$displayname', '$username', '$email', '$password', '$gender', '$avatar')";
				$result = $db->query($sql);
				if (!$result) die($db->error);
				$success = true;
			}else{
				$success = false;

			}
		}
		include 'views/register.php';
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
new Register();
 ?>