<?php

/* Pinterest Image Downloader
** @author Rep - Xmall75 */

function search($url) {
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}
echo "\nPinterest Image Downloader\n";
echo "\nexample: https://www.pinterest.com/pin/722475965225861502/\nurl : ";
$input = trim(fgets(STDIN));
	if (empty($input)) {
		echo "Please input the URL.\n";
	}
	else {
		$search = search($input);
		$pisah = explode('href="https://i.', $search);
		if (isset($pisah[1])) {
			$pisah2 = explode('" as="image"/>', $pisah[1]);
			echo exec("wget --no-check-certificate https://i.$pisah2[0]");
		}
		else {
			echo "Please input the correct URL.\n";
		}
	}

?>
