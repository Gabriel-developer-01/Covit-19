<?php

$targetCountry = $_GET['country'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://covid19.mathdro.id/api/countries/' . $targetCountry);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

$data = json_decode($result, true);
//adicionando os dados//
 echo 'Covid 19 confirmado no ' . $targetCountry . ': ' . number_format($data['confirmed']['value']);
 echo "<br>";
 echo 'Covid 19 recuperação em ' . $targetCountry . ': ' . number_format($data['recovered']['value']);
 echo "<br>";
 echo 'Covid 19 mortos em ' . $targetCountry . ': ' .  number_format($data['deaths']['value']);
 echo "<br>";
 echo 'Ultima atualização: ' . $data['lastUpdate'];
			
?>