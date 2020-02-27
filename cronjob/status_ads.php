<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://qzua.eaoron.co.id/Cronjob/status_ads");
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);

curl_close($ch);
?>