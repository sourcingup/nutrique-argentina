<?php
 header('Content-Type: application/json');
function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
	$latFrom = deg2rad($latitudeFrom);
	$lonFrom = deg2rad($longitudeFrom);
	$latTo = deg2rad($latitudeTo);
	$lonTo = deg2rad($longitudeTo);

	$lonDelta = $lonTo - $lonFrom;

	$a = pow(cos($latTo) * sin($lonDelta), 2) +

		pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);

	$b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
	$angle = atan2(sqrt($a), $b);

	return $angle * $earthRadius;
}

	/*base de datos*/
	$servername = "www.vitalcan.com";
	$username = "argentin_userdb";
	$password = "Tctntc2019#";
	$dbname = "argentin_nutrique";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$conn->set_charset("utf8");

	$categories = $_POST['categories'];

	$tags = $_POST['tags'];

	$latitude = $_POST['latitude'];

	$longitude = $_POST['longitude'];
	
	$codigopostal = (int)$_POST['codigopostal'];

	if ($codigopostal==0)
		$sql = "SELECT * FROM dondecomprar"; //no va lo d tags y categoria
	else
		$sql = "SELECT * FROM dondecomprar where codigopostal=".$codigopostal; 
	$result = $conn->query($sql);

	$stores = array();
	


	if ($result->num_rows > 0) {
    // output data of each row
		while($storePost = $result->fetch_assoc()) {

				if( vincentyGreatCircleDistance($latitude, $longitude, $storePost['Latitud'] , $storePost['Longitud'] ) <= 1000  || $latitude == null) { 
				


					//$cat = get_the_terms($storePost->ID, 'category'); 





					$store['ID'] = $storePost['clienteid'];

					$store['title'] = $storePost['Nombre'];

					$store['cats']="";

					$store['direccion'] = $storePost['Direccion'];

					$store['latitud'] = $storePost['Latitud'];

					$store['longitud'] = $storePost['Longitud'];
					$store['telefono'] = $storePost['Telefono'];

					$storer = [];


					$stores[] = $store;

					$i++;



				}

		}
	}
	//var_dump($store); 
	$conn->close();
	echo json_encode($stores);



	die();
