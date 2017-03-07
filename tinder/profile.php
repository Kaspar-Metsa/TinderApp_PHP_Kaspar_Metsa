<?php 
include 'main_controller.php';
/**
* 
*/
class Profile extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$user = $_SESSION['user'];
		if (!isset($_GET['id']) && !$_GET['id']){
			Header('Location: liked.php');
		}
		$id = $_GET['id'];
		$page = 'profile';
		global $db;
		//Check if 2 people liked each other
		$checked = $this->check_liked($user, $id);
		if (!$checked){
			Header('Location: liked.php');
		}
		if (isset($_POST['content']) && $_POST['content'] != ''){
			//Clean input
			$content =  $db->real_escape_string($this->clean_input($_POST['content']));
			$this->send_message($user['id'], $id, $content);
		}
		$profile = $db->select_row('kasparmetsa_user', '*', array('id' => $id));
		$distance = $this->distance($profile['lat'], $profile['long'], $user['lat'], $user['long'], 'K');
		
		$messages = $this->get_messages($user['id'], $id);
		include 'views/profile.php';

	}
	private function check_liked($login_user, $id){
		global $db;
		$sql = "SELECT `kasparmetsa_action`.user2 FROM `kasparmetsa_action` JOIN `kasparmetsa_action` as kasparmetsa_action1 ON kasparmetsa_action.user1 = kasparmetsa_action1.user2 AND kasparmetsa_action.user2 = kasparmetsa_action1.user1 WHERE kasparmetsa_action.`like` = 'like' AND kasparmetsa_action1.`like` = 'like' AND kasparmetsa_action.user1 = ".$login_user['id']. ' AND kasparmetsa_action.user2 = '.$id;
		if ($db->query($sql)->num_rows) return true;
		return false;
	}
	private function send_message($from, $to, $content){
		global $db;
		$data = array(
				'from' => $from,
				'to'   => $to,
				'content' => $content,
				'datetime' => date('Y-m-d H:i:s'),
			);
		$db->insert('kasparmetsa_message', $data);
	}

	private function get_messages($user1, $user2){
		$sql = "SELECT kasparmetsa_message.*, user1.displayname AS from_name, user2.displayname AS to_name FROM kasparmetsa_message
				LEFT JOIN kasparmetsa_user AS user1 ON kasparmetsa_message.`from` = user1.id
				LEFT JOIN kasparmetsa_user AS user2 ON kasparmetsa_message.`to` = user2.id
				WHERE (kasparmetsa_message.`from` = ".$user1." AND kasparmetsa_message.to = ".$user2.") OR 
					  (kasparmetsa_message.`from` = ".$user2." AND kasparmetsa_message.to = ".$user1.")
				GROUP BY kasparmetsa_message.id
				ORDER BY kasparmetsa_message.datetime ASC
				";
		global $db;
		$query = $db->query($sql);
		$result = array();
		while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}
}
new Profile();

 ?>