<?php 
/**
* This is main class that other will extend
*/
class  Main_Controller
{
	
	function __construct()
	{
		session_start();
		include 'database.php';
		if (!isset($_SESSION['user']) && !preg_match('/login|register\.php/', $_SERVER['REQUEST_URI'] )){
			Header('Location: login.php');
		}
	}
	public function clean_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	//Cuculate the distance between 2 points
	/*::          $unit: 'M' is statute miles (default)                         :*/
	/*::                  'K' is kilometers                                      :*/
	/*::                  'N' is nautical miles                                  :*/
	public function distance($lat1, $lon1, $lat2, $lon2, $unit = 'M') {

	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
}

 ?>