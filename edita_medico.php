<meta charset="UTF-8">
<?php
include 'conexao.php';

$crm = $_POST['CRM'];
$nome = $_POST['NOME'];
$cpf = $_POST['CPF'];
$email = $_POST['EMAIL'];

$query = mysql_query("UPDATE Medicos SET NOME='$nome', CPF='$cpf', EMAIL='$email' WHERE CRM='$crm'")or die(mysql_error());
