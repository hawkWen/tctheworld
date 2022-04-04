<?php
class API
{
	private const MAIN_URL = 'https://wallet.me-spin.com/api/truewallet';
	private function fcurl($url, $mode="GET", $data=NULL, $header=array()){
		$ch = curl_init();
		curl_setopt_array($ch, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => $mode,
			  CURLOPT_HEADER => 0
		));
		if(!empty($data)){
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			$header[] = 'Content-Type: application/x-www-form-urlencoded';
		}
		if(!empty($header)){
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
	function otp($username,$password,$pin){
		try {
			$response = $this->fcurl(API::MAIN_URL .'/otp', 'POST', array('username' => $username,'password' => $password,'pin' => $pin));
			return $this->error_api = json_decode($response, true);
		} catch (Exception $e) {
		    return $this->error_api = $e->getMessage();
		}
	}
	function login($username,$password,$pin,$otp_reference,$otp_code,$brand,$callback){
		try {
			$response = $this->fcurl(API::MAIN_URL .'/login', 'POST', array('username' => $username,'password' => $password,'pin' => $pin,'otp_reference' => $otp_reference,'otp_code' => $otp_code,'brand' => $brand,'callback' => $callback));
			return $this->error_api = json_decode($response, true);
		} catch (Exception $e) {
		    return $this->error_api = $e->getMessage();
		}
	}
}
$api = new API();
/* STEP_1 */

	//$otp = $api->otp('0657134352','ploy0211','021137');
//print_r($otp);

/* STEP_2*/

	$login = $api->login('0657134352','ploy0211','021137','PSPF','477772','wallet','#');
	$access_token = $login['data']['data']['access_token'];
	$login_token = $login['data']['data']['login_token'];
	$tmn_id = $login['data']['data']['tmn_id'];
	$first_name_en = $login['data']['data']['first_name_en'];
	echo "access_token : ".$access_token;
	echo "<br>";
	echo "login_token : ".$login_token;
	echo "<br>";
	echo "tmn_id : ".$tmn_id;
	echo "<br>";
	echo "first_name_en : ".$first_name_en;


?>