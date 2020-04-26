<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <title>Renda Líquida</title>
</head>
<body>
    <div id=erro>
    </div>
    <img id=inssImg src="./imagens/inss.png"/>
    <img id=irpfImg src="./imagens/receitaFederal.svg"/>
    <form action="calculoRenda.php" method="post">
        Nome completo: <input required=required type=text name=nome id=nome><br>
        Renda bruta: <input required=required type=text name=renda id=renda pattern=^[0-9]+><br>
        <input type=submit value="ENVIAR">
    </form>
</body>
</html>