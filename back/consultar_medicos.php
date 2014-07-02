<?php
include 'conexao.php';
?>
<meta charset="UTF-8">
<center>
    <table>
        <tr>
            <td>CRM</td><td>NOME</td><td>CPF</td><td>EMAIL</td><td>Ação</td>
        </tr>
        <?php
        $consultar = mysql_query("SELECT * FROM Medicos");

        while ($row = mysql_fetch_array($consultar)) {
            ?>
            <tr>
                <td><?= $row['CRM'] ?> </td> <td> <?= $row['NOME'] ?> </td> <td> <?= $row['CPF'] ?> </td> <td> <?= $row['EMAIL'] ?> </td>
                <td>
                    <a href="edita_medico1.php?CRM=<?= $row['CRM'] ?>"> Editar </a>
                    <a href="deleta_medico.php?CRM=<?= $row['CRM'] ?>"> Excluir </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>