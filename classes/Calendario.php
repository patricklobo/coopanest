<?php
require_once 'Conexao.php';

class Calendario {
    private $timestamp;
    private $dia;
    private $mes;
    private $ano;
    private $ultimo_dia; // Mágica, plim!
    private $mesUser;
    private $anoUser;
    private $conexao;
    private $sql;

        
function __construct(){
    $this->timestamp = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
    $this->dia = gmdate("d", $this->timestamp);
    $this->mes = gmdate("m", $this->timestamp);
    $this->ano = gmdate("Y", $this->timestamp);
    $this->ultimo_dia = date("t", mktime(0,0,0,$this->mes,'01',$this->ano)); // Mágica, plim!
    $this->mesUser = $_GET['mes'];
    $this->anoUser = $_GET['ano'];
}

public function getTimestamp() {
        return $this->timestamp;
    }

    public function getDia() {
        return $this->dia;
    }

    public function getMes() {
        return $this->mes;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getUltimo_dia() {
        return $this->ultimo_dia;
    }

    public function getMesUser() {
        return $this->mesUser;
    }

    public function getAnoUser() {
        return $this->anoUser;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function setDia($dia) {
        $this->dia = $dia;
        return $this;
    }

    public function setMes($mes) {
        $this->mes = $mes;
        return $this;
    }

    public function setAno($ano) {
        $this->ano = $ano;
        return $this;
    }

    public function setUltimo_dia($ultimo_dia) {
        $this->ultimo_dia = $ultimo_dia;
        return $this;
    }

    public function setMesUser($mesUser) {
        $this->mesUser = $mesUser;
        return $this;
    }

    public function setAnoUser($anoUser) {
        $this->anoUser = $anoUser;
        return $this;
    }


    function proximo($mes,$ano){
    $mesUser = $_GET['mes'];
    $anoUser = $_GET['ano'];
    if($mesUser == "" && $anoUser == ""){
        
        if($mes == 12){
        return "mes=".(1)."&ano=".($ano+1);
        } else {
            return "mes=".($mes + 1)."&ano=".($ano);
        }
        
    } else {
        if($mesUser == 12){
        return "mes=".(1)."&ano=".($anoUser+1);
        } else {
            return "mes=".($mesUser + 1)."&ano=".($anoUser);
        }
    }
    
}

function anterior($mes,$ano){
    $mesUser = $_GET['mes'];
    $anoUser = $_GET['ano'];
    if($mesUser == "" && $anoUser == ""){
        
        if($mes==1){
        return "mes=".(12)."&ano=".($ano-1);
        } else {
            return "mes=".($mes - 1)."&ano=".($ano);
        }
        
    } else {
        if($mesUser == 1){
        return "mes=".(12)."&ano=".($anoUser-1);
        } else {
            return "mes=".($mesUser - 1)."&ano=".($anoUser);
        }
    }
    
}

/*
     Código escrito por Talianderson Dias
     em caso de dúvidas, mande um email para talianderson.web@gmail.com
*/
function MostreSemanas()
{
    
    ?>
<td> DOM </td>
<td> SEG </td>
<td> TER </td>
<td> QUA </td>
<td> QUI </td>
<td> SEX </td>
<td> SAB </td>
<?php
         
 
}
 
function GetNumeroDias( $mes,$ano )
{
	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano)); // Mágica, plim!
 
	return $ultimo_dia;
}
 
function GetNomeMes( $mes )
{
     switch ($mes){
 
case 1: return "Janeiro"; break;
case 2: return "Fevereiro"; break;
case 3: return "Março"; break;
case 4: return "Abril"; break;
case 5: return "Maio"; break;
case 6: return "Junho"; break;
case 7: return "Julho"; break;
case 8: return "Agosto"; break;
case 9: return "Setembro"; break;
case 10: return "Outubro"; break;
case 11: return "Novembro"; break;
case 12: return "Dezembro"; break;
 
}
 
}
 
 
 
function MostreCalendario( $mes, $ano  )
{
 
	$numero_dias = $this->GetNumeroDias( $mes, $ano );	// retorna o número de dias que tem o mês desejado
	$nome_mes = $this->GetNomeMes( $mes );
	$diacorrente = 0;	
 
	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",$ano) , 0 );	// função que descobre o dia da semana
 
	echo "<table id='calendario'>";
	 echo "<tr>";
         echo "<td colspan = 7 class='tdtitulo'>".$nome_mes." de ".$ano."</td>";
	 echo "</tr>";
	 echo "<tr id='toposemana'>";
	   $this->MostreSemanas();	// função que mostra as semanas aqui
	 echo "</tr>";
	for( $linha = 0; $linha < 6; $linha++ )
	{
 
 
	   echo "<tr class='calendario_linha'>";
 
	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
		echo "<td width = 30 height = 30 ";
 
		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
		  {	
			   echo " id = 'dia_atual' ";
		  }
		  else
		  {
			     if(($diacorrente + 1) <= $numero_dias )
			     {
			         if( $coluna < $diasemana && $linha == 0)
				 {
					echo " id = 'dia_branco' ";
				 }
				 else
				 {
				  	echo " id = 'dia_comum' ";
				 }
			     }
			     else
			     {
				echo " ";
			     }
		  }
		echo " align = 'center' valign = 'center'>";
 
 
		   /* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */
 
		      if( $diacorrente + 1 <= $numero_dias )
		      {
			 if( $coluna < $diasemana && $linha == 0)
			 {
			  	 echo " ";
			 }
			 else
			 {
			  	// echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."' onclick = "acao(this.value)">";
                             $this->conexao = new Conexao();
                             $this->conexao->conectar();
                             $this->sql = "SELECT A.*, U.nome FROM atividade A JOIN usuario U ON A.usuario = U.idusuario WHERE date(data_ini) = '".$ano."-".$mes."-".($diacorrente + 1)." ORDER BY data_ini ' LIMIT 0, 5";
                             $this->conexao->execSQL($this->sql);
				   echo "<a href='?controle=atividade&acao=Select&data=".$ano."-".$mes."-".($diacorrente + 1)."'>".++$diacorrente . "<br><span>";
                                   
                                   while ($row = $this->conexao->listarResultados()) {
                                       echo $row['nome']." - ".$row['titulo']."<br>";
                                   }
                                   
                                   echo "</span></a>";
			 }
		      }
		      else
		      {
			break;
		      }
 
		   /* FIM DO TRECHO MUITO IMPORTANTE */
 
 
 
		echo "</td>";
	   }
	   echo "</tr>";
	}
 
	echo "</table>";
}
 
function MostreCalendarioCompleto()
{
	    echo "<table align = 'center'>";
	    $cont = 1;
	    for( $j = 0; $j < 4; $j++ )
	    {
		  echo "<tr>";
		for( $i = 0; $i < 3; $i++ )
		{
		 
		  echo "<td>";
			MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );  
 
		        $cont++;
		  echo "</td>";
 
	 	}
		echo "</tr>";
	   }
	   echo "</table>";
}
}
