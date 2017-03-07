 <?php
$servername = "localhost";
$username = "st2014";
$password = "progress";
$dbname = 'st2014';
global $db;
class MyDb extends mysqli
{
	function __construct($servername, $username, $password, $dbname)
	{
		parent::__construct($servername, $username, $password, $dbname);
	}
	/**
	 * update $data array to a table.
	 * $data must be $key and $value, where $key is column name.
	 * @return Boolean
	 **/
	public function update($table, $data, $where = array()){
		$sql = "UPDATE `".$table."` SET ";
		foreach ($data as $key => $value) {
			$sql .= "`".$key."` = '".$value."', ";
		}
		$sql = rtrim($sql, ', ');
		if (!empty($where)){
			$sql .= ' WHERE ';
			foreach ($where as $key => $value) {
				$sql .= "`".$key."` = '".$value."' AND ";
			}
			$sql = rtrim($sql, ' AND ');
		}
		return $this->query($sql);
	}
	public function insert($table, $data){
		$sql = "INSERT INTO `".$table.'`';
		$columns = "(";
		$values = "(";
		foreach ($data as $key => $value) {
			$columns .= '`'.$key.'`, ';
			$values .= "'".$value."', ";
		}
		$columns = rtrim($columns, ', ');
		$values = rtrim($values, ', ');
		$columns .= ")";
		$values .= ")";
 		$sql .= ' '.$columns.' VALUES '.$values;
		return $this->query($sql);
	}
	public function select_row($table, $select = "*", $where = array()){
		$sql = "SELECT ".$select." FROM `".$table."`";
		if (!empty($where)){
			$sql .= ' WHERE ';
			foreach ($where as $key => $value) {
				$sql .= "`".$key."` = '".$value."' AND ";
			}
			$sql = rtrim($sql, ' AND ');
		}
		$query = $this->query($sql);
		if ($query){
			return $query->fetch_array(MYSQLI_ASSOC);
		}
		return null;
	}
	public function select_all($table, $select, $where = array()){
		$sql = "SELECT ".$select." FROM `".$table."`";
		if (!empty($where)){
			$sql .= ' WHERE ';
			foreach ($where as $key => $value) {
				$sql .= "`".$key."` = '".$value."' AND ";
			}
			$sql = rtrim($sql, ' AND ');
		}
		$query = $this->query($sql);
		if ($query){
			return $query->fetch_all(MYSQLI_ASSOC);
		}
		return null;
	}
}
$db = new MyDb($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}
?> 