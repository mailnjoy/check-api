<?php

	// Define your credentials
	define("MAILNJOY_ID","");
	define("MAILNJOY_SECRET","");
	define("MAILNJOY_CREDIT_ENDPOINT","https://api.mailnjoy.com/v1/credit/");

	$result = getCredits();
	if(!$result) {
		echo "Call failed";
	} else {
		echo "<p>";
		echo "You have ".$result." credits left";
		echo "</p>";
	}

	function getCredits() {
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, MAILNJOY_CREDIT_ENDPOINT);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"mailnjoy-id: ".MAILNJOY_ID,
			"mailnjoy-secret: ".MAILNJOY_SECRET
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