<?php
$medicoBD = new MedicoBD();
$listaMedico = $medicoBD->getMedico();
$cont = 0;
?>


<form action="" method="POST">
    <table id="MedicoDeletar">
        <tr>
            <td>
                Medico
            </td>
            <td>
                <select name="medico">
                    <option value=""> Selecione o Medico </option>
                    <?php
                    while ($cont < count($listaMedico)) {
                        
                        echo "<option value='".$listaMedico[$cont]->getCrm()."'>".$listaMedico[$cont]->getNome()."</option>";

                        $cont++;
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Deletar">

            </td>
        </tr>
    </table>
</form>