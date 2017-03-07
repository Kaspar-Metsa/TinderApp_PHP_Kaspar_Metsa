<?php
/**
* 
*/
include 'main_controller.php';
require_once 'IP2Location.php';
class Login extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		global $db;
		if (isset($_SESSION['user'])){
			header('Location: index.php');
		}
		if (isset($_POST['username'])){
			//prevent XSS Injection
			$username = $this->clean_input($_POST['username']);
			//prevent SQL Injection
			$username = $db->real_escape_string($username);
			$password = md5($_POST['password']);

			
			$query = $db->query("SELECT * FROM kasparmetsa_user WHERE username = '$username' AND password = '$password'");
			$row = $query->fetch_array(MYSQLI_ASSOC);
			if ($row){
				$_SESSION['user'] = $row;
				//Update longitude and latitude
				$location = new \IP2Location\Database('./databases/IP-COUNTRY-REGION-CITY-LATITUDE-LONGITUDE-SAMPLE.BIN', \IP2Location\Database::FILE_IO);
				$records = $location->lookup($_SERVER['REMOTE_ADDR'], \IP2Location\Database::ALL);
				if (is_numeric($records['longitude']) && is_numeric($records['latitude'])){
					$db->update('kasparmetsa_user', array('long' => $records['longitude'], 'lat' => $records['latitude']), array('id' => $row['id']));
				}
				$user = $db->select_row('kasparmetsa_user', '*', array('id' => $row['id']));
				$_SESSION['user'] = $user;

				header('Location: index.php');
			}else{
				$errors['login'] = 'Username or password is not correct!';
			}
		}
		include 'views/login.php';
	}
}
new Login();
 ?>
