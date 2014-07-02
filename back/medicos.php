<?php
include 'conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>w
        <form action="cad_medicos.php" method="POST">
            CRM: <input type="text" name="CRM"><br>
            Nome: <input type="text" name="NOME"><br>
            CPF: <input type="text" name="CPF"><br>
            Email: <input type="text" name="EMAIL"><br>
            <input type="submit" value="Enviar">
        </form>
    </center>
</body>
</html>