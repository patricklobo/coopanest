
<?php 
$validador = new Validador();
$conexao = new Conexao();
?>
<script type="text/javascript" src="./js/mascaras.js"></script>

<div class="novoEvento">
    <form action="" method="POST" >
        <table>
            <input type="hidden" name="data" value="<?=$_GET['data']?>">
            
            <tr>
                <td> <input type="text" name="titulo" maxlength="128" placeholder="Titulo"> </td>
            </tr>
            <tr>
                <td>
                    Início<br>
                    <select name='hini' id="hini">
                        <option value="">Hora</option>
                        <?php
                        for ($index = 0; $index < 24; $index++) {
                            echo "<option value='".$index."'>".$index."</option>";
                        }
                        ?>
                        
                    </select>
                    <select name='mini' id="mini">
                        <option value="">Minutos</option>
                        <?php
                        for ($index = 0; $index < 61; $index++) {
                            echo "<option value='".$index."'>".$index."</option>";
                        }
                        ?>
                        
                    </select></td>
            </tr>
            <tr>
                <td>
                    Fim<br>
                    <select name='hfim' id="hfim">
                        <option value="">Hora</option>
                        <?php
                        for ($index = 0; $index < 24; $index++) {
                            echo "<option value='".$index."'>".$index."</option>";
                        }
                        ?>
                        
                    </select>
                    <select name='mfim' id="mfim">
                        <option value="">Minutos</option>
                        <?php
                        for ($index = 0; $index < 61; $index++) {
                            echo "<option value='".$index."'>".$index."</option>";
                        }
                        ?>
                        
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td><textarea placeholder="Conteúdo da Atividade" name="conteudo"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Salvar"></td>
            </tr>
        </table>
    </form>
    
    
</div> 



<div class="eventos">
    <span>Eventos do dia <?=$validador->dataView($_GET['data'])?></span>
    <table class="table_eventos">
        <tr class="titulo">
            <td> Usuário </td> <td> Título </td> <td> Conteúdo </td> <td> Início </td> <td> Fim </td>
        </tr>
       <?php 
       $data = $_GET['data'];
       $conexao->conectar();
       $sql = "SELECT A.*, U.nome FROM atividade A JOIN usuario U ON A.usuario = U.idusuario WHERE date(data_ini) = '$data'";
       $conexao->execSQL($sql);
       while ($row = $conexao->listarResultados()) {
           ?>
        
        <tr>
            <td> <?=$row['nome']?> </td> <td> <?=$row['titulo']?> </td> <td> <?=$row['conteudo']?> </td> <td> <?=$validador->truncaHoraMin($row['data_ini'])?> </td> <td> <?=$validador->truncaHoraMin($row['data_fim'])?> </td>
        </tr>
        
        <?php
       }
       
       ?> 
       
        
    </table>
    
    
</div>

    

<?php



