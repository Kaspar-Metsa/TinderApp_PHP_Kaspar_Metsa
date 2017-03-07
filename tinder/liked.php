<?php
/**
* 
*/
include 'main_controller.php';
class Liked extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$user = $_SESSION['user'];
		$page = 'liked';
		global $db;
		$sql = "SELECT `kasparmetsa_action`.user2 FROM `kasparmetsa_action` LEFT JOIN `kasparmetsa_action` as kasparmetsa_action1 ON kasparmetsa_action.user1 = kasparmetsa_action1.user2 AND kasparmetsa_action.user2 = kasparmetsa_action1.user1 WHERE kasparmetsa_action.`like` = 'like' AND kasparmetsa_action1.`like` = 'like' AND kasparmetsa_action.user1 = ".$user['id'];
		$query = $db->query($sql);
		$liked_people = array();
		while ($row =  $query->fetch_array(MYSQLI_ASSOC)) {
			$results[] = $row;
			$liked_people[] = $db->select_row('kasparmetsa_user', '*', array('id'=>$row['user2']));
		}
		include 'views/liked.php';
	}
}
new Liked();
 ?>