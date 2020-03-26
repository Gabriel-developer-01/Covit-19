<?php

$targetCountry = $_GET['country'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://covid19.mathdro.id/api/countries/' . $targetCountry);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

$data = json_decode($result, true);


?>