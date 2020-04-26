<?php

$arquivo = fopen("arquivo.txt","a+");

$nome = $_POST["nome"];
$renda = $_POST["renda"];
$inss = 0;

//Cálculo INSS
if($renda <= 1045.00){
    $inss = $renda - $renda*0.925;
    $inss = number_format($inss, 2, '.', '');
    $renda = $renda - $inss;  
}
else if($renda >= 1045.01 and $renda <= 2089.60){
    $inss = $renda - $renda*0.910;
    $inss = number_format($inss, 2, '.', '');
    $renda = $renda - $inss;
}
else if($renda >= 2089.61 and $renda <= 3134.40){
    $inss = $renda - $renda*0.880;
    $inss = number_format($inss, 2, '.', '');
    $renda = $renda - $inss;
}
else if($renda >= 3134.41){
    $inss = $renda - $renda*0.860;
    $inss = number_format($inss, 2, '.', '');
    $renda = $renda - $inss;
    if($inss > 6101.06){
        $inss = 6101.06;
    }
}

//Cálculo do IRPF
if($renda <= 1903.98){
    $renda = $renda;
}
else if($renda >= 1903.99 and $renda <= 2826.65){
    $renda = $renda - $renda*0.075;
    $renda = $renda + 142.80;
    fwrite($arquivo , "Nome: " . $nome . " INSS: " . $inss . " Renda líquida: " . $renda. "\n"); 
}
else if($renda >= 2826.66 and 3751.05){
    $renda = $renda - $renda*0.15;
    $renda = $renda + 354.80;
    fwrite($arquivo , "Nome: " . $nome . " INSS: " . $inss . " Renda líquida: " . $renda. "\n"); 
}
else if($renda >= 3751.06 and 4664.68){
    $renda = $renda - $renda*0.225;
    $renda = $renda + 636.13;
    fwrite($arquivo , "Nome: " . $nome . " INSS: " . $inss . " Renda líquida: " . $renda. "\n"); 
}
else{
    $renda = $renda - $renda*0.275;
    $renda = $renda + 869.36;
    fwrite($arquivo , "Nome: " . $nome . " INSS: " . $inss . " Renda líquida: " . $renda. "\n"); 
}
fclose($arquivo);

$exibirArq = fopen("arquivo.txt","r");
$texto = fread($exibirArq, filesize("arquivo.txt"));
$texto = nl2br($texto);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <title>Document</title>
</head>
<body>
    <img id=inssImg src="./imagens/inss.png"/>
    <img id=irpfImg src="./imagens/receitaFederal.svg"/>
    <div id=echoTexto>
    <?php
        echo "Nome: " . $nome . " INSS: " . $inss . " Renda líquida: " . $renda . "</br>";
    ?>
    </div>
    
    <div id=echoDados>
    <?php
        echo $texto;
    ?>
    </div>

</body>
</html>