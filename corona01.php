<?php

$targetCountry = $_GET['country'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if(isset($_GET['country']) && !empty($_GET['country'])){

curl_setopt($ch, CURLOPT_URL, 'https://covid19.mathdro.id/api/countries/' . urlencode($_GET['country']));
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_setopt($ch, CURLOPT_URL, 'https://covid19.mathdro.id/api');
$ApiPrincipal = curl_exec($ch);
$Estatisticastotal = json_decode($ApiPrincipal, true);

}
		
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>COVID-19</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
		<div class="jumbotron mt-3">
		<h1 class="mb-2">COVID-19 Atualização de casos - By Gabriel</h1>
        <form class="from-group" method="get">
            <input class="form-control" type="text" name="country" placeholder="Verificar estatísticas pelo nome do seu país">
		    <button class="btn btn-primary float-right mt-3" type="submit">Confira</button>
        </form>
    
</body>
</html>