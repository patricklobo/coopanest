<?php
include 'conexao.php';

$crm = $_GET['CRM'];

mysql_query("DELETE FROM `Medicos` WHERE CRM='$crm'")or die(mysql_error());