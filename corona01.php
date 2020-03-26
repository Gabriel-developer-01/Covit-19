<?php

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
<body style="background-color: cadetblue;">

<div class="container">
		<div class="jumbotron mt-3">
		<h1 class="mb-2">COVID-19 Atualização de casos - By Gabriel</h1>
        <form class="from-group" role="status" method="get">
            <input class="form-control" type="text" name="country" placeholder="Verificar estatísticas atualizadas pelo nome do seu país"/>
            <button class="btn btn-info float-right mt-3" type="submit">Confira</button>
            
        </form>

    <?php if(!empty($data['confirmed'])): ?>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col"><?php echo htmlspecialchars($_GET['country'], ENT_QUOTES); ?></th>    
            <th scope="col">Infectado</th>
            <th scope="col">Recuperação</th>
            <th scope="col">Mortes</th>
            <th scope="col">Ùltima Atualização</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>#</td>
            <td><?php echo number_format($data['confirmed']['value']) ?></td>
            <td><?php echo number_format($data['recovered']['value']) ?></td>
            <td><?php echo number_format($data['deaths']['value']) ?></td>
            <td><?php echo $data['lastUpdate'] ?></td>
            </tr>
    <?php endif; ?>

    <img class='mt-2 text-center' src='https://covid19.mathdro.id/api/og' height="300px" width="1050px" />
	
	</div>
</div>

</body>
</html>