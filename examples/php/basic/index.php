<?php

	// Define your credentials
	define("MAILNJOY_ID","");
	define("MAILNJOY_SECRET","");

	define("MAILNJOY_SERVER","https://api.mailnjoy.com/");
	define("MAILNJOY_VALIDATION_TYPE_SIMPLE","simple");
	define("MAILNJOY_VALIDATION_TYPE_DEEP","deep");
	
	$clientEmail = "example@gmail.com";

	// SIMPLE or DEEP, depending on the details you want (see documentation)
	$result = validateOne($clientEmail, MAILNJOY_VALIDATION_TYPE_SIMPLE);
	if(!$result) {
		echo "Call failed";
	} else {
		echo "<pre>";
		print_r(json_decode($result,true));
		echo "</pre>";
	}

	function validateOne($email,$validationType){
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $email);
		curl_setopt($curl, CURLOPT_URL, MAILNJOY_SERVER."v1/unitary/?type=".$validationType);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"mailnjoy-id: ".MAILNJOY_ID,
			"mailnjoy-secret: ".MAILNJOY_SECRET,
			"Content-Type: text/plain"
		));

		$result = curl_exec($curl);

		// error occured
		if(!$result) {
			var_dump(curl_error($curl));
		}

		curl_close($curl);
		return $result;
	}
?>