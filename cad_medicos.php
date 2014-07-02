<?php
include 'conexao.php';

$crm = $_POST['CRM'];
$nome = $_POST['NOME'];
$cpf = $_POST['CPF'];
$email = $_POST['EMAIL'];

$enviar = mysql_query("INSERT INTO Medicos (CRM, NOME, CPF, EMAIL) VALUES('$crm', '$nome', '$cpf', '$email')")or die(mysql_error());