<meta charset="UTF-8">
<?php
include 'conexao.php';

$crm = $_GET['CRM'];

$consulta = mysql_query("SELECT * FROM Medicos WHERE CRM='$crm'")or die(mysql_error());
$row = mysql_fetch_array($consulta);
    
?>
<center>
    <form action="edita_medico.php" method="POST">
        CRM: <input type="text" name="CRM" value="<?=$row['CRM']?>"><br>
        NOME: <input type="text" value="<?=$row['NOME']?>" name="NOME"><br>
        CPF: <input type="text" value="<?=$row['CPF']?>" name="CPF"><br>
        EMAIL: <input type="text" value="<?=$row['EMAIL']?>" name="EMAIL"><br>
        <input type="submit" value="Salvar">
    </form>
</center>