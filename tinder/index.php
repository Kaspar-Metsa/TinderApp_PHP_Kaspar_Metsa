<?php 
include 'main_controller.php';
/**
* 
*/
class Index extends Main_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if (isset($_POST['action'])){
			$this->action($_POST['id'], $_POST['action']);
			echo "success";
			exit;
		}
		$another = $this->get_another();
		$page = 'index';
		include 'views/index.php';
	}
	private function get_another(){
		$user = $_SESSION['user'];
		global $db;
		$sql = "SELECT * FROM kasparmetsa_user WHERE id != ".$user['id']." AND gender != '".$user['gender']."'
		 AND id NOT IN (SELECT user2 FROM kasparmetsa_action WHERE user1 = ".$user['id'].")";
		$query = $db->query($sql);
		$another = null;
		while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
			if ($user['distance'] == 0){
				$another = $row;
				break;
			}
			//Only get people from configured distance
			if ($this->distance($row['lat'], $row['long'], $user['lat'], $user['long'], 'K') <= $user['distance']){
				$another = $row;
				break;
			}
		}
		return $another;
	}
	private function action($id, $action){
		$user = $_SESSION['user'];
		global $db;
		//Check if relationship exists.
		$row = $db->select_row('kasparmetsa_action', '*', array('user1' => $user['id'], 'user2'=> $id));
		if ($row){
			$db->update('kasparmetsa_action', array('like'=>$action), array('user1' => $user['id'], 'user2'=> $id));
		}else{
			$db->insert('kasparmetsa_action', array('like'=>$action, 'user1' => $user['id'], 'user2' => $id));
		}
	}
}
new Index();
 ?>